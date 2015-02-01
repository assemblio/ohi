<?php get_header(); ?>

<!-- Menu show -->
<div id="menu-show"></div>
<div id="menu-hide"></div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- page content -->
	<div id="page">
		<div class="big_header"><h1 class="big_header"><?php the_title(); ?></h1></div>
		<div class="submenu" id="portfolio-filter"><h3 class="arber"><?php qtrans_generateLanguageSelectCode('dropdown'); ?></h3></div>
		<div class="scroll-pane">
			<div class="page_block">
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="entry">
						<?php the_content(); ?>
						<div class="clear"></div>
						<?php wp_link_pages( array( 'before' => __( 'Pages: ', 'biggallery' ), 'next_or_number' => 'number' ) ); ?>
					</div>
					<?php edit_post_link( __( 'Edit this entry.', 'biggallery' ), '<p>', '</p>' ); ?>
				</div>
			</div><!-- page-block div end -->
			<div class="page-footer"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></div>
		</div><!-- scroll-pane div end -->
	</div><!-- page div end -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>
