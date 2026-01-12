   <?php
    $obj_id = get_queried_object_id();
    $style = "";
    if (is_tax()) {
        $obj_id = get_queried_object();
    }
    if (function_exists('get_field')) {
        if (!empty(get_field('header_image', $obj_id))) {
            $image_url = get_field('header_image', $obj_id);
        } else {
            $image_url = '';
        }
    }
    if (get_field('smal_header_image', $obj_id)) {
        $style = "height: 300px";
    }
    $title = get_field('header_title', $obj_id);
    $bottom_banner = get_field('bottom_banner', $obj_id);
    if (empty($title)) {
        $title = get_the_title();
    }
    ?>
   <?php if (get_field('display_header_image', $obj_id) == 'true') : ?>
       <header class="page-top-section has-clouds">

           <section class="header-img" style="<?= $style; ?>">
               <div class="container">
                   <div class="page-title" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                       data-aos-easing="ease-in-sine"><?= $title; ?></div>
               </div>
           </section>

           <?php if (!empty($bottom_banner)) { ?>
               <section class="bottom_banner">
                   <p><?= $bottom_banner; ?> </p>
               </section>
           <?php } ?>

           <?php if (get_field('has_clouds', $obj_id) == 'true') : ?>
               <?php get_template_part('template-parts/content', 'clouds'); ?>
           <?php endif; ?>

       </header>
       <style>
           .header-img {
               background-image: url(<?= $image_url; ?>);
           }
       </style>
   <?php endif; ?>