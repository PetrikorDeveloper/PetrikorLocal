<?php
/**
 * Displays top navigation
 * 
 * @package petrikor
 */
global $petrikor_options;
$logo = array_key_exists("logo", $petrikor_options) ? $petrikor_options['logo']['url'] : "";
?>
<nav class="navbar navbar-expand-lg petrikor-main-menu">  
    <?php
    wp_nav_menu([
        'menu' => 'main-menu',
        'theme_location' => 'primary-menu',
        'container' => 'div',
        'container_id' => 'navbarSupportedContent',
        'container_class' => 'collapse navbar-collapse',
        'menu_id' => false,
        'menu_class' => 'navbar-nav',
        'depth' => 3,
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4navwalker()
    ]);
    ?>

</nav>
<button id="sidebarCollapse" class="lines-button" type="button" role="navigation" aria-label="Toggle Navigation" title="Toggle Navigation">
    <span class="lines"></span>
</button>