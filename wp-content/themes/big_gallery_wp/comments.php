<?php

if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] )) {
	die ( __( 'Please do not load this page directly. Thanks!', 'biggallery' ));
}
if ( post_password_required() ) { 
		 _e( 'This post is password protected. Enter the password to view comments.', 'biggalery' );
	
		return;
	}
?>
<div class="hr margin_2line"></div>
<?php if ( have_comments() ) : ?>
	<h2 id="comments" class="margin_2line margin_bottom_1line"><?php comments_number( __( 'No Responses', 'biggallery' ), __( 'One Response', 'biggallery' ), __( '% Responses', 'biggallery' ) );?></h2>
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	<ol class="commentlist">
		<?php wp_list_comments( array( 'avatar_size' => 80, 'reply_text' => __( 'Reply', 'biggallery' ), 'callback' => 'bg_comment', 'max_depth' => 3 ) ); ?>
	</ol>
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
<?php else : ?>
	<?php if ( comments_open() ) : ?>
	<?php else : // comments are closed ?>
		<p><?php _e( 'Comments are closed.', 'biggallery' ); ?></p>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
	<?php comment_form(); ?>

<div class="clear"></div>	

<?php endif; ?>
