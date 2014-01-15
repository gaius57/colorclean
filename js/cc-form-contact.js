/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

(function($){
    $(document).ready(function(){
        
        var name = $('#cc-contact-name-submit');
        var subject = $('#cc-contact-subject-submit');
        var email = $('#cc-contact-email-submit');
        var message = $('#cc-contact-message-submit');
        var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
        var validForm;
    
        $('#cc-contact-submit').click(function(e){
            validForm = true;
            e.preventDefault();
        
            if(!name.val()||name.val()==null){
                name.css('background-color','#ff9292');
                name.animate({
                    backgroundColor: "#e5e5e5"
                },1000);
                validForm = false;
            }
            
            if(!subject.val()||subject.val()==null){
                subject.css('background-color','#ff9292');
                subject.animate({
                    backgroundColor: "#e5e5e5"
                },1000);
                validForm = false;
            }
          
            if(!reg.test(email.val())){
                email.css('background-color','#ff9292');
                email.animate({
                    backgroundColor: "#e5e5e5"
                },1000);
                validForm = false;
            }
            
            if(!message.val()||message.val()==null){
                message.css('background-color','#ff9292');
                message.animate({
                    backgroundColor: "#e5e5e5"
                },1000);
                validForm = false;
            }
          
        
            if(validForm){
                $.ajax({
                    type:'post', 
                    url: '../wp-admin/admin-ajax.php?action=cc_ajax_contact',
                    cache: false,
                    data: {
                        name: name.val(),
                        subject: subject.val(),
                        email: email.val(),
                        message: message.val()
                    },
                    success: function(data) {
                        response = $.parseJSON(data);
                        
                        if(!response.fatalerror){
                                if(response.error){
                                    console.log(response.error);
                                    $('#cc-contact-error').html(response.error);
                                    $('#cc-contact-error').slideDown("normal");
                                    setTimeout(function() {
                                        $('#cc-contact-error').slideUp("normal");
                                    }, 5000);
                                }
                                else{
                                    console.log(response.succes);
                                    $('#cc-contact-succes').slideDown("normal");
                                    setTimeout(function() {
                                        $('#cc-contact-succes').slideUp("normal");
                                    }, 5000);
                                }
                        }
                        else{
                            console.log(data);
                            $('#cc-contact-error').html(response.fatalerror);
                            $('#cc-contact-error').slideDown("normal");
                            setTimeout(function() {
                                $('#cc-contact-error').slideUp("normal");
                            }, 5000);
                        }
                        
                    },
                    error: function() {
                        alert("Cannot send message (AJAX ERROR)");
                    }
                });
            }
        
        });
    
        
        name.focus(function(){
            name.css('background-color','#f2f2f2');
        });
        
        email.focus(function(){
            email.css('background-color','#f2f2f2');
        });
        
        message.focus(function(){
            message.css('background-color','#f2f2f2');
        });
        
        name.blur(function(){
            name.css('background-color','#e5e5e5');
        });
        
        email.blur(function(){
            email.css('background-color','#e5e5e5');
        });
        
        message.blur(function(){
            message.css('background-color','#e5e5e5');
        });
 
    })
})(jQuery);
