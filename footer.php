<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>


<div class="cc-footer">
    <!--WIDGET FOOTER-->
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) :?>
    <?php endif; ?>

    <div style="clear:both;"></div>
</div>

</div><!-- #container -->


<?php
/* Always have wp_footer() just before the closing </body>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to reference JavaScript files.
 */

wp_footer();
?>



</body>
</html>
