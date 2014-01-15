<?php
/**
 * HTML template for audio posts using Soundcould iframe.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
AUDIO POST
-->
<div class="cc-post">

    <!--Iframe of the post-->
    <?php
    $val = html_entity_decode(get_post_meta($post->ID, 'cc_audio_url', true));

    global $colorCSS;
    $color = get_option('cc-color');
    
    switch ($color) {
    case 'amber': $colorCSS = "f0a30a"; break;
    case 'brown': $colorCSS = "825a2c"; break;
    case 'cobalt': $colorCSS = "0050ef"; break;
    case 'crimson': $colorCSS = "a20025"; break;
    case 'cyan': $colorCSS = "1a9fe0"; break;
    case 'emerald': $colorCSS = "008a00"; break;
    case 'green': $colorCSS = "60a917"; break;
    case 'indigo': $colorCSS = "6a00ff"; break;
    case 'lime': $colorCSS = "a4c400"; break;
    case 'magenta': $colorCSS = "d80073"; break;
    case 'mauve': $colorCSS = "76608a"; break;
    case 'olive': $colorCSS = "6d8764"; break;
    case 'orange': $colorCSS = "fa6800"; break;
    case 'pink': $colorCSS = "f472d0"; break;
    case 'red': $colorCSS = "e51400"; break;
    case 'steel': $colorCSS = "647687"; break;
    case 'taupe': $colorCSS = "87794e"; break;
    case 'teal': $colorCSS = "00aba9"; break;
    case 'violet': $colorCSS = "aa00ff"; break;
    case 'yellow': $colorCSS = "e3c800"; break;
    default : $colorCSS = "1a9fe0"; break;
}
    
    
    
    
    if (strstr($val, "color=")) {
        $val = preg_replace("/color=(.*?)(&| |\")/", "color=$colorCSS&amp;", $val); //Adapt the color to the theme.
    } else {
        $pattern = "/<iframe(.*?)src=('|\")(.*?)('|\")(.*?)>/i";
        $val = preg_replace($pattern, "<iframe$1src=$2$3&amp;color=$colorCSS&amp;$4$5>", $val);  //Add the color to the theme.
    }
    echo $val;
    ?>

    <span class="cc-portfolio-date"><?php the_date(); ?></span>
    <div class="cc-post-content">

        <!--Title of the audio post-->
        <div class="cc-post-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </div>

        <!--Content of the audio post-->
        <div class="cc-post-txt">
           <?php the_content('READ MORE'); ?> 
            <div style="clear:both;"></div>
        </div>

