<?php
/**
 * The HTML template for displaying Contact Options.
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */
?>

<!--
Contact Options
-->

<div id="contactpage" class="group">
    <h2>
        Contact Page
    </h2>

    <div class="cc-admin-option">
        <h3 class="option-title">
            Email Adress :
        </h3>
        <div class="option">
            <div class="explain">
                Define the email where are send the message.
            </div>
            <div class="cc-action">
                <input class="cc-input" type="email" value="<?php echo get_option('cc-contact-destination') ?>"  name="cc-contact-destination" id="cc-contact-destination" />
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="cc-admin-option">
        <h3 class="option-title">
            Google Map Code :
        </h3>
        <div class="option">
            <div class="explain">
                Put the IFRAME code generate by Google Map to dispay the map (empty = not displayed)
            </div>
            <div class="cc-action">
                <textarea class="cc-input" rows="8" name="cc-contact-map" id="cc-contact-map"><?php echo get_option('cc-contact-map') ?></textarea> 
            </div>
            <div class="clear"></div>
        </div>
    </div> 


    <div class="cc-admin-option">
        <h3 class="option-title">Message After Sending</h3>
        <div class="option">
            <div class="explain">
                Message displayed when the message is successfully sent.
            </div>
            <div class="cc-action">
                <textarea class="cc-input"  name="cc-contact-confirm" id="message_sending" cols="8" rows="8"><?php echo get_option('cc-contact-confirm') ?></textarea></div>
            <div class="clear">
            </div>
        </div>
    </div>

<div class="cc-admin-option"> 
<h3 style="margin: 50px 0 0 0; text-align: center;">Contact Details</h3>
</div>


    <div class="cc-admin-option">
        <h3 class="option-title">Address</h3>
        <div class="option">
            <div class="explain">Address displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-adress') ?>"  name="cc-contact-adress" id="contact_address" value="30 Tanta City, EGYpT" type="text"></div>

            <div class="clear"> 
            </div>
        </div>
    </div>

    <div class="cc-admin-option">
        <h3 class="option-title">Phone</h3>
        <div class="option">
            <div class="explain">Phone number displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-phone') ?>"  name="cc-contact-phone" id="contact_phone" value="(002) 560-655-995" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Email</h3>
        <div class="option">
            <div class="explain">Email displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input "  value="<?php echo get_option('cc-contact-email') ?>" name="cc-contact-email" id="contact_email_text" value="info@website.com" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Website</h3>
        <div class="option">
            <div class="explain">Website displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-url') ?>"  name="cc-contact-url" id="contact_website" value="www.website.com" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


<div class="cc-admin-option"> 
<h3 style="margin: 50px 0 0 0; text-align: center;">Socials Networks</h3>
</div>


    <div class="cc-admin-option">
        <h3 class="option-title">Facebook</h3>
        <div class="option">
            <div class="explain">Facebook link displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-fb') ?>"  name="cc-contact-fb" id="contact_social_facebook" value="#" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Twitter</h3>
        <div class="option">
            <div class="explain">Twitter link displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-twitter') ?>"  name="cc-contact-twitter" id="contact_social_twitter" value="#" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Google+</h3>
        <div class="option">
            <div class="explain">Google+ link displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-google') ?>"  name="cc-contact-google" id="contact_social_google" value="#" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Linkedin</h3>
        <div class="option">
            <div class="explain">Linkedin link displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-linkedin') ?>"  name="cc-contact-linkedin" id="contact_social_linkedin" value="" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Skype</h3>
        <div class="option">
            <div class="explain">Skype link displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-skype') ?>"  name="cc-contact-skype" id="contact_social_skype" value="" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>


    <div class="cc-admin-option">
        <h3 class="option-title">Youtube</h3>
        <div class="option">
            <div class="explain">Youtube link displayed to visitors (empty = not displayed)</div>

            <div class="cc-action">
                <input class="cc-input " value="<?php echo get_option('cc-contact-youtube') ?>"  name="cc-contact-youtube" id="contact_social_youtube" value="" type="text"></div>

            <div class="clear"> </div>
        </div>
    </div>

</div>