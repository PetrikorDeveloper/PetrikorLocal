<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if (!class_exists('Redux')) {
    return;
}


// This is your option name where all the Redux data is stored.
$opt_name = "petrikor_options";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode('.', $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => __('petrikor Options', 'redux-framework-demo'),
    'page_title' => __('petrikor Options', 'redux-framework-demo'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => FALSE,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.

$args['share_icons'][] = array(
    'url' => 'https://www.facebook.com/Skipper/',
    'title' => 'Like us on Facebook',
    'icon' => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url' => 'https://twitter.com/Skipper/',
    'title' => 'Follow us on Twitter',
    'icon' => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url' => 'https://www.linkedin.com/company/',
    'title' => 'Find us on LinkedIn',
    'icon' => 'el el-linkedin'
);

// Panel Intro text -> before the form

if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(__('<p>Welcome to petrikor\'s theme. Please Select your options</p>', 'redux-framework-demo'), $v);
} else {
    $args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
}

// Add content after the form.

$args['footer_text'] = __('<p>Thank you for using petrikor\'s theme ^_^.</p>', 'redux-framework-demo');

Redux::setArgs($opt_name, $args);

/* * ***************************************************************************
 * ****************************** END ARGUMENTS ********************************
 * ************************************************************************** */

/* * ************************************************************************* */

/* * ***************************************************************************
 * ***************************** START SECTIONS ********************************
 * *****************************************************************************
 * TABLE OF CONTENT:
 * ----------------
 * 1. SITE IDENTITY
 * 2. CONTACT DETAILS
 * 3. FOOTER
 *
 * *****************************************************************************
 * **************************** 1. SITE IDENTITY *******************************
 * ************************************************************************** */

Redux::setSection($opt_name, array(
    'id' => 'identity',
    'title' => __('Site Identity', 'petrikor'),
    'desc' => __('General Settings for your Website', 'petrikor'),
    'icon' => 'el el-home-alt',
    'fields' => array(
        array(
            'id' => 'logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Logo', 'petrikor'),
            'desc' => __('Your site logo', 'petrikor')
        ),
        array(
            'id' => 'fav-icon',
            'type' => 'media',
            'url' => true,
            'title' => __('Favorite icon', 'petrikor'),
            'desc' => __('16*16 image to display in the tab', 'petrikor')
        ),
        
    )
));

/* * ***************************************************************************
 * *************************** 2. CONTACT DETAILS ******************************
 * ************************************************************************** */

Redux::setSection($opt_name, array(
    'id' => 'contact',
    'title' => __('Contact', 'petrikor'),
    'desc' => __('Contact informations', 'petrikor'),
    'icon' => 'el el-phone',
    'fields' => array(
        array(
            'id' => 'facebook',
            'type' => 'text',
            'title' => __('Facebook url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'gplus',
            'type' => 'text',
            'title' => __('G+ url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'linkedin',
            'type' => 'text',
            'title' => __('Linkedin url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'be',
            'type' => 'text',
            'title' => __('Be url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'instagram',
            'type' => 'text',
            'title' => __('Instagram url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'pinterest',
            'type' => 'text',
            'title' => __('Pinterest url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'twitter',
            'type' => 'text',
            'title' => __('Twitter url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'youtube',
            'type' => 'text',
            'title' => __('Youtube url', 'petrikor'),
            'validate' => 'url'
        ),
        array(
            'id' => 'email',
            'type' => 'text',
            'title' => __('Email', 'petrikor'),
            'validate' => 'email'
        ),
        array(
            'id' => 'phone',
            'type' => 'text',
            'title' => __('Phone number', 'petrikor')
            //'validate' => 'numeric'
        )
    )
));



/* * ***************************************************************************
 * ******************************* 3. FOOTER ***********************************
 * ************************************************************************** */

Redux::setSection($opt_name, array(
    'id' => 'footer',
    'title' => __('Footer', 'petrikor'),
    'desc' => __('Footer settings', 'petrikor'),
    'fields' => array(
        array(
            'id' => 'footer_logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Logo', 'petrikor'),
            'desc' => __('Your site logo', 'petrikor')
        ),
        // array(
        //     'id' => 'footer_background',
        //     'type' => 'media',
        //     'url' => true,
        //     'title' => __('Backgroung', 'petrikor'),
        //     'desc' => __('Your Footer Backgroung', 'petrikor')
        // ),
        array(
            'id' => 'site_description',
            'type' => 'textarea',
            'title' => __('Site Description', 'petrikor'),
            'desc' => __('Enter Site Description, HTML valid.', 'petrikor'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array()
                ),
                'p' => array(),
                'strong' => array()
            ),
            'default' => ''
        ),
        //  array(
        //     'id' => 'footer_left_desc',
        //     'type' => 'editor',
        //     'title' => __('Footer Left Text', 'petrikor'),
        //     'desc' => __('Enter Footer Left Text, HTML valid.', 'petrikor'),
        //     'allowed_html' => array(
        //         'a' => array(
        //             'href' => array(),
        //             'title' => array(),
        //             'target' => array()
        //         ),
        //         'p' => array(),
        //         'strong' => array()
        //     ),
        //     'default' => ''
        // ),
        array(
            'id' => 'address',
            'type' => 'textarea',
            'title' => __('Address', 'petrikor'),
            'desc' => __('Enter address, HTML valid.', 'petrikor'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array()
                ),
                'p' => array(),
                'strong' => array()
            ),
            'default' => ''
        ),
        array(
            'id' => 'copyright',
            'type' => 'textarea',
            'title' => __('Copyright Content', 'petrikor'),
            'desc' => __('Enter copyright, HTML valid.', 'petrikor'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'target' => array()
                ),
                'p' => array(),
                'strong' => array()
            ),
            'default' => ''
        ),
        // array(
        //     'id' => 'main-bg',
        //     'type' => 'color_rgba',
        //     'title' => __('Main Footer', 'petrikor'),
        //     'desc' => __('Main Footer Background Color', 'petrikor'),
        //     'output' => array('background-color' => '#main-footer'),
        //     'default' => array(
        //         'color' => '#f6f6f6',
        //         'alpha' => '1'
        //     )
        // ),
        // array(
        //     'id' => 'copyright-bg',
        //     'type' => 'color_rgba',
        //     'title' => __('Copyright', 'petrikor'),
        //     'desc' => __('Copyright Background Color', 'petrikor'),
        //     'output' => array('background-color' => '#copyright'),
        //     'default' => array(
        //         'color' => '#d3233b',
        //         'alpha' => '1'
        //     )
        // )
    )
));