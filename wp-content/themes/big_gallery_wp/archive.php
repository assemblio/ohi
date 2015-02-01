<?php get_header(); ?>
<?php
$blog_style = get_option( 'bg_blog_style' );
if ( is_category() ) {
	$archive_title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$archive_title = __( '', 'biggallery' ) . ' ' . single_tag_title( '', false );
} elseif ( is_day() ) {
	$archive_title = __( 'Archive for', 'biggallery' ) . ' ' . get_the_time( get_option( 'date_format' ) );
} elseif ( is_month() ) {
	$archive_title = __( 'Archive for', 'biggallery' ) . ' ' . get_the_time( 'F, Y' ); 
	$month = get_the_time( 'F, Y' );
} elseif ( is_year() ) { 
	$archive_title = __( 'Archive for', 'biggallery' ) . ' ' . get_the_time( 'Y' ); 
	$year = get_the_time( 'Y' ); 
} elseif ( is_author() ) {
	$archive_title = __( 'Author Archive', 'biggallery' ) . ' ' . get_get_the_author(); 
} elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { 
	$archive_title = __( 'Blog Archives', 'biggallery' );
} else {
	$archive_title = get_the_title();
}
?>

<!-- Menu show -->
<div id="menu-show"></div>
<div id="menu-hide"></div>

<!-- page content -->
<div id="page">
	<div class="big_header"><h1 class="big_header"><?php echo $archive_title; ?></h1></div>

	<?php if ( $blog_style == 'modern') : ?>
		<?php
		//MODERN BLOG
		$category = get_category( get_query_var( 'cat' ) );
		if ( isset( $category->term_id )) {
			$cat_id = $category->term_id;
		} else {
			$cat_id = 0;
		}
		$terms = get_categories(array('parent' => $cat_id));
		$count = count( $terms );

		?>
		<div class="submenu" id="portfolio-filter"><h3 class="arber"><?php qtrans_generateLanguageSelectCode('dropdown'); ?></h3></div>

		<?php
		//echo '<div class="submenu" id="portfolio-filter"><h3 class="arber">' . qtrans_generateLanguageSelectCode('dropdown'); '</h3>';
		//echo '<div class="submenu" id="portfolio-filter"><span class="custom_font" style="padding-right:6px"> <!-- HERE --></span>';
		//echo '<a href="#all" title="" class="custom_font"><!-- HERE --></a>&nbsp;';
		
		if ( $count > 0 ) {
			foreach ( $terms as $term ) {
				if ( $term->count ) {
					$termname = strtolower( $term->name );
					$termname = str_replace( ' ', '-', $termname);
					//echo '<a href="#' . $termname . '" title="" rel="' . $termname . '" class="custom_font">' . $term->name . '</a>';
				}
			}
		}
		//echo '</div>';
		?>
		<?php global $query_string; query_posts($query_string . "&order=DESC"); ?>
		<div class="scroll-pane">
			<div class="page_block">
				<ul class="portfolioblog margin_1line portfolio-list" id="portfolio-list">	
					<?php while (have_posts()) : the_post(); ?>
						<?php
						$terms = get_the_terms( $post->ID, 'category' );
						if ( $terms && ! is_wp_error( $terms ) ) :
							$links = array();
							foreach ( $terms as $term )
							{
								$links[] = $term->name;
							}
							$links = str_replace(' ', '-', $links);
							$tax = join( " ", $links );
						else :
							$tax = '';
						endif;
						?>
						<li class="<?php echo strtolower( $tax ); ?>">
							<div <?php post_class( 'blogitem' ); ?>>
								<?php the_post_thumbnail( 'pw-modern_blog_thumb' ); ?>
								<a href="<?php the_permalink() ?>" title="" class="overlay"></a>
								<div class="details">
									<div class="mblogtitle"><h5><?php the_title(); ?></h5></div>
									<div class="mblogauthor"><?php //echo get_the_date(); ?> <?php //_e( 'by', 'biggallery' ); ?> <?php //echo get_the_author(); ?></div>
									<div class="mblogdesc">
										<p><?php //the_excerpt(); ?></p>
									</div>
								</div>		
								<div class="mblogfooter"><a href="<?php the_permalink() ?>" class="butt custom_font"><?php _e( 'see more', 'biggallery' ); ?></a></div>
							</div>
						</li>
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
				<?php get_template_part( 'inc/nav' ); ?>

	<?php else : ?>
		<?php
		if ( $blog_style == 'classic-left') {
			$sidebar_float = 'left';
			$content_float = 'right';
		} else {
			$sidebar_float = 'right';
			$content_float = 'left';
		}
		?>
		<div class="submenu"></div>
		<div class="scroll-pane">
			<div class="page_block">
				<div class="column_cont">		
					<div id="posts" class="two-third classicblog2_<?php echo $content_float; ?>">
						<?php if ( have_posts() ) : ?>
							<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
							<?php /* If this is a category archive */ if ( is_category() ) { ?>
								<h2 class="margin_1line"><?php _e( 'Archive for the', 'biggallery' ); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e( 'Category', 'biggallery' ); ?></h2>
							<?php /* If this is a tag archive */ } elseif ( is_tag() ) { ?>
								<h2 class="margin_1line"><?php _e( '', 'biggallery' ); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
							<?php /* If this is a daily archive */ } elseif ( is_day() ) { ?>
								<h2 class="margin_1line"><?php _e( 'Archive for', 'biggallery' ); ?> <?php the_time( get_option( 'date_format' ) ); ?></h2>
							<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
								<h2 class="margin_1line"><?php _e( 'Archive for', 'biggallery' ); ?> <?php echo $month; ?></h2>
							<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
								<h2 class="pagetitle margin_1line"><?php _e( 'Archive for', 'biggallery' ); ?> <?php echo $year; ?></h2>
							<?php /* If this is an author archive */ } elseif ( is_author( )) { ?>
								<h2 class="pagetitle margin_1line"><?php _e( 'Author Archive', 'biggallery' ); ?> <?php the_author(); ?></h2>
							<?php /* If this is a paged archive */ } elseif ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { ?>
								<h2 class="pagetitle margin_1line"><?php _e( 'Blog Archives', 'biggallery' ); ?></h2>	
							<?php } ?>
							<?php while ( have_posts()) : the_post(); ?>
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
									<p class="margin_1line"><a href="<?php the_permalink() ?>#more-<?php the_ID() ?>" class="butt custom_font"><?php _e( 'read more', 'biggallery' ); ?></a></p>
									<div class="hr margin_2line"></div>
								</div>
							<?php endwhile; ?>
							<?php get_template_part( 'inc/nav' ); ?>
			
						<?php else : ?>
							<h2><?php _e( 'Nothing found', 'biggallery' ); ?></h2>
						<?php endif; ?>
					</div>
					<div class="one-third classicblog_<?php echo $sidebar_float; ?>">
						<?php get_sidebar(); ?>
					</div>
				</div><!-- column_cont div end -->
				<div class="clear"></div>
	<?php endif; ?>
			</div><!-- page-block div end -->
			<div class="page-footer"><?php echo stripslashes( get_option( 'bg_copyrights' ) ); ?></div>
		</div><!-- scroll-pane div end -->
	</div><!-- page div end -->
					
<?php get_footer(); ?>