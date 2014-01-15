<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();

?>

<div class="cc-post">
    <div class="cc-post-content">
        
        <h1 style="margin: 0 0 50px 20px;">Category : <?php echo single_cat_title( '', false ); ?></h1>
        <!--Start of the post loop-->
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

                <!--POST-->
                <div class="cc-archive-post">
                    
                    <!--THUMBNAIL-->
                    <div class="cc-archive-thumbnail">
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
                            the_post_thumbnail('cc-archive-thumbnail')
                            ?>
                    </div>
                    
                    <!--TITLE-->
                    <div class="cc-archive-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>
                    
                    <!--META-->
                    <div class="cc-archive-meta">
                        <?php
                        the_date('m/d/Y','',' | ');
                        comments_popup_link();
                        ?> 
                    </div>
                    
                    <!--EXCERPT-->
                    <div class="cc-archive-content">
                        <?php the_excerpt(); ?> 
                    </div>

                </div>


    <?php endwhile; ?>
        </div></div>
<?php else : ?>
    <?php include (TEMPLATEPATH . "/404.php"); ?>
<?php endif; ?>

<div id="cc-pagination">
    <?php base_pagination(); ?>
</div>
<?php get_footer(); ?>
