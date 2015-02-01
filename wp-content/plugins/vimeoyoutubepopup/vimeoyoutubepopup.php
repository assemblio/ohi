<?php 
/*
* Plugin Name: Vimeo Youtube Popup Plugin
*
* Plugin URI: http://nrivers.com
* Description: This plugin will take a video ID and load it in a popup.
* Author: N. Rivers
*
* Version: 2.2
* Author URI: http://nrivers.com
*/

// -------------- Global Vars --------------
// Get Options.
$wp_cpup_color = get_option('vpcpup_color');

// -------------- Admin function --------------
function vp_contact_popup_admin(){
	include('vimeoyoutubepopup_admin.php');
}

function vp_contact_popup_actions(){
	add_menu_page( __( 'Vimeo Youtube Popup Plugin', 'wpcpup' ), __( 'Vimeo Youtube Popup Plugin', 'wpcpup' ),
		'edit_posts', 'wpcpup', 'vp_contact_popup_admin' );
}

add_action('admin_menu', 'vp_contact_popup_actions');

/*--------------------------------
	       Shortcode
----------------------------------*/

add_shortcode('vimeoyoutubepopup_video','vimeoyoutubepopup_video');
function vimeoyoutubepopup_video($atts) {
	$atts = shortcode_atts(array(
		"displaytype" => 'text',
		"videoplayer" => 'youtube',
		"width" => '500',
		"height" => '300',
		"autoplay" => 'true',
		"text" => '',
		"path" => '',
		"videoid" => ''
	), $atts);
	
	extract($atts);
	
	// Get global
	global $wp_cpup_color;
	
	
	if($displaytype == 'text') {
		$output = '
			<a class="vimeoyoutubepopup_video" href="#" data-videoplayer="'.esc_html($videoplayer).'" data-videoid="'.esc_html($videoid).'" data-width="'.esc_html($width).'" data-height="'.esc_html($height).'" data-autoplay="'.esc_html($autoplay).'" data-color="'.$wp_cpup_color.'">'.$text.'</a>';
	} elseif($displaytype == 'image') {
		$output = '
			<a class="vimeoyoutubepopup_video" href="#" data-videoplayer="'.esc_html($videoplayer).'" data-videoid="'.esc_html($videoid).'" data-width="'.esc_html($width).'" data-height="'.esc_html($height).'" data-autoplay="'.esc_html($autoplay).'" data-color="'.$wp_cpup_color.'"><img src="'.esc_html($path).'"></a>';
	} else {
		$output = '';
	}
	return $output;
}

/*--------------------------------
	 Needed SITE Scripts & CSS
----------------------------------*/
function vp_contact_popup_add_to_header()
{
	// Register the style like this for a plugin:  
	wp_register_style( 'videopopup', plugins_url( '/code/css/videopopup.css', __FILE__ ), array(), '20120208', 'all' );
	// Register the script like this for a plugin:  
	wp_register_script( 'videopopup', plugins_url( '/code/js/videopopup.js', __FILE__ ) );
   
	wp_enqueue_style("videopopup");
	wp_enqueue_script("videopopup");
}

add_action('wp_head', 'vp_contact_popup_add_to_header');

/*--------------------------------
	 Needed ADMIN Scripts & CSS
----------------------------------*/
function vp_contact_popup_admin_add_to_header()
{
	
	// Register the style like this for a plugin:  
	wp_register_style( 'videopopup', plugins_url( '/code/admin/functions.css', __FILE__ ), array(), '20120208', 'all' );
	// Register the style like this for a plugin:  
	wp_register_style( 'colorpicker', plugins_url( '/code/js/colorpicker/css/colorpicker.css', __FILE__ ), array(), '20120208', 'all' );
	// Register the script like this for a plugin:  
	//wp_register_script( 'jquery-ui.min', plugins_url( '/code/js/jquery-ui.min.js', __FILE__ ) );
	// Register the script like this for a plugin:  
	wp_register_script( 'mycolorpicker', plugins_url( '/code/js/colorpicker/js/colorpicker.js', __FILE__ ) );
	// Register the script like this for a plugin:  
	wp_register_script( 'vimeoyoutubepopup_script', plugins_url( '/code/admin/vimeoyoutubepopup_script.js', __FILE__ ) );
   
	wp_enqueue_style("videopopup");
	wp_enqueue_style("colorpicker");
	wp_enqueue_script("jquery-ui.min");
	wp_enqueue_script("mycolorpicker");
	wp_enqueue_script("vimeoyoutubepopup_script");
	
	?>
	
	
<?php
}

add_action('admin_head', 'vp_contact_popup_admin_add_to_header');