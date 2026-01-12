<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g. it puts together the home page when no home.php file exists.
 * 
 * @package petrikor
 *
 */
get_header();
?>
<?php get_template_part('template-parts/content', 'header'); ?>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="blog-main page-main-content" role="main">
            <div class="container">
                <?php if (have_posts()) : ?>

                        <div class="petrikor-posts-container row has-clouds">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) : the_post();
                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('template-parts/post/content', 'blog');
                            endwhile;
                            ?>
                        </div>
                    <?php
                else :
                    get_template_part('template-parts/post/content', 'none');
                endif;
                ?>

                <div class="container text-center">
                    <a class="btn-petrikor-load petrikor-load-more" href="#" data-page="<?php echo petrikor_check_paged(1); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <span class="petrikor-icon petrikor-loading"></span>
                        <span class="text">Load More</span>
                        <i class="text fas fa-angle-double-down"></i>
                        <span class="cbp-l-loadMore-loadingText" style="display: none;">
         <?php get_template_part('template-parts/content', 'loader-portfolio'); ?>
                                </span>
                    </a>
                </div><!-- .container -->
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
</div><!-- .wrap -->
<?php
get_footer();
