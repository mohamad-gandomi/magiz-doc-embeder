jQuery(document).ready(function($) {
    $('.custom-file-upload').click(function(e) {
        e.preventDefault();
        var customUploader = wp.media({
            title: 'Select File',
            button: {
                text: 'Select File'
            },
            multiple: false // Allow only one file to be selected
        });

        customUploader.on('select', function() {
            
            var attachment = customUploader.state().get('selection').first().toJSON();
            var filename = attachment.filename;
            var extension = filename.split('.').pop();

            $('#magiz_document').val(attachment.url);
            $('#magiz_document_extension').html(extension);
            $('input[name="magiz_document_extension"]').val(extension);

            if( 'pdf' == extension || 'jpeg' == extension || 'jpg' == extension || 'png' == extension ) {
                $('#magiz_document_iframe').attr('src', attachment.url);
                $('#magiz_document_iframe').css('height', '600px');
                $('#magiz_document_iframe').css('width', '400px');
            }

            if ( 'ppt' == extension || 'pptx' == extension ) {
                $('#magiz_document_iframe').attr('src', '//docs.google.com/gview?url='+attachment.url+'&embedded=true');
                $('#magiz_document_iframe').css('height', '400px');
                $('#magiz_document_iframe').css('width', '600px');
            }

        });

        customUploader.open();
    });
});