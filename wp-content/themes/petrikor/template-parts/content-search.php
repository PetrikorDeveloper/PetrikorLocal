<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package petrikor
 */
if (is_post_type('product')) : 
    echo "<script>bodywoocommerce();</script>";
    wc_get_template_part( 'content', 'product' );
else : ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(array('_container', 'main-post', 'style1', 'col-sm-12','mr-auto ml-auto')); ?>>
        <div class="row border-line-h">
            <?php if (has_post_thumbnail()) {  ?>
                <div class="columns-posts-img col-md-4">
                    <?php petrikor_post_thumbnail(); ?>
                </div>

                <div class="content-post col-md-8">
                <?php } else { ?>
                    <div class="content-post col-md-12">
                    <?php } ?>
                    <?php the_title(sprintf('<h4 class="entry-title title-post"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>

                    <?php if ('post' === get_post_type()) : ?>
                        <ul class="meta-post">
                            <?php
                            petrikor_posted_meta();
                            ?>
                        </ul><!-- .entry-meta -->
                    <?php endif; ?>

                    <div class="entry-post">
                        <?php the_excerpt(); ?>
                    </div>

                    <div class="clearfix"></div>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-theme read-more-btn serach"> <?php esc_html_e('Continue Reading', 'petrikor'); ?> <i class="fas fa-long-arrow-alt-right"></i> </a>
                    </div>

                </div>

    </article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>