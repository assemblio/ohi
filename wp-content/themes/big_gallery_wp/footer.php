<?php
global $bigg_values;
$bigg_video = isset( $bigg_values['bg_meta_box_video'] ) ? esc_attr( $bigg_values['bg_meta_box_video'][0] ) : '';
if ( ! is_page_template( 'template-video.php' ) && ! $bigg_video) {
	echo '<div id="img-pattern"></div>';
} else {
	echo '<div id="video-pattern"></div>';
}
?>
<?php if ( get_option( 'bg_fullscreen' ) ) :?>
	<div id="fullscreen"><div id="fullscreen_icon" title="<?php _e( 'Toggle fullscreen', 'biggallery' ); ?>" class="qtip"></div></div>
<?php endif;?>
<?php
if ( $bigg_video && ! is_page_template( 'template-video.php' ) ) {
	if( !isset( $bigg_values['video_loop'] ) || $bigg_values['video_loop'][0] == 'on' ) {
		$video_loop = 'loop';
	}
?>
	<div id="video_play"><div id="play_icon" title="<?php _e( 'Slideshow autoplay', 'biggallery' ); ?>" class="qtip"></div></div>
	<div id="video_sound"><div id="sound_icon" title="<?php _e( 'Sound on/off', 'biggallery' ); ?>" class="qtip"></div></div>
	<div>
		<video id="example_video" class="video-js vjs-default-skin" <?php echo $video_loop; ?> preload="none">
			<source src="<?php echo $bigg_video ?>" type='video/mp4' />
			<track kind="captions" src="" srclang="en" label="English" />
		</video>
	</div>		
<?php
} elseif ( $GLOBALS['bigg_audio'] && ! is_page_template( 'template-video.php' ) ) {
?>
	<div id="sound"><div id="sound_icon" title="<?php _e('Sound on/off','biggallery');?>" class="qtip"></div></div>
	
	<!-- audio player -->
	<div id="audio">
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div id="jp_container_1" class="jp-audio"><div class="jp-type-single"></div></div>
	</div><!-- end audio div -->
<?php
}
?>		

<script type='text/javascript'>
	<?php
	if ( $GLOBALS['bigg_audio'] && ! is_page_template( 'template-video.php' ) ) {
	?>
		var sound_mp3 = "<?php echo $GLOBALS[ 'bigg_audio' ]; ?>"; 
	<?php
	} else {
	?>
		var sound_mp3 = false; 
	<?php
	}
	if ( $bigg_video  && ! is_page_template( 'template-video.php' )) {
	?>
		var bigg_video = true;
	<?php
	} else {
	?>
		var bigg_video = false;
	<?php
	}
	?>
</script>



<?php wp_footer(); ?>	
</body>
</html>