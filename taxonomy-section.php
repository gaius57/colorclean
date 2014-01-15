<?php
/**
 * The template used to display Section taxonomy Archive pages
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();

?>

<div class="cc-post">
    <div class="cc-post-content">
        
        <h1 style="margin: 0 0 50px 20px;">Section : <?php echo single_term_title('', false); ?></h1>

        <!--Start of the post loop-->
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>



                <div class="cc-archive-post">
                    
                    <!--THUMBNAIL-->
                    <div class="cc-archive-thumbnail">
                        <?php
                        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
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
                        the_date('m/d/Y');
                        $duration = get_post_meta($post->ID, 'cc_portfolio_working_time', true);
                        if ($duration) {
                            echo ' | Working Time : ' . $duration;
                        }
                        ?>  
                    </div>
                    
                    <!--EXCERPT-->
                    <div class="cc-archive-content">
                         <?php the_excerpt(); ?> 
                    </div>

                </div>


    <?php endwhile; ?>

<?php else : ?>
    <h3 style="margin-bottom:30px;">Sorry, their is no project in "<?php echo single_term_title('', false); ?>" section.</h3>
<?php endif; ?>
    
            </div>
</div>

<div id="cc-pagination">
<?php base_pagination(); ?>
</div>
<?php get_footer(); ?>