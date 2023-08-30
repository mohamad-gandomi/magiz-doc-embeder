<?php

// Security check to prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Create custom document post type
function magiz_custom_document_post_type() {
    $labels = array(
        'name' => 'Documents',
        'singular_name' => 'Document',
        'menu_name' => 'Documents',
        'all_items' => 'All Documents',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Document',
        'edit_item' => 'Edit Document',
        'new_item' => 'New Document',
        'view_item' => 'View Document',
        'search_items' => 'Search Documents',
        'not_found' => 'No documents found',
        'not_found_in_trash' => 'No documents found in trash',
    );

    $args = array(
        'label' => 'Document',
        'labels' => $labels,
        'description' => 'A custom post type for documents.',
        'public' => true,
        'menu_icon' => 'dashicons-media-document',
        'supports' => array('title'),
        'rewrite' => array('slug' => 'document'),
        'has_archive' => true,
    );

    register_post_type('document', $args);
}
add_action('init', 'magiz_custom_document_post_type', 0);


// Register Custom Taxonomies
function magiz_custom_document_taxonomies() {
    // Add new category taxonomy
    $category_labels = array(
        'name' => 'Document Categories',
        'singular_name' => 'Document Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );
    $category_args = array(
        'hierarchical' => true,
        'labels' => $category_labels,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'document-category'),
    );
    register_taxonomy('document_category', 'document', $category_args);

    // Add new tag taxonomy
    $tag_labels = array(
        'name' => 'Document Tags',
        'singular_name' => 'Document Tag',
        'search_items' => 'Search Tags',
        'all_items' => 'All Tags',
        'edit_item' => 'Edit Tag',
        'update_item' => 'Update Tag',
        'add_new_item' => 'Add New Tag',
        'new_item_name' => 'New Tag Name',
        'menu_name' => 'Tags',
    );
    $tag_args = array(
        'hierarchical' => false,
        'labels' => $tag_labels,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'document-tag'),
    );
    register_taxonomy('document_tag', 'document', $tag_args);
}
add_action('init', 'magiz_custom_document_taxonomies', 0);