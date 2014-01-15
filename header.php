<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="container">
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <title><?php bloginfo('name') ?><?php if (is_404()) : ?> ; <?php _e('Not Found') ?><?php elseif (is_home()) : ?> <?php else : ?><?php wp_title() ?><?php endif ?></title>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /> 
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,800' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Oswald:400' rel='stylesheet' type='text/css'>

                    <?php
                    /* We add some JavaScript to pages with the comment form
                     * to support sites with threaded comments (when in use).
                     */
                    if (is_singular() && get_option('thread_comments'))
                        wp_enqueue_script('comment-reply');

                    /* Always have wp_head() just before the closing </head>
                     * tag of your theme, or you will break many plugins, which
                     * generally use this hook to add elements to <head> such
                     * as styles, scripts, and meta tags.
                     */
                    wp_head();
                    ?>

                    </head>
                    <body>

                        <div style="clear:both;"></div>

                        <div id="cc-menu-mobile"></div>

                        <div id="cc-sitename">
                            <?php bloginfo('the_name'); ?>
                        </div>
                        
                        <div id="cc-nav-mobile">
                            <?php wp_nav_menu(); ?>
                        </div>

                        <div id="cc-menu">
                            <?php wp_nav_menu(); ?>
                            <div style="clear:both;"></div>
                        </div>

                        <div class="cc-searchform">
                            <form method="get" class="searchform" action="<?php bloginfo('home'); ?>/">
                                <input type="text" value="<?php the_search_query(); ?>" name="s" class="s" placeholder="What are you looking for? "/>
                            </form>
                        </div>

                        <div style="clear:both;"></div>

                        <div id="container">
                            

