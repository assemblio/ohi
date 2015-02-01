<?php get_header(); ?>
<?php 
	$blog_style = get_option( 'bg_blog_style' );
	if( $blog_style == 'modern') {
	$sidebar_float = 'right';
	$content_float = 'left';
} else if ( $blog_style == 'classic-left') {
	$sidebar_float = 'left';
	$content_float = 'right';
} else {
	$sidebar_float = 'right';
	$content_float = 'left';
}
?>
<!-- Menu show -->
<div id="menu-show"></div>
<div id="menu-hide"></div>

<!-- page content -->
<div id="page">
	<div class="big_header"><h1 class="big_header"><?php the_title(); ?></h1></div>
	<div class="submenu"></div>
	<div class="scroll-pane">
		<div class="page_block">
			<div class="column_cont">		
				<div id="posts" class="two-third classicblog2_<?php echo $content_float; ?>">

				<?php if  ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2 id="title-post-<?php the_ID(); ?>" class="margin_1line"><a href="<?php the_permalink() ?>" class="hover_link_light"><?php the_title(); ?></a></h2>
						<?php get_template_part( 'inc/meta' ); ?>
						<?php if( wp_attachment_is_image() ): ?>
							<div class="item">
								<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pw-attachment' );
								$url = $thumb['0'];
								?>
								<img src="<?php echo $url;?>" alt="<?php the_title(); ?>" class="photo"/>
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' ); ?>
								<a class="fancybox" href="<?php echo $src[0];?>" title="<?php the_title(); ?>"></a>	
								<?php
								if ( get_option( 'bg_share_gallery' ) ) {
									$output = '<ul class="gallery-share-hidden ' . str_replace(array('http://','/','.',' ',')','('), array('','','','','',''), substr($src[0] ,strpos($src[0] ,'uploads')+7)) . '">';
									if ( get_option( 'bg_share_facebook' ) ) {
										$output .= '<li><a target="blank" href="http://www.facebook.com/sharer/sharer.php?s=100&p[images][0]=' . $src[0] . '&p[url]=' . urlencode( get_permalink() ) . '&p[title]=' . urlencode( the_title( '', '', false ) ) . '&p[summary]=' . urlencode( get_the_excerpt() ) . '" title="' . __( 'facebook', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/facebook.png" alt=""/></a></li>';
									}	
									if ( get_option( 'bg_share_twitter' ) ) {
										$output .= '<li><a target="blank" href="https://twitter.com/intent/tweet?text=' . wptexturize( the_title( '' , '', false ) ) . ' ' . get_permalink() . '" title="' . __( 'twitter', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/twitter.png" alt=""/></a></li>';
									}
									if ( get_option( 'bg_share_gplus' ) ) {
										$output .= '<li><a target="blank" href="https://plus.google.com/share?url=' . get_permalink() . '" title="' . __( 'google +', 'biggallery' ) . '" class="qtip"><img src="' . get_template_directory_uri() . '/img/icons/social/gplus.png" alt=""/></a></li>';
									}
									if ( get_option( 'bg_share_pinterest' ) ) {
										$output .= '<li><a title="' . __( 'pinterest', 'biggallery' ) . '" class="qtip" target="blank" href="http://pinterest.com/pin/create/button/?url=' . get_permalink() . '&media=' .$src[0] . '&description=' . wptexturize( the_title( '', '', false ) ) . '"><img src="' . get_template_directory_uri() . '/img/icons/social/pinterest.png" alt=""/></a></li>';
									}
									$output .= '</ul>';
									echo $output;
								}
								?>
								<div class="details">
									<div class="mblogfooter2 custom_font"><p><?php the_title(); ?></p></div>
								</div>			
								<div class="loupe"></div>
								<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $bigg_skin; ?>/shadow.png" class="shadow" alt=""/>								
							</div>
						<?php endif; ?>
						<div class="entry margin_1line">
							<?php the_content(); ?>
							<div class="clear"></div>
							<?php wp_link_pages( array( 'before' => __( 'Pages: ', 'biggallery' ), 'next_or_number' => 'number' ) ); ?>
							<div class="margin_1line"><?php the_tags( __( 'Tags: ', 'biggallery' ), ' ', '' ); ?></div>
						</div>
						<?php edit_post_link( 'Edit this entry', '', '.' ); ?>
					</div>
					<?php comments_template(); ?>
				<?php endwhile; endif; ?>
				</div>
				<div class="one-third classicblog_<?php echo $sidebar_float; ?>">
					<?php get_sidebar(); ?>
				</div>
			</div><!-- column_cont div end -->
			<div class="clear"></div>
		</div><!-- page-block div end -->
		<div class="page-footer"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></div>
	</div><!-- scroll-pane div end -->
</div><!-- page div end -->
					
<?php get_footer(); ?>