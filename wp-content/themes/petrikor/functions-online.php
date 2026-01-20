<?php

/*

 * petrikor FUNCTIONS

 * @PACKAGE petrikor

 * 

 * TABLE OF CONTENT:

 * ----------------

 * 1. petrikor SETUP

 * 

 * *****************************************************************************

 * ****************************** 1. petrikor SETUP ********************************

 * ************************************************************************** */

$template_directory = get_template_directory() . '/';



require $template_directory . 'inc/functions-admin.php';





/* *******redirections **************************************************** */

function redirect_page()
{



    if (
        isset($_SERVER['HTTPS']) &&

        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||

        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&

        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
    ) {

        $protocol = 'https://';
    } else {

        $protocol = 'http://';
    }



    $currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $currenturl_relative = wp_make_link_relative($currenturl);



    switch ($currenturl_relative) {



        case '/portfolio':

            $urlto = home_url('/all-portfolio');

            break;



        default:

            return;
    }



    if ($currenturl != $urlto)

        exit(wp_redirect($urlto));
}

add_action('template_redirect', 'redirect_page');

// add_filter('single_template', function ($single) {
//     global $post;
//     if ($post->post_type === 'case_studies' && $post->ID == 3099) {
//         return get_stylesheet_directory() . '/single-case_studies-3099.php';
//     }
//     return $single;
// });

add_filter('single_template', function ($single) {
    global $post;

    if ($post->post_type === 'case_studies') {
        if ($post->ID == 3099) {
            return get_stylesheet_directory() . '/single-case_studies-3099.php';
        }
        if ($post->ID == 3166) {
            return get_stylesheet_directory() . '/single-case_studies-3166.php';
        }
        if ($post->ID == 3217) {
            return get_stylesheet_directory() . '/single-case_studies-3217.php';
        }
        if ($post->ID == 3239) {
            return get_stylesheet_directory() . '/single-case_studies-3239.php';
        }
    }

    return $single;
});
