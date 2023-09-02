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

	return '<iframe src="//docs.google.com/gview?embedded=true&url='.$document.'" width="'.$atts['width'].'" height="'.$atts['height'].'" frameborder="0"></iframe>';

}
add_shortcode('magiz-doc-embeder', 'magiz_doc_embeder_shortcode');