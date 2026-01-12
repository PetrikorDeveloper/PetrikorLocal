<?php
/*
 * THE TEMPLATE FOT DISPLAYING ALL SINGLE POSTS
 * @PACKAGE petrikor
 * 
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('template-parts/content', 'header'); ?>

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/post/content', 'single_service');

                //get_template_part('template-parts/post/content', 'single_service_new');
            }
        } else {
            get_template_part('template-parts/post/content', 'none');
        }
        ?>
    </main>
</div>

<?php
get_footer();
