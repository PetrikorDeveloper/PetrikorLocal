<?php
/**
 * Displays top navigation
 * 
 * @package petrikor
 */

global $petrikor_options;
$facebook = array_key_exists("facebook", $petrikor_options) ? $petrikor_options['facebook'] : "";
$twitter = array_key_exists("twitter", $petrikor_options) ? $petrikor_options['twitter'] : "";
$instagram = array_key_exists("instagram", $petrikor_options) ? $petrikor_options['instagram'] : "";
$youtube = array_key_exists("youtube", $petrikor_options) ? $petrikor_options['youtube'] : "";
$email = array_key_exists("email", $petrikor_options) ? $petrikor_options['email'] : "";
$phone = array_key_exists("phone", $petrikor_options) ? $petrikor_options['phone'] : "";
$copyright = array_key_exists("copyright", $petrikor_options) ? $petrikor_options['copyright'] : "";
$copyright_bg = array_key_exists("copyright-bg", $petrikor_options) ? $petrikor_options['copyright-bg']['color'] : "";
$logo = array_key_exists("logo", $petrikor_options) ? $petrikor_options['logo']['url'] : "";
$footer_logo = array_key_exists("footer_logo", $petrikor_options) ? $petrikor_options['footer_logo']['url'] : "";
?>

<!-- Sidebar  -->
<nav id="sidebar">
    <div id="dismiss">
        <i></i>
    </div>
    <div class="sidebar-header">
        <a href="<?= site_url(); ?>" title="" >
            <img src="<?= $footer_logo; ?>" alt="" />
        </a>
    </div>
    <?php
     wp_nav_menu([
        'menu' => 'main-menu',
        'theme_location' => 'primary-responsive-menu',
        'container' => 'div',
        'container_id' => 'navbarSupportedContent',
        'container_class' => '',
        'menu_id' => false,
        'menu_class' => 'navbar-nav m-auto',
        'depth' => 3,
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4navwalker()
    ]);
    ?>

</nav>
