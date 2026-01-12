<?php
/*
 * Template part for displaying page content in page.php
 * @package petrikor
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('template-parts/content', 'header'); ?>
    <div class="entry-content page-main-content">
        <div class="container-fluid">
            <div class="m-auto">
                <div class="content text-center mt-3 mb-4">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

</article>