<?php
//contact form
function pr_theme_contact_form_shortcode($atts)
{
	global $theme_options;
	extract(shortcode_atts(array(
		"id" => "contact_form",
		"submit_label" => __("SEND MESSAGE", 'pressroom'),
		"name_label" => __("Your Name *", 'pressroom'),
		"name_required" => 1,
		"email_label" => __("Your Email *", 'pressroom'),
		"email_required" => 1,
		"subject_label" => __("Subject", 'pressroom'),
		"subject_required" => 0,
		"message_label" => __("Message *", 'pressroom'),
		"message_required" => 1,
		"terms_checkbox" => 0,
		"terms_message" => "UGxlYXNlJTIwYWNjZXB0JTIwdGVybXMlMjBhbmQlMjBjb25kaXRpb25z",
		"top_margin" => "none",
		"el_class" => ""
	), $atts));
	
	$output = "";
	$output .= '<form class="contact_form ' . ($top_margin!="none" ? esc_attr($top_margin) : '') . ($el_class!="" ? ' ' . esc_attr($el_class) : '') . '" id="' . esc_attr($id) . '" method="post" action="#">
		<fieldset class="vc_col-sm-4 wpb_column vc_column_container">
			<div class="block">
				<input class="text_input" name="name" type="text" value="' . esc_attr($name_label) . '" placeholder="' . esc_attr($name_label) . '" data-default="' . esc_attr($name_label) . '"' . ((int)$name_required ? ' data-required="1"' : '') . '>
			</div>
		</fieldset>
		<fieldset class="vc_col-sm-4 wpb_column vc_column_container">
			<div class="block">
				<input class="text_input" name="email" type="text" value="' . esc_attr($email_label) . '" placeholder="' . esc_attr($email_label) . '" data-default="' . esc_attr($email_label) . '"' . ((int)$email_required ? ' data-required="1"' : '') . '>
			</div>
		</fieldset>
		<fieldset class="vc_col-sm-4 wpb_column vc_column_container">
			<div class="block">
				<input class="text_input" name="subject" type="text" value="' . esc_attr($subject_label) . '" placeholder="' . esc_attr($subject_label) . '" data-default="' . esc_attr($subject_label) . '"' . ((int)$subject_required ? ' data-required="1"' : '') . '>
			</div>
		</fieldset>
		<fieldset>
			<div class="block">
				<textarea class="margin_top_10" name="message" placeholder="' . esc_attr($message_label) . '" data-default="' . esc_attr($message_label) . '"' . ((int)$message_required ? ' data-required="1"' : '') . '>' . $message_label . '</textarea>
			</div>
		</fieldset>
		<div class="submit-container margin_top_10' . ((int)$theme_options["google_recaptcha"] ? ' fieldset-with-recaptcha' : '') . '">
			<input type="hidden" name="action" value="theme_contact_form">
			<input type="hidden" name="id" value="' . esc_attr($id) . '">';
		if((int)$terms_checkbox)
		{
			$output .= '<div class="terms-container block">
				<input type="checkbox" name="terms" id="' . esc_attr($id) . 'terms" value="1"><label for="' . esc_attr($id) . 'terms">' . urldecode(base64_decode($terms_message)) . '</label>
			</div>';
			if((int)$theme_options["google_recaptcha"])
			{
				$output .= '<div class="recaptcha-container">';
			}
		}
		$output .= '<div class="vc_row wpb_row vc_inner' . ((int)$theme_options["google_recaptcha"] ? ' button-with-recaptcha' : '') . '">
			<input type="submit" name="submit" value="' . esc_attr($submit_label) . '" class="more active">
		</div>';
				if((int)$theme_options["google_recaptcha"])
				{
					if($theme_options["recaptcha_site_key"]!="" && $theme_options["recaptcha_secret_key"]!="")
					{
						wp_enqueue_script("google-recaptcha-v2");
						$output .= '<div class="g-recaptcha-wrapper block"><div class="g-recaptcha" data-sitekey="' . esc_attr($theme_options["recaptcha_site_key"]) . '"></div></div>';
					}
					else
						$output .= '<p>' . __("Error while loading reCapcha. Please set the reCaptcha keys under Theme Options in admin area", 'pressroom') . '</p>';
					if((int)$terms_checkbox)
					{
						$output .= '</div>';
					}
				}
	$output .= '</div>
	</form>';
	return $output;
}

//wpbakery page builder
function pr_theme_contact_form_vc_init()
{
	global $theme_options;
	vc_map( array(
		"name" => __("Contact form", 'pressroom'),
		"base" => "pressroom_contact_form",
		"class" => "",
		"controls" => "full",
		"show_settings_on_create" => true,
		"icon" => "icon-wpb-layer-contact-form",
		"category" => __('Pressroom', 'pressroom'),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Id", 'pressroom'),
				"param_name" => "id",
				"value" => "contact_form",
				"description" => __("Please provide unique id for each contact form on the same page/post", 'pressroom')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Submit label", 'pressroom'),
				"param_name" => "submit_label",
				"value" => __("SEND MESSAGE", 'pressroom')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Name label", 'pressroom'),
				"param_name" => "name_label",
				"value" => __("Your Name *", 'pressroom')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Name field required", 'pressroom'),
				"param_name" => "name_required",
				"value" => array(__("Yes", 'pressroom') => 1, __("No", 'pressroom') => 0)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Email label", 'pressroom'),
				"param_name" => "email_label",
				"value" => __("Your Email *", 'pressroom')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Email field required", 'pressroom'),
				"param_name" => "email_required",
				"value" => array(__("Yes", 'pressroom') => 1, __("No", 'pressroom') => 0)
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Subject label", 'pressroom'),
				"param_name" => "subject_label",
				"value" => __("Subject", 'pressroom')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Subject field required", 'pressroom'),
				"param_name" => "subject_required",
				"value" => array(__("Yes", 'pressroom') => 1, __("No", 'pressroom') => 0),
				"std" => 0
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Message label", 'pressroom'),
				"param_name" => "message_label",
				"value" => __("Message *", 'pressroom')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Message field required", 'pressroom'),
				"param_name" => "message_required",
				"value" => array(__("Yes", 'pressroom') => 1, __("No", 'pressroom') => 0)
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Terms and conditions checkbox", 'pressroom'),
				"param_name" => "terms_checkbox",
				"value" => array(__("Yes", 'pressroom') => 1, __("No", 'pressroom') => 0),
				"std" => 0
			),
			array(
				"type" => "textarea_raw_html",
				"class" => "",
				"heading" => __("Terms and conditions message", 'pressroom'),
				"param_name" => "terms_message",
				"value" => "UGxlYXNlJTIwYWNjZXB0JTIwdGVybXMlMjBhbmQlMjBjb25kaXRpb25z",
				"dependency" => Array('element' => "terms_checkbox", 'value' => "1")
			),
			array(
				"type" => "readonly",
				"class" => "",
				"heading" => __("reCaptcha", 'pressroom'),
				"param_name" => "recaptcha",
				"value" => ((int)$theme_options["google_recaptcha"] ? __("Yes", 'pressroom') : __("No", 'pressroom')),
				"description" => sprintf(__("You can change this setting under <a href='%s' title='Theme Options'>Theme Options</a>", 'pressroom'), esc_url(admin_url("themes.php?page=ThemeOptions")))
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Top margin", 'pressroom'),
				"param_name" => "top_margin",
				"value" => array(__("None", 'pressroom') => "none", __("Page (small)", 'pressroom') => "page_margin_top", __("Section (large)", 'pressroom') => "page_margin_top_section")
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'pressroom' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'pressroom' )
			)
		)
	));
}
if(function_exists('vc_map'))
{
	add_action("init", "pr_theme_contact_form_vc_init");
}

//contact form submit
function pr_theme_contact_form()
{
	ob_start();
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
		if(((isset($_POST["terms"]) && (int)$_POST["terms"]) || !isset($_POST["terms"])) && (((int)$theme_options["google_recaptcha"] && !empty($_POST["g-recaptcha-response"])) || !(int)$theme_options["google_recaptcha"]) && ((isset($_POST["name_required"]) && (int)$_POST["name_required"] && $_POST["name"]!=$_POST["name_default"] && $_POST["name"]!="") || (!isset($_POST["name_required"]) || !(int)$_POST["name_required"])) && ((isset($_POST["email_required"]) && (int)$_POST["email_required"] && $_POST["email"]!=$_POST["email_default"] && $_POST["email"]!="" && is_email($_POST["email"])) || (!isset($_POST["email_required"]) || !(int)$_POST["email_required"])) && ((isset($_POST["subject_required"]) && (int)$_POST["subject_required"] && $_POST["subject"]!=$_POST["subject_default"] && $_POST["subject"]!="") || (!isset($_POST["subject_required"]) || !(int)$_POST["subject_required"])) && ((isset($_POST["message_required"]) && (int)$_POST["message_required"] && $_POST["message"]!=$_POST["message_default"] && $_POST["message"]!="") || (!isset($_POST["message_required"]) || !(int)$_POST["message_required"])))
		{
			if((int)$theme_options["google_recaptcha"])
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
			if(((int)$theme_options["google_recaptcha"] && isset($verify_recaptcha["success"]) && (int)$verify_recaptcha["success"]) || !(int)$theme_options["google_recaptcha"])
			{	
				$values = array(
					"name" => ($_POST["name"]!=$_POST["name_default"] ? $_POST["name"] : ""),
					"subject" => ($_POST["subject"]!=$_POST["subject_default"] ? $_POST["subject"] : $theme_options["cf_email_subject"]),
					"email" => ($_POST["email"]!=$_POST["email_default"] ? $_POST["email"] : ""),
					"message" => ($_POST["message"]!=$_POST["message_default"] ? $_POST["message"] : "")
				);
				$values = pr_theme_stripslashes_deep($values);
				$values = array_map("esc_attr", $values);
				
				$headers[] = 'Reply-To: ' . $values["name"] . ' <' . $values["email"] . '>' . "\r\n";
				$headers[] = 'From: ' . (!empty($theme_options["cf_admin_name_from"]) ? $theme_options["cf_admin_name_from"] : $theme_options["cf_admin_name"]) . ' <' . (!empty($theme_options["cf_admin_email_from"]) ? $theme_options["cf_admin_email_from"] : $theme_options["cf_admin_email"]) . '>' . "\r\n";
				$headers[] = 'Content-type: text/html';		
				$subject = $values["subject"];
				$subject = str_replace("[name]", $values["name"], $subject);
				$subject = str_replace("[email]", $values["email"], $subject);
				$subject = str_replace("[message]", $values["message"], $subject);
				$body = $theme_options["cf_template"];
				$body = str_replace("[name]", $values["name"], $body);
				$body = str_replace("[email]", $values["email"], $body);
				$body = str_replace("[message]", $values["message"], $body);

				if(wp_mail($theme_options["cf_admin_name"] . ' <' . $theme_options["cf_admin_email"] . '>', $subject, $body, $headers))
					$result["submit_message"] = (!empty($theme_options["cf_thankyou_message"]) ? $theme_options["cf_thankyou_message"] : __("Thank you for contacting us", 'pressroom'));
				else
				{
					$result["isOk"] = false;
					$result["error_message"] = $GLOBALS['phpmailer']->ErrorInfo;
					$result["submit_message"] = (!empty($theme_options["cf_error_message"]) ? $theme_options["cf_error_message"] : __("Sorry, we can't send this message", 'pressroom'));
				}
			}
			else
			{
				$result["isOk"] = false;
				$result["error_captcha"] = (!empty($theme_options["cf_recaptcha_message"]) ? $theme_options["cf_recaptcha_message"] : __("Please verify captcha.", 'pressroom'));
			}
		}
		else
		{
			$result["isOk"] = false;
			if(isset($_POST["name_required"]) && (int)$_POST["name_required"] && ($_POST["name"]==$_POST["name_default"] || $_POST["name"]==""))
				$result["error_name"] = (!empty($theme_options["cf_name_message"]) ? $theme_options["cf_name_message"] : __("Please enter your name.", 'pressroom'));
			if(isset($_POST["email_required"]) && (int)$_POST["email_required"] && ($_POST["email"]==$_POST["email_default"] || $_POST["email"]=="" || !is_email($_POST["email"])))
				$result["error_email"] = (!empty($theme_options["cf_email_message"]) ? $theme_options["cf_email_message"] : __("Please enter valid e-mail.", 'pressroom'));
			if(isset($_POST["subject_required"]) && (int)$_POST["subject_required"] && ($_POST["subject"]==$_POST["subject_default"] || $_POST["subject"]==""))
				$result["error_subject"] = (!empty($theme_options["cf_subject_message"]) ? $theme_options["cf_subject_message"] : __("Please enter subject.", 'pressroom'));
			if(isset($_POST["message_required"]) && (int)$_POST["message_required"] && ($_POST["message"]==$_POST["message_default"] || $_POST["message"]==""))
				$result["error_message"] = (!empty($theme_options["cf_message_message"]) ? $theme_options["cf_message_message"] : __("Please enter your message.", 'pressroom'));
			if((int)$theme_options["google_recaptcha"] && empty($_POST["g-recaptcha-response"]))
				$result["error_captcha"] = (!empty($theme_options["cf_recaptcha_message"]) ? $theme_options["cf_recaptcha_message"] : __("Please verify captcha.", 'pressroom'));
			if(isset($_POST["terms"]) && !(int)$_POST["terms"])
				$result["error_terms"] = (!empty($theme_options["cf_terms_message"]) ? $theme_options["cf_terms_message"] : __("Checkbox is required.", 'pressroom'));
		}
	}
	$system_message = ob_get_clean();
	$result["system_message"] = $system_message;
	echo @json_encode($result);
	exit();
}
add_action("wp_ajax_theme_contact_form", "pr_theme_contact_form");
add_action("wp_ajax_nopriv_theme_contact_form", "pr_theme_contact_form");
?>