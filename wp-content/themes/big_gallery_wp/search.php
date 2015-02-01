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
	<div class="big_header"><h1 class="big_header"><?php _e( 'Search results', 'biggallery' ); ?></h1></div>
	<div class="submenu"></div>
	<div class="scroll-pane">
		<div class="page_block">
			<div class="column_cont">		
				<div id="posts" class="two-third classicblog2_<?php echo $content_float; ?>">
					<?php if ( have_posts() ) : ?>
						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
						<?php get_template_part( 'inc/nav' ); ?>
						
						<?php while ( have_posts() ) : the_post(); ?>
							<div <?php post_class() ?>>
								<h2 id="post-<?php the_ID(); ?>" class="margin_1line"><a href="<?php the_permalink() ?>" class="hover_link_light"><?php the_title(); ?></a></h2>
								<?php get_template_part( 'inc/meta' ); ?>
						
								<?php if ( has_post_thumbnail() ): ?>
									<div class="item">
										<?php 
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pw-blog_thumb' );
										$url = $thumb['0'];
										?>
										<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" class="photo" />
										<a href="<?php the_permalink() ?>" ></a>	
										<div class="details">
											<div class="mblogfooter2 custom_font"><p><?php the_title(); ?></p></div>
										</div>	
										<div class="loupe"></div>
										<img src="<?php echo get_template_directory_uri(); ?>/img/<?php echo $bigg_skin; ?>/shadow.png" class="shadow" alt="" />	
									</div>
								<?php endif; ?>

								<div class="entry margin_1line">
									<?php 
									$GLOBALS['bigg_size'] = get_post_meta( $post->ID, 'catportfolio_size', true ); 
									?>
									<?php the_content(); ?>
									<div class="clear"></div>
								</div>
								<p class="margin_1line"><a href="<?php the_permalink() ?>#more-<?php the_ID() ?>" class="butt custom_font"><?php _e( 'see more', 'biggallery' ); ?></a></p>
								<div class="hr margin_2line"></div>
							</div>
						<?php endwhile; ?>
						<?php get_template_part( 'inc/nav' ); ?>
			
					<?php else : ?>
						<h2 class="margin_1line"><?php _e( 'Nothing found', 'biggallery' ); ?></h2>
					<?php endif; ?>
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
