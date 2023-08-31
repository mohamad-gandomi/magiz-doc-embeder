<?php

// Security check to prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

function magiz_doc_embeder_shortcode($atts) {
    // Extract shortcode attributes
    $atts = shortcode_atts(array(
        'id' => '',
        'width' => '400',
        'height' => '600',
    ), $atts);

    // Check if ID is provided
    if (empty($atts['id'])) {
        return '<p>Error: Document ID not provided.</p>';
    }

    $document = get_post_meta($atts['id'], 'magiz_document', true);
    $document_extension = get_post_meta($atts['id'], 'magiz_document_extension', true);

    if ( 'pdf' == $document_extension || 'jpeg' == $document_extension || 'jpg' == $document_extension || 'png' == $document_extension ) {
        return '<iframe id="magiz_document_iframe" src="'.$document.'" width="'.$atts['width'].'" height="'.$atts['height'].'" frameborder="0"></iframe>';
    }

    if ( 'ppt' == $document_extension || 'pptx' == $document_extension ) {
        return '<iframe src="https://view.officeapps.live.com/op/view.aspx?src='.$document.'" width="'.$atts['width'].'" height="'.$atts['height'].'" frameborder="0">';
    }
}
add_shortcode('magiz-doc-embeder', 'magiz_doc_embeder_shortcode');