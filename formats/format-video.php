<?php
/**
 * HTML template for video posts.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
VIDEO POST
-->
<div class="cc-post">
    
    <!--Video of the post-->
<?php $val = html_entity_decode(get_post_meta($post->ID, 'cc_video_url', true)); ?>   
    <div class="cc-video-container">
        <?php echo $val; ?>
    </div>

    <span class="cc-portfolio-date"><?php the_date(); ?></span>
    
    <div class="cc-post-content">

        <!--Title of the Video post-->
        <div class="cc-post-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </div>

        <!--Content of the Video post-->
        <div class="cc-post-txt">
           <?php the_content('READ MORE'); ?> 
            <div style="clear:both;"></div>
        </div>

        