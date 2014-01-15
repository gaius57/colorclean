/* 
 * NAVMENU
 * @Gaius57
 * This script allows you to switch between different views of the admin menu.
 * 
 */


jQuery(document).ready(function()  {

jQuery(".group").hide();
jQuery(".selectedBlock").show();
   
jQuery(".nav-menu").click(function(e) {
        
    e.preventDefault();
    var currentSelection = jQuery(this);
    
    jQuery(".current").removeClass('current');
    currentSelection.addClass('current');
    
    jQuery(".group").hide();
    jQuery( "#"+currentSelection.data('block')).fadeIn('fast');
           
    jQuery(".selectedBlock").removeClass('selectedBlock');
    jQuery( "#"+currentSelection.data('block')).addClass('selectedBlock');
    
    return false;
});

});