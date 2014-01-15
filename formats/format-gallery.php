<?php
/**
 * HTML template for gallery posts.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
GALLERY POST
-->
<div class="cc-post">
    <div style="display: block;position: relative;max-width: 100%;height: auto;">
    <!--Gallery of the post-->
    <?php

    $val = get_post_meta($post->ID, 'cc_gallery_url', true);
    $val = split(",", $val);

    echo '<div id=gallery-' . get_the_ID() . '>
        ';
    foreach ($val as $key => $value) {
        echo '<div data-src="' . $value . '"></div>
            ';
    }
    echo '</div>';
    ?>  
    <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
    
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

