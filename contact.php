<?php
/*
 * Template Name: Contact C&C
 * Description: A Page Template which displays the contact infos.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */

$address = get_option('cc-contact-adress');
$phone = get_option('cc-contact-phone');
$mail = get_option('cc-contact-email');
$url = get_option('cc-contact-url');
$facebook = get_option('cc-contact-fb');
$twitter = get_option('cc-contact-twitter');
$googlep = get_option('cc-contact-google');
$linkedin = get_option('cc-contact-linkedin');
$skype = get_option('cc-contact-skype');
$youtube = get_option('cc-contact-youtube');

$templateURL = get_bloginfo('template_url');

get_header();


?>

<div id="cc-contact-succes" style="display: none; <?php if (is_admin_bar_showing() ) { echo "top:27px;" ;} ?>" >
    <?php echo get_option('cc-contact-confirm', 'Your message has been sent successfully ;)') ?>
</div>

<div id="cc-contact-error" style="display: none; <?php if ( current_user_can('manage_options') ) { echo "top:27px;" ;} ?>" >
    <?php echo ('Sorry, there was an error when sending ;(') ?>
</div>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        

        <div class="cc-post">
            <div class="cc-place-container">
                <!--MAP-->
                <?php echo html_entity_decode(get_option('cc-contact-map')); ?>   


            </div>

            <div class="cc-post-content">

                <!--TITLE-->
                <div class="cc-post-title">
                    <?php the_title(); ?>
                </div>

                <!--CONTENT-->
                <?php the_content('READ MORE'); ?>
                <div style="clear:both;"></div>

                <!--CONTACT INFOS-->
                <div id="cc-bloc-contact">
                    <div class="cc-contact-columns-l">
                        <h2 style="margin-bottom: 15px;">Contact</h2>
                        <?php
                        if ($address) {
                            echo '<div class="cc-coord-element">';
                            echo '<div id="cc-contact-address"></div>';
                            echo '<div class="cc-coord-txt">';
                            echo $address;
                            echo '</div></div>';
                        }
                        if ($phone) {
                            echo '<div class="cc-coord-element">';
                            echo '<div id="cc-contact-phone"></div>';
                            echo '<div class="cc-coord-txt">';
                            echo $phone;
                            echo '</div></div>';
                        }
                        if ($mail) {
                            echo '<div class="cc-coord-element">';
                            echo '<div id="cc-contact-mail"></div>';
                            echo '<div class="cc-coord-txt">';
                            echo '<a href="mailto:' . $mail . '">' . $mail . '</a>';
                            echo '</div></div>';
                        }
                        if ($url) {
                            echo '<div class="cc-coord-element">';
                            echo '<div id="cc-contact-url"></div>';
                            echo '<div class="cc-coord-txt">';
                            echo '<a href="' . $url . '">' . $url . '</a>';
                            echo '</div></div>';
                        }
                        ?>
                        <h2 style="margin: 40px 0 25px 0;">Social Networks</h2>
                        
                        <?php 
                        if($facebook){
                            echo '<div id="cc-contact-social">';
                            echo '<a href="'.$facebook.'"><img src="'.$templateURL.'/images/facebook-icon.png"/></a>';
                            echo '</div>';}
                        if($googlep){
                            echo '<div id="cc-contact-social">';
                            echo '<a href="'.$googlep.'"><img src="'.$templateURL.'/images/google-plus-icon.png"/></a>';
                            echo '</div>';}
                        if($twitter){
                            echo '<div id="cc-contact-social">';
                            echo '<a href="'.$twitter.'"><img src="'.$templateURL.'/images/twitter-icon.png"/></a>';
                            echo '</div>';}
                        if($youtube){
                            echo '<div id="cc-contact-social">';
                            echo '<a href="'.$youtube.'"><img src="'.$templateURL.'/images/youtube-icon.png"/></a>';
                            echo '</div>';}
                        if($linkedin){
                            echo '<div id="cc-contact-social">';
                            echo '<a href="'.$linkedin.'"><img src="'.$templateURL.'/images/linkedin-icon.png"/></a>';
                            echo '</div>';}
                        if($skype){
                            echo '<div id="cc-contact-social">';
                            echo '<a href="'.$skype.'"><img src="'.$templateURL.'/images/skype-icon.png"/></a>';
                            echo '</div>';}
                        ?>
                        <div style="clear: both"></div>
                    </div>
                    
                    <!--CONTACT FORM-->
                    <div class="cc-contact-columns-r" >
                        <h2 style="margin-bottom: 15px;">A question ?</h2>
                        <form class="cc-contact-form" action="" method="post" enctype="multipart/form-data">
                            <label for="cc-contact-name-submit">NAME</label> <input id="cc-contact-name-submit" name="cc-contact-name-subit" type="text" />
                            <label for="cc-contact-subject-submit">SUBJECT</label> <input id="cc-contact-subject-submit" name="cc-contact-subject-submit" type="text" />
                            <label for="cc-contact-email-submit">EMAIL</label> <input id="cc-contact-email-submit" name="cc-contact-email-subit" type="mail" />
                            <label for="cc-contact-message-submit">MESSAGE</label> <textarea rows="8" id="cc-contact-message-submit" name="cc-contact-message-subit"></textarea>
                            <input id="cc-contact-submit" name="cc-contact-subit" type="button" value="SEND !" />
                        </form>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>

        <?php
    endwhile;

    wp_enqueue_script('cc_contact_form');

else :
    ?>
    <?php include (TEMPLATEPATH . "/404.php"); ?>
<?php endif; ?>
<?php get_footer(); ?>
