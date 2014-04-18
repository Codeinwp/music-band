<?php
/*
 * The template for displaying Comments.
 * @package cwp
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
	<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
        <div class="comments_headline"><?php comments_number( 'No Comments', 'Comments (1)', 'Comments(%)' ); ?></div>
			<?php
				wp_list_comments('callback=cwp_comment');
			?>
		<div class="navigation">
			<?php 
			  paginate_comments_links( array('prev_text' => 'prev', 'next_text' => 'next')); 
			?>
		</div>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'cwp' ); ?></p>
	<?php endif; ?>
	<?php
	$comments_args = array(
            // change the title of send button 
            'label_submit'=>'Submit',
            'comment_notes_before' => '',
            // remove "Text or HTML to be displayed after the set of comment fields"
            'comment_notes_after' => '',
            // redefine your own textarea (the comment body)
            'comment_field' => '<textarea id="comment" name="comment"></textarea>',
        
            'fields' => array(
            'author' => '<div class="fields"><p>' . '<label for="author"><span>' . __( 'Name*', 'cwp' ) . '</span><input class="field" id="author" name="author" type="text" value="" /> ' . '</p>'. '</label> ',
            'email' => '<p>'.'<label for="email"><span>' . __( 'Email*', 'cwp' ) . '</span><input class="field" id="email" name="email" type="text" value="" />' . '</p>'.'</label> ',
            'url' => '<p>'.'<label for="url"><span>' . __( 'URL', 'cwp' ) . '</span><input class="field" id="url" name="url" type="text" value="" />'. '</p>'. '</label>'. '</div>',
        ),
    );
 
	comment_form($comments_args);
	?>
</div><!-- #comments -->
