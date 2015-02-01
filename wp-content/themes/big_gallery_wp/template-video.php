<?php
/*
Template Name: Fullscreen Video
*/
?>
<?php
get_header();
?>

<!-- Menu show -->
<div id="menu-show"><div id="menu-show-arrow"></div></div>
<div id="menu-hide"><div id="menu-hide-arrow"></div></div>		

<div id="video_play"><div id="play_icon" title="<?php _e('Slideshow autoplay','biggallery');?>" class="qtip"></div></div>
<div id="video_sound"><div id="sound_icon" title="<?php _e('Sound on/off','biggallery');?>" class="qtip"></div></div>				

<!-- video content -->						
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if(	get_the_content()	): ?>
		<div id="video_desc_info" ><div id="desc_info_icon" title="<?php _e( 'Video description', 'biggallery' ); ?>" class="qtip"></div></div>
		<!-- Description start -->
		<div id="video_desc" <?php post_class(); ?>>
			<h2><?php the_title(); ?></h2>
			<div class="margin_1line"><?php the_content(); ?></div>
		</div>
		<div id="modal_shadow"></div>
	<?php endif; ?>

	<!-- video start -->
	<?php 
	if ( $video = isset( $bigg_values['bg_meta_box_video'] ) ? esc_attr( $bigg_values['bg_meta_box_video'][0] ) : '' ) {
		if( !isset( $bigg_values['video_loop'] ) || $bigg_values['video_loop'][0] == 'on' ) {
			$video_loop = 'loop';
		}
	?>
		<div>
			<video id="example_video" class="video-js vjs-default-skin" <?php echo $video_loop; ?> preload="none">
				<source src="<?php echo $video ?>" type='video/mp4' />
				<track kind="captions" src="" srclang="en" label="English" />
			</video>
		</div>		
	<?php
	}
	?>					
<?php endwhile; endif; ?>
		
<?php get_footer(); ?>
