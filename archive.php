<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();
?>

<div class="cc-post">
    <div class="cc-post-content">
        <h1 style="margin: 0 0 50px 20px;">
            <?php if (is_day()) : ?>
                <?php printf(__('Daily Archives: %s', 'colorclean'), '<span>' . get_the_date() . '</span>'); ?>
            <?php elseif (is_month()) : ?>
                <?php printf(__('Monthly Archives: %s', 'colorclean'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'colorclean')) . '</span>'); ?>
            <?php elseif (is_year()) : ?>
                <?php printf(__('Yearly Archives: %s', 'colorclean'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'colorclean')) . '</span>'); ?>
            <?php else : ?>
                <?php _e(' Archives', 'twentyeleven'); ?>
            <?php endif; ?>

        </h1>
        
        <!--Start of the post loop--> 
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

                <!--THUMBNAIL-->
                <div class="cc-archive-post">
                    <div class="cc-archive-thumbnail">
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
                            the_post_thumbnail('cc-archive-thumbnail')
                            ?>
                    </div>
                    
                    <!--TITLE-->
                    <div class="cc-archive-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>
                    
                    <!--METAS-->
                    <div class="cc-archive-meta">
                        <?php
                        the_date('m/d/Y','',' | ');
                        $category = get_the_category();
                        echo $category[0]->cat_name.' | ';
                        comments_popup_link();
                        ?> 
                    </div>
                    
                    <!--EXCERPT-->
                    <div class="cc-archive-content">
                        <?php the_excerpt(); ?> 
                    </div>

                </div>

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
