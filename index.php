<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */

get_header();

global $galleryJS;
$GLOBALS['galleryJS'] = "<script type='text/javascript'>
                        jQuery(function(){
                        ";
$ifGallery = false;


?>
<!--Start of the post loop-->
    <?php 
if (have_posts()) :while (have_posts()) : the_post();

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
                $GLOBALS['galleryJS'] .= $gallery_time."'";
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
        <!--METAS of the post-->
        <div class="cc-post-meta">
            <div class="cc-post-meta-element"><?php the_category(', ') ?></div>
            <div class="cc-post-meta-element"><?php comments_popup_link(); ?></div>
            <div class="cc-post-meta-element"><?php edit_post_link(); ?></div>
            <div style="clear:both;"></div>
        </div>
        </div></div><?php ?>
        <?php
    endwhile;
    $GLOBALS['galleryJS'].="});
                            </script>
                            ";

    if ($ifGallery)
        add_action('wp_footer', 'active_gallery');

    function active_gallery() {
        echo "<!--Launch Gallerys-->";
        echo $GLOBALS['galleryJS'];
        echo "<!--END Launch Gallerys-->";
    }

else :
    ?>
    <?php include (TEMPLATEPATH . "/404.php"); ?>
    <?php endif; ?>

<div id="cc-pagination">
<?php base_pagination(); ?>
</div>
<?php get_footer(); ?>
