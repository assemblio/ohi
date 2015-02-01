<?php
require_once dirname( __FILE__ ) . "/inc/custom-template.php";
require_once dirname( __FILE__ ) . "/inc/portfolio-template.php";
require_once dirname( __FILE__ ) . "/inc/enqueue-files.php";
require_once dirname( __FILE__ ) . "/inc/theme-options.php";
require_once dirname( __FILE__ ) . "/inc/shortcodes.php";
 
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* THEME LOCALIZATION
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'bg_theme_setup' );
function bg_theme_setup(){
	load_theme_textdomain( 'biggallery', get_template_directory() . '/languages' );
}

/*-----------------------------------------------------------------------------------*/
/* SHORTCODE EDITOR
/*-----------------------------------------------------------------------------------*/

require_once dirname( __FILE__ ) . "/extends/shortcode_editor/shortcode_editor.php";
	
/*-----------------------------------------------------------------------------------*/
/* MENUS
/*-----------------------------------------------------------------------------------*/

register_nav_menus(  
	array(  
		'top-menu' => __( 'Main Menu', 'biggallery' )
	) 
);
		
/*-----------------------------------------------------------------------------------*/
/* WIDGETS & SIDEBARS
/*-----------------------------------------------------------------------------------*/

require_once dirname( __FILE__ ) . "/bg-tweet-widget.php";
require_once dirname( __FILE__ ) . "/bg-popular-posts-widget.php";

add_theme_support( 'automatic-feed-links' );	

if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar(array(
		'name'          => __( 'Sidebar Widgets', 'biggallery' ),
		'id'            => 'sidebar-widgets',
		'description'   => __( 'These are widgets for the sidebar.', 'biggallery' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
} 

/*-----------------------------------------------------------------------------------*/
/* CUSTOM IMAGE SIZES
/*-----------------------------------------------------------------------------------*/

function pw_add_image_sizes() {
	add_image_size( 'pw-thumb', 300, 100, true );
	add_image_size( 'pw-large', 600, 300, true );
	//slider thumbnail
	add_image_size( 'pw-slider_thumb', 100, 100, true );
	//2 columns thumbnail
	add_image_size( 'pw-2_cols_thumb_landscape', 295, 196, true );
	add_image_size( 'pw-2_cols_thumb_square', 295, 295, true );
	add_image_size( 'pw-2_cols_thumb_portrait', 295, 444, true );
	//3 cloumns thumbnail
	add_image_size( 'pw-3_cols_thumb_landscape', 180, 120, true );
	add_image_size( 'pw-3_cols_thumb_square', 180, 180, true );
	add_image_size( 'pw-3_cols_thumb_portrait', 180, 271, true );
	//4 columns thumbnail
	add_image_size( 'pw-4_cols_thumb_landscape', 122, 81, true );
	add_image_size( 'pw-4_cols_thumb_square', 122, 122, true );
	add_image_size( 'pw-4_cols_thumb_portrait', 122, 184, true );
	//2 columns thumbnail on post
	add_image_size( 'pw-2_cols_thumb_landscape_post', 190, 126, true );
	add_image_size( 'pw-2_cols_thumb_square_post', 190, 190, true );
	add_image_size( 'pw-2_cols_thumb_portrait_post', 190, 286, true );
	//3 cloumns thumbnail on post
	add_image_size( 'pw-3_cols_thumb_landscape_post', 110, 73, true );
	add_image_size( 'pw-3_cols_thumb_square_post', 110, 110, true );
	add_image_size( 'pw-3_cols_thumb_portrait_post', 110, 153, true );
	//4 columns thumbnail on post
	add_image_size( 'pw-4_cols_thumb_landscape_post', 70, 46, true );
	add_image_size( 'pw-4_cols_thumb_square_post', 70, 70, true );
	add_image_size( 'pw-4_cols_thumb_portrait_post', 70, 106, true );
	//modern blog thumbnail
	add_image_size( 'pw-modern_blog_thumb', 180, 251, true );
	//blog post thumbnail
	add_image_size( 'pw-blog_thumb', 430, 240, true );
	//sidebar_thumbnail
	add_image_size( 'pw-sidebar_thumbnail', 131, 87, true );
	//resolution dependent for fancybox and slider
	add_image_size( '1920x1200',1920,1200, false );
	//attachment page
	add_image_size( 'pw-attachment', 430, 9999, false );

}
add_action( 'init', 'pw_add_image_sizes' );
 
function pw_show_image_sizes($sizes) {
	$sizes['pw-thumb'] = __( 'Custom Thumb', 'biggallery' );
	$sizes['pw-large'] = __( 'Custom Large', 'biggallery' );
	$sizes['pw-slider_thumb'] = __( 'Slider thumbnail', 'biggallery' );
	$sizes['pw-modern_blog_thumb'] = __( 'Modern blog thumbnail', 'biggallery' );
	$sizes['pw-blog_thumb'] = __( 'Blog post image', 'biggallery' );
 
	return $sizes;
}  
add_filter( 'image_size_names_choose', 'pw_show_image_sizes' );

/*-----------------------------------------------------------------------------------*/
/* COMMENTS
/*-----------------------------------------------------------------------------------*/

function bg_comment( $comment, $args, $depth ){
	$GLOBALS['comment'] = $comment; 
	?>
	<li id="comment-<?php comment_ID()?>" class="comment wrapper">
		<div class="comment_div comment_depth_<?php echo $depth; ?>">
			<div class="avatar_div"><?php echo get_avatar($comment, 80)?></div>
			<div class="comment_text">
				<div class="response-info"><strong class="comment-author"><?php echo get_comment_author_link()?></strong>&nbsp;&mdash;&nbsp;<?php printf( __( '%1$s at %2$s', 'biggallery' ), get_comment_date(), get_comment_time())?></div>
				<?php if ( $comment->comment_approved == '0' ) _e( 'Your comment is awaiting moderation.', 'biggallery' ); else comment_text()?>
				</div>
				<?php if ( comments_open() ) : ?>
				<?php 
					comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
				?>
				<?php endif; ?>
			<div class="clear"></div>
		</div>
<?php
}

/*-----------------------------------------------------------------------------------*/
/* OTHER
/*-----------------------------------------------------------------------------------*/

//disable the admin bar (front end only)
add_filter( 'show_admin_bar', '__return_false' ); 

function function_media() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'function_media' ); 

add_action( 'login_head', 'my_login_head' );
function my_login_head() {
	if(get_option( 'bg_logo' )) {
		echo "
		<style>
		body.login #login h1 a {
		background: url('".get_option( 'bg_logo' )."') no-repeat scroll center top transparent;
		width:209px;
		height:164px;
		display:block;
		margin:auto;
		}
		</style>
		";
	}
}
	
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
		
if ( ! isset( $content_width ) )
	$content_width = 661;	



add_filter ('__after_header', 'qtrans_lang_chooser');
function qtrans_lang_chooser() {
	if (function_exists('qtrans_generateLanguageSelectCode')) {
		ob_start();
		echo qtrans_generateLanguageSelectCode('text');
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
	}
}


?>