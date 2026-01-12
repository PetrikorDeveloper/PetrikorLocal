<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 */
/* * ***************************************************************************
 * ***************  -- Template Name: Case Studies Template
 * ************************************************************************** */

get_header();
$lang = get_bloginfo("language");

?>

<div id="primary" class="content-area">
    <?php get_template_part('template-parts/content', 'header'); ?>
    <section class="portfolio-page portfolio-section case-study-section page-main-content has-clouds">
        <div class="container">
            <div class="title-case-studies" style="">

                <h4 class="small-title"><?php echo get_field('title_below_header'); ?></h4>
                <p class="small-description"><?php echo get_field('description_below_header'); ?></p>

                <?php
                if ($lang == 'ar') {
                    $propsal = 'إحصل على مقترح لمشروعك';
                } else {
                    $propsal = 'Get My Free Proposal';
                }
                ?>

                <a href="<?php echo get_field('get_proposal_link'); ?>" class="painted-btn"><?php echo $propsal; ?></a>
            </div>
            <div class="row">
                <div class="portfolio-tabs case-study-tabs w-100" data-aos="fade-down">

                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'portfolio-category',
                        'hide_empty' => false,
                        'orderby' => 'name',
                        'order' => 'ASC',
                        //                        'meta_query' => array(
                        //                            'key' => 'is_case_study',
                        //                            'value' => 1,
                        //                            'compare' => 'LIKE'
                        //                        ),
                        'number' => 9 //specify yours
                    ]);
                    $terms_slugs = wp_list_pluck($terms, 'slug');
                    ?>


                    <?php if ($terms) : ?>
                        <div id="js-grid-juicy-projects" class="cbp">
                            <?php
                            $args = array(
                                'post_type' => 'portfolio',
                                'posts_per_page' => -1,
                                'orderby' => 'title',
                                'order' => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'portfolio-category',
                                        'field' => 'slug',
                                        'terms' => $terms_slugs
                                    )
                                ),
                                'meta_key'      => 'is_case_study',
                                'meta_value'    => 1,
                            );

                            $wp_query = new WP_Query($args);

                            if ($wp_query->have_posts()) :
                            ?>

                                <?php
                                while ($wp_query->have_posts()) :
                                    $wp_query->the_post();

                                    //                                    if(get_field('is_case_study')) {
                                    $term_obj_list = get_the_terms(get_the_ID(), 'portfolio-category');
                                    $terms_string = join(' ', wp_list_pluck($term_obj_list, 'slug'));
                                ?>
                                    <div class="cbp-item <?= $terms_string ?>">
                                        <?php
                                        get_template_part('template-parts/post/content', 'portfolio', ['category' =>  $terms_string]);
                                        ?>
                                    </div>
                                <?php
                                // }
                                endwhile;
                                ?>
                                <?php
                                wp_reset_postdata();
                                wp_reset_query()
                                ?>
                            <?php endif; ?>


                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
