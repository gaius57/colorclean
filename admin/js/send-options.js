/* 
 *  SEND-OPTION
 *  @Gaius57
 *  This script will send the options to a php function with AJAX.
 */

(function($){
    $(document).ready(function(){
    
        $('.final-submit-admin').click(function(e){
           e.preventDefault();
                
                $(this).html('Saving...')
                 
                $.ajax({  
                type: 'post', 
                url: 'admin-ajax.php?action=cc_ajax_save_options',
                cache: false,
                data: {
                    options: $("form").serializeArray()
                },
                
                
                success: function(data) {
                    response = $.parseJSON(data);
                    if(response.error){
                        $('.final-submit-admin').html('Save Options');
                        $('#cc-contact-error').html(response.error);
                                    $('#cc-contact-error').slideDown("normal");
                                    setTimeout(function() {
                                        $('#cc-contact-error').slideUp("normal");
                                    }, 5000);
                    }
                    else{
                        $('.final-submit-admin').html('Save Options');
                        $('#cc-contact-succes').slideDown("normal");
                                    setTimeout(function() {
                                        $('#cc-contact-succes').slideUp("normal");
                                    }, 5000);
                    }
    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                          $('.final-submit-admin').html('Save Options');
                                    $('#cc-contact-error').slideDown("normal");
                                    setTimeout(function() {
                                        $('#cc-contact-error').slideUp("normal");
                                    }, 5000);
                }
            });
           
           
        });
 
    })
})(jQuery);
