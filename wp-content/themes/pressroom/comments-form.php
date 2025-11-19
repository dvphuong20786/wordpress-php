<?php
if(comments_open())
{
	global $terms_checkbox;
	global $terms_message;
	global $top_margin;
	global $theme_options;
	?>
<div class="comment_form_container<?php echo ($top_margin!='none' ? ' ' . esc_attr($top_margin) : ''); ?>">
	<h4 class="box_header">
		<?php _e("Leave a Comment", 'pressroom'); ?>
	</h4>
	<?php
	if(get_option('comment_registration') && !is_user_logged_in())
	{
	?>
	<p class="padding_top_30"><?php echo sprintf(__("You must be <a href='%s'>logged in</a> to post a comment.", 'pressroom'), wp_login_url(esc_url(get_permalink()))); ?></p>
	<?php
	}
	else
	{
	?>
	<p class="padding_top_30"><?php _e("Your email address will not be published. Required fields are marked with *", 'pressroom'); ?></p>
	<form class="comment_form margin_top_15" id="comment_form" method="post" action="#">
		<fieldset class="vc_col-sm-4 wpb_column vc_column_container">
			<div class="block">
				<input class="text_input" name="name" type="text" value="<?php esc_attr_e('Your Name *', 'pressroom'); ?>" placeholder="<?php esc_attr_e('Your Name *', 'pressroom'); ?>">
			</div>
		</fieldset>
		<fieldset class="vc_col-sm-4 wpb_column vc_column_container">
			<div class="block">
				<input class="text_input" name="email" type="text" value="<?php esc_attr_e('Your Email *', 'pressroom'); ?>" placeholder="<?php esc_attr_e('Your Email *', 'pressroom'); ?>">
			</div>
		</fieldset>
		<fieldset class="vc_col-sm-4 wpb_column vc_column_container">
			<div class="block">
				<input class="text_input" name="website" type="text" value="<?php esc_attr_e('Website', 'pressroom'); ?>" placeholder="<?php esc_attr_e('Website', 'pressroom'); ?>">
			</div>
		</fieldset>
		<fieldset>
			<div class="block">
				<textarea class="margin_top_10" name="message" placeholder="<?php esc_attr_e('Comment *', 'pressroom'); ?>"><?php esc_html_e('Comment *', 'pressroom'); ?></textarea>
			</div>
		</fieldset>
		<div class="margin_top_10<?php echo ((int)$theme_options["google_recaptcha_comments"] ? ' fieldset-with-recaptcha' : '');?>">
			<?php
			if((int)$terms_checkbox)
			{
			?>
				<div class="terms-container block">
					<input type="checkbox" name="terms" id="comment_formterms" value="1"><label for="comment_formterms"><?php echo urldecode(base64_decode($terms_message)); ?></label>
				</div>
				<div class="recaptcha-container">
			<?php
			}
			?>
			<div class="vc_row wpb_row vc_inner<?php echo ((int)$theme_options["google_recaptcha_comments"] ? ' button-with-recaptcha' : '');?>">
				<input type="submit" value="<?php esc_attr_e('POST COMMENT', 'pressroom'); ?>" class="more active" name="submit">
				<a href="#cancel" id="cancel_comment" title="<?php esc_attr_e('Cancel reply', 'pressroom'); ?>"><?php echo __('Cancel reply', 'pressroom'); ?></a>
			</div>
			<?php
			if((int)$theme_options["google_recaptcha_comments"])
			{
				if($theme_options["recaptcha_site_key"]!="" && $theme_options["recaptcha_secret_key"]!="")
				{
					wp_enqueue_script("google-recaptcha-v2");
					?>
					<div class="g-recaptcha-wrapper block"><div class="g-recaptcha" data-sitekey="<?php echo esc_attr($theme_options["recaptcha_site_key"]); ?>"></div></div>
					<?php
				}
				else
				{
				?>
					<p><?php _e("Error while loading reCapcha. Please set the reCaptcha keys under Theme Options in admin area", 'pressroom'); ?></p>
				<?php
				}
			}
			if((int)$terms_checkbox)
			{
			?>
			</div>
			<?php
			}
			?>
			
			<input type="hidden" name="action" value="theme_comment_form">
			<input type="hidden" name="comment_parent_id" value="0">
			<input type="hidden" name="paged" value="1">
			<input type="hidden" name="prevent_scroll" value="0">
		</div>
	<?php
	}
	global $post;
	?>
		<fieldset>
			<input type="hidden" name="post_id" value="<?php echo esc_attr(get_the_ID()); ?>">
			<input type="hidden" name="post_type" value="<?php echo esc_attr($post->post_type); ?>">
		</fieldset>
	</form>
</div>
<?php
}
?>