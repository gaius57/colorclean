<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();

$ifGallery = false;
global $galleryJS;
$GLOBALS['galleryJS'] = "<script type='text/javascript'>
                        jQuery(function(){";
?>

<!--Start of the post loop--> 
<?php if (have_posts()) : while (have_posts()) : the_post();

        if (has_post_format('quote')) {
            include (TEMPLATEPATH . '/formats/format-quote.php');
        } elseif (has_post_format('gallery')) {
            include (TEMPLATEPATH . '/formats/format-gallery.php');

            $GLOBALS['galleryJS'] .= "jQuery('#gallery-" . $post->ID . "').camera({
                                            loader: 'none',
                                            pagination: false,
                                            height: '";
            $gallery_height = get_post_meta($post->ID, 'cc_gallery_height', true);
            $gallery_time = get_post_meta($post->ID, 'cc_gallery_time', true);

            if ($gallery_height && $gallery_height != '') {
                $GLOBALS['galleryJS'] .= $gallery_height;
            } else {
                $GLOBALS['galleryJS'] .= '300';
            }

            $GLOBALS['galleryJS'] .= "',
                                       time: '";

            if ($gallery_time && $gallery_time != '') {
                $GLOBALS['galleryJS'] .= $gallery_time . "'";
            } else {
                $GLOBALS['galleryJS'] .= '3000';
                $GLOBALS['galleryJS'] .= "});
                    ";
            }
            $GLOBALS['galleryJS'] .= "});";

            $ifGallery = true;
        } elseif (has_post_format('audio')) {
            include (TEMPLATEPATH . '/formats/format-audio.php');
        } elseif (has_post_format('video')) {
            include (TEMPLATEPATH . '/formats/format-video.php');
        } else {
            include (TEMPLATEPATH . '/formats/format-default.php');
        }
        ?>

        <!--TAGS-->
        <?php
        if (get_option('cc-show-tags')) {
            if (get_the_tags()) {
                ?>
                <div class="cc-post-tags">
                    <div class="cc-post-tags-pic"></div>
                    <div class="cc-post-tags-txt" >
                        <?php the_tags('', ', ', null); ?>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <?php
            }
        }
        ?>
        <!--TAGS END-->


        <!--CATEGORIES-->
        <?php if (get_option('cc-show-category')) { ?>
            <div class="cc-post-meta" style="margin-top:20px">
                <div class="cc-post-meta-element"><?php the_category(', ') ?></div>
                <div style="clear: both"></div>
            </div>
            <?php
        }
        ?>
        <!--CATEGORIES END-->



        <!--AUTHOR-->
        <?php if (get_option('cc-show-authorbox')) { ?>
            <div class="cc-post-author">
                <div class="cc-post-author-gravatar">
                    <?php echo get_avatar(get_the_author_email(), '96'); ?>
                </div>
                <div class="cc-post-author-txt">
                    <h3 style="display: inline-block"><?php echo 'Post by <a href="mailto:' . get_the_author_email() . '">' . get_the_author() . '</a>' ?></h3><br>
                    <?php the_author_description(); ?>
                </div>
                <div style="clear: both"></div>
            </div>
            <?php
        }
        ?>
        <!--AUTHOR END-->

        <!--The Previous/Next box-->
        <?php if (get_option('cc-previous-next')) { ?>
            <div id="cc-previous-next">
                <?php
                $next_post = get_next_post();
                $previous_post = get_previous_post();

                if (!empty($next_post)):
                    ?>
                    <div id="cc-previous-post">
                        <a href="<?php echo get_permalink($next_post->ID); ?>">&larr; <?php echo $next_post->post_title; ?></a>
                    </div>
                    <?php
                endif;

                if (!empty($previous_post)):
                    ?>
                    <div id="cc-next-post">
                        <a href="<?php echo get_permalink($previous_post->ID); ?>"><?php echo $previous_post->post_title; ?> &rarr;</a>
                    </div>
                <?php endif;
                ?>
                <div style="clear: both"></div>
            </div>

            <?php
        }
        ?>
        <!--The Previous/Next box END-->


        <!--METAS of the post-->
        <?php comments_template(); ?>
        <div style="clear:both;"></div>
        </div>
        </div>

        <?php
    endwhile;
    $GLOBALS['galleryJS'].="});
                         </script>
                          ";
    if ($ifGallery)
        add_action('wp_footer', 'active_gallery');

    function active_gallery() {
        echo "<!--Launch Gallerys-->
             ";
        echo $GLOBALS['galleryJS'];
        echo "<!--END Launch Gallerys-->
             ";
    }
    ?>

<?php else : ?>
    <?php include (TEMPLATEPATH . "/404.php"); ?>
<?php endif; ?>


<?php get_footer(); ?>
