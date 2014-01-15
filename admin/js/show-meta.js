/* 
 * SHOW-META
 * @Gaius57
 * This script will display the metabox for different format post.
 * 
 */

    jQuery(document).ready(function(jQuery) {
        
        jQuery('#post-format-quote').is(':checked') ? jQuery("#cc_quotes").show() : jQuery("#cc_quotes").hide();
        jQuery('#post-format-gallery').is(':checked') ? jQuery("#cc_gallery").show()  : jQuery("#cc_gallery").hide();
        jQuery('#post-format-audio').is(':checked') ? jQuery("#cc_audio").show() : jQuery("#cc_audio").hide();
        jQuery('#post-format-video').is(':checked') ? jQuery("#cc_video").show() : jQuery("#cc_video").hide();
        
        jQuery('#post-format-quote').click(function() {
            jQuery('#cc_gallery').hide();
            jQuery('#cc_audio').hide();
            jQuery('#cc_video').hide();
            jQuery("#cc_quotes").toggle(this.checked);
        });
        jQuery('#post-format-gallery').click(function() {
            jQuery('#cc_quotes').hide();
            jQuery('#cc_audio').hide();
            jQuery('#cc_video').hide();
            jQuery("#cc_gallery").toggle(this.checked);
        });
        jQuery('#post-format-audio').click(function() {
            jQuery('#cc_quotes').hide();
            jQuery('#cc_gallery').hide();
            jQuery('#cc_video').hide();
            jQuery("#cc_audio").toggle(this.checked);
        });
        jQuery('#post-format-video').click(function() {
            jQuery('#cc_quotes').hide();
            jQuery('#cc_gallery').hide();
            jQuery('#cc_audio').hide();
            jQuery("#cc_video").toggle(this.checked);
        });
        jQuery('#post-format-0').click(function() {
            jQuery('#cc_quotes').hide();
            jQuery('#cc_gallery').hide();
            jQuery('#cc_audio').hide();
            jQuery('#cc_video').hide();
        });
    });

