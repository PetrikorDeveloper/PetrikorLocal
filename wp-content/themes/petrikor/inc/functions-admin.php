<?php
/*
 * THEME FUNCTIONS
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. DEFINE PATHs
 * 2. CUSTOM POST TYPE
 * 3. CUSTOM LOGIN DESIGN
 * 4. REDUX FRAMEWORK
 * 5. REQUIRE OTHER THEME FUNCTIONS
 */
/* * ***************************************************************************
 * **************************** 1. DEFINE PATHs  *****************************
 * ************************************************************************** */

$template_directory = trailingslashit( get_template_directory() );
$template_uri       = trailingslashit( get_template_directory_uri() );

if ( ! defined( 'petrikor_THEME_PATH' ) ) {
	define( 'petrikor_THEME_PATH', $template_directory );
}

if ( ! defined( 'petrikor_THEME_INCLU_PATH' ) ) {
	define( 'petrikor_THEME_INCLU_PATH', $template_directory . 'inc/' );
}

if ( ! defined( 'petrikor_THEME_ADMIN_PATH' ) ) {
	define( 'petrikor_THEME_ADMIN_PATH', $template_directory . 'inc/admin-assets/' );
}

if ( ! defined( 'petrikor_THEME_FRONT_PATH' ) ) {
	define( 'petrikor_THEME_FRONT_PATH', $template_directory . 'inc/front-assets/' );
}

if ( ! defined( 'petrikor_THEME_PATH' ) ) {
	define( 'petrikor_THEME_PATH', $template_directory );
}

if ( ! defined( 'petrikor_THEME_URI' ) ) {
	define( 'petrikor_THEME_URI', $template_uri );
}

if ( ! defined( 'petrikor_ASSETS_URI' ) ) {
	define( 'petrikor_ASSETS_URI', $template_uri.'assets/' );
}

if ( ! defined( 'THEME_TEXT_DOMAIN' ) ) {
	define( 'THEME_TEXT_DOMAIN', 'petrikor' );
}
   
/* * ***************************************************************************
 * **************************** 2. CUSTOM POST TYPE  *****************************
 * ************************************************************************** */

require_once ( petrikor_THEME_ADMIN_PATH.'admin-custom-post.php' );

/* * ***************************************************************************
 * **************************** 3. CUSTOM LOGIN DESIGN  *****************************
 * ************************************************************************** */

require_once ( petrikor_THEME_ADMIN_PATH.'custom-login.php' );  

/* * ***************************************************************************
 * **************************** 4. REDUX FRAMEWORK *****************************
 * ************************************************************************** */

if (!class_exists('ReduxFramework')) {
    require_once( petrikor_THEME_INCLU_PATH . 'redux/ReduxCore/framework.php' );
}

if (!isset($redux_demo)) {
    require_once( petrikor_THEME_INCLU_PATH . 'redux/inc/admin-config.php' );
}

/* * ***************************************************************************
 * **************************** 5. THEME SUPPORT *****************************
 * ************************************************************************** */

require_once ( petrikor_THEME_INCLU_PATH.'theme-support.php' ); 

/* * ***************************************************************************
 * **************************** 6. STYLE & SCRIPTS *****************************
 * ************************************************************************** */

require_once ( petrikor_THEME_INCLU_PATH.'enqueue.php' );  

/**
 * Registers an editor stylesheet for the theme.
 */
function petrikor_add_editor_styles() {
    add_editor_style( '//fonts.googleapis.com/css?family=Nunito|Open+Sans|Roboto Condensed' );
}
add_action( 'admin_init', 'petrikor_add_editor_styles' );