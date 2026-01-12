<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 *
 * TABLE OF CONTENT:
 * ----------------
 */
/* * ***************************************************************************
 * ***************  -- Template Name: Our People Page Template
 * ************************************************************************** */

get_header();
?>
<div id="primary" class="content-area">
    <?php get_template_part('template-parts/content', 'header'); ?>
    <section class="people-page page-main-content has-clouds">
        <div class="container">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'our_people',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'DESC',
                    'orderby' => 'publish_date'
                );
                ?>
                <?php $wp_query = new WP_Query($args); ?>

                <?php if ($wp_query->have_posts()) : ?>
                    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <article class="col-sm-4 mb-md-4 mb-lg-0" data-aos="fade-down">
                                <div class="people-post">
                                    <figure class="mb-30">
                                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?= get_the_title(); ?>">
                                    </figure>
                                    <div class="people-details">
                                        <h4 class="full-name">
                                            <?= get_field('full_name'); ?>
                                        </h4>
                                        <h6 class="job-title">
                                            <?= get_field('job_title'); ?>
                                        </h6>
                                        <p class="excerpt">
                                            <?= limit_content_chr(get_the_excerpt(), 400); ?>
                                        </p>
                                    </div>
                                </div>

                                <h3 class="people-name"><?= get_the_title(); ?></h3>
                            </article>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php
                wp_reset_postdata();
                wp_reset_query()
                ?>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
