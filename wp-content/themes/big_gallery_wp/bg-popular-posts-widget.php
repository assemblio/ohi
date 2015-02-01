<?php
/**
 * Plugin Name: Popular Posts Widget
 * Description: Popular Posts with Thumbnails Widget 
 * Version: 0.1
 * Author: Jan Skwara
 */

add_action( 'widgets_init', 'register_popular_posts_widget' );  
function register_popular_posts_widget() {  
	register_widget( 'Popular_Posts_Widget' );  
} 

class Popular_Posts_Widget extends WP_Widget {
	function Popular_Posts_Widget() {  
		$widget_ops = array( 'classname' => 'popular_posts', 'description' => __('A widget that displays popular posts with thumbnails ', 'popular_posts') );  
		$control_ops = array( 'id_base' => 'popular_posts' );  
		$this->WP_Widget( 'popular_posts', __('Popular Posts Widget', 'popular_posts'), $widget_ops, $control_ops );  
	}  
				
	function widget( $args, $instance ) {
		extract( $args );
		global $bigg_skin;
		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$show_details = isset( $instance['show_details'] ) ? $instance['show_details'] : false;

		echo $before_widget;
		
		// Display the widget title 
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?> 
		<div id="popular-posts">
		<?php query_posts( 'orderby=comment_count&posts_per_page=' . $instance['number'] ); 
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="margin_1line margin_bottom_1_2line custom_font "><a href="<?php the_permalink() ?>" class="hover_link custom_font"><?php the_title(); ?></a></div>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="item">
					<?php 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'pw-sidebar_thumbnail' );
					$url = $thumb['0'];
					?>
					<img src="<?php echo $url;?>" alt="<?php the_title(); ?>" class="photo"/>
					<a href="<?php the_permalink() ?>" title=""></a>
					<div class="loupe"></div><img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $bigg_skin; ?>/shadow.png" class="shadow" alt="" />				
				</div>
			<?php endif; ?>
			<?php if ( $show_details ) { ?>
				<p class="popular-posts-details"><?php the_time( 'F j, Y' ) ?> : <?php comments_popup_link(__( 'No Comments', 'biggallery' ), __( '1 Comment', 'biggallery' ), __( '% Comments', 'biggallery' ), 'comments-link', '' ); ?></p>
			<?php } ?>
		<?php endwhile; ?>
		<?php endif; ?>
		</div><!-- End Popular Posts -->
		<?php
		echo $after_widget;
	}
	
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['show_details'] = $new_instance['show_details'];
		return $instance;
	}

	
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __( 'Popular posts', 'popular_posts' ), 'number' => 3, 'show_details' => false );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'popular_posts'  ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts:', 'popular_posts' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_details' ); ?>"><?php _e( 'Show date and number of comments:', 'popular_posts' ); ?></label>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_details'], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_details' ); ?>" name="<?php echo $this->get_field_name( 'show_details' ); ?>" /> 
		</p>
	<?php
	}
}

?>