<?php 

/**
 * Color&Clean functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 * 
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */

global $url;
$url = get_bloginfo('template_url');



require_once (TEMPLATEPATH.'/update_notifier.php');
require_once (TEMPLATEPATH.'/admin/cc-ajax.php');
require_once (TEMPLATEPATH.'/admin/panel-admin.php');
require_once (TEMPLATEPATH.'/functions/metaboxs.php');
require_once (TEMPLATEPATH.'/functions/portfolio-type.php');
require_once (TEMPLATEPATH.'/comments_callback.php');




/*
 * Scripts registering
 * 
 * wp_register_script : Registers a script file in WordPress to be linked to a page later
 * using the wp_enqueue_script() function, which safely handles the script dependencies. 
 * 
 * wp_enqueue_script : Links a script file to the generated page at the right time according to the script dependencies,
 * wp_enqueue_script : if the script has not been already included and if all the dependencies have been registered.
 */
wp_enqueue_script('jquery');

//Load of the CSS File for the chosen color.
if ((get_option('cc-color')) && (get_option('cc-color') != 'cyan')) {
    wp_register_style('cc_color_style', $GLOBALS['url'] . "/admin/css/style-" . get_option('cc-color') . ".css");  //Register a CSS file.
    if (!is_admin()) { // Limir none-admin pages.
        wp_enqueue_style('cc_color_style');  //Links a CSS file.
    }
}

//Scripts for the gallery jquery plugin.
wp_register_style('cc_camera_style',$GLOBALS['url']."/js/camera/css/camera.css");  //Register a CSS file.
wp_enqueue_style('cc_camera_style');  //Links a CSS file.
wp_register_script('cc_camera2',$GLOBALS['url']."/js/jquery.easing.1.3.js",'','',true);
wp_register_script('cc_camera3',$GLOBALS['url']."/js/camera/camera.min.js",'','',true);
wp_enqueue_script('cc_camera2');
wp_enqueue_script('cc_camera3');

wp_register_script('css3-mediaqueries',$GLOBALS['url']."/js/css3-mediaqueries.js",'','',true);
wp_enqueue_script('css3-mediaqueries');

wp_register_script('cc_picture_float',$GLOBALS['url']."/js/cc-picture-float.js",'','',true);
wp_enqueue_script('cc_picture_float'); 

wp_register_script('jquery_color',$GLOBALS['url']."/js/jquery.color.js",'','',true);
wp_enqueue_script('jquery_color');

wp_register_script('cc_mobile_menu',$GLOBALS['url']."/js/mobile-menu.js",'','',true);
wp_enqueue_script('cc_mobile_menu'); 

wp_register_script('cc_portfolio_load',$GLOBALS['url']."/js/portfolio_load.js",'','',true);
wp_enqueue_script('cc_portfolio_load');

wp_register_script('cc_form_contact',$GLOBALS['url']."/js/cc-form-contact.js",'','',true); 
wp_enqueue_script('cc_form_contact');

// if we're on a admin page
if(is_admin()){ 
    
    wp_register_script('cc_show_meta',get_bloginfo('template_url')."/admin/js/show-meta.js",'','',true);
    wp_enqueue_script('cc_show_meta');
    
    wp_register_script('cc_gallery_manager',get_bloginfo('template_url')."/admin/js/meta-gallery.js",'','',true);
    wp_enqueue_script('cc_gallery_manager');
    
    wp_register_style('cc_admin_style',$GLOBALS['url']."/admin/css/style-admin.css");  
    wp_enqueue_style('cc_admin_style');  
    
    wp_register_script('cc_options_save', $sitepath . "/admin/js/send-options.js", '', '', true);
    wp_enqueue_script('cc_options_save');
    
    wp_register_script('cc_admin_menu', $sitepath . "/admin/js/navmenu.js", '', '', true);
    wp_enqueue_script('cc_admin_menu');
    
}




/**
 * Displaying the contents of the option "Foot custom code"
 */
add_action('wp_footer','cc_get_custom_footer');
function cc_get_custom_footer(){
    echo html_entity_decode(get_option('cc-js-foot'));
}



/**
 * Displaying the contents of the option "Head custom code"
 */
add_action('wp_head','cc_get_custom_head');
function cc_get_custom_head(){
    echo html_entity_decode(get_option('cc-js-head'));
}



/*
 * Create pagination site based registered options
 * 
 * Default value : 5 for each page of the site.
 */
function custom_pagination( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        //Index
        $query->set( 'posts_per_page', get_option('cc-blog-number',5) );
        return;
    }
    
    if (is_category() ) {
        //Categories pages
        $query->set( 'posts_per_page', get_option('cc-category-number',5) );
        return;
    }
    
    if ( is_post_type_archive( 'portfolio' ) ) {
        // Portfolio
        $query->set( 'posts_per_page', get_option('cc-project-number',5) );
        return;
    }
    
    if (is_archive() ) {
        // Archives
        $query->set( 'posts_per_page', get_option('cc-archive-number',5) );
        return;
    }
    
    if (is_search() ) {
        // Search page.
        $query->set( 'posts_per_page', get_option('cc-search-number',5) );
        return;
    }
    
    
}
add_action( 'pre_get_posts', 'custom_pagination', 1 );




/*
 * Enable the thumbnails.
 */
if (function_exists('add_theme_support'))
    add_theme_support('post-thumbnails');




/*
 * Add custom size for the thumnails pictures.
 */
add_image_size('post-thumbnail', 900, 350, true);
add_image_size('cc-archive-thumbnail', 180, 150, true );




/**
 * Remove the height and width attribut of thumbnails 
 * @param type $html
 * @return type
 */
function remove_width_attribute($html) {
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}

add_filter('post_thumbnail_html', 'remove_width_attribute', 10);





/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
function base_pagination() {
    global $wp_query;
    
    $big = 999999999; // This needs to be an unlikely integer
    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
        'prev_text' => __('˂'),
        'next_text' => __('˃'),
            ));

    // Display the pagination if more than one page is found
    if ($paginate_links) {
        echo $paginate_links;
    }
}




/*
 * Enable support for menus
 */
add_theme_support('menus');
    




/*
 * Register of the widget ready footer
 */
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Footer',
        'before_widget' => '<div class="cc-footer-widget"><div class="cc-widget"><div id="%1$s">',
        'after_widget' => '</div></div></div>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
}




/*
 *  Allows a theme or plugin to register support of a certain theme feature. If called from a theme,
 *  it should be done in the theme's functions.php file to work. It can also be called from a plugin
 *  if attached to an action hook. 
 *  
 * The theme support the basics formats : Galleries, Quotes, Videos and Audio.
 */
add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio' ) );



/*
 * * Add a CSS class to all the linked pictures to create the hover effect of the mouse.
 */
function cc_zoom_picture($content) {
       $pattern ="/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
//       $replacement = '<a$1href=$2$3.$4$5 $6>$7</a>';
       $content = preg_replace($pattern, '<a$1href=$2$3.$4$5 $6>'.'<div>'.'$7'.'</div>'.'</a>', $content);
       echo $content;
}
//add_action('the_content', 'cc_zoom_picture');





/*
 * Fix the generation of pretty permalinks for the portfolio pagination.
 */
add_action( 'generate_rewrite_rules', 'fix_portfolio_pagination' );
function fix_portfolio_pagination( $wp_rewrite ) {
    unset($wp_rewrite->rules['portfolio/([^/]+)/page/?([0-9]{1,})/?$']);
    $wp_rewrite->rules = array(
        'portfolio/?$' => $wp_rewrite->index . '?post_type=portfolio',
        'portfolio/page/?([0-9]{1,})/?$' => $wp_rewrite->index . '?post_type=portfolio&paged=' . $wp_rewrite->preg_index( 1 ),
        'portfolio/([^/]+)/page/?([0-9]{1,})/?$' => $wp_rewrite->index . '?portfolio_category=' . $wp_rewrite->preg_index( 1 ) . '&paged=' . $wp_rewrite->preg_index( 2 ),
    ) + $wp_rewrite->rules;
}