<?php
/**
 * Displays top navigation
 * 
 * @package petrikor
 */
?>
<?php
wp_nav_menu([
    'menu' => 'footer-menu',
    'theme_location' => 'footer-menu',
    'container' => 'div',
    'container_id' => '',
    'container_class' => 'footer-menu',
    'menu_id' => false,
    'menu_class' => 'list-inline font-small text-uppercase petrikor-scroll-menu',
    'depth' => 2,
    'fallback_cb' => 'bs4navwalker::fallback',
    'walker' => new bs4navwalker()
]);
