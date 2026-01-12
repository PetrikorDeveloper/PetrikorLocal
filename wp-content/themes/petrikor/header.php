<?php

/**
 * THE HEADER FOR OUR THEME
 * DISPLAYS ALL OF THE <head> SECTION AND EVERYTHING UP TILL <div id="page">
 * 
 * @PACKAGE petrikor
 * 
 */
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $petrikor_options;
$logo = array_key_exists("logo", $petrikor_options) ? $petrikor_options['logo']['url'] : "";

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Facebook Instant Articles Claim Code -->
    <meta property="fb:pages" content="488559194873614" />

   
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script> -->
	
<!-- 	cookie banner -->
<script src="https://cdn.websitepolicies.io/lib/cookieconsent/cookieconsent.min.js" defer></script><script>window.addEventListener("load",function(){window.wpcc.init({"corners":"normal","colors":{"popup":{"background":"#f6f6f6","text":"#000000","border":"#555555"},"button":{"background":"#555555","text":"#ffffff"}},"position":"bottom","content":{"href":"https://petrikorsolutions.com/","message":"This website uses cookies in order to offer you the most relevant information. Please accept cookies for optimal performance."},"margin":"none","padding":"large"})});</script>
	<!-- 	End cookie banner -->

	
    <title><?php bloginfo( 'description' ); ?></title>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Skipper">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <meta name="google-site-verification" content="sS8MCbVbW0xNQ2LxRREAHSNU50YKb1Txm1LKuDuhO0U" />
    <meta name="facebook-domain-verification" content="lm7y1ubjnowhvp67ox60smow03y9zo" />
    <meta name='ir-site-verification-token' value='2074227719'>

    <?php wp_head(); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<!-- 	<script src="/wp-content/themes/petrikor/assets/js/jquery.sprite-animator.js"></script> -->

</head>

<body
	  <?php body_class(); ?>>
        <!--<div class="more-snow">-->


  
    <div class="preloader">
        <?php get_template_part('template-parts/content', 'loader');?>
    </div>

    <!--==========================
   Header
 ============================-->
    <main class="site wrapper" role="main">

        <!-- Start Header -->
        <?php get_template_part('template-parts/navigation/navigation', 'responsive'); ?>
         <main class="site-content" role="main">
            <header class="middle-header petrikor-header">
                <div class="container">
                    <?php if (has_nav_menu('primary-menu')) : ?>
                        <?php get_template_part('template-parts/navigation/navigation', 'main'); ?>
                    <?php endif; ?>
                </div>

            </header>