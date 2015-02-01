<?php
		
/*-----------------------------------------------------------------------------------*/
/* SLIDER POST TYPE
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'project_custom_init' );
/*-- Custom Post Init Begin --*/
function project_custom_init() {
	$labels = array(
		'name' => _x( 'Slides', 'post type general name', 'biggallery' ),
		'singular_name' => _x( 'Slide', 'post type singular name', 'biggallery' ),
		'add_new' => _x( 'Add New', 'project', 'biggallery'),
		'add_new_item' => __( 'Add New Slide', 'biggallery'),
		'edit_item' => __( 'Edit Slide', 'biggallery'),
		'new_item' => __( 'New Slide', 'biggallery'),
		'view_item' => __( 'View Slide', 'biggallery'),
		'search_items' => __( 'Search Slides', 'biggallery'),
		'not_found' =>  __( 'No Slides found', 'biggallery'),
		'not_found_in_trash' => __( 'No Slides found in Trash', 'biggallery'),
		'parent_item_colon' => '',
		'menu_name' => __( 'Slides', 'biggallery')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'orderby' => 'title', // alphabetical order
		'order' => 'ASC',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title' , 'editor' , 'author' , 'thumbnail' , 'excerpt' , 'comments' , 'page-attributes' )
	);
	  
	// register the post.
	register_post_type( 'project' , $args );
	  
	// Initialize New Taxonomy Labels
	$labels = array(
		'name' => _x( 'Portfolio Tags -  for filtering (comma separated)', 'taxonomy general name', 'biggallery' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name', 'biggallery' ),
		'search_items' =>  __( 'Search Types' , 'biggallery' ),
		'all_items' => __( 'All Tags', 'biggallery' ),
		'parent_item' => __( 'Parent Tag', 'biggallery' ),
		'parent_item_colon' => __( 'Parent Tag:', 'biggallery' ),
		'edit_item' => __( 'Edit Tags', 'biggallery' ),
		'update_item' => __( 'Update Tag', 'biggallery' ),
		'add_new_item' => __( 'Add New Tag', 'biggallery'),
		'new_item_name' => __( 'New Tag Name', 'biggallery' ),
	);
	// Custom taxonomy for Project Tags
	register_taxonomy( 'tagportfolio', array( 'attachment' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'tag-portfolio' ),
	));
		
	// Initialize New Taxonomy Labels
	$labels = array(
		'name' => _x( 'Slider Categories', 'taxonomy general name', 'biggallery'),
		'singular_name' => _x( 'Category', 'taxonomy singular name', 'biggallery' ),
		'search_items' =>  __( 'Search Types', 'biggallery' ),
		'all_items' => __( 'All Categories', 'biggallery' ),
		'parent_item' => __( 'Parent Category', 'biggallery' ),
		'parent_item_colon' => __( 'Parent Category:', 'biggallery' ),
		'edit_item' => __( 'Edit Categories', 'biggallery' ),
		'update_item' => __( 'Update Category', 'biggallery' ),
		'add_new_item' => __( 'Add New Category', 'biggallery' ),
		'new_item_name' => __( 'New Category Name', 'biggallery' ),
	);
	// Custom taxonomy for Project Categories
	register_taxonomy( 'catportfolio' , array( 'project' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'cat-portfolio' ),
	));
}
/*-- Custom Post Init Ends --*/

//ordering portfolio posts in admin
	
function set_custom_post_types_admin_order( $wp_query ) {  
	if ( is_admin() ) {  
		// Get the post type from the query  
		$post_type = $wp_query->query['post_type'];  
		if ( $post_type == 'project' ) {  
			// 'orderby' value can be any column name  
			$wp_query->set( 'orderby', 'menu_order' );  
			// 'order' value can be ASC or DESC  
			$wp_query->set( 'order', 'ASC' );  
		}  
	}  
}  
add_filter( 'pre_get_posts', 'set_custom_post_types_admin_order' ); 

//ADDING THUMBNAILS TO POSTS ON BACK END

if ( ! function_exists( 'fb_AddThumbColumn' ) && function_exists( 'add_theme_support' ) ) {  
    
	function fb_AddThumbColumn( $cols ) {  
		$cols['thumbnail'] = __( 'Thumbnail', 'biggallery' );  
		return $cols;  
	}  
      
	function fb_AddThumbValue( $column_name, $post_id ) {  
		$width = (int) 50;  
		$height = (int) 50;  
		if ( 'thumbnail' == $column_name ) {  
			// thumbnail of WP 2.9  
			$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );    
			// image from gallery  
			$attachments = get_children( array( 'post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image' ) );  
			if ( $thumbnail_id ) {
					$thumb = wp_get_attachment_image( $thumbnail_id, array( $width, $height ), true );  
			}
			elseif ( $attachments ) {  
				foreach ( $attachments as $attachment_id => $attachment ) {  
					$thumb = wp_get_attachment_image( $attachment_id, array( $width, $height ), true );  
				}  
			}  
			if ( isset( $thumb ) && $thumb ) { 
				echo $thumb; 
			}  
			else { 
				echo __( 'None', 'biggallery'  );
			}  
        }  
    }  
      
	// for posts  
	add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );  
	add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );  
      
	// for pages  
	add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );  
	add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );  
}  
		
/*--- Custom Messages - project_updated_messages ---*/  
add_filter( 'post_updated_messages', 'project_updated_messages' );  
function project_updated_messages( $messages ) {  
	global $post, $post_ID;  
	$messages['project'] = array(  
		0 => '', // Unused. Messages start at index 1.  
		1 => sprintf( __( 'Project updated. <a href="%s">View project</a>', 'biggallery' ), esc_url( get_permalink( $post_ID ) ) ),  
		2 => __( 'Custom field updated.', 'biggallery' ),  
		3 => __( 'Custom field deleted.', 'biggallery' ),  
		4 => __( 'Project updated.', 'biggallery' ),  
		/* translators: %s: date and time of the revision */  
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s', 'biggallery' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,  
		6 => sprintf( __( 'Project published. <a href="%s">View project</a>', 'biggallery' ), esc_url( get_permalink( $post_ID ) ) ),  
		7 => __( 'Project saved.', 'biggallery' ),  
		8 => sprintf( __( 'Project submitted. <a target="_blank" href="%s">Preview project</a>', 'biggallery' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),  
		9 => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>', 'biggallery' ),  
		// translators: Publish box date format, see http://php.net/date  
		date_i18n( __( 'M j, Y @ G:i' , 'biggallery' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),  
		10 => sprintf( __( 'Project draft updated. <a target="_blank" href="%s">Preview project</a>', 'biggallery' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),  
	);  
	return $messages;  
}  
/*--- #end SECTION - project_updated_messages ---*/  
?>