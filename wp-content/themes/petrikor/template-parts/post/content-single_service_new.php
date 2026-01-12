<?php
/*
 * Template part for displaying posts
 * @package petrikor
 *
 */
$i = 1;
?>
<section class="single_serivce page-main-content" id="post-<?php the_ID(); ?>" <?php post_class('single-content'); ?>>
<?php $description_section = get_field('description_section', get_the_ID()); ?>
<?php $definition_section = get_field('definition_section', get_the_ID()); ?>
<?php $sem_section = get_field('sem_section', get_the_ID()); ?>
<?php $stimulate_section = get_field('stimulate_section', get_the_ID()); ?>
    <?php $seo_section = get_field('seo_section', get_the_ID()); ?>
    <?php $second_section = get_field('second_section', get_the_ID()); ?>
    <?php $third_section = get_field('third_section', get_the_ID()); ?>
    <?php $fourth_section = get_field('fourth_section', get_the_ID()); ?>
    <?php $fifth_section = get_field('fifth_section', get_the_ID()); ?>
    <?php $sixth_section = get_field('sixth_section', get_the_ID()); ?>
    <?php $wework_section = get_field('wework_section', get_the_ID()); ?>
    <?php $seventh_section = get_field('seventh_section', get_the_ID()); ?>
    <?php $eighth_section = get_field('eighth_section', get_the_ID()); ?>
    <?php $ninth_section = get_field('ninth_section', get_the_ID()); ?>
    <?php $tenth_section = get_field('tenth_section', get_the_ID()); ?>
    <?php $sections = array($second_section, $third_section, $fourth_section, $fifth_section, $sixth_section, $seventh_section, $eighth_section); ?>
    <?php $first_section = get_field('first_section', get_the_ID()); ?>
    <?php if ($first_section['right_overlay_image'] !=''){ ?>
    <div class="right-bg-section1 bg-image" style="background-image: url(<?= $first_section['right_overlay_image']; ?>)"> </div>
    <?php } ?>
    <?php if ($description_section['heading']!=''): ?>
        <section id="sem_section" class="section-in-page description_section bg-image"  style="background-color: <?= $description_section['background_color']; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                            <h2 class="blue-heading title-normal aos-init aos-animate" ></h2>
                            <div class="desc aos-init title-normal hea1title aos-animate" data-aos="fade-up" >
                                <?= $description_section['heading']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

            <?php endif; ?>
    <?php if ($first_section['display'] == 'true') : ?>


    <section class="portfolio-first-section first-section section-in-page  first-section bg-image" id="smm_section"style="background-image: url(<?= $first_section['background']; ?>)">

    <div class="container">

                <div class="row  new-container">
                    <div class="col-sm-8 mr-auto">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-4">
                            <div class="bg-image icon"  data-aos="fade-down"  data-aos-offset="300"
                            data-aos-easing="ease-in-sine" style="background-image:url(<?= $first_section['icon']; ?>)"></div> </div> </div>
                            <div class="desc smal-heading aos-init aos-animate" data-aos="fade-up" >
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
        <?php if ($definition_section['display'] == 'true'): ?>
        <section id="sem_section" class="section-in-page definition_section bg-image has-clouds "  style="background-color: <?= $definition_section['background_color']; ?>">
            <div class="container">
                <div class="row  new-container">
                    <div class="col-sm-8 mr-auto">
                        <div class="content">
                            <div class="desc cont-ten aos-init aos-animate" data-aos="fade-up" >
                                <?= $definition_section['content']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                            <div class="desc cont-ten aos-init aos-animate" data-aos="fade-up" >
                                <?= $definition_section['contentc2']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            <?php endif; ?>


        <?php if ($stimulate_section['heading']!=''): ?>
        <section id="stimulate_section" class="section-in-page backg-section stimulate_section bg-image has-clouds "  style="background-color: <?= $stimulate_section['background_color']; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                            <div class="head2title aos-init aos-animate new-des" > <?= $stimulate_section['heading']; ?></div>
                            <div class="desc aos-init aos-animate  cont-stim" data-aos="fade-up" >
                                <?= $stimulate_section['content']; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <img class="full-image" src="<?php echo $stimulate_section['image']; ?>" >
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
        <section class="m-pad section-in-page  -<?php echo $i; ?> bg-image <?php if($i==1) echo'has-clouds'?>"

<?php if($sections[$i]['background_color']):?> style="background-color: <?= $sections[$i]['background_color']; ?>"  <?php endif
    ?>>
            <div class="container">
                <div class="row  new-container">
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                        <?php if($i>1){ ?> <img class=" aos-animate  aos-init img-heading"  src="<?php echo $sections[$i]['image']; ?>" data-aos="fade-up" >    <?php } ?>
                            <h2 class="blue-heading  <?php if($i<=1) echo'heading-des'; else echo'smal-heading';?> aos-init aos-animate" data-aos="fade-down"><?= $sections[$i]['heading']?></h2>
                            <div class="desc cont-ten aos-init aos-animate" data-aos="fade-up" >
                                <?= $sections[$i]['content']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php ?>

        </section>

            <?php endif; ?>
    <?php } ?>

    <?php if ($wework_section['heading']!=''): ?>
        <section id="wework_section" class=" wework_section bg-image">
            <div class="container">
                <div class="row  new-container">
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                            <h2 class="blue-heading title-normal aos-init aos-animate" ></h2>
                            <div class="desc aos-init heading-des  aos-animate" data-aos="fade-up" >
                                <?= $wework_section['heading']; ?>
                            </div>
                            <div class="work-sec  aos-animate  aos-init">
                            <div class=" img-work" ><a href="https://www.facebook.com/petrikorsolutions/">  <img  src="<?php echo $wework_section['facebook_image']; ?>" data-aos="fade-up" > <h5>Facebook</h5>  </a>
                            </div> <div class=" img-work" > <a href="https://www.instagram.com/petrikorsolutions/">  <img  src="<?php echo $wework_section['instagram_image']; ?>" data-aos="fade-up" >  <h5>Instagram</h5> </a>
                            </div> <div class=" img-work" > <a href="https://www.youtube.com/channel/UCy-c5nd3PP0dMKSbm6eyndA">  <img  src="<?php echo $wework_section['youtube_image']; ?>" data-aos="fade-up" style="color:black"> <h5>Youtube </h5>  </a>
                            </div> <div class=" img-work" > <a href="https://wa.me/971581011504?text=Hello Petrikor">  <img  src="<?php echo $wework_section['whatsapp_image']; ?>" data-aos="fade-up" > <h5>Whatsapp </h5>  </a>
                            </div> <div class=" img-work" > <a  href="https://twitter.com/petrikor_agency">  <img   src="<?php echo $wework_section['twitter_image']; ?>" data-aos="fade-up" ><h5> Twitter</h5>   </a>
                            </div> <div class=" img-work" > <a  href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQHP8oDgkprYVwAAAYTCdR1wXV66Y_Q0kAT_BthPaqnaeLWSOsHoJx5g3kzMBE9dY23nX-EEnKcT143LNaZkQxN4nB3uxoChZ-BZE_e2zIgyAnSJRonP1He_LYZ9uWGN5ZoOowY=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fpetrikorsolutions%2F">  <img src="<?php echo $wework_section['linkedin_image']; ?>" data-aos="fade-up" >  <h5>Linkedin</h5> </a>
                            </div> <div class=" img-work" > <a  href="https://www.pinterest.com/PetrikorSolutions/?eq=petrikor&etslf=59064">  <img   src="<?php echo $wework_section['pinterest_image']; ?>" data-aos="fade-up" ><h5>Pinterest</h5>   </a>
                            </div>
                            </div>
                            <!--    <table style="margin-bottom:90px;width: 100%;" class="work-with">
                            <tr>
                                    <td colspan="2">
                                    <a href="https://www.facebook.com/petrikorsolutions/">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['facebook_image']; ?>" data-aos="fade-up" > <h5>Facebook</h5>  </a>
                                    </td>
                                    <td colspan="2">
                                    <a href="https://www.instagram.com/petrikorsolutions/">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['instagram_image']; ?>" data-aos="fade-up" >  <h5>Instagram</h5> </a>
                                    </td>
                                    <td>
                                    <a href="https://www.youtube.com/channel/UCy-c5nd3PP0dMKSbm6eyndA">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['youtube_image']; ?>" data-aos="fade-up" style="color:black"> <h5>Youtube </h5>  </a>
                                    </td>
                                    <td>
                                    <a href="https://wa.me/971581011504?text=Hello Petrikor">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['whatsapp_image']; ?>" data-aos="fade-up" > <h5>Whatsapp </h5>  </a>
                                    </td>
                                    <td>
                                    <a href="https://twitter.com/petrikor_agency">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['twitter_image']; ?>" data-aos="fade-up" ><h5> Twitter</h5>   </a>
                                    </td>
                                    <td>
                                    <a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQHP8oDgkprYVwAAAYTCdR1wXV66Y_Q0kAT_BthPaqnaeLWSOsHoJx5g3kzMBE9dY23nX-EEnKcT143LNaZkQxN4nB3uxoChZ-BZE_e2zIgyAnSJRonP1He_LYZ9uWGN5ZoOowY=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fpetrikorsolutions%2F">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['linkedin_image']; ?>" data-aos="fade-up" >  <h5>Linkedin</h5> </a>
                                    </td>
                                    <td>
                                    <a href="https://www.pinterest.com/PetrikorSolutions/?eq=petrikor&etslf=59064">  <img class=" aos-animate  aos-init img-work"  src="<?php echo $wework_section['pinterest_image']; ?>" data-aos="fade-up" ><h5>Pinterest</h5>   </a>
                                    </td>
                                </tr>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>

        </section>

            <?php endif; ?>
            <?php if ($ninth_section['display'] == 'true') : ?>


<section class="portfolio-ninth-section backg-section section-in-page ninth-section bg-image" id="ninth_section"style="background-color: <?= $ninth_section['background_color']; ?>">

<div class="container">
    <?php if ($ninth_section['right_overlay_image'] !=''){ ?>

        <div class="right_overlay_image-section bg-image" style="background-image: url(<?= $ninth_section['right_overlay_image']; ?>)"> </div>
        <?php } ?>
            <div class="row  new-container">
                <div class="col-sm-8 mr-auto">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-4">

                            </div>
                        </div>
                        <div class="desc head-sec aos-init aos-animate" data-aos="fade-up" >
                            <?= $ninth_section['content']; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($tenth_section['heading']!=''): ?>
        <section id="tenth_section" class="section-in-page tenth-section bg-image" >
            <div class="container">
                <div class="row  new-container">
                    <div class="col-sm-12 mr-auto">
                        <div class="content">
                            <h2 class="blue-heading hea-title aos-init aos-animate" > <?= $tenth_section['heading']; ?></h2>
                            <div class="desc aos-init cont1  aos-animate" data-aos="fade-up" >
                                <?= $tenth_section['content1']; ?>
                            </div>
                            <div class="desc aos-init cont1   aos-animate" style="color:#C64D38 !important;" data-aos="fade-up" >
                                <?= $tenth_section['content2']; ?>
                            </div>
                            <div class="desc aos-init cont-ten  aos-animate" data-aos="fade-up" >
                                <?= $tenth_section['content']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

            <?php endif; ?>
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
