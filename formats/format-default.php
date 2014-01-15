<?php
/**
 * HTML template for simple posts.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
BASIC POST
-->
<div class="cc-post">

    <!--Thumbnail of the post-->
<?php
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
    the_post_thumbnail('post-thumbnail');
    }
    ?>    

    <span class="cc-portfolio-date"><?php the_date(); ?></span>
    
    <div class="cc-post-content">

        
        <!--Title of the post-->
        <div class="cc-post-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </div>

        <!--Content of the post-->
        <div class="cc-post-txt">
           <?php the_content('READ MORE'); ?> 
            <div style="clear:both;"></div>
        </div>
        
        

        