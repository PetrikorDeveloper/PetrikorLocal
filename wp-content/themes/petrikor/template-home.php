<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 *
 * TABLE OF CONTENT:
 * ----------------
 */
/* * ***************************************************************************
 * ***************  -- Template Name: Home Page Template
 * ************************************************************************** */

get_header();

$lang=get_bloginfo("language");

?>
    <div id="primary" class="content-area">
        <?php $top_header = get_field('top_header'); ?>
        <?php if ($top_header['display'] == 'true') : ?>
            <div class="top-header bg-image bg-image-fixed has-clouds" data-clouds="has-clouds" style="background-image: url(<?= $top_header['image']; ?>);background-color: rgba(232,232,232, 0.4); mix-blend-mode:multiply;">
                <div class="site-title" data-aos="zoom-in-down"
                     data-aos-duration="3000"><?= $top_header['title']; ?></div>
                <?php if ($top_header['has_clouds'] == 'true') : ?>
                    <?php get_template_part('template-parts/content', 'clouds'); ?>
                <?php endif; ?>
                <?php if ($top_header['gif_image']) : ?>
                    <div class="gif-overlay"><img src="<?= $top_header['gif_image'] ?>"> </div>
                <?php endif; ?>


                <div class="container partnerships" style="position: absolute; bottom:1px;max-width: 100%;z-index:11;text-align: center;">
                    <a href="https://certification-searchads.apple.com/certificate/I1Jqd1alNh/Saleem-El-Deek" target="_blank">
                        <img src="<?= BASE_URL;?>images/apple01.svg" style="width:105px; height:auto;">
                    </a>
                    <a href="https://www.google.com/partners/agency?id=7117290179" target="_blank">
                        <img src="<?= BASE_URL;?>images/google.svg" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.semrush.com/agencies/petrikor-solutions/" rel="noreferrer noopener" target="_blank">
                        <img src="<?= BASE_URL;?>images/semrush-badge.svg" width="100" height="100"/>
                    </a>

                    <a href="https://www.credly.com/badges/b19447ac-1321-421b-8816-8379186785bf/public_url" target="_blank">
                        <img src="<?= BASE_URL;?>images/meta-certified-media-planning-professional.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.credly.com/badges/d9c5d314-5e2c-4e53-810c-65d68d551e7f/public_url" target="_blank">
                        <img src="<?= BASE_URL;?>images/meta-certified-creative-strategy-professional.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.credly.com/badges/5022b150-1ae7-4e80-87d8-51ff73832fe3/public_url" target="_blank">
                        <img src="<?= BASE_URL;?>images/meta-certified-digital-marketing-associate.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.credly.com/badges/d10da38a-8ef8-4033-bae1-e016723ab6f6/public_url" target="_blank">
                        <img src="<?= BASE_URL;?>images/meta-certified-media-buying-professional.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.designrush.com/agency/profile/petrikor-solutions" target="_blank">
                        <img src="<?= BASE_URL;?>images/designrush-2023.png" style="width:190px; height:auto;">
                    </a>

                    <a>
                        <img src="<?= BASE_URL;?>images/shopify-partner.svg" style="width:190px; height:auto;">
                    </a>

                </div>
            </div>

        <?php endif; ?>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@1.5.7/dist/lottie-player.js"></script>

        <div class="testimol-home-2024<?php if ($lang == 'ar'){echo '-ar';}else {}?> testimol-home-2024-forall section-in-page   has-clouds" data-clouds="has-clouds" id="our-work">
            <div class="container ">
            <h2 class="title aos-init aos-animate" data-aos="fade-down"><p style="text-align:<?php if ($lang == 'ar'){echo 'right';}else {echo'left';}?> ;    color: gray
                        !important;"><?php if ($lang == 'ar'){echo 'شهادات العملاء';}else {echo'Clients Reviews';}?> </h2>
         <img src="https://petrikorsolutions.com/wp-content/uploads/2024/03/Frame-9.svg" class="clutch-c for-desk-clut">
          <div class="flex-riv-row-p">
              <div class="flex-riv-row-ch1">
                  <img src="https://petrikorsolutions.com/wp-content/uploads/2024/03/Frame-9.svg" class="clutch-c for-mobile-clut">
                  <p class="rev-value">4.9</p>
                  <div class="rev-start">
                      <lottie-player  id="data1"
                                      autoplay

                                      mode="normal"
                                      src="https://petrikor.agency/datastars1.json"
                      >
                      </lottie-player>
                  </div>

              </div>
              <div class="flex-riv-row-ch2">
                  <a target="_blank" href="https://clutch.co/profile/petrikor-solutions#reviews"><?php if ($lang == 'ar'){echo 'قراءة جميع التقييمات';}else {echo'Read All Reviews';}?></a>
                  <a target="_blank" href="https://review.clutch.co/review/?provider_id=1686819"><?php if ($lang == 'ar'){echo 'أضف   تقييم';}else {echo'Submit a Review';}?></a>
              </div>
          </div>
            </div>
            <div class="container testimol-home-2024-container">

                <div class="testimol-home-2024-carousel<?php if ($lang == 'ar'){echo '-ar';}else {}?>  owl-carousel owl-theme ">
                    <?php
                    function getInitials($str){
                        $words = explode(" ", $str);
                        $acronym = "";

                        foreach ($words as $w) {
                            $acronym .= mb_substr($w, 0, 1);
                        }

                        return $acronym;
                    }

                    $arguments = array(
                        "post_type" => "testimonials",
                        'posts_per_page' => -1
                    );
                    $testimonials_array = get_posts($arguments);
                    //echo var_dump($testimonials_array);

                    foreach ($testimonials_array as $testimonial){

                        $service = get_field( 'header_title', $testimonial->ID);
                        ?>
                        <div class="item aos-init" data-aos="zoom-in-left" data-aos-delay="200">
                            <div class="item-testi " >
                                <h3 class="testimol-home-title-2024">
                                    <!--<span class="title-pic"><?php echo getInitials($testimonial->post_title);  ?></span>-->
                                    <?php echo $testimonial->post_title; ?></h3>
                                <h4 class="testimol-home-sub-title-2024"><?php echo $service; ?></h4>
                                <p class="testimol-home-content-2024"> <?php echo $testimonial->post_excerpt ?> </p>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="divider-banner">
            <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-v1.png"/>
        </div>
        <?php $get_to_know_us = get_field('get_to_know_us'); ?>
        <?php if ($get_to_know_us['display'] == 'true') : ?>
            <div class="get-to-section section-in-page bg-image bg-image-fixed has-clouds after-section" data-clouds="has-clouds" style="background-image: url(<?= $get_to_know_us['background']; ?>);" >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" >
                            <div class="site-title" data-aos="fade-right" id="trigger-right"><?= $get_to_know_us['title']; ?></div>
                            <div class="content" data-aos="fade-down">
                                <?= $get_to_know_us['content']; ?>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                        <?php if (!empty($get_to_know_us['image'])): ?>
                            <div class="section-image-after d-none d-sm-block" data-aos="fade-left" style="background-image: url(<?= $get_to_know_us['image']; ?>);"></div>
                        <?php endif; ?>
                        <?php if ($get_to_know_us["right_overlay"] == "true") : ?>
                            <!--<div class="image-overlay" ></div>-->
                        <?php endif; ?>

                    </div>
                </div>
                <?php if ($get_to_know_us['has_clouds'] == 'true') : ?>
                    <?php get_template_part('template-parts/content', 'clouds'); ?>
                <?php endif; ?>
            </div>

        <?php endif; ?>
        <?php $our_full_capabilities = get_field('our_full_capabilities'); ?>
        <?php if ($our_full_capabilities['display'] == 'true') : ?>
            <div class="our_full_capabilities-section bg-image bg-image-fixed has-clouds" data-clouds="has-clouds" id="services" style="background-image: url(<?= $our_full_capabilities['background']; ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 mr-auto pt-5 pb-5">
                            <h3 class="site-title gray pt-3" data-aos="fade-down"><?= $our_full_capabilities['title']; ?></h3>
                        </div>
                    </div>
                    <?php $services = $our_full_capabilities['services']; ?>
                    <?php if ($services) : ?>
                        <div class="row">
                            <?php
                            $z = 0;
                            $zz = 100;
                            $data_aos = ['zoom-in-left', 'zoom-in-down', 'zoom-in-right'];
                            foreach ($services as $service) :
                                $icon = $service['icon'];
                                $title = $service['title'];
                                $content = $service['content'];
                                $link = $service['link'];
                                ?>
                                <div class="col-sm-4" data-aos="<?= $data_aos[$z]; ?>" data-aos-delay="<?= $zz + 100 ?>">
                                    <div class="service">
                                        <i class="bg-image icon mb-2 <?= str_replace(' ', '-', strtolower($title)); ?>" style="background-image: url(<?= $icon; ?>)"></i>
                                        <a href="<?php if ($link) : echo $link['url']; endif; ?>"><h4 class="title mb-2"><?= $title; ?></h4></a>
                                        <div class="content">
                                            <?= $content; ?>
                                            <?php
                                            if ($link) :
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <a class="read-more" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                                <?php $z == 2 ? $z = 0 : $z++; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($our_full_capabilities['has_clouds'] == 'true') : ?>
                    <?php get_template_part('template-parts/content', 'clouds'); ?>
                <?php endif; ?>
            </div>

        <?php endif; ?>
        <?php $we_work_with = get_field('we_work_with'); ?>
        <?php if ($we_work_with['display'] == 'true') : ?>
            <div class="we_work_with-section bg-image bg-image-fixed has-clouds" id="our-clients" data-clouds="has-clouds" style="background-image: url(<?= $we_work_with['background']; ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 pt-5 pb-5">
                            <h2 class="site-title gray pt-3 " data-aos="fade-up"><?= $we_work_with['title']; ?></h2>
                        </div>
                        <div class="content col-sm-12" data-aos="fade-down">
                            <?= $we_work_with['content']; ?>
                        </div>
                    </div>
                    <?php $works = $we_work_with['works']; ?>
                    <?php if ($works) : ?>
                        <div class="section-slider" data-slides="5" data-aos="zoom-in-down">
                            <?php
                            foreach ($works as $work) :
                                $icon = $work['icon'];
                                $link = $work['link'];
                                ?>
                                <div class="work">
                                    <?php
                                    if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                        <?php endif; ?>
                                        <div class="bg-image icon mb-2" style="background-image: url(<?= $icon; ?>)"></div>
                                        <?php if ($link) : ?>
                                    </a>
                                <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ($we_work_with['has_clouds'] == 'true') : ?>
                    <?php get_template_part('template-parts/content', 'clouds'); ?>
                <?php endif; ?>
            </div>

        <?php endif; ?>

        <div class="divider-weworkwith-talk">
            <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-big.png"/>
        </div>

        <?php $lets_talk = get_field('lets_talk'); ?>
        <?php if ($lets_talk['display'] == 'true') : ?>
            <div class="lets_talk-section bg-image bg-image-fixed has-clouds" data-clouds="has-clouds" style="background-image: url(<?= $lets_talk['background']; ?>);">
                <div class="container">
                    <div class="d-flex flex-column justify-content-between align-items-center">
                        <p class="title pt-3" data-aos="zoom-in-up" style="color:#F1E4B2 !important;"><?= $lets_talk['title']; ?></p>
                        <div class="content" data-aos="zoom-in-up" style="text-align:center;">
                            <?= $lets_talk['content']; ?>
                        </div>
                        <a href="#contact" data-aos="zoom-in-up" class="has-scroll"><i class="fas fa-chevron-down" style="color:#F1E4B2;"></i></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="divider-talk-portfolio">
            <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-v2.png"/>
        </div>

        <?php $portfolio = get_field('portfolio'); ?>
        <?php if ($portfolio['display'] == 'true') : ?>
            <div class="portfolio-section bg-image bg-image-fixed has-clouds" data-clouds="has-clouds" style="background-image: url(<?= $portfolio['background']; ?>);" id="our-work">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 mr-auto pt-5 pb-5">
                            <h2 class="site-title gray pt-3" data-aos="fade-right"><?= $portfolio['title']; ?></h2>
                            <div class="content" data-aos="zoom-out-left">
                                <?= $portfolio['content']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-tabs" data-aos="fade-left">


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
                        <?php if ($terms) : ?>
                            <div id="js-grid-masonry-projects" class="cbp">
                                <?php
                                $args = array(
                                    'post_type' => 'case_studies',
                                    'posts_per_page' => -1,
                                    'orderby' => 'title',
                                    'order' => 'ASC',

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

<!--                            </div>-->
<!--                        --><?php //endif; ?>
<!--                        --><?php //if ($terms) : ?>
                            <!--<div id="js-filters-masonry-projects" class="cbp-l-filters-buttonCenter">

                                <?php $i = 0;
                                if ($lang == 'ar'){
                                    $all = 'كل شيء';
                                } else {
                                    $all = 'All';
                                }
                                ?>

                                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                    <?php echo $all ; ?> <div class="cbp-filter-counter"></div>
                                </div>

                                <?php foreach ($terms as $term) : ?>
                                    <div data-filter=".<?= $term->slug; ?>" class="cbp-filter-item">
                                        <?= $term->name; ?> <div class="cbp-filter-counter"></div>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </div> -->

<!--                        --><?php //endif; ?>
<!--                        --><?php //if ($terms) : ?>
<!--                            <div id="js-grid-masonry-projects" class="cbp">-->
                                <?php
                                $args = array(
                                    'post_type' => 'portfolio',
                                    'posts_per_page' => 4,
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

                    <div class="text-right">
                        <a href="<?=$portfolio['see_more_url']['url'];?>" target="<?=$portfolio['see_more_url']['target'];?>">
                            <?php
                            if ($lang == 'ar'){
                                $see_more = 'شوف أكثر';
                            } else {
                                $see_more = 'SEE MORE';
                            }
                            ?>
                            <?=$see_more;?>
                        </a>
                    </div>

                </div>
                <?php if ($portfolio['has_clouds'] == 'true') : ?>
                    <?php get_template_part('template-parts/content', 'clouds'); ?>
                <?php endif; ?>


            </div>

        <?php endif; ?>
    </div>
<?php
get_footer();