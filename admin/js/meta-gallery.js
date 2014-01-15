/* 
 *  META-GALLERY
 *  @Gaius57
 *  This script will generate the galleries in a post kind of gallery.
 */

(function($){
    $(document).ready(function(){
    
 
        $('#cc_gallery_button').click(function(e){
            var $limitBox = $(this).parent();
            e.preventDefault();
            var uploader = wp.media({
                title : 'Choose images (Press CTRL or SHIFT to do your selection)',
                button : {
                    text : 'Choose this images'
                },
                multiple: true
            })
            .on('select', function(){
                var selection = uploader.state().get('selection');
                var attachmentsID= [];
                var attachmentsURL = [];
                selection.map( function(attachment){
                    attachment = attachment.toJSON();
                    attachmentsURL.push(attachment.url);
                    attachmentsID.push(attachment.id);
                })
                $('#cc_gallery_url', $limitBox).val(attachmentsURL.join(','));
                $('#cc_gallery_id', $limitBox).val(attachmentsID.join(','));
                $('#cc_gallery_id', $limitBox).change();
            })
            .open();
        })
 
 
        $('#cc_gallery_id').change(function(){
            var galleryDiv = $('#cc-pic-gallery');
            
            var listeID = $('#cc_gallery_id').val();
        
            $.ajax({
                type: 'post', 
                url: 'admin-ajax.php?action=cc_ajax_generate_gallery',
                cache: false,
                data: {
                    listid: listeID
                },
                success: function(data) {
                    response = $.parseJSON(data);
                    if(response.error){
                        $(galleryDiv).fadeOut('slow').queue(function() {
                            $(galleryDiv).html(response.error);
                            $(galleryDiv).children('.cc-ajax-loading').hide();
                            $(galleryDiv).fadeIn('slow');
                            $(this).dequeue();
                        });  
                    }
                    else{
                        $(galleryDiv).fadeOut('slow').queue(function() {
                            $(galleryDiv).html(response.img);
                            $(galleryDiv).children('.cc-ajax-loading').hide();
                            $(galleryDiv).fadeIn('slow');
                            $(this).dequeue();
                        });
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $(galleryDiv).fadeOut('slow').queue(function() {
                        galleryDiv.append("Error : cannot generate gallery !");
                        $(galleryDiv).children('.cc-ajax-loading').hide();
                        $(galleryDiv).fadeIn('slow');
                        $(this).dequeue();
                    });
                }
            });
        });
 
 
 
    })
})(jQuery);
