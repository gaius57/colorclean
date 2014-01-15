<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
get_header();
?>

<div id="container">
    <?php echo html_entity_decode(get_option('cc-404-message', '404 NOT FOUND')); ?>
</div>
</div>


<?php get_footer(); ?>


