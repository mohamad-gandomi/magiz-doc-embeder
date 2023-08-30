<?php

// Security check to prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add the custom document fields metabox
function magiz_document_meta_box() {
    add_meta_box(
        'document_metabox',
        'Document',
        'render_document_metabox',
        'document',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'magiz_document_meta_box');

// Render the document fields
function render_document_metabox($post) {

    $document = get_post_meta($post->ID, 'magiz_document', true);
    $document_extension = magiz_get_file_extension($document);

    ?>
    <div class="magiz-custom-input">
        <input type="hidden" id="magiz_document" name="magiz_document" value="<?php echo esc_attr($document); ?>">
        <input type="button" class="button custom-file-upload" value="Upload Document">
    </div>

    <div class="magiz-custom-input">
        <label for="magiz_shortcode">Short Code: </label>
        <code>[magiz-doc-embeder id="<?php echo $post->ID; ?>"]</code>
    </div>

    <div class="magiz-custom-input">
        <label for="magiz_shortcode">Document Extension: </label>
        <input type="hidden" name="magiz_document_extension" value="<?php echo $document_extension; ?>">
        <code id="magiz_document_extension"><?php echo $document_extension; ?></code>
    </div>
    <?php

    if ( 'pdf' == $document_extension || 'jpeg' == $document_extension || 'jpg' == $document_extension || 'png' == $document_extension ) {
        echo '<iframe id="magiz_document_iframe" src="'.$document.'" width="400" height="600" frameborder="0"></iframe>';
    }

    if ( 'ppt' == $document_extension || 'pptx' == $document_extension ) {
        echo '<iframe src="https://view.officeapps.live.com/op/view.aspx?src='.$document.'" width="600" height="400" frameborder="0">';
    }
}

// Save document fields
function magiz_save_document_field_data($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['magiz_document'])) {
        update_post_meta($post_id, 'magiz_document', sanitize_text_field($_POST['magiz_document']));
    }

    if (isset($_POST['magiz_document_extension'])) {
        update_post_meta($post_id, 'magiz_document_extension', sanitize_text_field($_POST['magiz_document_extension']));
    }

}
add_action('save_post', 'magiz_save_document_field_data');

// Extract the file extension from URL
function magiz_get_file_extension($url) {

    $filename = basename($url);
    $pathinfo = pathinfo($filename);
    $file_extension = $pathinfo['extension'];
    
    return $file_extension;
}
