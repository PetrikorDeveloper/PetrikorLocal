<?php

/*
 * CUSTOM POST TYPE
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. LATEST NEWS
 * 2. CAREERS
 * 
 * *****************************************************************************
 * ****************************** 1. LATEST NEWS *******************************
 * ************************************************************************** */

function news_custom_post_type() {
    $labels = array(
        'name' => _x('Latest News', 'news', 'rahma'),
        'singular_name' => _x('News', 'news', 'rahma'),
        'add_new' => __('Add New', 'rahma'),
        'add_new_item' => __('Add New Item'),
        'edit_item' => __('Edit Item'),
        'new_item' => __('New Item'),
        'view_item' => __('View Item'),
        'search_items' => __('Search Items'),
        'not_found' => __('No items found'),
        'not_found_in_trash' => __('No items found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    );
    register_post_type('news', $args);
}

add_action('init', 'news_custom_post_type');

/* * ***************************************************************************
 * ******************************** 2. CAREERS *********************************
 * ************************************************************************** */

function careers_custom_post_type() {
    $labels = array(
        'name' => _x('Careers', 'careers', 'rahma'),
        'singular_name' => _x('Careers', 'careers', 'rahma'),
        'add_new' => __('Add New', 'rahma'),
        'add_new_item' => __('Add New Item'),
        'edit_item' => __('Edit Item'),
        'new_item' => __('New Item'),
        'view_item' => __('View Item'),
        'search_items' => __('Search Items'),
        'not_found' => __('No items found'),
        'not_found_in_trash' => __('No items found in Trash'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'excerpt')
    );
    register_post_type('careers', $args);
}

add_action('init', 'careers_custom_post_type');