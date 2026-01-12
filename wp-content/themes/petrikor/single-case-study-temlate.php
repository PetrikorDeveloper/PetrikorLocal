<?php
/* Template Name: single-case-study Template */

?>

<?php

if (isset($_GET['title'])) {
    get_header();
    $title = sanitize_text_field($_GET['title']); // Sanitize the input to prevent SQL injections
//    get_template_part('template-parts/content', 'header');

    $args = array(
        'post_type' => 'case_studies',
        'posts_per_page' => 1,
        'orderby' => 'ID', // Order by post ID
        'order' => 'ASC', // Sort in ascending order
        's' => $title,
    );

// Perform the query
    $query = new WP_Query($args);

// Check if there are any matching posts
    if ($query->have_posts()) {
        while ($query->have_posts()) {

            $query->the_post();
$obj_id = get_queried_object_id();
$style = "";
if(is_tax()){
    $obj_id = get_queried_object();
}

$image_url='';

if (function_exists('get_field')) {
    if (!empty(get_field('header_image'))) {
        $image_url = get_field('header_image');
    } else {
        $image_url = '';
    }
}

if (get_field('smal_header_image')) {
    $style = "height: 300px";
}

$title = get_field('header_title');
$bottom_banner = get_field('bottom_banner');

if(empty($title)){
    $title = get_the_title();
}

?>
            <div class="case-study" id="<?php the_title(); ?>">
<?php

if (get_field('display_header_image', $obj_id) == 'true') : ?>
        <header class="page-top-section has-clouds">

            <section  class="header-img" style="<?= $style; ?>" data-aos="fade-down">
                <div class="container">
                    <div class="page-title"  data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                         data-aos-easing="ease-in-sine"><?= $title; ?></div>
                </div>
            </section>

            <?php if(!empty($bottom_banner)){ ?>
                <section class="bottom_banner">
                    <p><?= $bottom_banner;?> </p>
                </section>
            <?php } ?>

            <?php if (get_field('has_clouds', $obj_id) == 'true') : ?>
                <?php get_template_part('template-parts/content', 'clouds'); ?>
            <?php endif; ?>

        </header>
        <style>
            .header-img{
                background-image: url(<?= $image_url; ?>);
            }
        </style>
    <?php endif;

        $analytics_group = get_field('analytics'); // Assuming 'analytics' is the field name
        $first_label_text='';$first_label_value='';$second_label_text='';$second_label_value='';$third_label_text='';$third_label_value='';$fourth_label_text='';$fourth_label_value='';
        if ($analytics_group) {
            $first_label_text = $analytics_group['first_label_text']; // Subfield 'title'
            $first_label_value = $analytics_group['first_label_value']; // Subfield 'description'
            $second_label_text = $analytics_group['second_label_text']; // Subfield 'title'
            $second_label_value = $analytics_group['second_label_value']; // Subfield 'description'
            $third_label_text = $analytics_group['third_label_text']; // Subfield 'title'
            $third_label_value = $analytics_group['third_label_value']; // Subfield 'description'
            $fourth_label_text = $analytics_group['fourth_label_text']; // Subfield 'title'
            $fourth_label_value = $analytics_group['fourth_label_value']; // Subfield 'description'
        }
        ?>

            <div class="divider-banner">
                <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-pd.png"/>
            </div>
            <section class="header-csd">
                <div class="back-csd-header"></div>
<!--               <img class="top-img-header-csd" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Vector-8.svg">-->
<!--                <img class="bottom-img-header-csd"  src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Vector-9.svg">-->
                <div class="container mt-5">
                    <div class="row for-analyse " data-aos="fade-up">
                        <div class="col-lg-3 col-md-6 col-md-6 col-12 mb-4 col-for-analyse">

                            <p><?php echo$first_label_value; ?></p>
                            <p><?php echo$first_label_text; ?></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-md-6 col-12 mb-4 col-for-analyse">

                            <p><?php echo$second_label_value; ?></p>
                            <p><?php echo $second_label_text; ?></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-md-6 col-12 mb-4 col-for-analyse">

                            <p><?php echo$third_label_value; ?></p>
                            <p><?php echo$third_label_text; ?></p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-md-6 col-12 mb-4 col-for-analyse">

                            <p><?php echo$fourth_label_value; ?></p>
                            <p><?php echo$fourth_label_text; ?></p>
                        </div>
                    </div>
                </div>
            </section>
<?php
        if(get_field('company_description')){
                $company_description=get_field('company_description');
                ?>
            <section class="company-description">
                <div class="container">
                    <p><?php echo $company_description;?></p>
                </div>
            </section>
                <?php
        }

        ?>


        <?php
        $sections=get_field('section');
        $i=1;
        if ($sections) {
            foreach ($sections as $row) {
                if($row['section_title']){
                    $section_title = $row['section_title']; // Subfield 'title'
                }
                else{
                    $section_title='';
                }
                if($row['section_description']){
                    $section_description = $row['section_description']; // Subfield 'description'
                }
                else{
                    $section_description='';
                }

                if($row['section_image']){
                    $section_image = $row['section_image'];
                }
                else{
                    $section_image='';
                }
                if($row['cloud_image']){
                    $cloud_image = $row['cloud_image'];
                }
                else{
                    $cloud_image='';
                }

                ?>
                <section class="usc-single-section <?php  if($i%2==0){echo' usc-section-even';}else{echo' usc-section-odd';}?>" id="<?php echo $section_title;?>">
                    <div class="container">
                        <div class="row">
                            <?php
                            if($i%2==0){?>
                                <div class="col-md-6" data-aos="fade-right">
                                    <img class="usc-sec-img" src="<?php echo $section_image; ?>">
                                    <div class="usc-sec-could left-cloud">
                                        <img class="usc-sec-cloud-img" src="<?php echo $cloud_image; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 usc-content-td" data-aos="fade-left">
                                    <h1 class="usc-sec-title"><?php echo$section_title; ?></h1>
                                    <div class="usc-sec-des"><?php echo$section_description; ?></div>
                                </div>
                                <?php
                            }
                            else{?>
                                <div class="col-md-6 usc-content-td"  data-aos="fade-right">
                                    <h1 class="usc-sec-title "><?php echo$section_title; ?></h1>
                                    <div class="usc-sec-des"><?php echo$section_description; ?></div>
                                </div>
                                <div class="col-md-6" data-aos="fade-left">
                                    <img class="usc-sec-img" src="<?php echo $section_image; ?>">
                                    <div class="usc-sec-could right-cloud">
                                        <img class="usc-sec-cloud-img" src="<?php echo $cloud_image; ?>">
                                    </div>
                                </div>
                            <?php }?>

                        </div>
                    </div>
                </section>

                <?php
                // Output the values for each repeater row

//                echo 'Image: <img src="' . esc_url( $section_image) . '" alt="' . esc_attr($section_image) . '" /><br>';

                $i++;
            }
        }

                $last_section_group = get_field('last_section'); // Assuming 'analytics' is the field name
                $left_title='';$center_title_image='';$center_description='';$center_small_image='';
                if ($last_section_group) {
                    $left_title = $last_section_group['left_title']; // Subfield 'title'
                    $center_title_image = $last_section_group['center_title_image']; // Subfield 'description'
                    $center_description = $last_section_group['center_description']; // Subfield 'title'
                    $center_small_image = $last_section_group['center_small_image']; // Subfield 'description'
                   }
                ?>
                <section class="usc-end-section" data-aos="fade-up">
                    <img class="yellow-cloud" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Cloud-green-1.png">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 last-col-1">
                                <img class="top-starts" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Group-5.svg"/>
                                <p><?php echo$left_title; ?></p>
                                <img class="bottom-quota" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Group-7.svg">
                            </div>
                            <div class="col-md-6 last-col-2">
                                <img class="top-quota" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Frame-7.svg">
                                <div class="content-c-bio">
                                    <div class="usc-header-bio">
                                        <img class="ucs-small-img" src="<?php echo $center_small_image; ?>">
                                        <img src="<?php echo $center_title_image; ?>">
                                    </div>
                                    <p><?php echo $center_description; ?></p>
                                </div>
                                <div class="btn-section">
                                    <a class="seo-btn" href="https://petrikorsolutions.com/services/seo-agency/">Do SEO</a>
                                    <a class="sem-btn" href="https://petrikorsolutions.com/services/search-engine-marketing-sem/">Get SEM</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <div class="divider-blog-before">
                <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-big.png"/>
            </div>
            <div class="lets_talk-section bg-image bg-image-fixed has-clouds lazyloaded" data-clouds="has-clouds" data-bg="" style="background-image: url(data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20500%20300%22%3E%3C/svg%3E);">
                <div class="container">
                    <div class="d-flex flex-column justify-content-between align-items-center">
                        <p class="title pt-3 aos-init aos-animate" data-aos="zoom-in-up" style="color:#F1E4B2 !important;">Interested in working with us?</p>
                        <div class="content aos-init aos-animate" data-aos="zoom-in-up" style="text-align:center;">
                            <h4><span style="color: #F1E4B2;">Tell Us Your Problem</span></h4>
                            <h4><span style="color: #F1E4B2;">and Get The Best Services for You</span></h4>
                        </div>
                        <a id="to-contact" href="#contact"  ><i class="fas fa-chevron-down" style="color:#F1E4B2;"></i></a>

                    </div>
                </div>
            </div>
            <div class="divider-talk-portfolio divider-blog-after">
                <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-small.png"/>
            </div>

            <?php
    }
}

// Restore original post data
wp_reset_postdata();
}

get_footer();
