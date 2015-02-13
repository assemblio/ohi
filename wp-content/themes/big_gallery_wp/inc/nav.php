<div class="navigation">
	<?php if(qtrans_getLanguage()=='en'): ?>
		<div class="next-posts"><?php next_posts_link( __( '&laquo; Older Entries', 'big_gallery' ) ) ?></div>
		<div class="prev-posts"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'big_gallery' ) ) ?></div>
	<?php endif; ?>

	<?php if(qtrans_getLanguage()=='sr'): ?>
		<div class="next-posts"><?php next_posts_link( __( '&laquo; Stariji Unosi', 'big_gallery' ) ) ?></div>
		<div class="prev-posts"><?php previous_posts_link( __( 'Novije Unosa &raquo;', 'big_gallery' ) ) ?></div>
	<?php endif; ?>

 	<?php if(qtrans_getLanguage()=='sq'): ?>
 		<div class="next-posts"><?php next_posts_link( __( '&laquo; Postimet m&euml; t&euml; vjet&euml;ra', 'big_gallery' ) ) ?></div>
		<div class="prev-posts"><?php previous_posts_link( __( 'Postime m&euml; t&euml; reja &raquo;', 'big_gallery' ) ) ?></div>
 	<?php endif; ?>
</div>