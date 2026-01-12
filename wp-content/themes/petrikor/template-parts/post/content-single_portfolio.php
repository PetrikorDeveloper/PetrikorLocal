<?php
/*
 * Template part for displaying posts
 * @package petrikor
 * 
 */
$i = 1;

?>

<section class="single_portfolio page-main-content" id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>
    <div class="container">
    <div class="title-case-studies" style="">

        <h4 class="small-title">Executive Summary</h4>
        <p class="small-description" style="text-transform: unset !important;"><?php echo get_field('company_bio'); ?></p>
    </div>
    </div>
    <?php $single_portfolio = get_field('single_portfolio');

    ?>
    <?php if ($single_portfolio): ?>
        <?php foreach ($single_portfolio as $section): ?>
            <?php if ($section['display'] == 'true') : ?>
                <style>
                    .section-in-page-<?= $i; ?> {
                        <?= $section['custom_css']; ?>
                    }
                </style>
                <div class="section-in-page section-in-page-<?= $i; ?> bg-image has-clouds" style="background-image: url(<?= $section['background']; ?>);" <?= $i== 0 ? 'data-aos="fade-down"' : ''; ?> >
                    <div class="<?php if ($section['section_type'] != "fullimage" && $section['section_type'] != "imagewithtext"){ ?>container<?php } ?>">
                        <?php //return var_dump($section['section_type']); ?>
                        <?php if ($section['section_type'] == "image"): ?>
                            <div class="col-sm-12" data-aos="fade-down" >
                                <?php if (!empty($section['image'])): ?>
                                <img src="<?= $section['image']; ?>);" class="w-100" />
                                <?php endif; ?>
                                <?php if (!empty($section['title'])):  ?>
                                    <h4 class="small-title"> <?= $section['title']; ?></h4>
                                <?php endif; ?>
                            </div>
                        <?php elseif ($section['section_type'] == "fullimage"):

                            ?>
                            <div class="" data-aos="fade-down" >
                                <?php if (!empty($section['image'])): ?>
                                    <img src="<?= $section['image']; ?>);" class="w-100" />
                                <?php endif; ?>
                                <?php if (!empty($section['title'])):  ?>
                                    <h4 class="small-title"> <?= $section['title']; ?></h4>
                                <?php endif; ?>
                            </div>
                        <?php elseif ($section['section_type'] == "gotocontact"):

                            ?>
                        <div class="row">
                            <div class="col-sm-8" data-aos="fade-right">
                                <h4 class="small-title-int" style="text-align: left !important;line-height: 43px;">Let's find out how big we can take your business</h4>
                            </div>
                            <div class="col-sm-4" data-aos="fade-left">
                                <a href="" class="painted-btn-large" style="width: 90%;">Uplift or Create My Website </a>
                            </div>
                        </div>
                    <?php elseif ($section['section_type'] == "customcontent"):
                            $counter = 0;
                    ?>
                        <div class="row some-images" style="padding: 0 50px;">
                        <?php
                            foreach ($section['images_array'] as $custom_image):
                                if($counter < 3){
                            ?>
                            <div class="col-sm-4">
                        <img src="<?= wp_get_attachment_image_src($custom_image['custom_images']['ID'])[0]; ?>">
                                <p class="title-of-custom-img"><?= $custom_image['title_for_custom_image']; ?></p>

                            </div>

                                <?php
                            }
                                elseif($counter== 3){
                                  ?>
                                    <img style="width: 100%;" src="<?= wp_get_attachment_image_src($custom_image['custom_images']['ID'],$size = 'full')[0]; ?>">
                                    <?php
                                }
                                $counter++;
                            endforeach;
                            ?>
                        </div>

                        <!--Fatima-->
                        <?php elseif ($section['section_type'] == "fourimages"): ?>

                            <?php if (!empty($section['title'])):  ?>
                                <h4 class="small-title" data-aos="fade-down"> <?= $section['title']; ?></h4>
                            <?php endif; ?>

                            <div class="row some-images" style="padding: 30px 50px;">
                                <?php
                                foreach ($section['images_array'] as $custom_image): ?>
                                    <div class="col-sm-3" data-aos="fade-down" style="text-align: center;">
                                        <img src="<?= wp_get_attachment_image_src($custom_image['custom_images']['ID'])[0]; ?>">
                                        <p class="" style="color:#333;width: 70%;margin: auto;padding-top: 10px;"><?= $custom_image['title_for_custom_image']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <!--Fatima-->

                            <!--Fatima-->
                        <?php elseif ($section['section_type'] == "twoimages"): ?>

                            <?php if (!empty($section['title'])):  ?>
                                <h4 class="small-title" data-aos="fade-down"> <?= $section['title']; ?></h4>
                            <?php endif; ?>

                            <div class="row some-images" style="padding: 30px 50px;">
                                <?php
                                foreach ($section['images_array'] as $custom_image): ?>
                                    <div class="col-sm-6" data-aos="fade-down" style="text-align: center;">
                                        <img src="<?= wp_get_attachment_image_src($custom_image['custom_images']['ID'])[0]; ?>">
                                        <p class="" style="color:#333;width: 70%;margin: auto;padding-top: 10px;"><?= $custom_image['title_for_custom_image']; ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!--Fatima-->


                        <?php elseif ($section['section_type'] == "columns"): ?>
                        <div class="row row-cols">
                            <?php if($section['css_class'] == "cols-12"){?>
                                <div class="col-sm-12">
                            <?php } elseif($section['css_class'] == "cols-6") { ?>
                                <div class="col-md-6 col-12" data-aos="fade-right">
                            <?php } else{ ?>
                                <div class="col-md-8 col-12" data-aos="fade-right">
                                <?php
                            }?>

                                <h4 class="small-title" style="text-align: left !important;"> <?= $section['col1']['col1_title']; ?></h4>
                                <p class="small-description"><?= $section['col1']['col1_description']; ?></p>
                            </div>
                                <?php if($section['css_class'] == "cols-12"){?>
                                <div class="col-sm-12 disp-flex-box" data-aos="fade-left">
                                    <?php } elseif($section['css_class'] == "cols-6") { ?>
                                    <div class="col-md-6 col-12" data-aos="fade-right">
                                        <?php } else{ ?>

                                        <div class="col-md-4 col-12" data-aos="fade-left">
                                        <?php
                                        }?>

                                <h4 class="small-title" style="text-align: left !important;"> <?= $section['col2_title']; ?></h4>

                                <?php if ($section['col2']) {
                                    foreach ($section['col2'] as $custom_box):
                                        ?>
                                        <div class="custom-box-container">
                                            <p class="custom-box-title"><?= $custom_box['custom_box']['box_title']; ?></p>
                                            <p class="custom-box-desc"><?= $custom_box['custom_box']['box_description']; ?></p>
                                        </div>
                                    <?php
                                    endforeach;
                                }
                                elseif ($section['custom_col2']) { ?>
                                    <h4 class="small-title" style="text-align: left !important;"> <?= $section['custom_col2']['custom_col2_title']; ?></h4>

                                    <p class="small-description"><?= $section['custom_col2']['custom_col2_description']; ?></p>
                                <?php }
                                ?>

                            </div>
                        </div>
                    <?php else: ?>
                            <div class="<?php if($section['css_class']){ echo $section["css_class"]; } ?> row <?= $section["text_direction"] == "right" ? "flex-row-reverse" : ""; ?>">
                                <?php if($section["css_class"] == "row-7-5" ){

                                    ?>
                                <div class="col-md-7 col-12 content-div" >
                                <?php
                                } else if($section["css_class"] == "img-with-text-style1" ||$section["css_class"] == "img-with-text-style2" ){
                                    ?>
                                    <div class="col-md-5 col-12 content-div" >
                                    <?php
                                }
                                else{?>
                                    <div class="col-md-6 col-12" >
                                    <?php }?>

                                    <div class="site-title" data-aos="fade-up"><?= $section['title']; ?></div>
                                    <div class="content" data-aos="fade-down">
                                        <?= $section['content']; ?>
                                    </div>
                                </div>
                                    <?php if($section["css_class"] == "row-7-5"){

                                    ?>
                                    <div class="col-md-5 col-12" data-aos="fade-left">
                                        <?php
                                        }
                                        else if($section["css_class"] == "img-with-text-style1" || $section["css_class"] == "img-with-text-style2"){
                                            ?>
                                        <div class="col-md-7 col-12" data-aos="fade-left">
                                        <?php
                                        }
                                        else{?>
                                        <div class="col-md-6 col-12" data-aos="fade-left">
                                            <?php }?>

                                    <?php if (!empty($section['image'])): ?>

                                        <?php if ($section['section_type']== 'imagewithtext'){ ?>
                                        <div class=""><img style="width:100% !important;" src="<?= $section['image']; ?>"></div>
                                    <?php } else{?>
                                            <div class="section-image-after"  style="background-image: url(<?= $section['image']; ?>);"></div>
                                        <?php } ?>
                                            <?php endif; ?>
                                </div>

                                <?php if ($section["full_overlay"] == "true") : ?>
                                    <div class="full" data-aos="fade-down"
     data-aos-anchor-placement="center-bottom">
                                        <div class="image-overlay  <?= $section["full_overlay_direction"] == "left" ? "left" : "" ?>" ></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($section['has_clouds'] == 'true') : ?>
                        <?php get_template_part('template-parts/content', 'clouds'); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php $i++; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
