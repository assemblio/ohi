<?php
/*-----------------------------------------------------------------------------------*/
/* HIGHLIGHTS
/*-----------------------------------------------------------------------------------*/

function default_highlight_shortcode( $atts, $content = null ) {
	return '<span class="highlight">' . do_shortcode( $content ) . '</span>';
}

add_shortcode( 'default_highlight', 'default_highlight_shortcode' );

function default_highlight2_shortcode( $atts, $content = null ) {
	return '<span class="highlight2">' . do_shortcode( $content ) . '</span>';
}

add_shortcode( 'default_highlight2', 'default_highlight2_shortcode' );

function custom_highlight_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'color'      => 'black',
		'background' => 'white'
	), $atts ) );
   return '<span  style="padding: 0 6px 0 6px; color:' . $color . '; background:' . $background . ';">' . do_shortcode( $content ) . '</span>';
}

add_shortcode( 'custom_highlight', 'custom_highlight_shortcode' );


/*-----------------------------------------------------------------------------------*/
/* COLUMNS
/*-----------------------------------------------------------------------------------*/


function two_columns_first_shortcode( $atts, $content = null ) {
	return '<div class="column_cont margin_1line"><div class="one-half">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'two_columns_first', 'two_columns_first_shortcode' );

function two_columns_last_shortcode( $atts, $content = null ) {
	return '<div class="one-half">' . do_shortcode( $content ) . '</div></div><div class="clear"></div>';
}

add_shortcode( 'two_columns_last', 'two_columns_last_shortcode' );

function two_columns_shortcode( $atts, $content = null ) {
	return '<div class="one-half">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'two_columns', 'two_columns_shortcode' );

function three_columns_first_shortcode( $atts, $content = null ) {
	return '<div class="column_cont margin_1line"><div class="one-third">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'three_columns_first', 'three_columns_first_shortcode' );

function three_columns_shortcode( $atts, $content = null ) {
	return '<div class="one-third">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'three_columns', 'three_columns_shortcode' );

function three_columns_last_shortcode( $atts, $content = null ) {
	return '<div class="one-third">' . do_shortcode( $content ) . '</div></div><div class="clear"></div>';
}

add_shortcode( 'three_columns_last', 'three_columns_last_shortcode' );

function four_columns_first_shortcode( $atts, $content = null ) {
	return '<div class="column_cont margin_1line"><div class="one-fourth">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'four_columns_first', 'four_columns_first_shortcode' );

function four_columns_shortcode( $atts, $content = null ) {
	return '<div class="one-fourth">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'four_columns', 'four_columns_shortcode' );

function four_columns_last_shortcode( $atts, $content = null ) {
	return '<div class="one-fourth">' . do_shortcode( $content ) . '</div></div><div class="clear"></div>';
}

add_shortcode( 'four_columns_last', 'four_columns_last_shortcode' );

function two_third_columns_first_shortcode( $atts, $content = null ) {
	return '<div class="column_cont margin_1line"><div class="two-third">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'two_third_columns_first', 'two_third_columns_first_shortcode' );

function two_third_columns_last_shortcode( $atts, $content = null ) {
	return '<div class="two-third">' . do_shortcode( $content ) . '</div></div><div class="clear"></div>';
}

add_shortcode( 'two_third_columns_last', 'two_third_columns_last_shortcode' );

function three_fourth_columns_first_shortcode( $atts, $content = null ) {
	return '<div class="column_cont margin_1line"><div class="three-fourth">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'three_fourth_columns_first', 'three_fourth_columns_first_shortcode' );

function three_fourth_columns_last_shortcode( $atts, $content = null ) {
	return '<div class="three-fourth">' . do_shortcode( $content ) . '</div></div><div class="clear"></div>';
}

add_shortcode( 'three_fourth_columns_last', 'three_fourth_columns_last_shortcode' );


/*-----------------------------------------------------------------------------------*/
/* DIVIDERS
/*-----------------------------------------------------------------------------------*/


function hr_shortcode( $atts, $content = null ) {
	return '<div class="hr"></div>';
}

add_shortcode( 'hr', 'hr_shortcode' );

function clearfix_shortcode( $atts, $content = null ) {
	return '<div class="clear"></div>';
}

add_shortcode( 'clearfix', 'clearfix_shortcode' );

function margin_1line_shortcode( $atts, $content = null ) {
	return '<div class="margin_1line">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'margin_1line', 'margin_1line_shortcode' );

function margin_1_2line_shortcode( $atts, $content = null ) {
	return '<div class="margin_1_2line">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'margin_1_2line', 'margin_1_2line_shortcode' );



/*-----------------------------------------------------------------------------------*/
/* INFO BOXES
/*-----------------------------------------------------------------------------------*/


function infobox_shortcode( $atts, $content = null ) {
	return '<div class="info">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'infobox', 'infobox_shortcode' );

function errorbox_shortcode( $atts, $content = null ) {
	return '<div class="error">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'errorbox', 'errorbox_shortcode' );

function successbox_shortcode( $atts, $content = null ) {
	return '<div class="success">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'successbox', 'successbox_shortcode' );

function warningbox_shortcode( $atts, $content = null ) {	
	return '<div class="warning">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'warningbox', 'warningbox_shortcode' );



/*-----------------------------------------------------------------------------------*/
/* BUTTONS
/*-----------------------------------------------------------------------------------*/


function default_button_shortcode( $atts=null, $content = null ) {
	$url = $atts['url']; 
	if ( empty( $url ) ) {
		$url = get_permalink();
	}
	return '<a class="butt custom_font" href="' . $url . '">' . do_shortcode( $content ) . '</a>';
}
  
add_shortcode('default_button', 'default_button_shortcode');

function custom_button_shortcode( $atts=null, $content = null ) {
	$url   = $atts['url']; 
	$color = $atts['color']; 
	$bg    = $atts['background']; 
	if ( empty( $url ) ) {
		$url = get_permalink();
	}
	return '<a class="custom_butt custom_font" href="' . $url . '" style="color:' . $color . '; background-color: ' . $bg . ';">' . do_shortcode( $content ) . '</a>';
}
  
add_shortcode('custom_button', 'custom_button_shortcode');


/*-----------------------------------------------------------------------------------*/
/* OTHER
/*-----------------------------------------------------------------------------------*/


function fancybox_shortcode( $atts, $content = null ) {
	global $bigg_skin;
	$post = get_post();
	$thumbnail = $atts['thumbnail']; 
	$large     = $atts['large']; 
	$title     = $atts['title'];  
	$float     = $atts['float'];
	$output = '';
	if ( get_option( 'bg_share_gallery' ) ) {
		$share_link = get_permalink( $post->ID );

		$output = '<ul class="gallery-share-hidden ' . str_replace(array('http://','/','.',' ',')','('), array('','','','','',''), substr($large ,strpos($large ,'uploads')+7)) . '">';
		if ( get_option( 'bg_share_facebook' ) ) {
			$output .= '<li><a target="blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[images][0]=' . $large . '&p[url]=' . urlencode( $share_link ) . '&p[title]=' . urlencode($title) . '&p[summary]=' . urlencode( $title . ' ' . get_bloginfo('name') ) . '" title="' . __( 'facebook', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/facebook.png" alt=""/></a></li>';
		}	
		if ( get_option( 'bg_share_twitter' ) ) {
			$output .= '<li><a target="blank" href="https://twitter.com/intent/tweet?text=' . $title . ' ' . $share_link . '" title="' . __( 'twitter', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/twitter.png" alt=""/></a></li>';
		}
		if ( get_option( 'bg_share_gplus' ) ) {
			$output .= '<li><a target="blank" href="https://plus.google.com/share?url=' . $share_link . '" title="' . __( 'google +', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/gplus.png" alt=""/></a></li>';
		}
		if ( get_option( 'bg_share_pinterest' ) ) {
			$output .= '<li><a title="' . __( 'pinterest', 'biggallery' ) . '" class="qtip" target="blank" href="http://pinterest.com/pin/create/button/?url=' . $share_link . '&media=' . $large . '	&description=' . $title . '"><img src="' . get_template_directory_uri() . '/img/icons/social/pinterest.png" alt=""/></a></li>';
		}
		$output .= '</ul>';
	}
	return '<div class="item float' . $float . '"><img src="' . $thumbnail . '" alt="" class="photo"/><a class="fancybox" href="' . $large . '" title="' . $title . '"></a>' . $output . '<div class="details"><div class="mblogfooter2 custom_font"><p>' . $title . '</p></div></div><div class="loupe"></div><div><img src="' . get_template_directory_uri() . '/img/' . $bigg_skin . '/shadow.png" class="shadow" alt=""/></div></div>';
}

add_shortcode( 'fancybox', 'fancybox_shortcode' );

function img_loupe_shortcode( $atts, $content = null ) {
	global $bigg_skin;
	$thumbnail = $atts['thumbnail']; 
	$link      = $atts['link']; 
	$title     = $atts['title'];  
	$float     = $atts['float'];
	return '<div class="item float' . $float . '"><img src="' . $thumbnail . '" alt="" class="photo"/><a class="" href="' . $link . '" title=""></a><div class="details"><div class="mblogfooter2 custom_font"><p>' . $title . '</p></div></div><div class="loupe"></div><div><img src="' . get_template_directory_uri() . '/img/' . $bigg_skin . '/shadow.png" class="shadow" alt=""/></div></div>';
}

add_shortcode( 'img_loupe', 'img_loupe_shortcode' );


function qtip_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => ''
		), $atts ) );
	return '<span class="qtip" title="' . $title . '">' . do_shortcode( $content ) . '</span>';
}

add_shortcode( 'qtip', 'qtip_shortcode' );


/*-----------------------------------------------------------------------------------*/
/* CUSTOM GALLERY SHORTCODE
/*-----------------------------------------------------------------------------------*/



remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'bg_gallery_shortcode');

function bg_gallery_shortcode($attr) {
	$post = get_post();
	static $instance = 0;
	$instance++;
	global $bigg_values;
	global $bigg_skin;
	$gallery_size = ( $GLOBALS['bigg_size'] ) ? $GLOBALS['bigg_size'] : 'thumbnail';
	
	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters( 'post_gallery', '', $attr);
	if ( $output != '' ) {
		return $output;
	}
	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => $gallery_size,
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order ) {
		$orderby = 'none';
	}
	if ( ! empty( $include ) ) {
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
	} elseif ( ! empty( $exclude ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		}
		return $output;
	}

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) ) {
		$gallery_style = "";
	}
	if ( ( $filterable = isset( $bigg_values['filterable'] ) ? esc_attr( $bigg_values['filterable'][0] ) : '') && $instance==1 ) {
		$submenu = '<span class="custom_font" style="padding-right:6px">'.__('Filter:','biggallery').' </span><a href="#all" title="" class="custom_font" rel="all">'.__('All','biggallery').'</a>&nbsp;';
		$termtag = array();
		$termslug = array();
		foreach ( $attachments as $id => $attachment ) { 
			$terms = get_the_terms( $id, 'tagportfolio' );
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$termtag[] = trim( $term->name );
					$termslug[] = trim( $term->slug );
				}	
			}
		} 
		$termslug2 = array_unique( $termslug );
		for ( $i = 0, $j = sizeof( $termslug ); $i < $j; $i++ ) {
			if ( isset( $termslug2[ $i ] ) ) {
				$submenu .= '<a href="#' . $termslug2[$i] . '" title="" rel="' . $termslug2[$i] . '" class="custom_font">' . ( strip_tags( $termtag[ $i ] ) ? strip_tags( $termtag[ $i ] ) : $termslug2[ $i ] ) . '</a>';
			}
		}
	}
	if ( $filterable && $instance == 1 ) {
		echo '<div id="submenu-hidden">' . $submenu . '</div>';
		$output="<script type='text/javascript'>
			if(document.getElementById('portfolio-filter')) document.getElementById('portfolio-filter').innerHTML=document.getElementById('submenu-hidden').innerHTML;
		</script>";
	}	
	$size_class = sanitize_html_class( $size );
	$ul_id = ( $instance == 1 ) ? 'portfolio-list' : "portfolio-list-" . $instance;
	$output .= "<ul id='" . $ul_id . "' class='portfolio-list gallery galleryid-{$id} gallery-columns-{$columns} {$size_class}'>";	
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$image_attributes = wp_get_attachment_image_src( $id, $size );
		$image_attributes_full = wp_get_attachment_image_src( $id, 'full' );
		if ( !( isset( $attr['link'] ) && 'file' == $attr['link'] ) ) {
			$image_attributes_full[0] = get_attachment_link( $id );
		}
		$terms = get_the_terms( $id, 'tagportfolio' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			$links = array();
			foreach ( $terms as $term ) {
				$links[] = $term->slug;
			}
			$links = array_unique( $links );
			$tax = join( " ", $links );
		} else {
			$tax = '';
		}
		$output .= '<li class="' . $tax . '">
		<div class="item"><img src="' . get_template_directory_uri() . '/img/blank.png" data-original="' . $image_attributes[0] . '" alt="' . ( $attachment->alt ) . '" class="photo lazyload" width="'. $image_attributes[1] .'" height="'. $image_attributes[2] .'" /><a class="' . ( ( isset( $attr['link'] ) && 'file' == $attr['link'] ) ? 'gallery_group' : '' ) . '" rel="' . ( ( isset( $attr['link'] ) && 'file' == $attr['link'] ) ? 'gallery_group' : '' ) . '" href="' . $image_attributes_full[0] . '" title="' . wptexturize( $attachment->post_excerpt ) . '"></a>';
		
		if ( get_option( 'bg_share_gallery' ) && ( isset( $attr['link'] ) && 'file' == $attr['link'] )) {
			if( get_option( 'bg_share_linkto' ) == 'current' ) {
				$share_link = get_permalink( $post->ID );
			} else {
				$share_link = get_attachment_link( $id );
			}
			$output .= '<ul class="gallery-share-hidden ' . str_replace(array('http://','/','.',' ',')','('), array('','','','','',''), substr($image_attributes_full[0],strpos($image_attributes_full[0],'uploads')+7)) . '">';
			if ( get_option( 'bg_share_facebook' ) ) {
				$output .= '<li><a target="blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[images][0]=' . $image_attributes_full[0] . '&p[url]=' . urlencode( $share_link ) . '&p[title]=' . urlencode( $attachment->post_title ) . '&p[summary]=' . urlencode( $attachment->post_excerpt ) . '" title="' . __( 'facebook', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/facebook.png" alt=""/></a></li>';
			}	
			if ( get_option( 'bg_share_twitter' ) ) {
				$output .= '<li><a target="blank" href="https://twitter.com/intent/tweet?text=' . wptexturize( $attachment->post_title ) . ' ' . $share_link . '" title="' . __( 'twitter', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/twitter.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_share_gplus' ) ) {
				$output .= '<li><a target="blank" href="https://plus.google.com/share?url=' . $share_link . '" title="' . __( 'google +', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/gplus.png" alt=""/></a></li>';
			}
			if ( get_option( 'bg_share_pinterest' ) ) {
				$output .= '<li><a title="' . __( 'pinterest', 'biggallery' ) . '" class="qtip" target="blank" href="http://pinterest.com/pin/create/button/?url=' . $share_link . '&media=' . $image_attributes_full[0] . '
				&description=' . wptexturize( $attachment->post_title ) . '"><img src="' . get_template_directory_uri() . '/img/icons/social/pinterest.png" alt=""/></a></li>';
			}
			$output .= '</ul>';
		}
		$output .= '<div class="details"><div class="mblogfooter2 custom_font"><p>' . wptexturize( $attachment->post_title ) . '</p></div></div><div class="loupe"></div><div><img src="' . get_template_directory_uri() . '/img/' . $bigg_skin . '/shadow.png" class="shadow" alt=""/></div></div></li>';
		$i++;
	}
	$output .= "</ul><div class='clear'></div>\n";
	return $output;
}

/*--------------------------------------*/
/*    Clean up Shortcodes
/*--------------------------------------*/

function wpex_clean_shortcodes( $content ) {   
	$array = array (
		'<p><script>' => '<script>', 
		']</p>' => ']', 
		']<br />' => ']'
	);
	$content = strtr( $content, $array );
	return $content;
}

?>