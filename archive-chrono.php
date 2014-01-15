<?php
/*
 * Template Name: Archive C&C
 * Description: A Page Template which displays a ranking of posts by date and category
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */

get_header();

function post_per_page($query) {
    $query->set('posts_per_page', '5');
    return;
}

add_action('pre_get_posts', 'post_per_page', 1);
?>

<div class="cc-post">    

    <div class="cc-post-content">
        <!--Start of the post loop--> 
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
                <h3><?php the_content(); ?></h3>
            <?php endwhile; ?>
        <?php endif; ?>

        <h2 style="margin-left: 3%;margin-top: 25px;">Archives</h2>

        <div class="cc-archive-block">
            <div class="cc-archive-list-left">
                <div class="cc-archive-monthly">
                    <h2 style="border:none">by month</h2>
                    <!--MONTHLY-->
                    <?php wp_get_archives(array('type' => 'monthly', 'limit' => 12)); ?>
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="cc-archive-list-right">
                <div class="cc-archive-category">
                    <!--BY CATEGORIES-->
                    <?php wp_list_categories('title_li=<h2 style="border:none">by ' . __('categories') . '</h2>'); ?> 
                </div>
                <div style="clear:both;"></div>
            </div>

            <div class="cc-archive-list-center">
                <div class="cc-archive-yearly">
                    <!--YEARLY-->
                    <h2 style="border:none">by year</h2>
                    <?php wp_get_archives(array('type' => 'yearly')); ?>
                </div>  
            </div>

            <div style="clear:both;"></div>
        </div>
        
        <!--LAST 5 POST-->
        <h2 style="margin-left: 3%">The last 5 posts</h2>
        <?php query_posts('posts_per_page=5') ?>
        <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

                <div class="cc-archive-post">
                    <div class="cc-archive-thumbnail">
                        <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail()))
                            the_post_thumbnail('cc-archive-thumbnail')
                            ?>
                    </div>
                    <div class="cc-archive-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="cc-archive-meta">
                        <?php
                        the_date('m/d/Y', '', ' | ');
                        $category = get_the_category();
                        echo $category[0]->cat_name . ' | ';
                        comments_popup_link();
                        ?>  
                    </div>
                    <div class="cc-archive-content">
                        <?php the_excerpt(); ?> 
                    </div>

                </div>

            <?php endwhile; ?>
        <?php else : ?>
            <?php echo "Aucun article à afficher" ?>
        <?php endif; ?>



    </div>
</div>

<?php get_footer(); ?>
