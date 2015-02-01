<div id="sidebar">
	<div class="clear margin_2line"></div>
    <?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Sidebar Widgets' )) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
		<h2 class="margin_1line"><?php _e('Search','biggallery'); ?></h2>
    	<?php get_search_form(); ?>
		<div class="clear"></div>
    
    	<h2 class="margin_1line"><?php _e( 'Archives', 'biggallery'); ?></h2>
    	<ul>
    		<?php wp_get_archives( 'type=monthly' ); ?>
    	</ul>
        <h2><?php _e( 'Categories', 'biggallery' ); ?></h2>
        <ul>
    	   <?php wp_list_categories( 'show_count=1&title_li=' ); ?>
        </ul>

    	<?php wp_list_bookmarks(); ?>
    
    	<h2><?php _e( 'Meta', 'biggallery' ); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="<?php _e( 'Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'biggallery' ); ?>"><?php _e( 'WordPress', 'biggallery' ); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	
    	<h2><?php _e( 'Subscribe', 'biggallery' ); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo( 'rss2_url' ); ?>"><?php _e( 'Entries (RSS)', 'biggallery' ); ?></a></li>
    		<li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>"><?php _e( 'Comments (RSS)', 'biggallery' ); ?></a></li>
    	</ul>
	
	<?php endif; ?>

</div>