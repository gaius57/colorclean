<?php
/**
 * HTML template for quote posts.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>


<!--
QUOTE POST
-->
<div class="cc-post">
    
    <span class="cc-portfolio-date"><?php the_date(); ?></span>
    
    <div class="cc-post-content">

        <!--Post block-->
        <div class="cc-post-quote">
            <div class="cc-post-quote-cirle"></div>   
            <blockquote>
                <?php
                the_content();
                echo '<div class="cc-post-quote-author">';
                echo get_post_meta($post->ID, 'cc_author_quotes', true);
                echo '</div>';
                ?>
            </blockquote>

        </div>
        <div style="clear:both;"></div>

