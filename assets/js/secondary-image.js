jQuery(document).ready(function ($) {
  console.log("TEST");
    // Uploading files
    var file_frame;

    jQuery.fn.upload_listing_image = function (button) {
        var button_id = button.attr('id');
        var field_id = button_id.replace('_button', '');

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery(this).data('uploader_title'),
            button: {
                text: jQuery(this).data('uploader_button_text'),
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            jQuery("#" + field_id).val(attachment.id);
            jQuery("#listingimagediv img").attr('src', attachment.url);
            jQuery('#listingimagediv img').show();
            jQuery('#' + button_id).attr('id', 'remove_listing_image_button');
            jQuery('#remove_listing_image_button').text('Remove listing image');
        });

        // Finally, open the modal
        file_frame.open();
    };

    jQuery('#listingimagediv').on('click', '#upload_listing_image_button', function (event) {
        event.preventDefault();
        jQuery.fn.upload_listing_image(jQuery(this));
    });

    jQuery('#listingimagediv').on('click', '#remove_listing_image_button', function (event) {
        event.preventDefault();
        jQuery('#upload_listing_image').val('');
        jQuery('#listingimagediv img').attr('src', '');
        jQuery('#listingimagediv img').hide();
        jQuery(this).attr('id', 'upload_listing_image_button');
        jQuery('#upload_listing_image_button').text('Set listing image');
    });

});
