<?php
/*
 * TEMPLATE PART FOR DISPLAYING POSTS
 * @PACKAGE petrikor
 * 
 */
?>

<?php
$page_id = get_the_ID();
$image_id = get_post_meta($page_id, 'entryheader_meta', true);
$image_url = wp_get_attachment_url($image_id);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- ENTRY HEADER -->
    <?php
    if ($image_url) {
        $style = ".entry-image{background-image:url($image_url);}";
        wp_register_style('entry-header-style', false);
        wp_enqueue_style('entry-header-style');
        wp_add_inline_style('entry-header-style', $style);
        ?>
        <section class="entry-header has-image">
            <div class="row">
                <div class="entry-image">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/curvedline.png'; ?>"/>
                </div>
                <div class="entry-title">
                    <h2><?php the_title(); ?></h2>
                    <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                </div>
            </div>
        </section>

        <div style="float: left; width: 100%; height: 70px;"></div>

    <?php } elseif (!is_front_page()) { ?>

        <section class="entry-header">
            <div class="vc_row">
                <div class="col-md-12">
                    <div class="entry-title">
                        <h2><?php the_title(); ?></h2>
                        <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php } ?><!-- .ENTRY HEADER -->

    <!-- ENTRY CONTENT -->
    <div class="entry-content">
        <div class="row">

            <div class="col-md-8">
                <?php the_content(); ?>
            </div>

            <div class="col-md-4">
                <section class="vc_section">
                    <div class="vc_row">
                        <div class="col-md-12">
                            <div class="latest-news">
                                <div class="header">
                                    <p><?php _e('Latest News', 'petrikor'); ?></p>
                                </div>
                                <?php
                                $args = array(
                                    'post_type' => 'news',
                                    'post__not_in' => array($page_id),
                                    'posts_per_page' => 4
                                );
                                $query = new WP_Query($args);
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <figure>
                                            <picture><?php the_post_thumbnail(); ?></picture>
                                            <figcaption>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <?php the_excerpt(); ?>
                                            </figcaption>
                                        </figure>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div><!-- .ENTRY CONTENT -->

</article><!-- #POST -->