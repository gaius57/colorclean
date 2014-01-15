<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to colorclean_comment() which is
 * located in the comments-callback.php file.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>
<div id="comments">
    <?php if (post_password_required()) : ?>
        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'colorclean'); ?></p>
    </div><!-- #comments -->
    <?php
    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
endif;
?>

<?php // You can start editing here -- including this comment!  ?>
<div id="comments">
    <div id="cc-comment">

        <?php if (have_comments()) : ?>
            <h2 id="cc-comment-title">
                <?php comments_number(); ?>
            </h2>
            <div class="cc-comment-nav">
                <?php paginate_comments_links(); ?> 
            </div>

            <div class="liste-commentaires">
                <?php
                /* Loop through and list the comments. Tell wp_list_comments()
                 * to use colorclean_comment() to format the comments.
                 * If you want to overload this in a child theme then you can
                 * define colorclean_comment() and that will be used instead.
                 * See colorclean_comment() in colorclean/functions.php for more.
                 */
                wp_list_comments(array('callback' => 'colorclean_comment'));
                ?>
            </div>
            <div class="cc-comment-nav">
                <?php paginate_comments_links(); ?> 
            </div>
            <?php
            /* If there are no comments and comments are closed, let's leave a little note, shall we?
             * But we only want the note on posts and pages that had comments in the first place.
             */
            if (!comments_open() && get_comments_number()) :
                ?>
                <p class="nocomments"><?php _e('<h3>Comments are closed.</h3>', 'colorclean'); ?></p>
            <?php endif; ?>

        <?php endif; // have_comments() ?>

        <div id="formulaire-commentaire">
            <!--
                 COMMENT FORM
            -->

            <?php
            
//            http://codex.wordpress.org/Function_Reference/comment_form


            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $aria_req = ( $req ? " aria-required='true'" : '' );

            $fields = array(
                'author' => '<p class="comment-form-author"><label for="author">' . __('Name', 'domainreference') . '' . ( $req ? '<span class="required">*</span>' : '' ) . '</label> <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
                'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'domainreference') . '' . ( $req ? '<span class="required">*</span>' : '' ) . '</label> <input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
                'url' => '<p class="comment-form-url"><label for="url">' . __('Website', 'domainreference') . '</label><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
            );

            comment_form(
                    array(
                        //Here I change the fields in the table $fields.
                        'fields' => $fields,
                        //Here I change the text displayed after the form.
                        'comment_notes_before' => '',
                        //Here I change the text displayed before the form.
                        'comment_notes_after' => '',
                        //Then I change the value of the id attribute of the form. 
                        'id_form' => 'cc-comment-form',
                    )
            );
            ?>

        </div>
    </div>
</div><!-- #comments -->
<div id="clear-float"></div>
</div>