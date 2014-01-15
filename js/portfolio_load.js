/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

(function($){
    $(document).ready(function(){
        
        var id_post;
        var currentPost;
        
        $('.cc-portfolio-more').click(function(){
            id_post = this.getAttribute('data-id');
            currentPost= $('#cc-portfolio-'+id_post);
            
            if (!$(currentPost).hasClass('open')){
                
                $(currentPost).find('.cc-portfolio-more').html('<h5 style="font-size:50px;padding-right:3px;padding-top:-5px;" >-</h5>');
                
                $(currentPost).find(".cc-portfolio-excerpt").slideUp('normal').queue(function() {
                    $(currentPost).find(".cc-portfolio-content").slideDown('normal');
                    $(currentPost).addClass("open");
                    $(this).dequeue();
                });
            }
            
            else{
               $(currentPost).find('.cc-portfolio-more').html('<h5 style="font-size:40px;" >+</h5>');
                $(currentPost).find(".cc-portfolio-content").slideUp('normal').queue(function() {
                    $(currentPost).find(".cc-portfolio-excerpt").slideDown('normal');
                    $(currentPost).removeClass("open");
                    $(this).dequeue();
                });               
            }
        })
     
 
    })
})(jQuery);

