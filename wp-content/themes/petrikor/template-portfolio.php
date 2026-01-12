<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 */
/* * ***************************************************************************
 * ***************  -- Template Name: Portfolio Page Template 
 * ************************************************************************** */

get_header();
$lang=get_bloginfo("language");
?>

<div id="primary" class="content-area">
    <?php get_template_part('template-parts/content', 'header'); ?>
    <section class="portfolio-page portfolio-section has-clouds">
        <div class="container">
            <div class="title-case-studies" style="">


                <p class="small-description"><?php echo get_field('description_below_header'); ?></p>
                <?php
                    if ($lang == 'ar'){
                        $propsal = 'إحصل على مقترح لمشروعك';
                    } else{
                        $propsal = 'Get My Free Proposal';
                    }
                ?>
                <a href="<?php echo get_field('get_proposal_link'); ?>" class="painted-btn"><?php echo $propsal; ?></a>
            </div>
            <div class="row">
                <div class="portfolio-tabs w-100" data-aos="fade-down">

                    <?php
                    $terms = get_terms([
                        'taxonomy' => 'portfolio-category',
                        'hide_empty' => false,
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'number' => 6 //specify yours
                    ]);

                    $terms_slugs = wp_list_pluck($terms, 'slug');
                    ?>

                    <!-- Nav tabs -->
                        <?php
                            if ($lang == 'ar'){
                                $all = 'الكل';
                            } else{
                                $all = 'All';
                            }
                        ?>
                    <?php if ($terms) : ?>
                        <div id="js-filters-juicy-projects" class="cbp-l-filters-buttonCenter">

                            <?php $i = 0; ?>
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">

                               <?php echo file_get_contents( BASE_URL."images/portfolio-cat-icons/all.svg.txt" ); ?>

                            <br/>
                                <?php echo $all; ?> <div class="cbp-filter-counter"></div>
                                <br/>
                                <div class="portfolio-underline"><?php echo $all; ?></div>
                            </div>

                            <?php foreach ($terms as $term) : ?>
                                <div data-filter=".<?= $term->slug; ?>" class="cbp-filter-item">
                                   <?php echo file_get_contents( BASE_URL."images/portfolio-cat-icons/".str_replace('-en', '', str_replace('-ar', '', strtolower($term->slug))).".svg.txt" ); ?>
                                    <br/>
                                    <?= $term->name; ?> <div class="cbp-filter-counter"></div>
                                    <br/>

                                    <div class="portfolio-underline"><?php echo $term->name; ?></div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>
                </section>

                <div class="divider-portfolio">
                    <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-portfolio.png"/>
                </div>

                <section class="page-main-content portfolio-container">
                <div class="container">
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
                                )
                            );

                            $wp_query = new WP_Query($args);
                            if ($wp_query->have_posts()) :
                                ?>

                                <?php

                                while ($wp_query->have_posts()) :
                                    $wp_query->the_post();
                                    $term_obj_list = get_the_terms(get_the_ID(), 'portfolio-category');
                                    $terms_string = join(' ', wp_list_pluck($term_obj_list, 'slug'));
                                    ?>
                                    <div class="cbp-item <?= $terms_string ?>">
                                        <?php
                                        get_template_part('template-parts/post/content', 'portfolio', ['category' =>  $terms_string ]);
                                        ?>
                                    </div>
                                    <?php
                                endwhile;
                                ?>
                                <?php
                                wp_reset_postdata();
                                wp_reset_query()
                                ?>
                            <?php endif; ?>
                            <?php $i++; ?>

                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </section>

</div>

<?php
get_footer();
