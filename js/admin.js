jQuery(document).ready( function(){
    // Uploading files
    // alert('working');
    var about_me_page;
     
    jQuery('.upload_image_button').live('click', function( event ){
     
        event.preventDefault();
     
     
        // Create the media frame.
        about_me_page = wp.media.frames.about_me_page = wp.media({
          title: 'Select Image For About Me Page',
          button: {
            text: 'Use it!',
          },
          multiple: false  // Set to true to allow multiple files to be selected
        });
     
        // When an image is selected, run a callback.
        about_me_page.on( 'select', function() {
          // We set multiple to false so only get one image from the uploader
          attachment = about_me_page.state().get('selection').first().toJSON();
          	
             jQuery('#wcp-url').val(attachment.url);
        });
     
        // Finally, open the modal
        about_me_page.open();
    });

});