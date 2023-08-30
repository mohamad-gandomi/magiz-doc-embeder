<?php

// Security check to prevent direct access
if (!defined('ABSPATH')) {
    exit;
}


function magiz_enqueue_admin_custom_scripts() {
    global $pagenow, $post_type;
    
    // Check if we are on the post editing screen for the "document" post type
    if ($pagenow === 'post.php' && $post_type === 'document') {
        wp_enqueue_media();
        wp_enqueue_script('magiz-admin-edit-document', MAGIZ_DOC_EMBEDER_URI . 'admin/assets/js/magiz-admin-edit-document.js', array('jquery'), '1.0', true);
        wp_enqueue_style( 'magiz-admin-edit-document', MAGIZ_DOC_EMBEDER_URI . 'admin/assets/css/magiz-admin-edit-document.css', array(), '1.0', 'all' );
    }
}
add_action('admin_enqueue_scripts', 'magiz_enqueue_admin_custom_scripts');

