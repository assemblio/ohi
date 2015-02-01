<?php
/**
 * Plugin Name: BG tweet Widget
 * Description: BG tweet Widget
 * Version: 0.1
 * Author: Jan Skwara
 */


add_action( 'widgets_init', 'register_bg_tweet_widget' );  
		
function register_bg_tweet_widget() {  
	register_widget( 'BG_Tweet_Widget' );  
} 


class BG_Tweet_Widget extends WP_Widget{
	function BG_Tweet_Widget() {  
		$widget_ops = array( 'classname' => 'bg_tweet', 'description' => __( 'A widget that displays tweets ', 'biggallery' ) );  
		$control_ops = array( 'id_base' => 'bg_tweet' );  
		$this -> WP_Widget( 'bg_tweet', __( 'BG tweet Widget', 'biggallery' ), $widget_ops, $control_ops );  
	}  
				
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$name = $instance['name'];
		echo $before_widget;

		// Display the widget title 
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?> 
		<p><a href="https://twitter.com/<?php echo $name; ?>" target="blank">@<?php echo $name; ?></a></p>
		<div id="tweets"></div>

		<script type="text/javascript">
		(function($) {
			$(window).load(function() {
				var user = '<?php echo  $name ?>';
				$('#tweets').tweetable({
					username: user, 
					time: false, 
					limit: 5, 
					replies: false, 
					position: 'append', 
					onComplete:function(){
						$(window).trigger("debouncedresize");
					}
				});
			});
		})( jQuery );
		</script>
		<?php
		echo $after_widget;
	}

	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		return $instance;
	}

	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __( 'Latest tweets', 'biggallery' ), 'name' => 'envato' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this -> get_field_id( 'title' ); ?>"><?php _e('Title:', 'biggallery'); ?></label>
			<input id="<?php echo $this -> get_field_id( 'title' ); ?>" name="<?php echo $this -> get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		
		<p>
			<label for="<?php echo $this -> get_field_id( 'name' ); ?>"><?php _e('Twitter username:', 'biggallery'); ?></label>
			<input id="<?php echo $this -> get_field_id( 'name' ); ?>" name="<?php echo $this -> get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
		</p>

	<?php
	}
}

?>