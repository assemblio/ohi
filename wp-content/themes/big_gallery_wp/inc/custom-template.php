<?php

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'my-script-handle', plugins_url( 'my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

add_action( 'add_meta_boxes', 'bg_meta_box_add' );  
function bg_meta_box_add() {  
	add_meta_box( 'bg-meta-box-id', __( 'Page options', 'biggallery' ), 'bg_meta_box_cb', 'post', 'normal', 'high' );  
	add_meta_box( 'bg-meta-box-id', __( 'Page options', 'biggallery' ), 'bg_meta_box_cb', 'page', 'normal', 'high' );  
}  

function bg_meta_box_cb( $post ) {  
	$bigg_values     = get_post_custom( $post->ID );  
	$text            = isset( $bigg_values['bg_meta_box_color'] ) ? esc_attr( $bigg_values['bg_meta_box_color'][0] ) : '';  
	$img             = isset( $bigg_values['bg_meta_box_img'] ) ? esc_attr( $bigg_values['bg_meta_box_img'][0] ) : '';  
	$img_repeat      = isset( $bigg_values['bg_meta_box_background_repeat'] ) ? esc_attr( $bigg_values['bg_meta_box_background_repeat'][0] ) : '';  
	$video           = isset( $bigg_values['bg_meta_box_video'] ) ? esc_attr( $bigg_values['bg_meta_box_video'][0] ) : '';  
	$audio           = isset( $bigg_values['bg_meta_box_audio'] ) ? esc_attr( $bigg_values['bg_meta_box_audio'][0] ) : '';  
	$cat             = isset( $bigg_values['catportfolio_select'] ) ? esc_attr( $bigg_values['catportfolio_select'][0] ) : '';  
	$size            = isset( $bigg_values['catportfolio_size'] ) ? esc_attr( $bigg_values['catportfolio_size'][0] ) : '';  
	$slide_size      = isset( $bigg_values['slide_size'] ) ? esc_attr( $bigg_values['slide_size'][0] ) : '';  
	$slider_autoplay = isset( $bigg_values['slider_autoplay'] ) ? esc_attr( $bigg_values['slider_autoplay'][0] ) : '';  
	$video_volume    = isset( $bigg_values['video_volume'] ) ? esc_attr( $bigg_values['video_volume'][0] ) : '';  
	$audio_volume    = isset( $bigg_values['audio_volume'] ) ? esc_attr( $bigg_values['audio_volume'][0] ) : '';  	
	$video_loop      = isset( $bigg_values['video_loop'] ) ? esc_attr( $bigg_values['video_loop'][0] ) : '';  
	$audio_loop      = isset( $bigg_values['audio_loop'] ) ? esc_attr( $bigg_values['audio_loop'][0] ) : '';  
	$filterable      = isset( $bigg_values['filterable'] ) ? esc_attr( $bigg_values['filterable'][0] ) : '';  
	$email           = isset( $bigg_values['bg_meta_box_email'] ) ? esc_attr( $bigg_values['bg_meta_box_email'][0] ) : '';  
	$custom1         = isset( $bigg_values['bg_meta_box_custom1'] ) ? esc_attr( $bigg_values['bg_meta_box_custom1'][0] ) : '';  
	$custom2         = isset( $bigg_values['bg_meta_box_custom2'] ) ? esc_attr( $bigg_values['bg_meta_box_custom2'][0] ) : '';  
	$custom3         = isset( $bigg_values['bg_meta_box_custom3'] ) ? esc_attr( $bigg_values['bg_meta_box_custom3'][0] ) : '';  
	$phpcaptcha      = isset( $bigg_values['bg_meta_box_phpcaptcha'] ) ? esc_attr( $bigg_values['bg_meta_box_phpcaptcha'][0] ) : ''; 
	$googlemap       = isset( $bigg_values['bg_meta_box_googlemap'] ) ? esc_attr( $bigg_values['bg_meta_box_googlemap'][0] ) : '';  
	wp_nonce_field( 'bg_meta_box_nonce', 'meta_box_nonce' ); 
	?>   
	<!-- PAGE OPTIONS -->       
	<p>
		<label style="color: #333;" for="bg_meta_box_color">
			<strong><?php _e( 'Background color', 'biggallery' ); ?></strong>
			<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Enter background color in web format (default is #000000)', 'biggallery' ); ?></span>
		</label>
	</p>
	<input type="text" name="bg_meta_box_color" id="bg_meta_box_color" value="<?php  echo ( ( $text ) ? $text : get_option( 'bg_body_bg_color' ) ); ?>" data-default-color="<?php echo get_option( 'bg_body_bg_color' ); ?>"  class="color-field"/>
	<p>
		<label style="color: #333;" for="upload_image">
			<strong><?php _e( 'Background image', 'biggallery' ); ?></strong>
			<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Enter or upload custom background image for this page', 'biggallery' ); ?></span>
		</label>
	</p>
	<input style="width:50%;height:25px;" id="upload_image" type="text" size="36" name="bg_meta_box_img" value="<?php echo $img ?>" />
	<input style="cursor: pointer;" id="upload_image_button" type="button" value="Upload Image" />
	<?php if ( $img ) { echo '<br/><img src="' . $img . '" width=150 />';}; ?>
		<p>
			<label for="bg_meta_box_background_repeat">
				<strong><?php _e( 'Background image repeat', 'biggallery' ) ?></strong>
				<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Use "repeat" for patterns and "no-repeat" for fullscreeen images', 'big_gallery' ) ?></span>			
			</label>				
		</p>	
			<select id="bg_meta_box_background_repeat" name="bg_meta_box_background_repeat"> 
				<option value="no-repeat" <?php echo ( ( $img_repeat == 'no-repeat' ) ? " selected" : "" ); ?>><?php _e( 'no-repeat', 'big_gallery' )?></option>
				<option value="repeat" <?php echo ( ( $img_repeat == 'repeat' ) ? " selected" : "" ); ?>><?php _e( 'repeat', 'big_gallery' )?></option>
			</select>				
		<div id="bg_meta_box_video_div">
			<p>
				<label style="color: #333;" for="bg_meta_box_video">
					<strong><?php _e( 'Background video', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Enter an URL to the background video file for this page. Supports: mp4', 'biggallery' ); ?></span>
				</label>
			</p>
			<input style="width:50%;height:25px;" id="bg_meta_box_video" type="text" size="36" name="bg_meta_box_video" value="<?php echo $video ?>" />
			<p>
				<label style="color: #333;" for="video_volume">
					<strong><?php _e( 'Video volume', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Set starting video volume', 'biggallery' ); ?></span>
				</label>
			</p>
			<select name='video_volume' id='video_volume'>
			<?php
			echo "<option value='on' " . ( ( $video_volume == 'on' ) ? " selected" : "" ) . ">" . __( 'On', 'biggallery' )  . "</option>";
			echo "<option value='off' " . ( ( $video_volume == 'off' ) ? " selected" : "" ) . ">" . __( 'Off', 'biggallery' ) . "</option>";
			?>
			</select>
			<p>
				<label style="color: #333;" for="video_loop">
					<strong><?php _e( 'Video loop', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Choose if video should be played in a loop', 'biggallery' ); ?></span>
				</label>
			</p>
			<select name='video_loop' id='video_loop'>
			<?php
			echo "<option value='on' " . ( ( $video_loop == 'on' ) ? " selected" : "" ) . ">" . __( 'On', 'biggallery' )  . "</option>";
			echo "<option value='off' " . ( ( $video_loop == 'off' ) ? " selected" : "" ) . ">" . __( 'Off', 'biggallery' ) . "</option>";
			?>
			</select>
			
		</div>
		<div id="bg_meta_box_audio_div">
			<p>
				<label style="color: #333;" for="bg_meta_box_audio">
					<strong><?php _e( 'Background audio', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Enter an URL to the background audio file for this page. Supports: mp3', 'biggallery' ); ?></span>
				</label>
			</p>
			<input style="width:50%;height:25px;" id="bg_meta_box_audio" type="text" size="36" name="bg_meta_box_audio" value="<?php echo $audio ?>" />
			<p>
				<label style="color: #333;" for="audio_volume">
					<strong><?php _e( 'Audio volume', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Set starting video volume', 'biggallery' ); ?></span>
				</label>
			</p>
			<select name='audio_volume' id='audio_volume'>
				<?php
				echo "<option value='on' " . ( ( $audio_volume == 'on' ) ? " selected" : "" ) . ">" . __( 'On', 'biggallery' ) . "</option>";
				echo "<option value='off' " . ( ( $audio_volume == 'off' ) ? " selected" : "" ) . ">" . __( 'Off', 'biggallery' ) . "</option>";
				?>
			</select>
			<p>
				<label style="color: #333;" for="audio_loop">
					<strong><?php _e( 'Audio loop', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Choose if audio should be played in a loop', 'biggallery' ); ?></span>
				</label>
			</p>
			<select name='audio_loop' id='audio_loop'>
			<?php
			echo "<option value='on' " . ( ( $audio_loop == 'on' ) ? " selected" : "" ) . ">" . __( 'On', 'biggallery' )  . "</option>";
			echo "<option value='off' " . ( ( $audio_loop == 'off' ) ? " selected" : "" ) . ">" . __( 'Off', 'biggallery' ) . "</option>";
			?>
			</select>
		</div>

<!-- GALLERY OPTIONS -->      
	   
		<div id="gallery_select" style="<?php ( get_post_type( get_the_ID() ) != 'post' ) ? 'display:none;' : '' ?>">
			<h3 class='hndle' style="margin: 20px -13px 20px -11px; border: 1px solid #DFDFDF;"><span><?php _e( 'Gallery settings', 'biggallery' ); ?></span></h3>
			<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'This settings override and extends default Wordpress Gallery created with Media Manager.', 'biggallery' ); ?></span>
			<div id="catportfolio_size_div">
				<p>
					<label style="color: #333;" for="catportfolio_size">
						<strong><?php _e( 'Gallery thumbnail size', 'biggallery' ); ?></strong>
						<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Choose one of nine predefined thumbnail sizes', 'biggallery' ); ?></span>
					</label>
				</p>
				<select name='catportfolio_size' id='catportfolio_size'>
					<?php
					if( get_post_type( get_the_ID() ) == 'post' ) { 
						$ptype = '_post'; 
					} else {
						$ptype = '';
					}
					echo "<optgroup label='" . __( '2 columns', 'biggallery' ) . "'>";
					echo "<option value='pw-2_cols_thumb_landscape" . $ptype . "' " . ( ( $size == 'pw-2_cols_thumb_landscape' . $ptype) ? " selected" : "" ) . ">" . __( 'Landspace', 'biggallery' ) . "</option>";
					echo "<option value='pw-2_cols_thumb_square" . $ptype . "' " . ( ( $size == 'pw-2_cols_thumb_square' . $ptype ) ? " selected" : "" ) . ">" . __( 'Square', 'biggallery' ) . "</option>";
					echo "<option value='pw-2_cols_thumb_portrait" . $ptype . "' " . ( ( $size == 'pw-2_cols_thumb_portrait' . $ptype ) ? " selected" : "" ) .">" . __( 'Portrait', 'biggallery' ) . "</option>";
					echo "</optgroup><optgroup label='" . __( '3 columns', 'biggallery' ) . "'>";
					echo "<option value='pw-3_cols_thumb_landscape" . $ptype . "' " . ( ( $size == 'pw-3_cols_thumb_landscape' . $ptype ) ? " selected" : "" ) . ">" . __( 'Landspace', 'biggallery' ) . "</option>";
					echo "<option value='pw-3_cols_thumb_square" . $ptype . "' " . ( ( $size == 'pw-3_cols_thumb_square' . $ptype ) ? " selected" : "" ) . ">" . __( 'Square', 'biggallery' ) . "</option>";
					echo "<option value='pw-3_cols_thumb_portrait" . $ptype . "' " . ( ( $size == 'pw-3_cols_thumb_portrait' . $ptype ) ? " selected" : "" ) . ">" . __( 'Portrait', 'biggallery' ) . "</option>";
					echo "</optgroup><optgroup label='" . __( '4 columns', 'biggallery' ). "'>";
					echo "<option value='pw-4_cols_thumb_landscape" . $ptype . "' " . ( ( $size == 'pw-4_cols_thumb_landscape' . $ptype ) ? " selected" : "" ) . ">" . __( 'Landspace', 'biggallery' ) . "</option>";
					echo "<option value='pw-4_cols_thumb_square" . $ptype . "' " . ( ( $size == 'pw-4_cols_thumb_square' . $ptype ) ? " selected" : "" ) . ">" . __( 'Square', 'biggallery' ) . "</option>";
					echo "<option value='pw-4_cols_thumb_portrait" . $ptype . "' " . ( ( $size == 'pw-4_cols_thumb_portrait' . $ptype ) ? " selected" : "" ) . ">" . __( 'Portrait', 'biggallery' ) . "</option>";
					echo "</optgroup>";
					?>
				</select>	
			</div>
			<?php
			echo '<p>
				<label style="color: #333;" for="filterable">
					<strong>' . __( 'Filterable', 'biggallery' ) . '</strong>
					<span style="display:block;margin-top:5px;color:#777777;">' . __( 'Choose if this gallery will be filterable', 'biggallery' ) . '</span>
				</label>
			</p>
			<span style="display:block;margin-top:5px;color:#777777;">' . __( 'Note: You need to add tags to images in Media Manager. Don\'t create more than one gallery on a page if you want to have it filterable.', 'biggallery' ) . '</span>
		
			<select name="filterable" id="filterable">';
				echo "<option value='0' " . ( ( $filterable == '0' ) ? " selected" : "" ) . ">" . __( 'No', 'biggallery' ) . "</option>";
				echo "<option value='1' " . ( ( $filterable == '1' ) ? " selected" : "" ) . ">" . __( 'Yes', 'biggallery' ) . "</option>";
			echo "</select>";
			?>
		</div>
		
		<!-- SLIDER OPTIONS -->      
		
		<div id="slider_select" style="display:none;">
			<h3 class='hndle' style="margin: 20px -13px 20px -11px; border: 1px solid #DFDFDF;"><span><?php _e( 'Fullscreen slider settings', 'biggallery' ); ?></span></h3>
			<?php
			$categories = get_terms( 'catportfolio', 'orderby=term_group&hide_empty=0' );
			$count = count( $categories );
			if ( $count > 0 ){
				?>
				<p>
					<label style="color: #333;" for="catportfolio_select">
						<strong><?php _e( 'Gallery category', 'biggallery' ); ?></strong>
						<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Choose a portfolio category for this gallery page.', 'biggallery' ); ?></span><br/>
						<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Minimum 5 images in category are required.', 'biggallery' ); ?></span>
					</label>
				</p>
				<select name='catportfolio_select' id='catportfolio_select'>
					<?php
					foreach ( $categories as $term ) {
						echo "<option value='" . $term->slug . "' " . ( ( $cat == $term->slug ) ? " selected" : "" ) . ">" . ( ( $term->parent ) ? "--- " : "" ) . $term->name . "</option>";
					}
				echo "</select>";
			}
			?>
			<p>
				<label style="color: #333;" for="catportfolio_size">
					<strong><?php _e( 'Slider mode', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Choose slider mode', 'biggallery' ); ?></span>
				</label>
			</p>
			<select name='slide_size' id='slide_size'>
				<?php
				echo "<option value='fill' " . ( ( $slide_size == 'fill' ) ? " selected" : "" ) . ">" . __( 'Fill', 'biggallery' ) . "</option>";
				echo "<option value='uncut' " . ( ( $slide_size == 'uncut' ) ? " selected" : "" ) . ">" . __( 'Uncut', 'biggallery' ) . "</option>";
				echo "<option value='width' " . ( ( $slide_size == 'width' ) ? " selected" : "" ) . ">" . __( 'Full width', 'biggallery' ) . "</option>";
				echo "<option value='height' " . ( ( $slide_size == 'height' ) ? " selected" : "" ) . ">" . __( 'Full height', 'biggallery' ) . "</option>";
				?>
			</select>
			<p>
				<label style="color: #333;" for="slider_autoplay">
					<strong><?php _e( 'Slider autoplay', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Choose if slider should start automatically', 'biggallery' ); ?></span>
				</label>
			</p>
			<select name='slider_autoplay' id='slider_autoplay'>
				<?php
				echo "<option value='1' " . ( ( $slider_autoplay == '1' ) ? " selected" : "" ) . ">" . __( 'Yes', 'biggallery' ) . "</option>";
				echo "<option value='0' ". ( ( $slider_autoplay == '0' ) ? " selected" : "" ) . ">" . __( 'No', 'biggallery' ) . "</option>";
				?>
			</select>
		</div>
		
		<div id="contact_select" style="display:none;">
			<h3 class='hndle' style="margin: 20px -13px 20px -11px; border: 1px solid #DFDFDF;"><span><?php _e( 'Contact Page Settings', 'biggallery' ); ?></span></h3>
			<p>
				<label style="color: #333;" for="bg_meta_box_email">
					<strong><?php _e( 'E-mail', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Enter contact form e-mail address', 'biggallery' ); ?></span>
				</label>
			</p>
			<input type="text" name="bg_meta_box_email" id="bg_meta_box_email" size="30" value="<?php echo $email; ?>" style="width:30%;height:25px;" />   
			<p>
				<label style="color: #333;" for="bg_meta_box_custom1">
					<strong><?php _e( 'Custom fields', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'By default contact form contains following fields: name, e-mail and message. You can add custom imput fields by entering their names below.', 'biggallery' ); ?></span>
				</label>
			</p>
			<input type="text" name="bg_meta_box_custom1" id="bg_meta_box_custom1" size="30" value="<?php echo $custom1; ?>" style="width:30%;height:25px;" /><br/>
			<input type="text" name="bg_meta_box_custom2" id="bg_meta_box_custom2" size="30" value="<?php echo $custom2; ?>" style="width:30%;height:25px;" /><br/>
			<input type="text" name="bg_meta_box_custom3" id="bg_meta_box_custom3" size="30" value="<?php echo $custom3; ?>" style="width:30%;height:25px;" /><br/>	 
			
			<p>
				<label style="color: #333;" for="bg_meta_box_phpcapcha">
					<strong><?php _e( 'Chapcha', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Check if you want to add a CHAPCHA to your contact form to prevent spammers. CAPTCHA solution is provided by:', 'biggallery' ); ?> <a href="http://www.phpcaptcha.org/" target="blank">http://www.phpcaptcha.org/</a><br/>
					<a href="<?php echo get_template_directory_uri();?>/php/securimage/securimage_test.php" target="blank"><?php _e( 'Test if your server is compatibile with phpCaptcha', 'biggallery' ); ?></a></span>
				</label>
				<input type="checkbox" id="bg_meta_box_phpcaptcha" value="1" name="bg_meta_box_phpcaptcha" <?php echo (($phpcaptcha=='1')?'checked="checked"':'') ?> />
			</p>
			
			<p>
				<label style="color: #333;" for="bg_meta_box_googlemap">
					<strong><?php _e( 'Googla Map link', 'biggallery' ); ?></strong>
					<span style="display:block;margin-top:5px;color:#777777;"><?php _e( 'Paste Google Map link', 'biggallery' ); ?></span>
				</label>
				<input style="width:50%;height:25px;" id="bg_meta_box_googlemap" type="text" size="36" name="bg_meta_box_googlemap" value="<?php echo $googlemap ?>" />
			</p>
		</div>

	<script>
	( function( $ ) {
		$(document).ready(
			function()
			{
				$('.color-field').wpColorPicker();

				/* specyfic page options */
				$('#page_template').change(function() {
					if($(this).val()=='template-slider.php') {
						$('#gallery_select').hide(); 
					} else {
						$('#gallery_select').show();	
					}					
					if($(this).val()!='template-slider.php') {
						$('#slider_select').hide(); 
						$('#catportfolio_size_div').show(); 
						$('#bg_meta_box_video_div').show(); 
					} else {
						$('#slider_select').show();
						$('#catportfolio_size_div').hide(); 
						$('#bg_meta_box_video_div').hide(); 
						
					}
					if($(this).val()!='template-video.php') {
						$('#bg_meta_box_audio_div').show(); 
					} else {
						$('#bg_meta_box_audio_div').hide(); 
					}
					if($(this).val()!='template-contact.php') {
						$('#contact_select').hide(); 
					} else {
						$('#contact_select').show(); 
					}
				});
				$('#page_template').trigger('change');
				
				/* image upload */
				var _custom_media = true,
				_orig_send_attachment = wp.media.editor.send.attachment;

				$('#upload_image_button').click(function(e) {
					var send_attachment_bkp = wp.media.editor.send.attachment;
					var button = $(this);
					var id = button.attr('id').replace('_button', '');
					_custom_media = true;
					wp.media.editor.send.attachment = function(props, attachment){
						if ( _custom_media ) {
							$("#"+id).val(attachment.url);
						} else {
							return _orig_send_attachment.apply( this, [props, attachment] );
						};
					}
					wp.media.editor.open(button);
					return false;
				});
				$('.add_media').on('click', function(){
					_custom_media = false;
				});
			}
		);
	}) ( jQuery );
	</script>
<?php  
} 


add_action( 'save_post', 'bg_meta_box_save' );  
function bg_meta_box_save( $post_id )  
{  
    // Bail if we're doing an auto save  
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { 
		return; 
	}
    // if our nonce isn't there, or we can't verify it, bail 
	if( ! isset( $_POST['meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['meta_box_nonce'], 'bg_meta_box_nonce' ) ) { 
		return; 
	}
    // if our current user can't edit this post, bail  
	if( ! current_user_can( 'edit_post' ) ) {
		return;  
	}	
	 // Make sure your data is set before trying to save it  
	if( isset( $_POST['bg_meta_box_color'] ) ) {
        update_post_meta( $post_id, 'bg_meta_box_color', esc_attr( $_POST['bg_meta_box_color'] ) );  
	}
	if( isset( $_POST['bg_meta_box_img'] ) ) {
        update_post_meta( $post_id, 'bg_meta_box_img', esc_attr( $_POST['bg_meta_box_img'] ) ); 
	}
	if( isset( $_POST['bg_meta_box_background_repeat'] ) ) {
        update_post_meta( $post_id, 'bg_meta_box_background_repeat', esc_attr( $_POST['bg_meta_box_background_repeat'] ) );
	}
    if( isset( $_POST['bg_meta_box_video'] ) ) { 
        update_post_meta( $post_id, 'bg_meta_box_video', esc_attr( $_POST['bg_meta_box_video'] ) ); 
	}
	if( isset( $_POST['bg_meta_box_audio'] ) ) {
        update_post_meta( $post_id, 'bg_meta_box_audio', esc_attr( $_POST['bg_meta_box_audio'] ) ); 
	}
	if( isset( $_POST['catportfolio_select'] ) ) { 
        update_post_meta( $post_id, 'catportfolio_select', esc_attr( $_POST['catportfolio_select'] ) ); 
	}
	if( isset( $_POST['catportfolio_size'] ) ) { 
        update_post_meta( $post_id, 'catportfolio_size', esc_attr( $_POST['catportfolio_size'] ) );  
	}
	if( isset( $_POST['slide_size'] ) ) { 
        update_post_meta( $post_id, 'slide_size', esc_attr( $_POST['slide_size'] ) );
	}
	if( isset( $_POST['slider_autoplay'] ) ) {  
        update_post_meta( $post_id, 'slider_autoplay', esc_attr( $_POST['slider_autoplay'] ) ); 
	}
	if( isset( $_POST['video_volume'] ) ) { 
        update_post_meta( $post_id, 'video_volume', esc_attr( $_POST['video_volume'] ) );
	}
	if( isset( $_POST['audio_volume'] ) ) {
        update_post_meta( $post_id, 'audio_volume', esc_attr( $_POST['audio_volume'] ) ); 
	}
	if( isset( $_POST['video_loop'] ) ) { 
        update_post_meta( $post_id, 'video_loop', esc_attr( $_POST['video_loop'] ) );
	}
	if( isset( $_POST['audio_loop'] ) ) {
        update_post_meta( $post_id, 'audio_loop', esc_attr( $_POST['audio_loop'] ) ); 
	}
	if( isset( $_POST['filterable'] ) ) { 
        update_post_meta( $post_id, 'filterable', esc_attr( $_POST['filterable'] ) ); 
	}
	if( isset( $_POST['bg_meta_box_email'] ) ) { 
        update_post_meta( $post_id, 'bg_meta_box_email', esc_attr( $_POST['bg_meta_box_email'] ) ); 
	}
	update_post_meta( $post_id, 'bg_meta_box_custom1', esc_attr( $_POST['bg_meta_box_custom1'] ) );
	update_post_meta( $post_id, 'bg_meta_box_custom2', esc_attr( $_POST['bg_meta_box_custom2'] ) ); 
	update_post_meta( $post_id, 'bg_meta_box_custom3', esc_attr( $_POST['bg_meta_box_custom3'] )) ; 
	update_post_meta( $post_id, 'bg_meta_box_phpcaptcha', esc_attr( $_POST['bg_meta_box_phpcaptcha'] ) ); 
	update_post_meta( $post_id, 'bg_meta_box_googlemap', esc_attr( $_POST['bg_meta_box_googlemap'] ) ); 
}   

?>