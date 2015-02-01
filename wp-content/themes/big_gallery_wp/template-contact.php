<?php
/*
Template Name: Contact Page
*/
?>
<?php 
get_header(); 
?>

<!-- Menu show -->
<div id="menu-show"></div>
<div id="menu-hide"></div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- page content -->
	<div id="page">
		<div class="big_header"><h1 class="big_header"><?php the_title(); ?></h1></div>
		<div class="submenu"><h3 class="arber"><?php qtrans_generateLanguageSelectCode('dropdown'); ?></h3></div>
		<div class="scroll-pane">
			<div <?php post_class( "page_block" ); ?>>
	
				<div class="column_cont">	
					<div class="two-third margin_1line contactpage">		
						<h3><?php _e( 'Send a message', 'biggallery' ); ?></h3>
						<div id="comment" class="margin_1line"></div>
						<!-- contactForm -->
							<form name="contactForm" id="contactForm" method="get" action="" class="margin_1line">
								<div class="contact">
									<label for="name"><?php _e( 'Name:', 'biggallery' ); ?></label>
									<input type="text" name="name" id="name" class="required,all" />&nbsp;
									<img name="name" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
								</div>
								<input type="hidden" id="insert_name" name="insert_name" value="<?php _e( 'insert your name', 'biggallery' ); ?>" />
								<div class="contact margin_1line">
									<label for="email"><?php _e( 'Email:', 'biggallery' ); ?></label>
									<input type="text" name="email" id="email" class="required,email" />&nbsp;
									<img name="email" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
								</div>
								<input type="hidden" id="insert_email" name="insert_email" value="<?php _e( 'insert your email', 'biggallery' ); ?>"/>
								<input type="hidden" id="wrong_email" name="wrong_email" value="<?php _e( 'wrong email', 'biggallery' ); ?>" />
				
								<?php
								if ( $custom1 = isset( $bigg_values['bg_meta_box_custom1'] ) ? esc_attr( $bigg_values['bg_meta_box_custom1'][0] ) : '' ):
								?>
									<div class="contact margin_1line">
										<label for="custom1"><?php echo $custom1; ?>:</label>
										<input type="text" name="custom1" id="custom1" class="" />&nbsp;
										<img name="custom1" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
									</div>
							<?php endif; ?>
				
							<?php
							if( $custom2 = isset( $bigg_values['bg_meta_box_custom2'] ) ? esc_attr( $bigg_values['bg_meta_box_custom2'][0] ) : '' ):
							?>
								<div class="contact margin_1line">
									<label for="custom2"><?php echo $custom2;?>:</label>
									<input type="text" name="custom2" id="custom2" class="" />&nbsp;
									<img name="custom2" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
								</div>
							<?php endif; ?>
				
							<?php
							if ( $custom3 = isset( $bigg_values['bg_meta_box_custom3'] ) ? esc_attr( $bigg_values['bg_meta_box_custom3'][0] ) : '' ):
							?>
								<div class="contact margin_1line">
									<label for="custom3"><?php echo $custom3;?>:</label>
									<input type="text" name="custom3" id="custom3" class="" />&nbsp;
									<img name="custom3" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
								</div>
							<?php endif; ?>
				
							<div class="contact margin_1line">
								<label for="message"><?php _e( 'Message:', 'biggallery'  ); ?></label>
								<textarea name="message" id="message" class="required,all" rows="8" cols="10"></textarea>&nbsp;
								<img name="message" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
							</div>
							<input type="hidden" id="insert_message" name="insert_message" value="<?php _e( 'insert message', 'biggallery' ); ?>"/>
				
							<input type="hidden" id="mail_title" name="mail_title" value="<?php _e( 'Message from the website', 'biggallery' ); ?>"/>
							<input type="hidden" id="mail_success" name="mail_success" value="<?php _e( 'E-mail was sent.', 'biggallery' ); ?>"/>
							<input type="hidden" id="mail_error" name="mail_error" value="<?php _e( 'Error. Please try again.', 'biggallery' ); ?>"/>
							<input type="hidden" id="to_email" name="to_email" value="<?php echo $bigg_values['bg_meta_box_email'][0]; ?>"/>
							<input type="hidden" id="custom1_title" name="custom1_title" value="<?php echo $custom1; ?>"/>
							<input type="hidden" id="custom2_title" name="custom2_title" value="<?php echo $custom2; ?>"/>
							<input type="hidden" id="custom3_title" name="custom3_title" value="<?php echo $custom3; ?>"/>
							<?php if ( ! $custom1 ):?>
								<input type="hidden" id="custom1" name="custom1" value=""/>
							<?php endif; ?>
							<?php if ( ! $custom2 ):?>
								<input type="hidden" id="custom2" name="custom2" value=""/>
							<?php endif; ?>
							<?php if ( ! $custom3 ):?>
								<input type="hidden" id="custom3" name="custom3" value=""/>
							<?php endif; ?>
							
							<?php if ( $phpcaptcha = isset( $bigg_values['bg_meta_box_phpcaptcha'] ) ? esc_attr( $bigg_values['bg_meta_box_phpcaptcha'][0] ) : '' ) :
							?>			
								<div class="contact margin_line clear captcha_block">
									
									<p><?php _e( 'Type the characters you see in the picture below', 'biggallery' ); ?></p>
									<img id="captcha" src="<?php echo  get_template_directory_uri(); ?>/php/securimage/securimage_show.php" alt="<?php _e( 'CAPTCHA Image', 'biggallery' ); ?>" />
									<p><a href="#" id="captcha_reload" onclick="document.getElementById('captcha').src = '<?php echo  get_template_directory_uri(); ?>/php/securimage/securimage_show.php?' + Math.random(); return false">[ <?php _e( 'Different image', 'biggallery' ); ?> ]</a></p>
								</div>
								<div class="contact margin_1line">
								<label for="message"><?php _e( 'Code:', 'biggallery'  ); ?></label>
								<input type="text" id="captcha_code" name="captcha_code" class="" value="" />
								<img name="captcha_code" src="<?php echo  get_template_directory_uri(); ?>/img/blank.png" alt=""/>
							</div>
								<input type="hidden" id="capreq" name="capreq" value="1"/>
								<input type="hidden" id="wrong_captcha" name="wrong_captcha" value="<?php _e( 'incorrect security code', 'biggallery' ); ?>"/>
							<?php else : ?>	
								<input type="hidden" id="captcha_code" name="captcha_code" value="0"/>
								<input type="hidden" id="capreq" name="capreq" value="0"/>
								<input type="hidden" id="wrong_captcha" name="wrong_captcha" value="0"/>
							<?php endif; ?>							
							<div class="contact">
								<label for="submit">&nbsp;</label>
								<a href="#" id="submit" class="butt custom_font  margin_3_2line"><?php _e( 'send', 'biggallery' ); ?></a>
							</div>
						</form><!-- contacForm end -->
					</div>
					<div class="one-third contactpage margin_1line">		
						<div class="post" id="post-<?php the_ID(); ?>">
							<div class="entry">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => __( 'Pages: ', 'biggallery' ), 'next_or_number' => 'number' ) ); ?>
							</div>
							<?php edit_post_link( __( 'Edit this entry.', 'biggallery' ), '<p>', '</p>' ); ?>

						</div>
					</div>	
				</div><!-- column_cont div end -->
				<div class="clear"></div>
	
				<?php
				if ($googlemap = isset( $bigg_values['bg_meta_box_googlemap'] ) ? esc_attr( $bigg_values['bg_meta_box_googlemap'][0] ) : ''):
				?>
					<div class="margin_1line hr"></div>
					<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $googlemap; ?>&amp;output=embed"></iframe>
				<?php endif; ?>			

			</div><!-- page-block div end -->
			<div class="page-footer"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></div>
		</div><!-- scroll-pane div end -->
	</div><!-- page div end -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
