<?php
///////////THEME OPTIONS
	
	
function bg_theme_options() {  
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_style( 'thickbox' );
	add_submenu_page( 'themes.php', __( 'Theme Options', 'biggallery' ), __( 'Theme Options', 'biggallery' ), 'manage_options', 'bg-options', 'bg_theme_settings' );  
}  

function bg_theme_settings() {  
?>  
	<div class="wrap">  
		<?php screen_icon( 'themes' ); ?> <h2><?php _e( 'Theme Options', 'biggallery' ); ?></h2>  
		<?php
		if ( isset( $_GET['updated'] ) && ( 'true' == esc_attr( $_GET['updated'] ) ) ) {
			echo '<div class="updated"><p>' . __( 'Theme options saved', 'biggallery' ) . '</p></div>';
		}
		echo '<h2 class="nav-tab-wrapper bg_tabs">';
		echo "<a class='nav-tab nav-tab-active bg_tabs' href='#tab1' style='outline:none;'>" . __( 'General', 'biggallery' ) . "</a>";
		echo "<a class='nav-tab bg_tabs' href='#tab2' style='outline:none;'>" . __( 'Appearance', 'biggallery' ) . "</a>";
		echo "<a class='nav-tab bg_tabs' href='#tab3' style='outline:none;'>" . __( 'Menu', 'biggallery' ) . "</a>";
		echo "<a class='nav-tab bg_tabs' href='#tab4' style='outline:none;'>" . __( 'Blog', 'biggallery' ) ."</a>";
		echo "<a class='nav-tab bg_tabs' href='#tab5' style='outline:none;'>" . __( 'Fullscreen Slider', 'biggallery' ) ."</a>";
		echo "<a class='nav-tab bg_tabs' href='#tab6' style='outline:none;'>" . __( 'Audio & Video', 'biggallery' ) ."</a>";
		echo '</h2>';
		?>
        <form method="POST" action="">		
			<!-- tab1 -->
            <div id="tab1" class="tab_content">
				<table class="form-table">  
					<tr valign="top">  
						<th scope="row"><label for="bg_logo"><?php _e( 'Logo EN:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_logo" name="bg_logo" size="100" value="<?php echo get_option( 'bg_logo' ); ?>" /> 
							<input style="cursor: pointer;" id="bg_logo_button" type="button" value="<?php _e( 'Upload logo', 'biggallery' ); ?>"  class="button-primary" />
							<span class="description"><?php _e( 'logo size: 209 x 164px (width x height).', 'big_gallery' ); ?></span>
							<?php if ( get_option( 'bg_logo' ) ) { echo '<br/><img src="' . get_option( 'bg_logo' ) . '" /> ';}; ?>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_logo_sr"><?php _e( 'Logo SR:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_logo_sr" name="bg_logo_sr" size="100" value="<?php echo get_option( 'bg_logo_sr' ); ?>" /> 
							<input style="cursor: pointer;" id="bg_logo_button_sr" type="button" value="<?php _e( 'Upload logo', 'biggallery' ); ?>"  class="button-primary" />
							<span class="description"><?php _e( 'logo size: 209 x 164px (width x height).', 'big_gallery' ); ?></span>
							<?php if ( get_option( 'bg_logo_sr' ) ) { echo '<br/><img src="' . get_option( 'bg_logo_sr' ) . '" /> ';}; ?>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_logo_sq"><?php _e( 'Logo SQ:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_logo_sq" name="bg_logo_sq" size="100" value="<?php echo get_option( 'bg_logo_sq' ); ?>" /> 
							<input style="cursor: pointer;" id="bg_logo_button_sq" type="button" value="<?php _e( 'Upload logo', 'biggallery' ); ?>"  class="button-primary" />
							<span class="description"><?php _e( 'logo size: 209 x 164px (width x height).', 'big_gallery' ); ?></span>
							<?php if ( get_option( 'bg_logo_sq' ) ) { echo '<br/><img src="' . get_option( 'bg_logo_sq' ) . '" /> ';}; ?>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_favicon"><?php _e( 'Favicon:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_favicon" name="bg_favicon" size="100" value="<?php echo get_option( 'bg_favicon' ); ?>" /> 
							<input style="cursor: pointer;" id="bg_favicon_button" type="button" value="<?php _e( 'Upload favicon', 'biggallery' ); ?>"  class="button-primary" />
							<?php if ( get_option( 'bg_favicon' ) ) { echo '<br/><img src="' . get_option( 'bg_favicon' ) . '" />';}; ?>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_logo_hide"><?php _e( 'Logo hide:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_logo_hide" name="bg_logo_hide" size="10" value="<?php echo ( get_option( 'bg_logo_hide' ) ? get_option( 'bg_logo_hide' ) : '0' ); ?>"/> 
							<span class="description"><?php _e( 'Hide logo, menu, arrows after number of seconds with no mouse move. Set 0 for disabling it.', 'big_gallery' ); ?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_fullscreen"><?php _e( 'Fullscreen button:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_fullscreen" name="bg_fullscreen" value="1" <?php if ( get_option( 'bg_fullscreen' ) == '1' ) { echo "checked"; } ?> /> 
							<span class="description"><?php _e( 'Check if you want to turn on fullscreen button', 'big_gallery' ); ?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_img_protect"><?php _e( 'Image protection:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_img_protect" name="bg_img_protect" value="1" <?php if ( get_option( 'bg_img_protect' ) == '1' ) { echo "checked"; } ?> /> 
							<span class="description"><?php _e( 'Disable image dragging and right click with Javascript', 'big_gallery' ); ?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_tracking_code"><?php _e( 'Tracking code:', 'biggallery' ); ?></label></th>  
						<td>  
							<textarea id="bg_tracking_code" name="bg_tracking_code" cols="80" rows="4"><?php echo stripslashes( get_option( 'bg_tracking_code' ) ); ?></textarea> 
							<span class="description"><?php _e( 'Enter Google Analitics or other tracking code here.', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_copyrights"><?php _e( 'Footer copyrights:', 'biggallery' ); ?></label></th>  
						<td>  
							<textarea id="bg_copyrights" name="bg_copyrights" cols="80" rows="2"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></textarea> 
							<span class="description"><?php _e( 'Enter your copyrights text here. You can use html tags', 'big_gallery' ); ?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_img_protect"><strong><?php _e( 'Image sharing', 'biggallery' ) ?></strong></label></th>  
						<td>  
							<strong><?php _e( 'This section contains social sharing options for slider, gallery and attachment images.', 'big_gallery' ); ?></strong>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_share_slider"><?php _e( 'Add "Share Image" to:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_share_slider" name="bg_share_slider" value="1" <?php if ( get_option( 'bg_share_slider' ) == '1' ) { echo "checked"; } ?> /> 
							&nbsp;<?php _e( 'Fullscreen Slider', 'biggallery' ) ?>&nbsp;
							<span class="description"><?php _e( 'Adds sharing links to photos in Fullscreen Slider (in photo description).', 'big_gallery' ); ?></span><br/>
							<input type="checkbox" id="bg_share_gallery" name="bg_share_gallery" value="1" <?php if ( get_option( 'bg_share_gallery' ) == '1' ) { echo "checked"; } ?> /> 
							&nbsp;<?php _e( 'Gallery & Fancybox popup', 'biggallery' ) ?>&nbsp;
							<span class="description"><?php _e( 'Adds sharing links to WordPress gallery and images with Fancybox preview (in photo popup).', 'big_gallery' ); ?></span><br/>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_share_label"><?php _e( 'Share block label:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_share_label" name="bg_share_label" size="50" value="<?php echo get_option( 'bg_share_label' ); ?>"/> 
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_share_linkto"><?php _e( 'Link to:', 'biggallery' ) ?></label></th>  
						<td>  
							<select id="bg_share_linkto" name="bg_share_linkto"> 
								<option value="attachment" <?php echo (( get_option( "bg_share_linkto" ) == 'attachment' ) ? " selected" : ""); ?>><?php _e( 'Attachment page', 'big_gallery' ); ?></option>
								<option value="current" <?php echo (( get_option( "bg_share_linkto"  ) == 'current' ) ? " selected" : "" ); ?>><?php _e( 'Current page', 'big_gallery' ); ?></option>
							</select>
							<span class="description"><?php _e( 'If you choose "Attachment page" then buttons will share link to the single photo as "WordPress Attachment Page". If you choose "Current page" then link to page reffering page will be used (slider, gallery or post).', 'big_gallery' ); ?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_share_facebook"><?php _e( 'Sharing websites:', 'biggallery' ) ?></label></th>  
						<td>  
							<span class="description"><?php _e( 'Choose websites you want to add to sharing block.', 'big_gallery' ); ?></span>
							<br/><br/>
							<input type="checkbox" id="bg_share_facebook" name="bg_share_facebook" value="1" <?php if ( get_option( 'bg_share_facebook' ) == '1' ) { echo "checked"; } ?> /> 
							&nbsp;<?php _e( 'Facebook', 'biggallery' ) ?>&nbsp;
							<br/>
							<input type="checkbox" id="bg_share_twitter" name="bg_share_twitter" value="1" <?php if ( get_option( 'bg_share_twitter' ) == '1' ) { echo "checked"; } ?> /> 
							&nbsp;<?php _e( 'Twitter', 'biggallery' ) ?>&nbsp;
							<br/>
							<input type="checkbox" id="bg_share_gplus" name="bg_share_gplus" value="1" <?php if ( get_option( 'bg_share_gplus' ) == '1' ) { echo "checked"; } ?> /> 
							&nbsp;<?php _e( 'Google +', 'biggallery' ) ?>&nbsp;
							<br/>
							<input type="checkbox" id="bg_share_pinterest" name="bg_share_pinterest" value="1" <?php if ( get_option( 'bg_share_pinterest' ) == '1' ) { echo "checked"; } ?> /> 
							&nbsp;<?php _e( 'Pinterest', 'biggallery' ) ?>&nbsp;
							
						</td>  
					</tr>					
				</table>
			</div>
			<!-- tab2 -->
			<div id="tab2" class="tab_content">
				<table class="form-table">  
					<tr valign="top">  
						<th scope="row"><label for="bg_skin"><?php _e( 'Choose version:', 'biggallery' ) ?></label></th>  
						<td>  
							<select id="bg_skin" name="bg_skin"> 
								<option value="dark" <?php echo (( get_option( "bg_skin" ) == 'dark' ) ? " selected" : ""); ?>><?php _e( 'Dark skin', 'big_gallery' ); ?></option>
								<option value="light" <?php echo (( get_option( "bg_skin"  ) == 'light' ) ? " selected" : "" ); ?>><?php _e( 'Light skin', 'big_gallery' ); ?></option>
							</select>
							<span class="description"><?php _e( 'Use "repeat" for patterns and "no-repeat" for fullscreeen images', 'big_gallery' ); ?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_body_bg_color"><?php _e( 'Default background color:', 'biggallery' ); ?></label></th>  
						<td>  
							<input type="text" id="bg_body_bg_color" name="bg_body_bg_color" size="25" value="<?php echo ( get_option( 'bg_body_bg_color' ) ? get_option( 'bg_body_bg_color' ) : '#000000' ) ; ?>" data-default-color="#000000"  class="color-field" /> 
							<span class="description"><?php _e( 'Enter background color in web format (default is #000000)', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_background_img"><?php _e( 'Default background image:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_background_img" name="bg_background_img" size="120" value="<?php echo get_option( 'bg_background_img' ); ?>" /> 
							<input style="cursor: pointer;" id="bg_background_img_button" type="button" value="<?php _e( 'Upload image', 'biggallery' );?>"  class="button-primary" />
							<?php if ( get_option( 'bg_background_img' ) ) { echo '<br/><img src="' . get_option( 'bg_background_img' ) . '" width="150" /> ';} ?>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_background_repeat"><?php _e( 'Background image repeat:', 'biggallery' ) ?></label></th>  
						<td>  
							<select id="bg_background_repeat" name="bg_background_repeat"> 
								<option value="no-repeat" <?php echo ( ( get_option( 'bg_background_repeat' ) == 'no-repeat' ) ? " selected" : "" ); ?>><?php _e( 'no-repeat', 'big_gallery' )?></option>
								<option value="repeat" <?php echo ( ( get_option( 'bg_background_repeat' ) == 'repeat' ) ? " selected" : "" ); ?>><?php _e( 'repeat', 'big_gallery' )?></option>
							</select>
							<span class="description"><?php _e( 'Use "repeat" for patterns and "no-repeat" for fullscreeen images', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_custom_css"><?php _e( 'Custom CSS:', 'biggallery' ) ?></label></th>  
						<td>  
							<textarea id="bg_custom_css" name="bg_custom_css" cols="80" rows="4"><?php echo stripslashes( get_option( 'bg_custom_css' ) ); ?></textarea> 
							<span class="description"><?php _e( 'You can add here custom CSS code (without style tag).', 'big_gallery' )?></span>
						</td>  
					</tr>
				</table>
			</div>
			<!-- tab3 -->
			<div id="tab3" class="tab_content">
				<table class="form-table">  
					<tr valign="top">  
						<th scope="row"><label for="bg_menu_shown"><?php _e( 'Menu shown:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_menu_shown" name="bg_menu_shown" value="1" <?php if ( get_option( 'bg_menu_shown' ) == '1' ) { echo "checked"; } ?> /> 
							<span class="description"><?php _e( 'If checked then menu is shown all the time (reffers to fullscreen slideshow and video pages).', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_menu_custom_field"><?php _e( 'Custom field:', 'biggallery' ) ?></label></th>  
						<td>  
							<textarea id="bg_menu_custom_field" name="bg_menu_custom_field" cols="80" rows="2"><?php echo stripslashes( get_option( "bg_menu_custom_field" ) ); ?></textarea>
							<span class="description"><?php _e( 'You can put custom text or HTML code here', 'big_gallery' )?></span>
						</td>
					</tr>
					<!-- social icons -->
					<tr valign="top">  
						<th scope="row"><label for="bg_social_label"><?php _e( 'Social block label', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_social_label" name="bg_social_label" size="50" value="<?php echo get_option( 'bg_social_label' ); ?>"/> 
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_facebook"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/facebook.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'facebook:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_facebook" name="bg_facebook" size="50" value="<?php echo get_option( 'bg_facebook' ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_twitter"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/twitter.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'twitter:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_twitter" name="bg_twitter" size="50" value="<?php echo get_option( "bg_twitter" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_gplus"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/gplus.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'google +:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_gplus" name="bg_gplus" size="50" value="<?php echo get_option( "bg_gplus" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_flickr"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/flickr.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'flickr:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_flickr" name="bg_flickr" size="50" value="<?php echo get_option( "bg_flickr" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_instagram"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/instagram.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'instagram:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_instagram" name="bg_instagram" size="50" value="<?php echo get_option( "bg_instagram" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_instagram"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/dribbble.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'dribbble:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_dribbble" name="bg_dribbble" size="50" value="<?php echo get_option( "bg_dribbble" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_picassa"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/picasa.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'picasa:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_picasa" name="bg_picasa" size="50" value="<?php echo get_option( "bg_picasa" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_youtube"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/youtube.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'youtube:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_youtube" name="bg_youtube" size="50" value="<?php echo get_option( "bg_youtube" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_myspace"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/myspace.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'myspace:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_myspace" name="bg_myspace" size="50" value="<?php echo get_option( "bg_myspace" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_vimeo"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/vimeo.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'vimeo:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_vimeo" name="bg_vimeo" size="50" value="<?php echo get_option( "bg_vimeo" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_linkedin"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/linkedin.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'linkedin:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_linkedin" name="bg_linkedin" size="50" value="<?php echo get_option( "bg_linkedin" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_pinterest"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/pinterest.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'pinterest:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_pinterest" name="bg_pinterest" size="50" value="<?php echo get_option( "bg_pinterest" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_500px"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/500px.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( '500px:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_500px" name="bg_500px" size="50" value="<?php echo get_option( "bg_500px" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_digg"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/digg.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'digg:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_digg" name="bg_digg" size="50" value="<?php echo get_option( "bg_digg" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_sharethis"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/sharethis.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'sharethis:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_sharethis" name="bg_sharethis" size="50" value="<?php echo get_option( "bg_sharethis" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_rss"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/rss.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'rss:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_rss" name="bg_rss" size="50" value="<?php echo get_option( "bg_rss" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_tumblr"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/tumblr.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'tumblr:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_tumblr" name="bg_tumblr" size="50" value="<?php echo get_option( "bg_tumblr" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_behance"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/behance.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'behance:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_behance" name="bg_behance" size="50" value="<?php echo get_option( "bg_behance" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_blogger"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/blogger.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'blogger:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_blogger" name="bg_blogger" size="50" value="<?php echo get_option( "bg_blogger" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_addthis"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/addthis.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'addthis:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_addthis" name="bg_addthis" size="50" value="<?php echo get_option( "bg_addthis" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_lastfm"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/lastfm.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'lastfm:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_lastfm" name="bg_lastfm" size="50" value="<?php echo get_option( "bg_lastfm" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_livejournal"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/livejournal.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'livejournal:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_livejournal" name="bg_livejournal" size="50" value="<?php echo get_option( "bg_livejournal" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_reddit"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/reddit.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'reddit:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_reddit" name="bg_reddit" size="50" value="<?php echo get_option( "bg_reddit" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_spotify"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/spotify.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'spotify:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_spotify" name="bg_spotify" size="50" value="<?php echo get_option( "bg_spotify" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_stumbleupon"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/stumbleupon.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'stumbleupon:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_stumbleupon" name="bg_stumbleupon" size="50" value="<?php echo get_option( "bg_stumbleupon" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_wordpress"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/wordpress.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'wordpress:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_wordpress" name="bg_wordpress" size="50" value="<?php echo get_option( "bg_wordpress" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_imdb"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/social/imdb.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'IMDb:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_imdb" name="bg_imdb" size="50" value="<?php echo get_option( "bg_imdb" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					
					<!-- stock icons -->
					<tr valign="top">  
						<th scope="row"><label for="bg_stock_label"><?php _e( 'Stock block label', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_stock_label" name="bg_stock_label" size="50" value="<?php echo get_option( "bg_stock_label" ); ?>"/> 
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_istock"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/istock.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'istock:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_istock" name="bg_istock" size="50" value="<?php echo get_option( "bg_istock" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_shutterstock"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/shutterstock.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'shutterstock:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_shutterstock" name="bg_shutterstock" size="50" value="<?php echo get_option( "bg_shutterstock" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_fotolia"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/fotolia.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'fotolia:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_fotolia" name="bg_fotolia" size="50" value="<?php echo get_option( "bg_fotolia" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_dreamstime"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/dreamstime.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'dreamstime:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_dreamstime" name="bg_dreamstime" size="50" value="<?php echo get_option ("bg_dreamstime" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_123rf"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/123rf.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( '123rf:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_123rf" name="bg_123rf" size="50" value="<?php echo get_option( "bg_123rf" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_alamy"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/alamy.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'alamy:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_alamy" name="bg_alamy" size="50" value="<?php echo get_option( "bg_alamy" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_bigstock"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/bigstock.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'bigstock:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_bigstock" name="bg_bigstock" size="50" value="<?php echo get_option( "bg_bigstock" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_canstock"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/canstock.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'canstock:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_canstock" name="bg_canstock" size="50" value="<?php echo get_option( "bg_canstock" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_crestock"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/crestock.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'crestock:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_crestock" name="bg_crestock" size="50" value="<?php echo get_option( "bg_crestock" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_cutcaster"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/cutcaster.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'cutcaster:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_cutcaster" name="bg_cutcaster" size="50" value="<?php echo get_option( "bg_cutcaster" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_depositphotos"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/depositphotos.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'depositphotos:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_depositphotos" name="bg_depositphotos" size="50" value="<?php echo get_option( "bg_depositphotos" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_featurepics"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/featurepics.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'featurepics:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_featurepics" name="bg_featurepics" size="50" value="<?php echo get_option( "bg_featurepics" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr> 
					<tr valign="top">  
						<th scope="row"><label for="bg_getty"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/getty.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'getty:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_getty" name="bg_getty" size="50" value="<?php echo get_option( "bg_getty" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_graphicleftovers"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/graphicleftovers.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'graphicleftovers:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_graphicleftovers" name="bg_graphicleftovers" size="50" value="<?php echo get_option( "bg_graphicleftovers" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_mostphotos"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/mostphotos.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'mostphotos:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_mostphotos" name="bg_mostphotos" size="50" value="<?php echo get_option( "bg_mostphotos" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable','big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_panthermedia"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/panthermedia.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'panthermedia:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_panthermedia" name="bg_panthermedia" size="50" value="<?php echo get_option( "bg_panthermedia" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_photodune"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/photodune.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'photodune:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_photodune" name="bg_photodune" size="50" value="<?php echo get_option( "bg_photodune" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_stockfresh"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/stockfresh.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'stockfresh:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_stockfresh" name="bg_stockfresh" size="50" value="<?php echo get_option( "bg_stockfresh" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_veer"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/veer.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'veer:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_veer" name="bg_veer" size="50" value="<?php echo get_option( "bg_veer" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_yaymicro"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/yaymicro.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'yaymicro:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_yaymicro" name="bg_yaymicro" size="50" value="<?php echo get_option( "bg_yaymicro" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
					<tr valign="top">  
						<th scope="row"><label for="bg_zoonar"><span style="display:inline-block; width:20px; height:20px; overflow:hidden; top:5px; position:relative;"><img style="top:-20px; position:relative; " src="<?php echo  get_template_directory_uri(); ?>/img/icons/stock/zoonar.png"/></span>&nbsp;&nbsp;&nbsp;
						<?php _e( 'zoonar:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_zoonar" name="bg_zoonar" size="50" value="<?php echo get_option( "bg_zoonar" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL or leave empty to disable', 'big_gallery' )?></span>
						</td>  
					</tr>
				</table>
			</div>
			<!-- tab4 -->
			<div id="tab4" class="tab_content">
				<table class="form-table">  
					<tr valign="top">  
						<th scope="row"><label for="bg_blog_style"><?php _e( 'Choose blog style:', 'biggallery' ) ?></label></th>  
						<td>  
							<select id="bg_blog_style" name="bg_blog_style"> 
								<option value="modern" <?php echo ( ( get_option( "bg_blog_style" ) == 'modern' ) ? " selected" : "" ); ?>><?php _e(' Modern filterable blog', 'big_gallery' )?></option>
								<option value="classic-right" <?php echo ( ( get_option( "bg_blog_style" ) == 'classic-right' ) ? " selected" : ""); ?>><?php _e(' Classic with right sidebar', 'big_gallery' )?></option>
								<option value="classic-left" <?php echo ( ( get_option( "bg_blog_style" ) == 'classic-left' ) ? " selected" : ""); ?>><?php _e(' Classic with left sidebar','big_gallery' )?></option>
							</select>
							<span class="description"><?php _e( 'Choose blog style', 'big_gallery' )?></span>
						</td>  
					</tr>  						
				</table>
			</div>
			<!-- tab5 -->
			<div id="tab5" class="tab_content">
				<table class="form-table">  
					<tr valign="top">  
						<th scope="row"><label for="bg_slider_speed"><?php _e( 'Slider speed:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_slider_speed" name="bg_slider_speed" size="10" value="<?php echo ( get_option( "bg_slider_speed" ) ? get_option( "bg_slider_speed" ) : "5000" ); ?>"/> 
							<span class="description"><?php _e( 'Choose slider speed in miliseconds (defalut is 5000)', 'big_gallery' ); ?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_thumbnails"><?php _e( 'Thumbnails:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_thumbnails" name="bg_thumbnails" value="1" <?php if ( get_option( "bg_thumbnails" ) == "1" ) { echo  "checked"; } ?> /> 
							<span class="description"><?php _e( 'Check if you want to turn on thumbnails carousel', 'big_gallery' )?></span>
						</td>  
					</tr>  
					 <tr valign="top">  
						<th scope="row"><label for="bg_slider_overlay"><?php _e( 'Overlay:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_slider_overlay" name="bg_slider_overlay" value="1" <?php if ( get_option( "bg_slider_overlay" ) == "1" ) { echo "checked"; } ?> /> 
							<span class="description"><?php _e( 'Check if you want to turn on image overlay pattern', 'big_gallery' ); ?></span>
						</td>  
					 </tr>
				</table>
			</div>
			<!-- tab6 -->
			<div id="tab6" class="tab_content">
				<table class="form-table">  
					<tr valign="top">  
						<th scope="row"><label for="bg_default_audio"><?php _e( 'Default audio file:', 'biggallery' ) ?></label></th>  
						<td>  
							<input type="text" id="bg_default_audio" name="bg_default_audio" size="90" value="<?php echo get_option( "bg_default_audio" ); ?>"/> 
							<span class="description"><?php _e( 'Enter an URL to the default background audio file for this page. Supports: mp3', 'big_gallery' )?></span>
						</td>  
					</tr>  
					<tr valign="top">  
						<th scope="row"><label for="bg_default_audio_volume"><?php _e( 'Default audio volume:', 'biggallery' ); ?></label></th>  
						<td>  
							<select id="bg_default_audio_volume" name="bg_default_audio_volume"> 
								<option value="off" <?php echo ( ( get_option( "bg_default_audio_volume" ) == 'off' ) ? " selected" : "" ); ?>><?php _e( 'Off', 'big_gallery' )?></option>
								<option value="on" <?php echo ( ( get_option( "bg_default_audio_volume" ) == 'on' ) ?" selected" : "" ); ?>><?php _e( 'On', 'big_gallery' )?></option>
							</select>
							<span class="description"></span>
						</td>  
					</tr> 
`					<tr valign="top">  
						<th scope="row"><label for="bg_default_audio_loop"><?php _e( 'Default audio looping:', 'biggallery' ); ?></label></th>  
						<td>  
							<select id="bg_default_audio_loop" name="bg_default_audio_loop"> 
								<option value="on" <?php echo ( ( get_option( "bg_default_audio_loop" ) == 'on' ) ?" selected" : "" ); ?>><?php _e( 'On', 'big_gallery' )?></option>
								<option value="off" <?php echo ( ( get_option( "bg_default_audio_loop" ) == 'off' ) ? " selected" : "" ); ?>><?php _e( 'Off', 'big_gallery' )?></option>
							</select>
							<span class="description"></span>
						</td>  
					</tr>  					
					 <tr valign="top">  
						<th scope="row"><label for="bg_video_overlay"><?php _e( 'Video overlay:', 'biggallery' ); ?></label></th>  
						<td>  
							<input type="checkbox" id="bg_video_overlay" name="bg_video_overlay" value="1" <?php if ( get_option( "bg_video_overlay" ) == "1" ) echo "checked"; ?> /> 
							<span class="description"><?php _e( 'Check if you want to turn on video overlay pattern', 'big_gallery' ); ?></span>
						</td>  
					 </tr>
				</table>
			</div>
			<p>  
				<input type="hidden" name="update_settings" value="Y" />  
				<input type="submit" value="<?php _e( 'Save settings', 'biggallery' );?>" class="button-primary"/>  
			</p> 
        </form>  
    </div>  
		
	<script>
	( function( $ ) {
		$(document).ready(
			function() {
				var header_clicked = false;
				var tbframe_interval;
				var field;
				$('#upload_image_button2').click(
					function() {
						tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
						header_clicked = true;
						field = 'logo';
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.savesend .button').val('Use This Image');}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.align').hide();}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.image-size').hide();}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.gallery-settings').hide();}, 2000);
						return false;      
					}
				);
				$('#upload_favicon_button').click(
					function() {
						tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
						header_clicked = true;
						field = 'fav';
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.savesend .button').val('Use This Image');}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.align').hide();}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.image-size').hide();}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.gallery-settings').hide();}, 2000);
						return false;      
					}
				); 
				$('#upload_background_button').click(
					function() {
						tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
						header_clicked = true;
						field = 'bg';
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.savesend .button').val('Use This Image');}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.align').hide();}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.image-size').hide();}, 2000);
						tbframe_interval = setInterval(function() {$('#TB_iframeContent').contents().find('.gallery-settings').hide();}, 2000);
						return false;      
					}
				); 
				window.original_send_to_editor = window.send_to_editor;
				window.send_to_editor = function (html) {
					if (header_clicked) {
						imgurl = $('img', html).attr('src');
						if(field=='logo') $('#bg_logo').val(imgurl);
						else if(field=='logo_sr') $('#bg_logo_sr').val(imgurl);
						else if(field=='logo_sq') $('#bg_logo_sq').val(imgurl);
						else if(field=='fav') $('#bg_favicon').val(imgurl);
						else if(field=='bg') $('#bg_background_img').val(imgurl);
						header_clicked = false;
						clearInterval(tbframe_interval);
						tb_remove();
					} else {
						window.original_send_to_editor(html);
					}
				}
		
				var _custom_media = true,
				_orig_send_attachment = wp.media.editor.send.attachment;
		
				$('#bg_logo_button').click(function(e) {
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
				$('#bg_logo_button_sr').click(function(e) {
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
				$('#bg_logo_button_sq').click(function(e) {
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
				$('#bg_favicon_button').click(function(e) {
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
				$('#bg_background_img_button').click(function(e) {
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
		
				$('.color-field').wpColorPicker();
			}
		);
	} ) ( jQuery );
	</script>
		
	<script>
	( function( $ ) {
		$(document).ready(function() {
    
			//When page loads...
			$(".tab_content").hide(); //Hide all content
			//$("ul.tabs li:first").addClass("active").show(); //Activate first tab
			$("#tab1").show(); //Show first tab content

			//On Click Event
			$("a.bg_tabs").click(function() {

				$("a.bg_tabs").removeClass("nav-tab-active"); //Remove any "active" class
				$(this).addClass("nav-tab-active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content

				var activeTab = $(this).attr("href"); //Find the href attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
			});
		});
	})( jQuery );
	</script>
<?php    
}  

add_action( "admin_menu", "bg_theme_options" ); 

//saving theme settings

if ( isset( $_POST["update_settings"] ) ) { 
	update_option( "bg_logo", esc_attr( $_POST["bg_logo"] ) );
	update_option( "bg_logo_sr", esc_attr( $_POST["bg_logo_sr"] ) );
	update_option( "bg_logo_sq", esc_attr( $_POST["bg_logo_sq"] ) ); 
	update_option( "bg_favicon", esc_attr( $_POST["bg_favicon"] ) );  
	update_option( "bg_logo_hide", esc_attr( $_POST["bg_logo_hide"] ) );  
	update_option( "bg_fullscreen", ( isset( $_POST["bg_fullscreen"] ) ? esc_attr( $_POST["bg_fullscreen"] ) : '' ) );  
	update_option( "bg_img_protect", ( isset( $_POST["bg_img_protect"] ) ? esc_attr( $_POST["bg_img_protect"] ) : '' ) );  
	update_option( "bg_tracking_code", $_POST["bg_tracking_code"] );  
	update_option( "bg_copyrights", $_POST["bg_copyrights"] );  
	
	update_option( "bg_share_slider", ( isset( $_POST["bg_share_slider"] ) ? esc_attr( $_POST["bg_share_slider"] ) : '' ) );  
	update_option( "bg_share_gallery", ( isset( $_POST["bg_share_gallery"] ) ? esc_attr( $_POST["bg_share_gallery"] ) : '' ) );  
	update_option( "bg_share_label", esc_attr( $_POST["bg_share_label"] ) );  
	update_option( "bg_share_linkto", esc_attr( $_POST["bg_share_linkto"] ) );  
	update_option( "bg_share_facebook", ( isset( $_POST["bg_share_facebook"] ) ? esc_attr( $_POST["bg_share_facebook"] ) : '' ) );  
	update_option( "bg_share_twitter", ( isset( $_POST["bg_share_twitter"] ) ? esc_attr( $_POST["bg_share_twitter"] ) : '' ) );  
	update_option( "bg_share_gplus", ( isset( $_POST["bg_share_gplus"] ) ? esc_attr( $_POST["bg_share_gplus"] ) : '' ) );  
	update_option( "bg_share_pinterest", ( isset( $_POST["bg_share_pinterest"] ) ? esc_attr( $_POST["bg_share_pinterest"] ) : '' ) );  
	
	update_option( "bg_skin", esc_attr( $_POST["bg_skin"] ) );  
	update_option( "bg_body_bg_color", esc_attr( $_POST["bg_body_bg_color"] ) );  
	update_option( "bg_background_img", esc_attr( $_POST["bg_background_img"] ) );  
	update_option( "bg_background_repeat", esc_attr( $_POST["bg_background_repeat"] ) );  
	update_option( "bg_custom_css", $_POST["bg_custom_css"] );  
	update_option( "bg_menu_shown", ( isset( $_POST["bg_menu_shown"] ) ? esc_attr( $_POST["bg_menu_shown"] ) : '' ) );  
	update_option( "bg_menu_custom_field", $_POST["bg_menu_custom_field"] );  
	update_option( "bg_blog_style", esc_attr( $_POST["bg_blog_style"] ) );  
	update_option( "bg_slider_speed", esc_attr( $_POST["bg_slider_speed"] ) );  
	update_option( "bg_thumbnails", ( isset( $_POST["bg_thumbnails"] ) ? esc_attr( $_POST["bg_thumbnails"] ) : '' ) );  
	update_option( "bg_slider_overlay", ( isset( $_POST["bg_slider_overlay"] ) ? esc_attr( $_POST["bg_slider_overlay"] ) : '' ) );  
	update_option( "bg_default_audio", esc_attr( $_POST["bg_default_audio"] ) );  
	update_option( "bg_default_audio_volume", esc_attr( $_POST["bg_default_audio_volume"] ) );  
	update_option( "bg_default_audio_loop", esc_attr( $_POST["bg_default_audio_loop"] ) );  
	update_option( "bg_video_overlay", ( isset( $_POST["bg_video_overlay"] ) ? esc_attr( $_POST["bg_video_overlay"] ) : '' ) );  
		
	/*social */
	update_option ("bg_social_label", esc_attr( $_POST["bg_social_label"] ) );  
	update_option( "bg_digg", esc_attr( $_POST["bg_digg"] ) );  
	update_option( "bg_dribbble", esc_attr( $_POST["bg_dribbble"] ) );  
	update_option( "bg_facebook", esc_attr( $_POST["bg_facebook"] ) );  
	update_option( "bg_flickr", esc_attr( $_POST["bg_flickr"] ) );  
	update_option( "bg_gplus", esc_attr( $_POST["bg_gplus"] ) );  
	update_option( "bg_instagram", esc_attr( $_POST["bg_instagram"] ) );  
	update_option( "bg_linkedin", esc_attr( $_POST["bg_linkedin"] ) );  
	update_option( "bg_myspace", esc_attr( $_POST["bg_myspace"] ) );  
	update_option( "bg_picasa", esc_attr( $_POST["bg_picasa"] ) );  
	update_option( "bg_pinterest", esc_attr( $_POST["bg_pinterest"] ) );  
	update_option( "bg_500px", esc_attr( $_POST["bg_500px"] ) );  
	update_option( "bg_rss", esc_attr( $_POST["bg_rss"] ) );  
	update_option( "bg_sharethis", esc_attr( $_POST["bg_sharethis"] ) );  
	update_option( "bg_twitter", esc_attr( $_POST["bg_twitter"] ) );  
	update_option( "bg_vimeo", esc_attr( $_POST["bg_vimeo"] ) );  
	update_option( "bg_youtube", esc_attr( $_POST["bg_youtube"] ) );  
	update_option( "bg_tumblr", esc_attr( $_POST["bg_tumblr"] ) );  
	update_option( "bg_behance", esc_attr( $_POST["bg_behance"] ) );  
	update_option( "bg_blogger", esc_attr( $_POST["bg_blogger"] ) ); 
	update_option( "bg_addthis", esc_attr( $_POST["bg_addthis"] ) ); 
	update_option( "bg_lastfm", esc_attr( $_POST["bg_lastfm"] ) ); 
	update_option( "bg_livejournal", esc_attr( $_POST["bg_livejournal"] ) ); 
	update_option( "bg_reddit", esc_attr( $_POST["bg_reddit"] ) ); 
	update_option( "bg_spotify", esc_attr( $_POST["bg_spotify"] ) ); 
	update_option( "bg_stumbleupon", esc_attr( $_POST["bg_stumbleupon"] ) ); 
	update_option( "bg_wordpress", esc_attr( $_POST["bg_wordpress"] ) ); 
	update_option( "bg_imdb", esc_attr( $_POST["bg_imdb"] ) ); 
	if (esc_attr( $_POST["bg_digg"] ) || esc_attr( $_POST["bg_dribbble"] ) || esc_attr( $_POST["bg_facebook"] ) || esc_attr( $_POST["bg_flickr"] ) || esc_attr( $_POST["bg_gplus"] ) || esc_attr( $_POST["bg_instagram"] ) || esc_attr( $_POST["bg_linkedin"] ) || esc_attr( $_POST["bg_myspace"] ) || esc_attr( $_POST["bg_picasa"] ) || esc_attr( $_POST["bg_picasa"] ) || esc_attr( $_POST["bg_500px"] ) || esc_attr( $_POST["bg_rss"] ) || esc_attr( $_POST["bg_sharethis"] ) || esc_attr( $_POST["bg_twitter"] ) || esc_attr( $_POST["bg_vimeo"] ) || esc_attr( $_POST["bg_youtube"] )  || esc_attr( $_POST["bg_tumblr"] ) || esc_attr( $_POST["bg_behance"] ) || esc_attr( $_POST["bg_blogger"] ) || esc_attr( $_POST["bg_addthis"] ) || esc_attr( $_POST["bg_lastfm"] ) || esc_attr( $_POST["bg_livejournal"] ) || esc_attr( $_POST["bg_reddit"] ) || esc_attr( $_POST["bg_spotify"] ) || esc_attr( $_POST["bg_stumbleupon"] ) || esc_attr( $_POST["bg_wordpress"] ) || esc_attr( $_POST["bg_imdb"] )) {
		update_option( "bg_social", 1 );  
	} else {
		update_option( "bg_social", 0 ); 
	} 
	/* stock */
	update_option( "bg_stock_label", esc_attr( $_POST["bg_stock_label"] ) );  
	update_option( "bg_123rf", esc_attr( $_POST["bg_123rf"] ) );  
	update_option( "bg_alamy", esc_attr( $_POST["bg_alamy"] ) );  
	update_option( "bg_bigstock", esc_attr( $_POST["bg_bigstock"] ) );  
	update_option( "bg_canstock", esc_attr( $_POST["bg_canstock"] ) );  
	update_option( "bg_crestock", esc_attr( $_POST["bg_crestock"] ) );  
	update_option( "bg_cutcaster", esc_attr( $_POST["bg_cutcaster"] ) );  
	update_option( "bg_depositphotos", esc_attr( $_POST["bg_depositphotos"] ) );  
	update_option( "bg_dreamstime", esc_attr( $_POST["bg_dreamstime"] ) );  
	update_option( "bg_featurepics", esc_attr( $_POST["bg_featurepics"] ) );  
	update_option( "bg_fotolia", esc_attr( $_POST["bg_fotolia"] ) );  
	update_option( "bg_getty", esc_attr( $_POST["bg_getty"] ) );  
	update_option( "bg_graphicleftovers", esc_attr( $_POST["bg_graphicleftovers"] ) );  
	update_option( "bg_istock", esc_attr( $_POST["bg_istock"] ) );  
	update_option( "bg_mostphotos", esc_attr( $_POST["bg_mostphotos"] ) );  
	update_option( "bg_panthermedia", esc_attr( $_POST["bg_panthermedia"] ) );  
	update_option( "bg_photodune", esc_attr( $_POST["bg_photodune"] ) );  
	update_option( "bg_shutterstock", esc_attr( $_POST["bg_shutterstock"] ) );  
	update_option( "bg_stockfresh", esc_attr( $_POST["bg_stockfresh"] ) );  
	update_option( "bg_veer", esc_attr( $_POST["bg_veer"] ) );  
	update_option( "bg_yaymicro", esc_attr( $_POST["bg_yaymicro"] ) );  
	update_option( "bg_zoonar", esc_attr( $_POST["bg_zoonar"] ) );  
	if ( esc_attr( $_POST["bg_123rf"] ) || esc_attr( $_POST["bg_alamy"] ) || esc_attr( $_POST["bg_bigstock"] ) || esc_attr( $_POST["bg_canstock"] ) || esc_attr( $_POST["bg_crestock"] ) || esc_attr( $_POST["bg_cutcaster"] ) || esc_attr( $_POST["bg_depositphotos"] ) || esc_attr( $_POST["bg_dreamstime"] ) || esc_attr( $_POST["bg_featurepics"] ) || esc_attr( $_POST["bg_fotolia"] ) || esc_attr( $_POST["bg_getty"] ) || esc_attr( $_POST["bg_graphicleftovers"] ) || esc_attr( $_POST["bg_istock"] ) || esc_attr( $_POST["bg_mostphotos"] ) || esc_attr( $_POST["bg_panthermedia"] ) || esc_attr( $_POST["bg_photodune"] ) || esc_attr( $_POST["bg_shutterstock"] ) || esc_attr( $_POST["bg_stockfresh"] ) || esc_attr( $_POST["bg_veer"] ) || esc_attr( $_POST["bg_yaymicro"] ) || esc_attr( $_POST["bg_zoonar"] ) ) {
		update_option( "bg_stock", 1 );  
	} else {
		update_option( "bg_stock", 0 ); 
	}
	add_action( 'admin_notices', 'bg_admin_msg_theme_saved' );  	
}

function bg_admin_msg_theme_saved() {
	echo '<div id="message" class="updated">' . __( 'Theme options saved', 'biggallery' ) . '</div> ';
}

?>