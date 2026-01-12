<?php

/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. BACKEND | ENQUEUE SCRIPTS & STYLES
 * 2. FRONTEND | ENQUEUE SCRIPTS & STYLES
 */
/* * ***************************************************************************
 * *************** 1. BACKEND | ENQUEUE SCRIPTS & STYLES ***********************
 * ************************************************************************** */

function petrikorholding_load_admin_scripts($hook) {
    
}

//add_action('admin_enqueue_scripts', 'petrikorholding_load_admin_scripts');

/* * ***************************************************************************
 * ***************** 2. FRONTEND | ENQUEUE SCRIPTS & STYLES ********************
 * ************************************************************************** */

function petrikor_scripts() {
    wp_enqueue_style( 'slick-style', petrikor_ASSETS_URI. 'vendor/slick/slick.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'slick-theme-style', petrikor_ASSETS_URI. 'vendor/slick/slick-theme.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'slick-animate-style', petrikor_ASSETS_URI. 'vendor/slick/animate.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'scroll-style', petrikor_ASSETS_URI. 'vendor/perfect-scrollbar/perfect-scrollbar.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'bootstrap-style', petrikor_ASSETS_URI. 'vendor/bootstrap/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'aos-style', petrikor_ASSETS_URI. 'vendor/aos/aos.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'slickk-style', petrikor_ASSETS_URI. 'css/slick.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'sidemenu-style', petrikor_ASSETS_URI. 'css/sidemenu-en.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'clouds-style', petrikor_ASSETS_URI. 'css/clouds.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'cubeportfolio-style', petrikor_ASSETS_URI. 'vendor/cubeportfolio/cubeportfolio.min.css', array(), wp_get_theme()->get( 'Version' ).'-1' );
    wp_enqueue_style( 'main-style', petrikor_ASSETS_URI. 'css/main.css', array(), wp_get_theme()->get( 'Version' ).'-3' );
    wp_style_add_data( 'main-style', 'rtl', 'replace' );
    /* Main Theme Scripts */
    wp_enqueue_script('popper-script', petrikor_ASSETS_URI . 'vendor/js/popper.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap-script', petrikor_ASSETS_URI . 'vendor/bootstrap/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('scrollbar-script', 'https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js', array('jquery'), false, true);
    wp_enqueue_script('slick-script', petrikor_ASSETS_URI . 'vendor/slick/slick.min.js', array('jquery'), false, true);
    wp_enqueue_script('slick-animate-script', petrikor_ASSETS_URI . 'vendor/slick/slick-animation.js', array('jquery'), false, true);
    wp_enqueue_script('scrollup-script', petrikor_ASSETS_URI . 'vendor/perfect-scrollbar/jquery.scrollup.min.js', array('jquery'), false, true);
    wp_enqueue_script('perfect-scrollbar-script', petrikor_ASSETS_URI . 'vendor/perfect-scrollbar/perfect-scrollbar.js', array('jquery'), false, true);
    wp_enqueue_script('sq-script', petrikor_ASSETS_URI . 'vendor/vivus/vivus.min.js', array('jquery'), false, true);
    wp_enqueue_script('aos-script', petrikor_ASSETS_URI . 'vendor/aos/aos.js', array('jquery'), false, true);
    wp_enqueue_script('cubeportfolio-main-script', petrikor_ASSETS_URI . 'vendor/cubeportfolio/jquery.cubeportfolio.min.js', array('jquery'), false, true);
    wp_enqueue_script('main-mosaic3-script', petrikor_ASSETS_URI . 'vendor/cubeportfolio/main-mosaic3.js', array('jquery'), false, true);
    wp_enqueue_script('main-masonry-script', petrikor_ASSETS_URI . 'vendor/cubeportfolio/masonry.js', array('jquery'), false, true);
    wp_enqueue_script('main-masonry-projects-script', petrikor_ASSETS_URI . 'vendor/cubeportfolio/masonry-projects.js', array('jquery'), false, true);
    wp_enqueue_script('main-cols-projects-script', petrikor_ASSETS_URI . 'vendor/cubeportfolio/cols-3.js', array('jquery'), false, true);
    wp_enqueue_script('main-cols-2-projects-script', petrikor_ASSETS_URI . 'vendor/cubeportfolio/cols-2.js', array('jquery'), false, true);
    wp_enqueue_script('sidemenu-script', petrikor_ASSETS_URI . 'js/sidemenu.js', array('jquery'), false, true);
    wp_enqueue_script('jquery.modernizr-script', petrikor_ASSETS_URI . 'vendor/modernizr.custom.97074.js', array('jquery'), false, true);   
    wp_enqueue_script('jquery.hoverdir-script', petrikor_ASSETS_URI . 'vendor/jquery.hoverdir.js', array('jquery'), false, true);
    
    wp_enqueue_script('main-script', petrikor_ASSETS_URI . 'js/main.js', array('jquery'), false, true);
    
}

add_action('wp_enqueue_scripts', 'petrikor_scripts');