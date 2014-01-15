/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function(){
    
    var open = false;
    var navMenu;
    
    jQuery("#cc-menu-mobile").click(function() {
        
        navMenu = jQuery("#cc-nav-mobile");
    
        if(!open){     
            jQuery('#cc-menu-mobile').css("background-position", "top");  
            navMenu.slideDown("fast");
            open=true;
        }
        else{
            jQuery('#cc-menu-mobile').css("background-position", "bottom");
            navMenu.slideUp("fast");
            open=false;
        }
    });
    return false;
});