<?php get_header(); ?>
<?php 
$blog_style = get_option( 'bg_blog_style' );
if ( $blog_style == 'modern' ) {
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
	<div class="submenu" id="portfolio-filter"><h3 class="arber"><?php qtrans_generateLanguageSelectCode('dropdown'); ?></h3></div>
	<div class="scroll-pane">
		<div class="page_block">
			<div class="column_cont">		
				<div id="posts" class="two-third classicblog2_<?php echo $content_float; ?>">
	
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<h2 id="title-post-<?php the_ID(); ?>" class="margin_1line"><a href="<?php the_permalink() ?>" class="hover_link_light"><?php the_title(); ?></a></h2>
						<?php get_template_part( 'inc/meta' ); ?>
						<!-- Removed code here Find it in RemovedCode.txt-->
						
						<!-- Here ends Removed Code -->

						<div class="entry margin_1line">
							<?php the_content(); ?>
							<div class="clear"></div>
							<?php wp_link_pages( array( 'before' => __( 'Pages: ', 'biggallery' ), 'next_or_number' => 'number' ) ); ?>
							<div class="margin_1line"><?php the_tags( __( 'Tags: ', 'biggallery' ), ' ', ''); ?></div>
						</div>
						<?php edit_post_link( 'Edit this entry', '', '.' ); ?>
					</div>

					<?php //comments_template(); ?>
				<?php endwhile; endif; ?>

				</div>
				<div class="one-third classicblog_<?php echo $sidebar_float; ?>">
					
					<?php 
					if (in_category('Transcripts')) { 
					 	}else{ 
					 		get_sidebar(); 

						 } ?>
				</div>
			</div><!-- column_cont div end -->
			<div class="clear"></div>
		</div><!-- page-block div end -->
		<div class="page-footer"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></div>
	</div><!-- scroll-pane div end -->
</div><!-- page div end -->
	
<?php get_footer(); ?>