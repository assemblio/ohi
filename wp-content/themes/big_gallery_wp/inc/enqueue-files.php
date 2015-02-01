<?php

function bg_enqueue_styles() {  
	global $bigg_values;
	wp_register_style( 'default_style', get_stylesheet_uri(), array(), '', 'all' );  
	wp_enqueue_style( 'default_style' ); 
	wp_register_style( 'google_font', 'http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext', array(), '', 'all' );  
	wp_enqueue_style( 'google_font' ); 
	wp_register_style( 'css', get_template_directory_uri() . '/css/css.css', array(), '', 'all' );  
	wp_enqueue_style( 'css' ); 
	wp_register_style( 'skin', get_template_directory_uri() . '/css/' . ( ( get_option( 'bg_skin' ) ) ? get_option( 'bg_skin' ) : 'dark' ) . '.css', array(), '', 'all' );  
	wp_enqueue_style( 'skin' );
	wp_register_style( 'media-queries', get_template_directory_uri() . '/css/media_queries.css', array(), '', 'all' );  
	wp_enqueue_style( 'media-queries' );
	if ( is_page_template( 'template-slider.php' ) || is_page_template( 'template-video.php' ) ) {		
		wp_register_style( 'simplemodal', get_template_directory_uri() . '/js/simplemodal/css/basic.css', array(), '', 'all' );  
		wp_enqueue_style( 'simplemodal' );   	
	}
	wp_register_style( 'superfish1', get_template_directory_uri() . '/js/superfish/css/superfish.css', array(), '', 'all' );  
	wp_enqueue_style( 'superfish1' ); 		
	wp_register_style( 'superfish2', get_template_directory_uri() . '/js/superfish/css/superfish-vertical.css', array(), '', 'all' );  
	wp_enqueue_style( 'superfish2' ); 	
	wp_register_style( 'fancybox', get_template_directory_uri() . '/js/fancybox/fancybox/jquery.fancybox-1.3.4.css', array(), '', 'all' );  
	wp_enqueue_style( 'fancybox' );  
	if ( ! is_page_template( 'template-slider.php' ) && ! is_page_template( 'template-video.php' ) ) {
		wp_register_style( 'jscroll', get_template_directory_uri() . '/js/jScrollPane/style/jquery.jscrollpane.css', array(), '', 'all' );  
		wp_enqueue_style( 'jscroll' );  
	}
	if ( ( isset( $bigg_values['bg_meta_box_video'] ) && esc_attr( $bigg_values['bg_meta_box_video'][0] ) ) || is_page_template( 'template-video.php' ) ) {
		wp_register_style( 'video', get_template_directory_uri() . '/js/video-js/video-js.css', array(), '', 'all' );  
		wp_enqueue_style( 'video' );  
	}
	wp_register_style( 'css_ie', get_template_directory_uri() . '/css/css_ie.css', array(), '', 'all' );  
	$GLOBALS['wp_styles']->add_data( 'css_ie', 'conditional', 'lte IE 8' );
	wp_enqueue_style( 'css_ie' );
}
add_action( 'wp_enqueue_scripts', 'bg_enqueue_styles' );  
	
//SCRIPTS
	
function bg_enqueue_scripts() {  
	if ( ! is_admin() ) {
		global $bigg_values;
		if ( is_page_template( 'template-slider.php' ) ) {
			wp_register_script( 'caroufredsel', get_template_directory_uri() . '/js/carouFredSel/jquery.carouFredSel-3.2.1-packed.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'caroufredsel' );
		}
		wp_register_script( 'debouncedresize', get_template_directory_uri() . '/js/debouncedresize/jquery.debouncedresize.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'debouncedresize' );
		wp_register_script( 'timer', get_template_directory_uri() . '/js/timer/jquery.timers.js', array( 'jquery' ) , false, true );  
        wp_enqueue_script( 'timer' );
		if ( is_page_template( 'template-slider.php' ) || is_page_template( 'template-video.php' ) ) {
			wp_register_script( 'simplemodal', get_template_directory_uri() . '/js/simplemodal/js/jquery.simplemodal.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'simplemodal' );
		}
		wp_register_script( 'superfish1', get_template_directory_uri() . '/js/superfish/js/hoverIntent.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'superfish1' );
		wp_register_script( 'superfish2', get_template_directory_uri() . '/js/superfish/js/superfish.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'superfish2' );
		wp_register_script( 'mousewheel', get_template_directory_uri() . '/js/fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'mousewheel' );
		wp_register_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js', array( 'jquery' ) , false, true  );  
        wp_enqueue_script( 'fancybox' );  
		wp_register_script( 'qtip', get_template_directory_uri() . '/js/qtip/jquery.qtip-1.0.0-rc3.min.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'qtip' ); 
		if ( ! is_page_template( 'template-slider.php' ) && ! is_page_template( 'template-video.php' ) ) {
			wp_register_script( 'tweetable', get_template_directory_uri() . '/js/tweetable/jquery.tweetable.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'tweetable' );  
			wp_register_script( 'filterable', get_template_directory_uri() . '/js/filterable/js/filterable.pack.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'filterable' );  
			wp_register_script( 'jscroll1', get_template_directory_uri() . '/js/jScrollPane/script/jquery.jscrollpane.min.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'jscroll1' );  
			wp_register_script( 'jscroll2', get_template_directory_uri() . '/js/jScrollPane/script/jquery.mousewheel.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'jscroll2' );  
		}
		if ( ( isset( $bigg_values['bg_meta_box_video'] ) && esc_attr( $bigg_values['bg_meta_box_video'][0] ) ) || is_page_template( 'template-video.php' ) ) {
			wp_register_script( 'videojs', get_template_directory_uri() . '/js/video-js/video.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'videojs' );  
		}
		if ( $GLOBALS[ 'bigg_audio' ] && ! is_page_template( 'template-video.php' ) ) {
			wp_register_script( 'jplayer', get_template_directory_uri() . '/js/jPlayer/jquery.jplayer.min.js', array( 'jquery' ), false, false  );  
			wp_enqueue_script( 'jplayer' );  
		}
		wp_register_script( 'tinynav', get_template_directory_uri() . '/js/TinyNav/tinynav.min.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'tinynav' );  
		wp_register_script( 'lazyload', get_template_directory_uri() . '/js/lazyload/jquery.lazyload.min.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'lazyload' );  
		wp_register_script( 'custom', get_template_directory_uri() . '/js/big_gallery.js', array( 'jquery' ), false, true  );  
        wp_enqueue_script( 'custom' );  
		if ( is_page_template( 'template-contact.php' ) ) {
			wp_register_script( 'validate', get_template_directory_uri() . '/js/validate.js', array( 'jquery' ), false, true  );  
			wp_enqueue_script( 'validate' );  
		}
	}
}  
add_action( 'wp_enqueue_scripts', 'bg_enqueue_scripts' );  
	
		
//ADMIN STYLES
	
function backend_styles() {
   echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/admin.css" type="text/css" media="all" />';
}
add_action( 'admin_head', 'backend_styles' );

?>