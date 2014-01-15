<?php

/**
 * The callback for displaying Comments.
 *
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */

/**
  * Our function takes three parameters:
  * - The comments to display (an object that contains the title, content etc.)
  * - An array of various arguments as the maximum depth of response, the size of the avatar ...
  * You can use this table for more control over certain aspects of the display.
  * - The current depth of response
  */

function colorclean_comment($comment, $args, $depth) {

    /**
      * This assignment allows you to use functions such as comment_text ()
      * comment_title (etc.) which use the global 'how'.
      */
    
    $GLOBALS['comment'] = $comment;
    ?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
           
                <div id="cc-comment-avatar">
                        <?php
                        if (function_exists('get_avatar')) {
                            /**
                              * If get_avatar () function exists (WordPress 3.x), it is used to display your avatar.
                              * It accepts two parameters:
                              * - Email author
                              * - The size of the avatar
                              */
                            echo get_avatar($comment->comment_author_email, $args['avatar_size']);
                        } else {
                            /**
                              * For older versions, you go to the old!
                              * We construct the URL of the avatar with the email md5 lowercase default image (s) and size (s).
                              * Then, an image with this Url to source is displayed.
                              */
                            $gravatar = "http://www.gravatar.com/avatar/" . md5(strtolower($comment->comment_author_email)) . '?d=mm&s=' . $args['avatar_size'];
                            echo '<img src="' . $gravatar . '" alt="avatar de l\'auteur" />';
                        }
                        ?>
                </div>
            
                <div id="cc-comment-txt">
                        <!-- Header comment -->
                        <div id="cc-head-comment">

                            <!-- Name of the author with a link to his site -->
                            <div id="cc-comment-author"><?php echo comment_author_link(); ?></div>
                            
                            <!-- Metas of the comment -->
                            <span id="cc-comment-meta">
                                <?php comment_time(get_option('date_format')); ?> at 
                                <?php comment_time(get_option('time_format')); ?>
                                <?php edit_comment_link('Edit', ' | '); ?>
                            </span>
                        </div>

                        <div id="cc-comment-content">
                            <?php
                            /**
                             * If the comment is not yet approved, it displays a small message, if not its content.
                             */
                            if ($comment->comment_approved == '0') {
                                echo '<em>Your comment is awaiting moderation.</em>';
                            } else {
                                comment_text();
                            }
                            ?>
                        </div>

                        <div id="cc-comment-reply">
                            <!--
                                 Link reply to comment
                            -->
                                <?php comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'])); ?>
                        </div >
                  </div >
                  <div id="clear-float"></div>
        <?php
    }