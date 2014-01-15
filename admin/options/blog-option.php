<?php
/**
 * The HTML template for displaying Blog options.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
Blog Options
-->

<div id="blogoptions" class="group">
    <h2>
        Blog Settings
    </h2>
    <div class="cc-admin-option">
        <h3 class="option-title">
            Post per page :
        </h3>
        <div class="option">
            <div class="explain">
                Define the number of post you want to see on one page of the blog.(Default: 5)
            </div>
            <div class="cc-action">
                <input class="cc-input" type="number" value="<?php echo get_option('cc-blog-number') ?>"  name="cc-blog-number" id="cc-blog-number" />
            </div>

            <div class="clear"></div>
        </div>
    </div>


    <div class="cc-admin-option" style="text-align: center;">
        <h3 class="option-title">
            Show Tags :
        </h3>
        <div class="option">
            <div class="explain">
                Show or hide tags on the blog page.
            </div>
            <div class="cc-action">
                <input type="hidden" name="cc-show-tags" value="" />
                <input  type="checkbox" name="cc-show-tags" id="cc-show-tags" value="1" <?php checked(1 == get_option('cc-show-tags')); ?> />
                <label for="cc-show-tags" ></label>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="cc-admin-option" style="text-align: center;">
        <h3 class="option-title">
            Show Category :
        </h3>
        <div class="option">
            <div class="explain">
                Show or hide category on the blog page.
            </div>
            <div class="cc-action">
                <input type="hidden" name="cc-show-category" value="" />
                <input  type="checkbox" name="cc-show-category" id="cc-show-category" value="1" <?php checked(1 == get_option('cc-show-category')); ?> />
                <label for="cc-show-category" ></label>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="cc-admin-option" style="text-align: center;">
        <h3 class="option-title">
            Show Author Box :
        </h3>
        <div class="option">
            <div class="explain">
                Show or hide the author box on single post page.
            </div>
            <div class="cc-action">
                <input type="hidden" name="cc-show-authorbox" value="" />
                <input  type="checkbox" name="cc-show-authorbox" id="cc-show-authorbox" value="1" <?php checked(1 == get_option('cc-show-authorbox')); ?>/>
                <label for="cc-show-authorbox" ></label>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="cc-admin-option" style="text-align: center;">
        <h3 class="option-title">
            Show Previous/Next post :
        </h3>
        <div class="option">
            <div class="explain">
                Show or hide links for previous/next post on single post page.
            </div>
            <div class="cc-action">
                <input type="hidden" name="cc-previous-next" value="" />
                <input  type="checkbox" name="cc-previous-next" id="cc-previous-next" value="1" <?php checked(1 == get_option('cc-previous-next')); ?>/>
                <label for="cc-previous-next" ></label>
            </div>

            <div class="clear"></div>
        </div>
    </div> 
</div>

