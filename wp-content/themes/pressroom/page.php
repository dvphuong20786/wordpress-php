<?php
get_header();
?>
<div class="theme_page relative">
	<div class="vc_row wpb_row vc_row-fluid page_header vertical_align_table clearfix page_margin_top">
		<div class="page_header_left">
			<h1 class="page_title"><?php the_title(); ?></h1>
		</div>
		<div class="page_header_right">
			<ul class="bread_crumb">
				<li>
					<a href="<?php echo esc_url(get_home_url()); ?>" title="<?php esc_attr_e('Home', 'pressroom'); ?>">
						<?php _e('Home', 'pressroom'); ?>
					</a>
				</li>
				<li class="separator icon_small_arrow right_gray">
					&nbsp;
				</li>
				<li>
					<?php the_title(); ?>
				</li>
			</ul>
		</div>
	</div>
	<div class="clearfix<?php echo (function_exists("has_blocks") && has_blocks() ? ' has-gutenberg-blocks' : '');?>">
		<?php
		if(!function_exists("vc_map") && !has_blocks())
		{
			echo '<div class="vc_row wpb_row vc_row-fluid page_margin_top single_page">';
		}
		if(have_posts()) : while (have_posts()) : the_post();
			the_content();
		if(!function_exists("vc_map") && !has_blocks())
		{
			echo '</div>';
		}
		endwhile; endif;
		?>
	</div>
</div>
<?php
get_footer(); 
?>