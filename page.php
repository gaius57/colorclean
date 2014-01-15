<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();
?>


<div class="cc-post">
    <div class="cc-post-content">
        <!--Start of the post loop--> 
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?> 
                   

    <?php endwhile; ?>
        </div>
</div>
<?php else : ?>
    <?php include (TEMPLATEPATH . "/404.php"); ?>
<?php endif; ?>

<div id="cc-pagination">
    <?php base_pagination(); ?>
</div>
<?php get_footer(); ?>
