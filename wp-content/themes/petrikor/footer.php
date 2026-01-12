<?php
/*
 * THE FOOTER OF OUR THEME
 * @PACKAGE petrikor
 *
 */
global $petrikor_options;

$lang=get_bloginfo("language");

$facebook = array_key_exists("facebook", $petrikor_options) ? $petrikor_options['facebook'] : "";
$gplus = array_key_exists("gplus", $petrikor_options) ? $petrikor_options['gplus'] : "";
$linkedin = array_key_exists("linkedin", $petrikor_options) ? $petrikor_options['linkedin'] : "";
$be = array_key_exists("be", $petrikor_options) ? $petrikor_options['be'] : "";
$instagram = array_key_exists("instagram", $petrikor_options) ? $petrikor_options['instagram'] : "";
$twitter = array_key_exists("twitter", $petrikor_options) ? $petrikor_options['twitter'] : "";
$pinterest = array_key_exists("pinterest", $petrikor_options) ? $petrikor_options['pinterest'] : "";
$youtube = array_key_exists("youtube", $petrikor_options) ? $petrikor_options['youtube'] : "";
$tiktok = 'https://www.tiktok.com/@petrikor.solutions';

$email = array_key_exists("email", $petrikor_options) ? $petrikor_options['email'] : "";
$phone = array_key_exists("phone", $petrikor_options) ? $petrikor_options['phone'] : "";
$copyright = array_key_exists("copyright", $petrikor_options) ? $petrikor_options['copyright'] : "";
$copyright_bg = array_key_exists("copyright-bg", $petrikor_options) ? $petrikor_options['copyright-bg']['color'] : "";
$logo = array_key_exists("logo", $petrikor_options) ? $petrikor_options['logo']['url'] : "";
$footer_logo = array_key_exists("footer_logo", $petrikor_options) ? $petrikor_options['footer_logo']['url'] : "";
$address = array_key_exists("address", $petrikor_options) ? $petrikor_options['address'] : "";
$site_description = array_key_exists("site_description", $petrikor_options) ? $petrikor_options['site_description'] : "";
?>
<?php // if ($post):  ?>
<?php
// $current_id = $post->ID;
$obj_id = get_queried_object_id();
if(is_tax()){
   $obj_id = get_queried_object();
}
$current_url = get_permalink($obj_id);
//    echo $current_id;
$display = get_field('display', $obj_id);
if ($display == 'true'):
    ?>
<?php
$postType = get_post_type();
?>
<?php  if (get_post_type() === 'case_studies') {
    } else { ?>
<section class="contact-form" id="<?= is_front_page() ? "contact" : "contact-".$postType; ?>">
        <div class="container" >
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 column-1 social-sec-box" data-aos="fade-right">
                    <div class="social-sec">
                        <div class="boxed" data-aos="fade-right">

                            <?php if ($linkedin) : ?>
                                <a class="linkedin" target="_blank" href="<?= $linkedin; ?>" data-aos="fade-left"></a>
                            <?php endif; ?>
                            <?php if ($instagram) : ?>
                                <a class="instagram" target="_blank" href="<?= $instagram; ?>" data-aos="fade-down"></a>
                            <?php endif; ?>
                            <?php if ($tiktok) : ?>
                                <a class="tiktok" target="_blank" href="<?= $tiktok; ?>" data-aos="fade-down"></a>
                            <?php endif; ?>
                            <?php if ($facebook) : ?>
                                <a class="facebook" target="_blank" href="<?= $facebook; ?>" data-aos="fade-up"></a>
                            <?php endif; ?>
                            <?php if ($twitter) : ?>
                                <a class="twitter" target="_blank" href="<?= $twitter; ?>" data-aos="fade-down"></a>
                            <?php endif; ?>
                            <?php if ($be) : ?>
                                <a class="behance" target="_blank" href="<?= $be; ?>" data-aos="fade-up"></a>
                            <?php endif; ?>
                            <?php if ($youtube) : ?>
                                <a class="youtube" target="_blank" href="<?= $youtube; ?>" data-aos="fade-down"></a>
                            <?php endif; ?>
                            <?php if ($pinterest) : ?>
                                <a class="pinterest" target="_blank" href="<?= $pinterest; ?>" data-aos="fade-right"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 column-2" data-aos="fade-left">
                    <div class="form-sec">
                        <?php
                            $lang=get_bloginfo("language");
                            if ($lang =='ar')
                                echo do_shortcode('[contact-form-7 id="2098" title="Contact Us_ar"]');
                            else
                                echo do_shortcode('[contact-form-7 id="5" title="Contact Us"]');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php endif; ?>
<?php // endif; ?>

<div class="divider">
    <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-v3.png"/>
</div>


<footer class="footer">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="col-sm-4" data-aos="fade-down-right">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="col-sm-4" data-aos="fade-up">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php endif; ?>
            <div class="col-sm-4" data-aos="fade-down-left">
                <section class="footer-widget ">

                    <?php $i = 0;
                         if ($lang == 'ar'){
                            $findus = 'وين تلاقينا';
                            $uae = 'الامارات العربية المتحدة';
                            $lebanon = 'لبنان';
                            $address = '<div class="lebanon-address">طرابلس، شارع بشارة الخوري، فوق عبد طحان، سنتر الغانم، بلوك ب، الطابق الأول</div><div class="uae-address">أبو ظبي، الطويلة</div>';
                         } else {
                            $findus = 'Find Us';
                            $uae = 'UAE';
                            $lebanon = 'Lebanon';
                         }
                    ?>
                    <h6 class="mb-15"><?php echo $findus; ?></h6>
                    <span><a class="uae-tab " ><?php echo $uae; ?></a></span>
                    <span> &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span > <a class="lebanon-tab pl-2"><?php echo $lebanon; ?></a></span>


                    <div class="footer-last-widget" id="tab1">
                        <div class="site-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <?= $address; ?>
                            </div>
                        </div>
                        <div class="site-phone">
                            <i class="fas fa-phone"></i>
                            <div>
                                +971 58 10 11 504
                            </div>
                        </div>
                        <div class="site-email">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                        </div>
                    </div>
                    <div class="footer-last-widget" id="tab2"  style="display: none;">
                        <div class="site-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <?= $address; ?>
                            </div>
                        </div>
                        <div class="site-phone">
                            <i class="fas fa-phone"></i>
                            <div>
                              +961 81 63 63 01
                            <br/>
                            </div>
                        </div>
                        <div class="site-email">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="pt-4 pb-4 row">


                <div class="text-left col-sm">
                    <ul class="footer-social-network d-inline-flex list-inline font-small" >
                        <?php if ($facebook) : ?>
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="<?= $facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if ($gplus) : ?>
                            <li class="list-inline-item"><a class="social-icon gplus-icon text-xs-center" target="_blank" href="<?= $gplus; ?>"><i class="fab fa-google-plus-g"></i></a></li>
                        <?php endif; ?>
                        <?php if ($linkedin) : ?>
                            <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="<?= $linkedin; ?>"><i class="fab fa-linkedin-in"></i></a></li>
                        <?php endif; ?>
                        <?php if ($be) : ?>
                            <li class="list-inline-item"><a class="social-icon be-icon text-xs-center" target="_blank" href="<?= $be; ?>"><i class="fab fa-behance"></i></a></li>
                        <?php endif; ?>
                        <?php if ($instagram) : ?>
                            <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="<?= $instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                        <?php endif; ?>
                        <?php if ($tiktok) : ?>
                            <li class="list-inline-item"><a class="social-icon tiktok-icon text-xs-center" target="_blank" href="<?= $tiktok; ?>"><i class="fab fa-tiktok"></i></a></li>
                        <?php endif; ?>
                        <?php if ($pinterest) : ?>
                            <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="<?= $pinterest; ?>"><i class="fab fa-pinterest-p"></i></a></li>
                        <?php endif; ?>
                        <?php if ($twitter) : ?>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="<?= $twitter; ?>"><i class="fab fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if ($youtube) : ?>
                            <li class="list-inline-item"><a class="social-icon youtube-icon text-xs-center" target="_blank" href="<?= $youtube; ?>"><i class="fab fa-youtube"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="text-right col-sm">
                                    <?  $date = date("Y");
                                    $automated_copyright = '© Copyright © '.$date.' Petrikor Digital Solutions Ltd All rights reserved';
                                    echo $automated_copyright; ?>
                                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    jQuery( document ).ready( function () {

        var currentLink = window.location.href;
        jQuery('input[name="current-page"]').val(currentLink);

    });

</script>

<div class='scrolltop'>
    <div class='scroll icon'>
        <div class="slick-nav d-block"><i></i><svg>
            <use xlink:href="#circleup">
            </svg></div>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circleup" fill="none" stroke="currentColor">
            <circle r="20" cy="22" cx="22" id="test">
        </symbol>
        </svg>
    </div>
</div>
</main>
</main>
<div class="overlay"></div>
<?php ?>

<?php ?>
<?php wp_footer(); ?>
<?php if (!is_front_page()) : ?>

    <style>
        .petrikor-header .petrikor-main-menu li a {
            color: #fff;
        }
    </style>
<?php endif; ?>
<?php
if (function_exists('get_field')) {
    if (!empty(get_field('body_background', $obj_id))) {
        $body_background = get_field('body_background', $obj_id);
    } else {
        $body_background = '';
    }
}
?>
<style>
    .page-main-content{
        background-image: url(<?= $body_background; ?>);
    }
</style>

<!--</div>-->
</body>
</html>