<?php
/**
 * The HTML template for displaying Portfolio Options.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
Porfolio Options
-->

<div id="portfoliooptions" class="group">
    <h2>
        Portfolio Options
    </h2>

    <div class="cc-admin-option">
        <h3 class="option-title">
            Project per page :
        </h3>
        <div class="option">
            <div class="explain">
                Define the number of project you want to see on one page of the blog.(Default: 5)
            </div>
            <div class="cc-action">
                <input class="cc-input" type="text" value="<?php echo get_option('cc-project-number') ?>"  name="cc-project-number" id="cc-project-number" />
            </div>
            
            <div class="clear"></div>
        </div>
    </div>
    
</div>