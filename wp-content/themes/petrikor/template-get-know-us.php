<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 */
/* * ***************************************************************************
 * ***************  -- Template Name: Get to know us Page Template 
 * ************************************************************************** */

get_header();
?>
<div id="primary" class="content-area get_know_us-page-primary">
    <?php get_template_part('template-parts/content', 'header'); ?>
    <section class="get_know_us-page page-main-content">

        <?php $right_image_overlay = get_field('right_image_overlay');?>
        <?php if ($right_image_overlay): ?>
            <div class="right-image-overlay" style="background-image: url(<?= $right_image_overlay; ?>);">

            </div>
        <?php endif; ?>

    <?php $get_to_know_us_section = get_field('get_to_know_us_section'); ?>
        <?php if ($get_to_know_us_section): ?>
            <?php foreach ($get_to_know_us_section as $section): ?>
                <?php if ($section['display'] == 'true') : ?>
                    <div class="section-in-page bg-image has-clouds" style="background-image: url(<?= $section['background']; ?>);background-color: <?= $section['background_color'] ?>;" >
                        <div class="container">
                            <div class="row <?= $section["text_direction"] == "right" ? "flex-row-reverse" : ""; ?>">
                                <div class="col-sm-<?= $section['section_width'] ?>" >
                                    <div class="site-title" data-aos="fade-down"><?= $section['title']; ?></div>
                                    <div class="content" data-aos="fade-up">
                                        <?= $section['content']; ?>
                                    </div>
                                </div>

                                <?php if (!empty($section['image'])): ?>
                                    <div class="section-image-after"  data-aos="fade-left" style="background-image: url(<?= $section['image']; ?>);"></div>
                                <?php endif; ?>

                                <?php if ($section["right_overlay"] == "true") : ?>
                                    <div class="image-overlay" ></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($section['has_clouds'] == 'true') : ?>
                            <?php get_template_part('template-parts/content', 'clouds'); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>

<?php
get_footer();
