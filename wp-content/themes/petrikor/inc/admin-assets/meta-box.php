<?php

/*
 * META BOX
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. ENTRY HEADER
 * 2. CAREERS META BOX: Employment Opportunities
 * 3. CAREERS META BOX: Employment Place
 * 
 * *****************************************************************************
 * ****************************  1. ENTRY HEADER  ******************************
 * ************************************************************************** */

// if ( admin panel != homepage admin panel ) => add entry header meta box
$frontpage_id = get_option('page_on_front');

if (isset($_GET['post'])) {
    if ($post_id = $_GET['post'] != $frontpage_id) {
//        add_action('admin_enqueue_scripts', 'petrikor_include_uploaderscript');
//        add_action('admin_menu', 'petrikor_add_meta_box');
//        add_action('save_post', 'petrikor_save');
    }
}

function petrikor_include_uploaderscript() {
    // I recommend to add additional conditions just to not to load the scipts on each page
    // like: if ( !in_array('post-new.php','post.php') ) return;
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_style('uploader-css', get_stylesheet_directory_uri() . '/assets/css/uploader.css');
    wp_enqueue_script('uploader-js', get_stylesheet_directory_uri() . '/assets/js/uploader.js', array('jquery'), null, false);
}

function petrikor_image_uploader_field($name, $value = '') {
    wp_nonce_field(basename(__FILE__), "entry-header-nonce");
    $image = ' button">Upload image';
    $image_size = 'full';
    $display = 'none';
    if ($image_attributes = wp_get_attachment_image_src($value, $image_size)) {
        //$image = '"><img src="' . $image_attributes[0] . '"/>';
        $image = '" style="background-image: url(' . $image_attributes[0] . ');"/>';
        $display = 'inline-block';
    }
    return '<div>'
            . '<a href="#" class="petrikor_upload_image_button' . $image . '</a>'
            . '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />'
            . '<a href="#" class="petrikor_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>'
            . '</div>';
}

function petrikor_print_box($post) {
    $meta_key = 'entryheader_meta';
    echo petrikor_image_uploader_field($meta_key, get_post_meta($post->ID, $meta_key, true));
}

function petrikor_add_meta_box() {
    add_meta_box('entryheader_meta', 'Entry Header', 'petrikor_print_box', array('page', 'post', 'careers', 'news'), 'normal', 'high');
}

function petrikor_save($post_id) {
    // some security conditions
    if (!isset($_POST["entry-header-nonce"]) || !wp_verify_nonce($_POST["entry-header-nonce"], basename(__FILE__)))
        return $post_id;
    if (!current_user_can("edit_post", $post_id))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    $meta_key = 'entryheader_meta';
    update_post_meta($post_id, $meta_key, $_POST[$meta_key]);
    // if you would like to attach the uploaded image to this post, uncomment the line:
    // wp_update_post( array( 'ID' => $_POST[$meta_key], 'post_parent' => $post_id ) );
    return $post_id;
}

/* * ***************************************************************************
 * **************************** 2. CAREERS META BOX ****************************
 * ************************************************************************** */

function emp_opp_meta_box() {
    add_meta_box('emp_opp', __('Employment Opportunities', 'petrikor'), 'emp_opp_callback', 'careers', 'side', 'high');
}

add_action('add_meta_boxes', 'emp_opp_meta_box');

function emp_opp_callback($post) {
    wp_nonce_field('emp_opp_nonce', 'emp_opp_nonce');
    $value = get_post_meta($post->ID, '_emp_opp', true);
    $value = esc_attr($value);
    echo "<input type='number' name='emp_opp' id='emp_opp' style='width:100%' value='$value'>";
}

function save_emp_opp_data($post_id) {

    // Check if our nonce is set.
    if (!isset($_POST['emp_opp_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['emp_opp_nonce'], 'emp_opp_nonce')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'careers' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Make sure that it is set.
    if (!isset($_POST['emp_opp'])) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field($_POST['emp_opp']);

    // Update the meta field in the database.
    update_post_meta($post_id, '_emp_opp', $my_data);
}

add_action('save_post', 'save_emp_opp_data');

/* * ***************************************************************************
 * **************************** 3. CAREERS META BOX ****************************
 * ************************************************************************** */

function emp_place_meta_box() {
    add_meta_box('emp_place', __('Employment Place', 'petrikor'), 'emp_place_callback', 'careers', 'side', 'high');
}

add_action('add_meta_boxes', 'emp_place_meta_box');

function emp_place_callback($post) {
    wp_nonce_field('emp_place_nonce', 'emp_place_nonce');
    $value = get_post_meta($post->ID, '_emp_place', true);
    $value = esc_attr($value);
    echo "<input type='text' name='emp_place' id='emp_place' style='width:100%' value='$value'>";
}

function save_emp_place_data($post_id) {

    // Check if our nonce is set.
    if (!isset($_POST['emp_place_nonce'])) {
        return;
    }

    // Verify that the nonce is valid.
    if (!wp_verify_nonce($_POST['emp_place_nonce'], 'emp_place_nonce')) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions.
    if (isset($_POST['post_type']) && 'careers' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Make sure that it is set.
    if (!isset($_POST['emp_place'])) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field($_POST['emp_place']);

    // Update the meta field in the database.
    update_post_meta($post_id, '_emp_place', $my_data);
}

add_action('save_post', 'save_emp_place_data');
