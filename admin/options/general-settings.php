<?php
/**
 * The HTML template for displaying General Options.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */

$color = get_option('cc-color','cyan');
?>

<!--
General Options
-->

<div id="generalsettings" class="group selectedBlock">

    <div class="cc-admin-option">
        <h3 class="option-title">
            Color of the site :
        </h3>
        <div class="option">
            <div class="explain" style="text-align: center;">
                Choose a color for the appearance of the site.
            </div>
            <div class="cc-action">
                <div class="cc-color-option">      
                    <input type="radio" name="cc-color" value="lime" id="lime" <?php if ($color == "lime"):echo 'checked="checked"';
endif; ?>>
                    <label for="lime" style="background-color:#a4c400;"></label>

                    <input type="radio" name="cc-color" value="green" id="green" <?php if ($color == "green"):echo 'checked="checked"';
endif; ?>>
                    <label for="green" style="background-color:#60a917;"></label>

                    <input type="radio" name="cc-color" value="emerald" id="emerald" <?php if ($color == "emerald"):echo 'checked="checked"';
endif; ?>>
                    <label for="emerald" style="background-color:#008a00;"></label>

                    <input type="radio" name="cc-color" value="teal" id="teal" <?php if ($color == "teal"):echo 'checked="checked"';
endif; ?>>
                    <label for="teal" style="background-color:#00aba9;"></label>    
                    <br>
                    <input type="radio" name="cc-color" value="cyan" id="cyan" <?php if ($color == "cyan"):echo 'checked="checked"';
endif; ?>>
                    <label for="cyan" style="background-color:#1ba1e2;"></label>

                    <input type="radio" name="cc-color" value="cobalt" id="cobalt" <?php if ($color == "cobalt"):echo 'checked="checked"';
endif; ?>>
                    <label for="cobalt" style="background-color:#0050ef;"></label>

                    <input type="radio" name="cc-color" value="indigo" id="indigo" <?php if ($color == "indigo"):echo 'checked="checked"';
endif; ?>>
                    <label for="indigo" style="background-color:#6a00ff;"></label>

                    <input type="radio" name="cc-color" value="violet" id="violet" <?php if ($color == "violet"):echo 'checked="checked"';
endif; ?>>
                    <label for="violet" style="background-color:#aa00ff;"></label>    
                    <br>
                    <input type="radio" name="cc-color" value="pink" id="pink" <?php if ($color == "pink"):echo 'checked="checked"';
endif; ?>>
                    <label for="pink" style="background-color:#f472d0;"></label>

                    <input type="radio" name="cc-color" value="magenta" id="magenta" <?php if ($color == "magenta"):echo 'checked="checked"';
endif; ?>>
                    <label for="magenta" style="background-color:#d80073;"></label>

                    <input type="radio" name="cc-color" value="crimson" id="crimson"  <?php if ($color == "crimson"):echo 'checked="checked"';
endif; ?>>
                    <label for="crimson" style="background-color:#a20025;"></label>

                    <input type="radio" name="cc-color" value="red" id="red" <?php if ($color == "red"):echo 'checked="checked"';
endif; ?>>
                    <label for="red" style="background-color:#e51400;"></label>
                    <br>
                    <input type="radio" name="cc-color" value="orange" id="orange" <?php if ($color == "orange"):echo 'checked="checked"';
endif; ?>>
                    <label for="orange" style="background-color:#fa6800;"></label>

                    <input type="radio" name="cc-color" value="amber" id="amber" <?php if ($color == "amber"):echo 'checked="checked"';
endif; ?>>
                    <label for="amber" style="background-color:#f0a30a;"></label>

                    <input type="radio" name="cc-color" value="yellow" id="yellow"  <?php if ($color == "yellow"):echo 'checked="checked"';
endif; ?>>
                    <label for="yellow" style="background-color:#e3c800;"></label>

                    <input type="radio" name="cc-color" value="brown" id="brown" <?php if ($color == "brown"):echo 'checked="checked"';
endif; ?>>
                    <label for="brown" style="background-color:#825a2c;"></label>
                    <br>
                    <input type="radio" name="cc-color" value="olive" id="olive" <?php if ($color == "olive"):echo 'checked="checked"';
endif; ?>>
                    <label for="olive" style="background-color:#6d8764;"></label>

                    <input type="radio" name="cc-color" value="steel" id="steel" <?php if ($color == "steel"):echo 'checked="checked"';
endif; ?>>
                    <label for="steel" style="background-color:#647687;"></label>

                    <input type="radio" name="cc-color" value="mauve" id="mauve"  <?php if ($color == "mauve"):echo 'checked="checked"';
endif; ?>>
                    <label for="mauve" style="background-color:#76608a;"></label>

                    <input type="radio" name="cc-color" value="taupe" id="taupe" <?php if ($color == "taupe"):echo 'checked="checked"';
endif; ?>>
                    <label for="taupe" style="background-color:#87794e;"></label>
                </div>
            </div>
            
            <div class="clear"></div>
        </div>
    </div>  


    <div class="cc-admin-option cc-admin-option-textarea ">
        <h3 class="option-title">
            Custom "404 not found" message :
        </h3>
        <div class="option">
            <div class="explain">
                The message will appear on the "404 not found" page.
            </div>
            <div class="cc-action">
                <textarea class="cc-input" rows="8"  name="cc-404-message" id="cc-js-foot"><?php echo get_option('cc-404-message') ?></textarea> 
            </div>
            
            <div class="clear"></div>
        </div>
    </div>  

    <div class="cc-admin-option cc-admin-option-textarea ">
        <h3 class="option-title">
            Head custom code :
        </h3>
        <div class="option">
            <div class="explain">
                This custom code will be placed between the HEAD markups.
            </div>
            <div class="cc-action">
                <textarea class="cc-input" rows="8"  name="cc-js-head" id="cc-js-foot"><?php echo get_option('cc-js-head') ?></textarea> 
            </div>
            
            <div class="clear"></div>
        </div>
    </div>  

    <div class="cc-admin-option cc-admin-option-textarea ">
        <h3 class="option-title">
            Foot custom code :
        </h3>
        <div class="option">
            <div class="explain">
                This custom code will be placed between the FOOTER markups.
            </div>
            <div class="cc-action">
                <textarea class="cc-input" rows="8"   name="cc-js-foot" id="cc-js-foot"><?php echo get_option('cc-js-foot') ?></textarea> 
            </div>
            
            <div class="clear"></div>
        </div>
    </div> 
    
    <div class="cc-admin-option">
        <h3 class="option-title">
            Post per archive page :
        </h3>
        <div class="option">
            <div class="explain">
                Define the number of post you want to see on archives pages of blog,portfolio,...(Default: 5)
            </div>
            <div class="cc-action">
                <input class="cc-input" type="number" value="<?php echo get_option('cc-archive-number') ?>"  name="cc-archive-number" id="cc-archive-number" />
            </div>

            <div class="clear"></div>
        </div>
    </div>
    
    <div class="cc-admin-option">
        <h3 class="option-title">
            Post per category page :
        </h3>
        <div class="option">
            <div class="explain">
                Define the number of post you want to see on categories pages of blog,portfolio,...(Default: 5)
            </div>
            <div class="cc-action">
                <input class="cc-input" type="number" value="<?php echo get_option('cc-category-number') ?>"  name="cc-category-number" id="cc-category-number" />
            </div>

            <div class="clear"></div>
        </div>
    </div>
    
    <div class="cc-admin-option">
        <h3 class="option-title">
            Results per search page :
        </h3>
        <div class="option">
            <div class="explain">
                Define the number of results you want to see on search page.(Default: 5)
            </div>
            <div class="cc-action">
                <input class="cc-input" type="number" value="<?php echo get_option('cc-search-number') ?>"  name="cc-search-number" id="cc-search-number" />
            </div>

            <div class="clear"></div>
        </div>
    </div>

</div>