<?php
/**
 * The Template for displaying portfolio single posts.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();
?>

    <!--Start of the post loop--> 
    <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>


            <div id="cc-post">

                <!--Thumbnail-->
                <?php
                if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                    the_post_thumbnail('post-thumbnail');
                }
                ?>    
                
                <div id="cc-post-content">
                    
                    <!--Title-->
                    <div id="cc-post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>

                    <!--Content-->
                    <?php the_content('READ MORE'); ?>
                    <div id="clear-float"></div>
                    
                    <?php comments_template(); ?>
                </div>
                
            </div>
        <?php endwhile; ?>

    
    
    <?php else : ?>
        <?php include (TEMPLATEPATH . "/404.php"); ?>
    <?php endif; ?>
    

<?php get_footer(); ?>
