<?php
/**
 * The template for displaying Archive Porfolio pages.
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


<?php
if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <!--PROJECT <?php echo $post->ID ?>-->
        <div id="cc-portfolio-<?php echo $post->ID ?>">
            <div class="cc-portfolio">

                <!--THUMBNAIL-->
                <div class="cc-portfolio-thumbnail">
                    <?php
                    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
                        the_post_thumbnail('post-thumbnail');
                    ?>
                </div>

                <div class="cc-portfolio-more" data-id="<?php the_ID(); ?>"><h5 style="font-size: 40px;" >+</h5></div>

                <!--METAS-->
                <div class="cc-portfolio-meta">
                    <?php
                    echo get_the_term_list(get_the_ID(), 'section', 'Sections : ', ', ', '');
                    $duration = get_post_meta($post->ID, 'cc_portfolio_working_time', true);
                    if ($duration) {
                        echo '<br>Working Time : ' . $duration;
                    }
                    ?>
                </div>

                <!--CONTENT-->
                <div class="cc-portfolio-txt">
                    <h1 style="margin-bottom: 15px;"><?php the_title(); ?></h1>
                    <div class="cc-portfolio-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="cc-portfolio-content" style="display:none">
                        <div class="cc-post-txt">
                        <?php the_content('READ MORE'); ?> 
                            <div id="clear-float"></div>
                        </div>
                    </div>
                
                </div>
                <div class="cc-portfolio-option" >
                    <div class="cc-portfolio-option-element" ><?php edit_post_link(); ?></div>
                    <div id="clear-float"></div>
                </div>

            </div>
        </div>
    <?php endwhile; ?>

<?php else : ?>
    <?php include (TEMPLATEPATH . "/404.php"); ?>
<?php endif; ?>



<div id="cc-pagination">
<?php base_pagination(); ?>
</div>
<?php get_footer(); ?>
