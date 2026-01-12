<?php
/*
 * Template part for displaying posts
 * @package petrikor
 * 
 */
$i = 1;
?>
<section class="single_serivce page-main-content" id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>
    <?php $sem_section = get_field('sem_section', get_the_ID()); ?>
    <?php $seo_section = get_field('seo_section', get_the_ID()); ?>
    <?php $second_section = get_field('second_section', get_the_ID()); ?>
    <?php $third_section = get_field('third_section', get_the_ID()); ?>
    <?php $fourth_section = get_field('fourth_section', get_the_ID()); ?>
    <?php $fifth_section = get_field('fifth_section', get_the_ID()); ?>
    <?php $sixth_section = get_field('sixth_section', get_the_ID()); ?>
    <?php $seventh_section = get_field('seventh_section', get_the_ID()); ?>
    <?php $eighth_section = get_field('eighth_section', get_the_ID()); ?>
    <?php $sections = array($second_section, $third_section, $fourth_section, $fifth_section, $sixth_section, $seventh_section, $eighth_section); ?>
    <?php $first_section = get_field('first_section', get_the_ID()); ?>
    <?php if ($first_section['display'] == 'true') : ?>
	<?php if ($first_section['right_overlay_image'] !=''){ ?>
	<div class="right_overlay_image-section bg-image" style="background-image: url(<?= $first_section['right_overlay_image']; ?>)"> </div>
            <?php } ?>
       <section class="portfolio-first-section bg-image" id="smm_section"style="background-image: url(<?= $first_section['background']; ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 mr-auto">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                            <div class="bg-image icon"  data-aos="fade-down"  data-aos-offset="300"
                                 data-aos-easing="ease-in-sine" style="background-image:url(<?= $first_section['icon']; ?>)"></div> </div> </div>
                            <div class="desc aos-init aos-animate" data-aos="fade-up" >
                                <?= $first_section['content']; ?>
                            </div>
                            <div class="button-box" data-aos="fade-up">
                                <?php
                                $link = $first_section['button'];
                                if ($link) :    
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                <a  href="<?php echo esc_url($link_url); ?>" class="content-scroll" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
	<!--    digital-marketing SEM-->
    <?php if ($sem_section['heading']!=''): ?>
    <section class="section-in-page sem_section bg-image" id="sem_section" style="background-color: <?= $sem_section['background_color']; ?>">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mr-auto">
                    <div class="content">
                        <h2 class="blue-heading title-normal aos-init aos-animate" data-aos="fade-down"><?= $sem_section['heading']?> </h2>
                        <div class="bg-image icon"  data-aos="fade-down"  data-aos-offset="300"
                             data-aos-easing="ease-in-sine" style="background-image:url(<?= $first_section['icon']; ?>)"></div>
                        <div class="desc aos-init aos-animate" data-aos="fade-up" >
                            <?= $sem_section['content']; ?>
                        </div>
                        <div class="button-box" data-aos="fade-up">
                            <?php
                            $link = $sem_section['button'];
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a  href="<?php echo esc_url($link_url); ?>" class="content-scroll" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
<!--    digital-marketing SEM-->

    <!--    digital-marketing SEO-->
    <?php if ($seo_section['heading']!=''): ?>
        <section class="section-in-page seo_section bg-image" id="seo_section" style="background-image: url(<?= $first_section['background']; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mr-auto">
                    <div class="content">
                        <h2 class="blue-heading title-normal aos-init aos-animate" data-aos="fade-down"><?= $seo_section['heading']?> </h2>
                        <div class="bg-image icon"  data-aos="fade-down"  data-aos-offset="300"
                             data-aos-easing="ease-in-sine" style="background-image:url(<?= $first_section['icon']; ?>)"></div>
                        <div class="desc aos-init aos-animate" data-aos="fade-up">
                            <?= $seo_section['content']; ?>
                        </div>
                        <div class="button-box" data-aos="fade-up">
                            <?php
                            $link = $seo_section['button'];
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url($link_url); ?>" class="content-scroll" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!--    digital-marketing SEO-->

    <!--    forloop section-->
    <?php for ($i=0; $i<sizeof($sections); $i++){?>
                <?php if ($sections[$i]['heading']!=''): ?>
        <section class="section-in-page section-<?php echo $i; ?> bg-image <?php if($i==1) echo'has-clouds'?> <?= $sections[$i]['class_name']; ?>" <?php if($sections[$i]['background_color']):?>style="background-color: <?= $sections[$i]['background_color']; ?>" <?php endif?>>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                            <h2 class="blue-heading title-normal aos-init aos-animate" data-aos="fade-down"><?= $sections[$i]['heading']?> </h2>
                            <div class="desc aos-init aos-animate" data-aos="fade-up" >
                                <?= $sections[$i]['content']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if($i==1) {
                if (get_field('has_clouds_', $obj_id) == 'true') :?>
                    <?php get_template_part('template-parts/content', 'clouds'); ?>
                <?php endif;
            }?>
        </section>

            <?php endif; ?>
    <?php } ?>
    <!--    forloop section-->
    <?php $portfolio_list = get_field('portfolio_list', get_the_ID()); ?>
    <?php if ($portfolio_list['display'] == 'true') : ?>
        <section class="portfolio-section portfolio-cat mt-3 mb-4" sstyle="background-image: url(<?= $portfolio_list['background']; ?>)">
            <div class="container ">

                <div class="portfolio-tabs" data-aos="fade-up" data-aos-duration="3000" data-aos-offset="300"
     data-aos-anchor-placement="top-bottom">

                    <?php
                    $terms = $portfolio_list["portfolio_category"];
                    $terms_slugs = '';

                    if ($terms != '')
                        $terms_slugs = wp_list_pluck($terms, 'slug');

                    ?>
                    <!-- Nav tabs -->
                   <!-- <?php if ($terms && count($terms_slugs) != 1) : ?>
                        <div id="js-filters-masonry-projects" class="cbp-l-filters-buttonCenter">

                            <?php $i = 0; ?>
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                All <div class="cbp-filter-counter"></div>
                            </div>

                            <?php foreach ($terms as $term) : ?>
                                <div data-filter=".<?= $term->slug; ?>" class="cbp-filter-item">
                                    <?= $term->name; ?> <div class="cbp-filter-counter"></div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?> -->
                    <?php if ($terms) : ?>
                        <div id="js-grid-masonry-projects" class="cbp">
                            <?php
                            $args = array(
                                'post_type' => 'portfolio',
                                'posts_per_page' => 9,
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
                                        get_template_part('template-parts/post/content', 'portfolio');
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
        </section>
    <?php endif; ?>
</section>