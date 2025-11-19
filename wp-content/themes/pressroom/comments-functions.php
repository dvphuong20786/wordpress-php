<?php
//comment form submit
function pr_theme_comment_form()
{
	global $theme_options;
	
	$result = array();
	$result["isOk"] = true;
	if(!isset($_POST['pr_ajax_nonce']) || !wp_verify_nonce($_POST['pr_ajax_nonce'], 'pr-ajax-nonce'))
	{
		$result["isOk"] = false;
		$result["submit_message"] = esc_html("Nonce verification failed!", 'pressroom');
	}
	else
	{
		$verify_recaptcha = array();
		$require_name_email = get_option('require_name_email');
		if(((isset($_POST["terms"]) && (int)$_POST["terms"]) || !isset($_POST["terms"])) && (((int)$theme_options["google_recaptcha_comments"] && !empty($_POST["g-recaptcha-response"])) || !(int)$theme_options["google_recaptcha_comments"]) && (($_POST["name"]!="" && $_POST["name"]!=__("Your Name *", 'pressroom')) || !$require_name_email)  && (($_POST["email"]!="" && $_POST["email"]!=__("Your Email *", 'pressroom') && is_email($_POST["email"])) || (!$require_name_email && ($_POST["email"]=="" || $_POST["email"]==__("Your Email *", 'pressroom')))) && $_POST["message"]!="" && $_POST["message"]!=__("Comment *", 'pressroom'))
		{
			if((int)$theme_options["google_recaptcha_comments"])
			{
				$data = array(
					"secret" => $theme_options["recaptcha_secret_key"],
					"response" => $_POST["g-recaptcha-response"]
				);
				$remote_response = wp_remote_post("https://www.google.com/recaptcha/api/siteverify", array(
					"body" => $data
				));
				$verify_recaptcha = json_decode($remote_response["body"], true);
			}
			if(((int)$theme_options["google_recaptcha_comments"] && isset($verify_recaptcha["success"]) && (int)$verify_recaptcha["success"]) || !(int)$theme_options["google_recaptcha_comments"])
			{
				$values = array(
					"name" => $_POST["name"],
					"email" => $_POST["email"],
					"website" => $_POST["website"],
					"message" => $_POST["message"]
				);
				$values = pr_theme_stripslashes_deep($values);
				$values = array_map("esc_attr", $values);
			
				$time = current_time('mysql');

				$data = array(
					'comment_post_ID' => (int)$_POST['post_id'],
					'comment_author' => ($values['name']!=__("Your Name *", 'pressroom') ? $values['name'] : ""),
					'comment_author_email' => $values['email'],
					'comment_author_url' => ($values['website']!=__("Website", 'pressroom') ? $values['website'] : ""),
					'comment_content' => $values['message'],
					'comment_parent' => (isset($_POST['parent_comment_id']) ? (int)$_POST['parent_comment_id'] : 0),
					'comment_date' => $time,
					'comment_approved' => ((int)get_option('comment_moderation') ? 0 : 1),
					'comment_parent' => (!empty($_POST['comment_parent_id']) ? (int)$_POST['comment_parent_id'] : 0)
				);

				if($comment_id = wp_insert_comment($data))
				{
					$result["submit_message"] = (!empty($theme_options["cf_thankyou_message_comments"]) ? $theme_options["cf_thankyou_message_comments"] : __("Your comment has been added.", 'pressroom'));
					if(get_option('comments_notify'))
						wp_notify_postauthor($comment_id);
					//get post comments
					//post
					$comments_query = new WP_Query("p=" . (int)$_POST['post_id'] . "&post_type=" . esc_attr($_POST["post_type"]));
					if($comments_query->have_posts()) : $comments_query->the_post(); 
						ob_start();
						$result['comment_id'] = $comment_id;
						if(isset($_POST['comment_parent_id']) && (int)$_POST['comment_parent_id']==0)
						{
							global $wpdb;
							$query = $wpdb->prepare("SELECT COUNT(*) AS count FROM $wpdb->comments WHERE comment_approved = 1 AND comment_post_ID = %d AND comment_parent = 0", get_the_ID());
							//$query = $wpdb->prepare("SELECT COUNT(*) AS count FROM $wpdb->comments WHERE (comment_approved = '1' OR comment_approved = '0') AND comment_post_ID = %d AND comment_parent = 0", get_the_ID());
							$parents = $wpdb->get_row($query);
							$_GET["paged"] = ceil($parents->count/5);
							$result["change_url"] = "#page-" . esc_attr($_GET["paged"]);
						}
						else
							$_GET["paged"] = (int)$_POST["paged"];
						global $withcomments;
						$withcomments = true;
						comments_template();
						$result['html'] = ob_get_contents();
						ob_end_clean();
					endif;
					//Reset Postdata
					wp_reset_postdata();
				}
				else 
				{
					$result["isOk"] = false;
					$result["submit_message"] = (!empty($theme_options["cf_error_message_comments"]) ? $theme_options["cf_error_message_comments"] : __("Error while adding comment.", 'pressroom'));
				}
			}
			else
			{
				$result["isOk"] = false;
				$result["error_captcha"] = (!empty($theme_options["cf_recaptcha_message_comments"]) ? $theme_options["cf_recaptcha_message_comments"] : __("Please verify captcha.", 'pressroom'));
			}
		}
		else
		{
			$result["isOk"] = false;
			if($require_name_email && ($_POST["name"]=="" || $_POST["name"]==__("Your Name *", 'pressroom')))
				$result["error_name"] = (!empty($theme_options["cf_name_message_comments"]) ? $theme_options["cf_name_message_comments"] : __("Please enter your name.", 'pressroom'));
			if(($require_name_email && ($_POST["email"]=="" || $_POST["email"]==__("Your Email *", 'pressroom') || !is_email($_POST["email"]))) || (!$require_name_email && $_POST["email"]!="" && $_POST["email"]!=__("Your Email *", 'pressroom') && !preg_match("#^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,12})$#", $_POST["email"])))
				$result["error_email"] = (!empty($theme_options["cf_email_message_comments"]) ? $theme_options["cf_email_message_comments"] : __("Please enter valid e-mail.", 'pressroom'));
			if($_POST["message"]=="" || $_POST["message"]==__("Comment *", 'pressroom'))
				$result["error_message"] = (!empty($theme_options["cf_comment_message_comments"]) ? $theme_options["cf_comment_message_comments"] : __("Please enter your message.", 'pressroom'));
			if((int)$theme_options["google_recaptcha_comments"] && empty($_POST["g-recaptcha-response"]))
				$result["error_captcha"] = (!empty($theme_options["cf_recaptcha_message_comments"]) ? $theme_options["cf_recaptcha_message_comments"] : __("Please verify captcha.", 'pressroom'));
			if(isset($_POST["terms"]) && !(int)$_POST["terms"])
				$result["error_terms"] = (!empty($theme_options["cf_terms_message_comments"]) ? $theme_options["cf_terms_message_comments"] : __("Checkbox is required.", 'pressroom'));
		}
	}
	echo @json_encode($result);
	exit();
}
add_action("wp_ajax_theme_comment_form", "pr_theme_comment_form");
add_action("wp_ajax_nopriv_theme_comment_form", "pr_theme_comment_form");

//get comments list
function pr_theme_get_comments()
{
	$result = array();
	if(wp_doing_ajax() && (!isset($_GET['pr_ajax_nonce']) || !wp_verify_nonce($_GET['pr_ajax_nonce'], 'pr-ajax-nonce')))
	{
		$result["html"] = esc_html("Nonce verification failed!", 'pressroom');
	}
	else
	{
		$comments_query = new WP_Query("post_status=publish&p=" . esc_attr($_GET["post_id"]) . "&post_type=" . esc_attr($_GET["post_type"]));
		if($comments_query->have_posts()) : $comments_query->the_post();
		ob_start();
		global $withcomments;
		$withcomments = true;
		comments_template();
		$result["html"] = ob_get_contents();
		ob_end_clean();
		endif;
		//Reset Postdata
		wp_reset_postdata();
	}
	echo @json_encode($result);
	exit();
}
add_action("wp_ajax_theme_get_comments", "pr_theme_get_comments");
add_action("wp_ajax_nopriv_theme_get_comments", "pr_theme_get_comments");
?>