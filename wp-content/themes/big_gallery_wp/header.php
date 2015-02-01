<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<title>
		<?php
		$page_title = '';
		if ( function_exists( 'is_tag' ) && is_tag() ) {
			$page_title .= single_tag_title( __( 'Tag Archive for &quot;', 'biggallery' ), false ); 
			$page_title .= '&quot; - '; 
		} elseif ( is_archive() ) {
			$page_title .= wp_title('',false); 
			$page_title .= __( 'Archive - ' , 'biggallery' ); 
		}  elseif ( is_search() ) {
			$page_title .= __( 'Search for &quot;', 'biggallery' );
			$page_title .= esc_html($s) . '&quot; - '; 
		} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
			$page_title .= wp_title('',false); 
			if( wp_title( '', false ) ) {
				$page_title .= ' - '; 
			}
		} elseif ( is_404() ) {
			$page_title .= __( 'Not Found - ', 'biggallery' ); 
		}
		if ( is_home() ) {
			$page_title .= get_bloginfo( 'name' ); 
			echo ' - '; 
			$page_title .= get_bloginfo( 'description' ); 
		} else {
			$page_title .= get_bloginfo( 'name' ); 
		}
		if ( $paged > 1 ) {
			$page_title .= __( ' - page ', 'biggallery' ) . $paged; 
		}
		echo $page_title;
		?>
	</title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" href="<?php echo get_option('bg_favicon'); ?>" type="image/x-icon" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php 
	if ( is_singular() ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	global $bigg_values; 
	global $bigg_skin;	
	if ( is_home() || is_archive() ) {
		$bigg_values_id = get_option( 'page_for_posts' ); 
	} else {
		$bigg_values_id = get_the_ID();
	}
	$bigg_values = get_post_custom( $bigg_values_id );  
	$defalut_bg_color = get_option( 'bg_body_bg_color' ) ? get_option( 'bg_body_bg_color' ) : '#000000';
	$defalut_bg_image = get_option( 'bg_background_img' ) ? get_option( 'bg_background_img' ) : null;
	$defalut_bg_repeat = get_option( 'bg_background_repeat' ) ? get_option( 'bg_background_repeat' ) : 'no-repeat';
	
	$bg_color = isset( $bigg_values['bg_meta_box_color'] ) ? esc_attr( $bigg_values['bg_meta_box_color'][0] ) : '';  
	$bg_image = isset( $bigg_values['bg_meta_box_img'] ) ? esc_attr( $bigg_values['bg_meta_box_img'][0] ) : '';  
	$bg_repeat = isset( $bigg_values['bg_meta_box_background_repeat'] ) ? esc_attr( $bigg_values['bg_meta_box_background_repeat'][0] ) : 'no-repeat';

	$audio = isset( $bigg_values['bg_meta_box_audio'] ) ? esc_attr( $bigg_values['bg_meta_box_audio'][0] ) : '';
	$default_audio = get_option( 'bg_default_audio' ) ? get_option( 'bg_default_audio' ) : '';
	$audio = ( $audio ) ? $audio : $default_audio;
	$audio_loop = ( isset( $bigg_values['bg_meta_box_audio'] ) && isset( $bigg_values['audio_loop'] ) ) ? esc_attr( $bigg_values['audio_loop'][0] ) : '';
	$default_audio_loop = get_option( 'bg_default_audio_loop' ) ? get_option( 'bg_default_audio_loop' ) : 'on';
	$audio_loop = ( $audio_loop ) ? $audio_loop : $default_audio_loop;
	$audio_volume = ( ( isset( $bigg_values['audio_volume'] ) && esc_attr( $bigg_values['audio_volume'][0]  )== 'on' && $bigg_values['bg_meta_box_audio'][0] ) ? 1 : 0 );
	$default_audio_volume = ( get_option( 'bg_default_audio_volume' ) == 'on' ) ? 1 : 0;
	if ( isset( $bigg_values['bg_meta_box_audio'] ) && esc_attr( $bigg_values['bg_meta_box_audio'][0] ) ) {
		$audio_volume2 = $audio_volume;
	} else {
		$audio_volume2 = $default_audio_volume;
	}
	$GLOBALS['bigg_audio'] = $audio;
	$GLOBALS['bigg_cat'] = isset( $bigg_values['catportfolio_select'] ) ? esc_attr( $bigg_values['catportfolio_select'][0] ) : '';  
	$GLOBALS['bigg_size'] = isset( $bigg_values['catportfolio_size'] ) ? esc_attr( $bigg_values['catportfolio_size'][0] ) : '';
	$slider_autoplay = isset( $bigg_values['slider_autoplay'] ) ? esc_attr( $bigg_values['slider_autoplay'][0] ) : '';  
	$bigg_skin = get_option( 'bg_skin' ) ? get_option( 'bg_skin' ) : 'dark' ;	
	?>
	<style type="text/css">
	body {
		background-color: <?php echo  (($bg_color)?$bg_color:$defalut_bg_color) ?>;
		<?php
		if( ( ( $defalut_bg_image && $defalut_bg_repeat == 'repeat' && ! $bg_image ) || ( $bg_image && $bg_repeat == 'repeat' ) ) && ! is_page_template( 'template-slider.php' ) && ! is_page_template( 'template-video.php' ) ) {
			echo 'background-image: url("' . ( ( $bg_image ) ? $bg_image : $defalut_bg_image ). '"); background-repeat:repeat;';
		}
		?>
	}
	.video-js { background-color: <?php echo  (($bg_color)?$bg_color:$defalut_bg_color) ?> !important; }

	<?php if(qtrans_getLanguage()=='en'): ?>#logo { background-image: url('<?php echo get_option( 'bg_logo' ); ?>'); background-repeat:no-repeat; }<?php endif; ?>
	<?php if(qtrans_getLanguage()=='sr'): ?>#logo { background-image: url('<?php echo get_option( 'bg_logo_sr' ); ?>'); background-repeat:no-repeat; }<?php endif; ?>
	<?php if(qtrans_getLanguage()=='sq'): ?>#logo { background-image: url('<?php echo get_option( 'bg_logo_sq' ); ?>'); background-repeat:no-repeat; }<?php endif; ?>
	

	<?php
	if ( get_option( 'bg_custom_css' ) ) {
		echo stripslashes( get_option( 'bg_custom_css' ) );
	}
	?>
	</style>
	<script type="text/javascript">
	var uri = "<?php echo  get_template_directory_uri(); ?>";
	var imgpattern = "<?php echo get_option( 'bg_slider_overlay' ); ?>"; 
	var videopattern = "<?php echo get_option( 'bg_video_overlay' ); ?>";
	var ipro = "<?php echo get_option( 'bg_img_protect' ); ?>";
	var menuShown = "<?php echo get_option( 'bg_menu_shown' ); ?>";
	var logoHide = <?php echo ( get_option( 'bg_logo_hide' ) ? get_option( 'bg_logo_hide' ) : 0); ?>;
	var autoplaySpeed = <?php echo ( get_option( 'bg_slider_speed' )? get_option( 'bg_slider_speed' ) : 5000 ); ?>;
	var autoplay = <?php echo ( ( $slider_autoplay ) ? "true" : "false" ); ?>;
	var slideSize = "<?php echo $slide_size = ( isset( $bigg_values['slide_size'] ) ? esc_attr( $bigg_values['slide_size'][0] ) : 'fill' ); ?>";
	<?php 
	if ( isset( $bigg_values['bg_meta_box_audio'] ) && $bigg_values['bg_meta_box_video'][0] ) { 
		echo 'var soundplay = ' . ( ( $bigg_values['video_volume'][0] == 'on' ) ? 'true' : 'false' ) . ';'; 
	} elseif( $audio ) { 
		echo 'var soundplay = ' . ( ( $audio_volume2 == 1 ) ? 'true' : 'false' ) . ';'; 
	} else { 
		echo 'var soundplay = false;';
	}
	echo ' var audio_loop = '. ( ( $audio_loop == 'on' ) ? 1 : 0 ) .';';
	?>
	var skin = '<?php echo $bigg_skin; ?>';
	</script>
	<?php
	if ( get_option( 'bg_tracking_code' ) ) { 
		echo stripslashes( get_option( 'bg_tracking_code' ) ); 
	}
	?>
	
	<!-- OPEN GRAPH tags -->
	<?php
	
	if( is_singular() && ( has_post_thumbnail() || wp_attachment_is_image() ) ) {
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full', false, '' );
		echo '<meta property="og:image" content="' . $featured_image[0] . '" />';
	}
	if( $bg_image || $defalut_bg_image ) {
		echo '<meta property="og:image" content="' . ( ( $bg_image ) ? $bg_image : $defalut_bg_image ) . '" />';
	}
	if( get_option( 'bg_logo' ) ) {
		echo '<meta property="og:image" content="' . get_option( 'bg_logo' ) . '" />';
	}
	if( get_option( 'bg_logo_sr' ) ) {
		echo '<meta property="og:image" content="' . get_option( 'bg_logo_sr' ) . '" />';
	}
	if( get_option( 'bg_logo_sq' ) ) {
		echo '<meta property="og:image" content="' . get_option( 'bg_logo_sq' ) . '" />';
	}
	if( get_option( 'bg_facebook' ) ) {
		echo '
		<meta property="article:author" content="' . get_option( 'bg_facebook' ) . '" />
		<meta property="article:publisher" content="' . get_option( 'bg_facebook' ) . '" />';
	}
	?>
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:title" content="<?php echo $page_title;  ?>" />
	<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>"/>
	
	<!-- END OPEN GRAPH tags -->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="body">
	<!-- Page loading icon -->
	<div id="loader">
		<img src="<?php echo  get_template_directory_uri(); ?>/img/<?php echo $bigg_skin; ?>/loader2.gif" alt="<?php _e( 'please wait, site is loading', 'biggallery' ); ?>"/>
	</div>
	<!-- Logo -->
	<?php if(qtrans_getLanguage()=='en'): ?><div id="logo"><a href="<?php echo site_url(); ?>" title="<?php bloginfo(); ?>"></a></div><?php endif; ?>
	<?php if(qtrans_getLanguage()=='sr'): ?><div id="logo"><a href="<?php echo site_url(); ?>" title="<?php bloginfo(); ?>"></a></div><?php endif; ?>
 	<?php if(qtrans_getLanguage()=='sq'): ?><div id="logo"><a href="<?php echo site_url(); ?>" title="<?php bloginfo(); ?>"></a></div><?php endif; ?>
	<!-- background div start -->
	<?php
	if ( ( ( $defalut_bg_image && $defalut_bg_repeat != 'repeat' && ! $bg_image ) || ( $bg_image && $bg_repeat != 'repeat' ) ) && ! is_page_template( 'template-slider.php' ) && ! is_page_template( 'template-video.php' ) ) {
		echo'<div id="background"' . ( ( isset( $bigg_values['bg_meta_box_video']  ) && $bigg_values['bg_meta_box_video'][0] )?' class="hidden"':'' ) . '><img src="' . ( ( $bg_image ) ? $bg_image : $defalut_bg_image ) . '" alt=""/></div>';
	}
	?>
	
	<!-- Menu div start -->
	<!-- Superfish menu start -->
	<?php 
	$menu = wp_nav_menu( array( 'theme_location'  => 'top-menu', 'container_id' => 'menu', 'menu_class' => 'sf-menu sf-vertical', 'echo' => 0 ) ); 
	if ( ! $menu ) {
		$menu = '<div id="menu"></div>';
	}
	
	if ( get_option( 'bg_social' ) || get_option( 'bg_stock' ) || get_option( 'bg_menu_custom_field' ) )
	{
		$menu_ed = substr( rtrim( $menu ), 0, strlen( rtrim( $menu ) ) - 6 );
		if ( get_option( 'bg_menu_custom_field' ) ) {
			// Can't figure out how the flags for language change are generated here:
			// $menu_ed .= '<div class="margin_bottom_1line">' . stripslashes( get_option( 'bg_menu_custom_field' ) ) . '</div>';
			
			// So I am just commenting out that logic and hardcoding te flagless implementation that we want:
			$menu_ed .= '<div class="margin_bottom_1line" style="text-transform:lowercase;"><a href="http://oralhistorykosovo.org/sq/">sq</a> | <a href="http://oralhistorykosovo.org/en/">en</a> | <a href="http://oralhistorykosovo.org/sr/">sr</a></div>';

			// A less dirty but still pretty dirty workaround/hack would have been to just change the images so that they are text instead of flags.

		}
		if( get_option('bg_social') )
		{
			$menu_ed .= '<ul class="follow">';
			if ( get_option( 'bg_social_label' )) {
				$menu_ed .= '<li>&nbsp;</li><li class="li_label custom_font">' . get_option( 'bg_social_label' ) . '</li>';
			}
			$menu_ed.='<li><ul>';
			if ( get_option( 'bg_facebook') ) {
				$menu_ed.='<li><a href="' . get_option( 'bg_facebook' ) . '" target="blank" title="' . __( 'facebook', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/facebook.png" alt=""/></a></li>';
			}
			if ( get_option ( 'bg_twitter' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_twitter' ) . '" target="blank" title="'. __('twitter','biggallery') . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/twitter.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_gplus' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_gplus' ) . '" target="blank" title="' . __( 'google +', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/gplus.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_flickr' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_flickr' ) . '" target="blank" title="' . __( 'flickr', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/flickr.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_instagram' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_instagram' ) . '" target="blank" title="' . __( 'instagram', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/instagram.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_dribbble' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_dribbble' ) . '" target="blank" title="' . __( 'dribbble', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/dribbble.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_picasa' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_picasa' ) . '" target="blank" title="' . __( 'picasa', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/picasa.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_youtube' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_youtube' ) . '" target="blank" title="' . __( 'youtube', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/youtube.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_vimeo' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_vimeo' ) . '" target="blank" title="' . __( 'vimeo', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/vimeo.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_myspace' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_myspace' ) . '" target="blank" title="' . __( 'myspace', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/myspace.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_linkedin' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_linkedin' ) . '" target="blank" title="' . __( 'linkedin', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/linkedin.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_pinterest' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_pinterest' ) . '" target="blank" title="' . __( 'pinterest', 'biggallery' ) .'" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/pinterest.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_500px' ) ) {
				$menu_ed .=' <li><a href="' . get_option( 'bg_500px' ) . '" target="blank" title="' . __( '500px', 'biggallery') . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/500px.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_digg' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_digg' ) . '" target="blank" title="' . __( 'digg', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/digg.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_sharethis' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_sharethis' ) . '" target="blank" title="' . __( 'sharethis', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/sharethis.png" alt=""/></a></li>';
			}			
			if ( get_option( 'bg_tumblr' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_tumblr' ) . '" target="blank" title="' . __( 'tumblr', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/tumblr.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_behance' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_behance' ) . '" target="blank" title="' . __( 'behance', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/behance.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_blogger' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_blogger' ) . '" target="blank" title="' . __( 'blogger', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/blogger.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_addthis' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_addthis' ) . '" target="blank" title="' . __( 'addthis', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/addthis.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_lastfm' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_lastfm' ) . '" target="blank" title="' . __( 'lastfm', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/lastfm.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_livejournal' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_livejournal' ) . '" target="blank" title="' . __( 'livejournal', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/livejournal.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_reddit' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_reddit' ) . '" target="blank" title="' . __( 'reddit', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/reddit.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_spotify' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_spotify' ) . '" target="blank" title="' . __( 'spotify', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/spotify.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_stumbleupon' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_stumbleupon' ) . '" target="blank" title="' . __( 'stumbleupon', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/stumbleupon.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_wordpress' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_wordpress' ) . '" target="blank" title="' . __( 'wordpress', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/wordpress.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_imdb' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_imdb' ) . '" target="blank" title="' . __( 'IMDb', 'biggallery' ) . '"  class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/imdb.png" alt=""/></a></li>';
			}
			
			if ( get_option( 'bg_rss' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_rss' ) . '" target="blank" title="' . __( 'RSS', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/rss.png" alt=""/></a></li>';
			}
			$menu_ed .= '</ul></li></ul>';
		}
		if ( get_option( 'bg_stock' ) )
		{
			$menu_ed .= '<ul class="buy">';
			if ( get_option( 'bg_stock_label' ) ) {
				$menu_ed .= '<li>&nbsp;</li><li class="li_label custom_font">' . get_option( 'bg_stock_label' ) . '</li>';
			}
			$menu_ed .= '<li><ul>';
			if ( get_option( 'bg_istock' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_istock' ) . '" target="blank" title="iStock" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/istock.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_shutterstock' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_shutterstock' ) . '" target="blank" title="shutterstock" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/shutterstock.png" alt=""/></a></li>';
			}	
			if ( get_option( 'bg_fotolia' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_fotolia' ) . '" target="blank" title="fotolia" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/fotolia.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_dreamstime' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_dreamstime' ) . '" target="blank" title="dreamstime" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/dreamstime.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_123rf' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_123rf' ) . '" target="blank" title="123rf" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/123rf.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_alamy' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_alamy' ) . '" target="blank" title="alamy" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/alamy.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_bigstock' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_bigstock' ) . '" target="blank" title="bigstock" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/bigstock.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_canstock' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_canstock' ) . '" target="blank" title="canstock" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/canstock.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_crestock' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_crestock' ) . '" target="blank" title="crestock" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/crestock.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_cutcaster' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_cutcaster' ) . '" target="blank" title="cutcaster" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/cutcaster.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_depositphotos' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_depositphotos' ) . '" target="blank title="depositphotos" class="qtip""><img src="' . get_template_directory_uri() . '/img/icons/stock/depositphotos.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_featurepics' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_featurepics' ) . '" target="blank" title="featurepics" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/featurepics.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_getty' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_getty' ) . '" target="blank" title="getty" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/getty.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_graphicleftovers' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_graphicleftovers' ) . '" target="blank" title="graphicleftovers" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/graphicleftovers.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_mostphotos' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_mostphotos' ) . '" target="blank" title="mostphotos" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/mostphotos.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_panthermedia' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_panthermedia' ) . '" target="blank" title="panthermedia" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/panthermedia.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_photodune' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_photodune' ) . '" target="blank" title="photodune" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/photodune.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_stockfresh' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_stockfresh' ) . '" target="blank" title="stockfresh" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/stockfresh.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_veer' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_veer' ) . '" target="blank" title="veer" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/veer.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_yaymicro' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_yaymicro' ) . '" target="blank" title="yaymicro" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/yaymicro.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_zoonar' ) ) {
				$menu_ed .= '<li><a href="' . get_option( 'bg_zoonar' ) . '" target="blank" title="zoonar" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/stock/zoonar.png" alt=""/></a></li>';
			}					
			$menu_ed .= '</ul></li></ul>';
		}
		echo $menu_ed . '</div>';
	} else {
		echo $menu;
	}
	?>

