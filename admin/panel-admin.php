<?php
/**
 * This file includes the generation of HTML code admin panel, including all JS / CSS FILES to it necessary.
 * 
 * Learn More : http://codex.wordpress.org/AJAX
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
$sitepath = get_bloginfo('template_url');


if (is_admin()) {

    /*
     * Add a custom menu item to the WordPress admin menu, for a user with administrator capability
     */
    add_action('admin_menu', 'cc_panel_admin');
    function cc_panel_admin() {
        add_menu_page("C&C Options", "C&C Options", 'activate_plugins', "cc-panel-admin", "html_cc_panel_admin", null);
    }

    
   //Custom code for include Google Web Font.
    add_action('admin_head', 'cc_custom_admin_header');
    function cc_custom_admin_header() {
        echo '
              <link href=\'http://fonts.googleapis.com/css?family=Oswald\' rel=\'stylesheet\' type=\'text/css\'>
              ';
    }

}

/*
 * This function is the HTML callback of the options panel. 
 * Each page is seperate in a dedicated file and include in
 * this functions.
 */
function html_cc_panel_admin() {
    ?>


    <div class="wrap theme-options-page">

        <!--
        START PAGE ADMIN
        -->  
        <div id="cc-admin-container" class="wrap">

            <form action="" method="post" enctype="multipart/form-data">
                <div id="cc-admin-header">COLOR&CLEAN : OPTIONS PANEL 
                    <div style="margin:45px 0 -45px 0;font-size: 25px;">

                        <?php
                        //Check if there's a new version
                        $theme_data = wp_get_theme();
                        echo "Version : " . $theme_data->get('Version') . ' ';
                        if (get_option('cc-update-available') == 1) {
                            echo "<a target=_blank style='color:red;' href=" . $theme_data->get('ThemeURI') . ">Update available !</a>";
                        }
                        ?>

                        <div class="final-submit-admin">
                            Save Options
                        </div>
                        <div style="clear:both;"></div>
                    </div>

                </div>
                
                <div id="cc-contact-succes" style="display: none" >
                        <?php echo 'Options saved !'; ?>
                </div>

                <div id="cc-contact-error" style="display: none" >
                    <?php echo ('Sorry, there was an error when sending ;(') ?>
                </div>
                
                <div id="cc-admin-main-menu">
                    <!--
                    Navigation Menu
                    -->
                    <div id="cc-admin-navigation">
                        <ul>

                            <li class="generalsettings">
                                <span class='nav-menu current' title="General Settings" data-block="generalsettings">
                                    General Settings
                                </span>
                            </li>

                            <li class="blogoptions">
                                <span class='nav-menu' title="Blog Options" data-block="blogoptions" >
                                    Blog Options
                                </span>
                            </li>

                            <li class="portfoliooptions">
                                <span class='nav-menu' title="Contact Page" data-block="portfoliooptions" >
                                    Portfolio Options
                                </span>
                            </li>

                            <li class="contactpage">
                                <span class='nav-menu' title="Contact Page" data-block="contactpage" >
                                    Contact Page
                                </span>
                            </li>

                        </ul>
                    </div>
                    <div id="cc-admin-content">
                        <!--
                        Blocks of options
                        -->
                        <?php
                        include 'options/general-settings.php';
                        include 'options/blog-option.php';
                        include 'options/portfolio-option.php';
                        include 'options/contact-option.php';
                        ?>

                    </div>
                    <div class="clear"></div>
                </div>


            </form> 
            <div style="clear:both;"></div>
        </div>

        <!--END PAGE ADMIN--> 
    </div>  
    <?php
}
