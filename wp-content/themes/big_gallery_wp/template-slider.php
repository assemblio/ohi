<?php
/*
Template Name: Fullscreen Slider
*/
?>
<?php
get_header(); 
?>
		
<!-- Menu show -->
<div id="menu-show"><div id="menu-show-arrow"></div></div>
<div id="menu-hide"><div id="menu-hide-arrow"></div></div>
				
<!-- Gallery content -->			
<?php
$loop = new WP_Query( array( 'post_type' => 'project', 'catportfolio' => $GLOBALS['bigg_cat'], 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
$loopsize = 0;
if (( $loop->post_count ) <5 ) {
	if ( ( $loop->post_count ) == 0 ) {
		$slider_bg = get_option('bg_background_img');
	} else {
		$j = 0;
		while ( $loop->have_posts() ) {
			$loop->the_post();
			if ( $j == 0 ) {
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '1920x1200' );
				$slider_bg = $thumb['0'];
			}
			$j++;
		}
	}
	echo '<div id="background"><img src="'.$slider_bg.'" alt=""/></div>';
} else {
?>

	<!-- Fullscreen gallery start -->
	<div class="slider" id="slider">
		<div id="gallery">
			<!-- Photos go here -->
			<?php if ( $loop ) :
				$i = 0;
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
					$i++;
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '1920x1200' );
					$url = $thumb['0'];
					echo '<img src="' . get_template_directory_uri() . '/img/blank.png" data-original="'.$url.'" id="item_'.$i.'" alt="" width="'.$thumb['1'].'" height="'.$thumb['2'].'" />';
					?>
				<?php endwhile; ?>
				<?php $loopsize = $i; ?>
			<?php endif; ?>
		</div>
	</div><!-- Slider div end / Fullscreen gallery end -->
			
	<!-- Photos descriptions start -->
	<div id="desc_cont">
		<?php if ( $loop ) :
			$i = 0;
			while ( $loop->have_posts() ) : $loop->the_post(); 
				$i++; 
				if( trim( get_the_content() ) || get_option( 'bg_share_slider' ) ) {
					echo '<div '; echo post_class(); 
					echo' id="desc_item_'.$i.'">';
					?>
					<h2><?php the_title(); ?></h2>
					<div class="margin_1line"><?php the_content(); ?></div>
					<?php
					if ( get_option( 'bg_share_slider' ) ) {
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '1920x1200' );
						$src = $thumb['0'];
						if( get_option( 'bg_share_linkto' ) == 'current' ) {
							$share_link = home_url(add_query_arg(array(),$wp->request));
						} else {
							$share_link = get_attachment_link( $id );
						}
						$output = '<div class="custom_font margin_1line">' . (get_option( 'bg_share_label' )?get_option( 'bg_share_label' ):'') . '</div>';
						$output .= '<ul class="gallery-share">';
						if ( get_option( 'bg_share_facebook' ) ) {
							$output .= '<li><a target="blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[images][0]=' . $src . '&p[url]=' . urlencode( $share_link ) . '&p[title]=' . urlencode( the_title( '', '', false ) ) . '&p[summary]=' . urlencode( get_the_excerpt() ) . '" title="' . __( 'facebook', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/facebook.png" alt=""/></a></li>';
						}	
						if ( get_option( 'bg_share_twitter' ) ) {
							$output .= '<li><a target="blank" href="https://twitter.com/intent/tweet?text=' . wptexturize( the_title( '' , '', false ) ) . ' ' . $share_link  . '" title="' . __( 'twitter', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/twitter.png" alt=""/></a></li>';
						}
						if ( get_option( 'bg_share_gplus' ) ) {
							$output .= '<li><a target="blank" href="https://plus.google.com/share?url=' . $share_link  . '" title="' . __( 'google +', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/gplus.png" alt=""/></a></li>';
						}
						if ( get_option( 'bg_share_pinterest' ) ) {
							$output .= '<li><a title="' . __( 'pinterest', 'biggallery' ) . '" class="qtip" target="blank" href="http://pinterest.com/pin/create/button/?url=' . $share_link  . '&media=' .$src . '&description=' . wptexturize( the_title( '', '', false ) ) . '"><img src="' . get_template_directory_uri() . '/img/icons/social/pinterest.png" alt=""/></a></li>';
						}
						$output .= '</ul>';
						echo $output;
					}
					?>
					</div>
				<?php 
				} else {
					echo '<div '; 
					echo post_class(); 
					echo' id="desc_item_'.$i.'"></div>';
				}				
				?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div><!-- #desc_cont -->
			
	<?php
	if ( get_option( 'bg_thumbnails' ) ) {
	?>
		<!-- Thumbnails -->
		<div id="gallery_hide"></div>
		<div id="thumbnails_bg">
			<div id="mini_cont">
			<!-- Big navigation arrows -->
				<a class="prev" id="mini_prev" href="#"></a>
				<a class="next" id="mini_next" href="#"></a>
				<div id="thumbnails_cont">
					<div id="thumbnails">
					<!-- Thumbnails go here -->
					<?php if ( $loop ) :
						$i = 0;
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<?php 
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pw-slider_thumb' );
							$url = $thumb['0'];
							if ($i == 0) {
								$a_id = $loopsize - 1;
							} elseif ( $i == 1 ) {
								$a_id = $loopsize;
							} else {
								$a_id = $i - 1;
							}
							$i++;			
							echo '<a href="#item_'.$a_id.'" class="caroufredsel">';
							?>
								<img src="<?php echo $url;?>" alt=""/>
							</a>
						<?php endwhile; ?>
					<?php endif; ?>
					</div><!-- thumbnails div end -->
				</div><!-- thumbnails_cont div end -->
				<!-- footer -->
				<div id="bottom-line">
					<div id="author"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></div>
				</div><!-- bottom-line div end -->
			</div><!-- mini_cont div end -->
		</div><!-- thumbnails_bg div end -->							
		<div id="gallery-show"></div>	
	<?php
	}
	?>
	<div id="modal_shadow"></div>
	<!-- Big navigation arrows -->
	<div id="left"><div id="arrow_left"></div><a href="#" id="scroll_left"></a></div>
	<div id="right"><div id="arrow_right"></div><a href="#" id="scroll_right"></a></div>
	<div id="play"><div id="play_icon" title="<?php _e( 'Slideshow autoplay', 'biggallery' );?>" class="qtip"></div></div>
	<div id="desc_info"><div id="desc_info_icon" title="<?php _e( 'Photo description', 'biggallery' );?>" class="qtip"></div></div>	

<?php
}
?>				
<?php get_footer(); ?>
