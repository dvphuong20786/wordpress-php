<?php
/*
Plugin Name: Pressroom Theme Shortcodes
Plugin URI: https://1.envato.market/quanticalabs-portfolio
Description: Pressroom Theme Shortcodes plugin
Author: QuanticaLabs
Author URI: https://1.envato.market/quanticalabs-portfolio
Version: 1.3
*/

function pressroom_shortcodes_vc_init()
{
	if(function_exists("vc_map"))
	{
		add_shortcode("pressroom_contact_form", "pr_theme_contact_form_shortcode");
		add_shortcode("about_box", "pr_theme_about_box");
		add_shortcode("accordion", "pr_theme_accordion");
		add_shortcode("accordion_item", "pr_theme_accordion_item");
		add_shortcode("announcement_box", "pr_theme_announcement_box_shortcode");
		add_shortcode("pr_authors_carousel", "pr_theme_authors_carousel_shortcode");
		add_shortcode("pr_authors_list", "pr_theme_authors_list_shortcode");
		add_shortcode("blog_1_column", "pr_theme_blog_1_column");
		add_shortcode("blog_2_columns", "pr_theme_blog_2_columns");
		add_shortcode("blog_3_columns", "pr_theme_blog_3_columns");
		add_shortcode("blog_big", "pr_theme_blog_big");
		add_shortcode("blog_medium", "pr_theme_blog_medium");
		add_shortcode("blog_small", "pr_theme_blog_small");
		add_shortcode("columns", "pr_theme_columns");
		add_shortcode("column_left", "pr_theme_column_left");
		add_shortcode("column_right", "pr_theme_column_right");
		add_shortcode("comments", "pr_theme_comments");
		add_shortcode("featured_item", "pr_theme_featured_item");
		add_shortcode("items_list", "pr_theme_items_list");
		add_shortcode("item", "pr_theme_item");
		add_shortcode("pressroom_map", "pr_theme_map_shortcode");
		add_shortcode("pr_post_carousel", "pr_theme_post_carousel_shortcode");
		add_shortcode("pr_post_grid", "pr_theme_post_grid_shortcode");
		add_shortcode("pr_rank_list", "pr_theme_rank_list_shortcode");
		add_shortcode("pr_search_box", "pr_theme_search_box_shortcode");
		add_shortcode("vc_separator_pr", "pr_theme_vc_separator_pr");
		add_shortcode("box_header", "pr_theme_box_header");
		add_shortcode("dropcap", "pr_theme_dropcap");
		add_shortcode("read_more_button", "pr_theme_read_more_button");
		add_shortcode("scroll_top", "pr_theme_scroll_top");
		add_shortcode("single_author", "pr_theme_single_author");
		add_shortcode("single_post", "pr_theme_single_post");
		add_shortcode("slider", "pr_theme_slider");
		add_shortcode("small_slider", "pr_theme_small_slider_shortcode");
		add_shortcode("tabs", "pr_theme_tabs");
		add_shortcode("tabs_navigation", "pr_theme_tabs_navigation");
		add_shortcode("tab", "pr_theme_tab");
		add_shortcode("tab_content", "pr_theme_tab_content");
		add_shortcode("pr_top_authors", "pr_theme_top_authors_shortcode");
		//visual composer
		if(function_exists("vc_add_shortcode_param"))
		{
			//dropdownmulti
			vc_add_shortcode_param('dropdownmulti' , 'pr_dropdownmultiple_settings_field');
			function pr_dropdownmultiple_settings_field($settings, $value)
			{
				$value = ($value==null ? array() : $value);
				if(!is_array($value))
					$value = explode(",", $value);
				$output = '<select name="'.esc_attr($settings['param_name']).'" class="wpb_vc_param_value wpb-input wpb-select '.esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'" multiple>';
						foreach ( $settings['value'] as $text_val => $val ) {
							if ( is_numeric($text_val) && is_string($val) || is_numeric($text_val) && is_numeric($val) ) {
								$text_val = $val;
							}
							$text_val = $text_val;
						   // $val = strtolower(str_replace(array(" "), array("_"), $val));
							$selected = '';
							if ( in_array($val,$value) ) $selected = ' selected="selected"';
							$output .= '<option class="'.esc_attr($val).'" value="'.esc_attr($val).'"'.esc_attr($selected).'>'.$text_val.'</option>';
						}
						$output .= '</select>';
				return $output;
			}
			//hidden
			vc_add_shortcode_param('hidden', 'pr_hidden_settings_field');
			function pr_hidden_settings_field($settings, $value) 
			{
			   return '<input name="'.esc_attr($settings['param_name'])
						 .'" class="wpb_vc_param_value wpb-textinput '
						 .esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" type="hidden" value="'
						 .esc_attr($value).'"/>';
			}
			//readonly
			vc_add_shortcode_param('readonly', 'cs_readonly_settings_field');
			function cs_readonly_settings_field($settings, $value) 
			{
			   return '<input name="'.esc_attr($settings['param_name'])
						 .'" class="wpb_vc_param_value wpb-textinput '
						 .esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" type="text" readonly="readonly" value="'
						 .esc_attr($value).'"/>';
			}
			//add item button
			vc_add_shortcode_param('listitem' , 'pr_listitem_settings_field');
			function pr_listitem_settings_field($settings, $value)
			{
				$value = explode(",", $value);
				$output = '<input type="button" value="' . __('Add list item', 'pressroom') . '" name="'.esc_attr($settings['param_name']).'" class="button '.esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'" style="width: auto; padding: 0 10px 1px;"/>';
				return $output;
			}
			//add item window
			vc_add_shortcode_param('listitemwindow' , 'pr_listitemwindow_settings_field');
			function pr_listitemwindow_settings_field($settings, $value)
			{
				$value = explode(",", $value);
				$output = '<div class="listitemwindow vc_panel vc_shortcode-edit-form" name="'.esc_attr($settings['param_name']).'">
					<div class="vc_panel-heading">
						<a class="vc_close" href="#" title="Close panel"><i class="vc_icon"></i></a>
						<h3 class="vc_panel-title">' . __('Add New List Item', 'pressroom') . '</h3>
					</div>
					<div class="modal-body wpb-edit-form" style="display: block;min-height: auto;">
						<div class="vc_row-fluid wpb_el_type_textfield">
							<div class="wpb_element_label">' . __("Text", 'pressroom') . '</div>
							<div class="edit_form_line">
								<input type="text" value="" class="wpb_vc_param_value wpb-textinput textfield" name="item_content">
							</div>
						</div>
						<div class="vc_row-fluid wpb_el_type_textfield">
							<div class="wpb_element_label">' . __("Url", 'pressroom') . '</div>
							<div class="edit_form_line">
								<input type="text" value="" class="wpb_vc_param_value wpb-textinput textfield" name="item_url">
							</div>
						</div>
						<div class="vc_row-fluid wpb_el_type_dropdown">
							<div class="wpb_element_label">' . __("Url target", 'pressroom') . '</div>
							<div class="edit_form_line">
								<select class="wpb_vc_param_value wpb-input wpb-select item_url_target dropdown" name="item_url_target">
									<option selected="selected" value="new_window">' . __("new window", 'pressroom') . '</option>
									<option value="same_window">' . __("same window", 'pressroom') . '</option>
								</select>
							</div>
						</div>
						<div class="vc_row-fluid wpb_el_type_dropdown">
							<div class="wpb_element_label">' . __("Icon", 'pressroom') . '</div>
							<div class="edit_form_line">
								<select class="wpb_vc_param_value wpb-input wpb-select item_type dropdown" name="item_icon">
									<option selected="selected" value="">' . __("-", 'pressroom') . '</option>
									<option value="bullet style_1">' . __("Bullet style 1", 'pressroom') . '</option>
									<option value="bullet style_2">' . __("Bullet style 2", 'pressroom') . '</option>
									<option value="bullet style_3">' . __("Bullet style 3", 'pressroom') . '</option>
									<option value="bullet style_4">' . __("Bullet style 4", 'pressroom') . '</option>
								</select>
							</div>
						</div>
						<div class="wpb_el_type_colorpicker vc_wrapper-param-type-colorpicker vc_shortcode-param vc_column" data-vc-ui-element="panel-shortcode-param" data-vc-shortcode-param-name="item_content_color" data-param_type="colorpicker" data-param_settings="{&quot;type&quot;:&quot;colorpicker&quot;}">
							<div class="wpb_element_label">' . __("Custom text color", 'pressroom') . '</div>
							<div class="edit_form_line">' . 
								vc_colorpicker_form_field(array(
									"param_name" => "item_content_color",
									"type" => "colorpicker"
								), "") . '
							</div>
						</div>
						<div class="edit_form_actions" style="padding-top: 20px;">
							<a id="add-item-shortcode" class="button-primary" href="#">' . __("Add Item", 'pressroom') . '</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="cancel-item-options button" href="#">' . __("Cancel", 'pressroom') . '</a>
						</div>
					</div>
				</div>';
				return $output;
			}
		}
	}
}
add_action("init", "pressroom_shortcodes_vc_init");
?>