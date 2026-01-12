<?php
/*
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package petrikor
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        if (have_posts()):
            while (have_posts()): the_post();
                if (is_front_page()) {
                    get_template_part('template-parts/page/content', 'home');
                } else {
                    get_template_part('template-parts/page/content', 'page');
                }
            endwhile;
        endif;
        ?>
    </main>
</div>

<?php
get_footer();
