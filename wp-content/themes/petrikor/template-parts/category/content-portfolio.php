<?php
/*
 * Template part for displaying page content in page.php
 * @package petrikor
 * 
 */
$term = get_queried_object();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php $first_section = get_field('first_section', $term); ?>
    <?php if ($first_section['display'] == 'true') : ?>
    <section class="portfolio-first-section bg-image" style="background-image: url(<?= $first_section['background']; ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 mr-auto">
                        <div class="content">
                            <div class="bg-image icon" style="background-image:url(<?= $first_section['icon']; ?>)"></div>
                            <div class="desc">
                                <?= $first_section['content']; ?>
                            </div>
                            <div class="button-box">
                                <?php
                                $link = $first_section['button'];
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a  href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $portfolio_list = get_field('portfolio_list', $term); ?>
    <?php if ($portfolio_list['display'] == 'true') : ?>
        <section class="portfolio-section portfolio-cat mt-3 mb-4" style="background-image: url(<?= $portfolio_list['background']; ?>)">
            <div class="container ">
                <div class="portfolio-tabs ">
                    <div id="js-grid-juicy-projects-2" class="cbp">
                        <?php if (have_posts()) : ?>
                            <?php
                            while (have_posts()) : the_post();
                                $term_obj_list = get_the_terms(get_the_ID(), 'portfolio-category');
                                $terms_string = join(' ', wp_list_pluck($term_obj_list, 'slug'));
                                ?>
                                <div class="cbp-item <?= $terms_string ?>">
                                    <?php
                                    get_template_part('template-parts/post/content', 'portfolio');
                                    ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>