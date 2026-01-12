<?php 
$facebook = "https://www.facebook.com/sharer/sharer.php?u={$url}";
$twitter = "https://twitter.com/intent/tweet?text={$title}&amp;url={$url}&amp;via=WPCrumbs";
$gplus = "https://plus.google.com/share?url={$url}";
$pinterest = "http://pinterest.com/pin/create/button/?url={$url}&amp;media={$media}&amp;description={$title}";
$linkedin = "https://www.linkedin.com/shareArticle?mini=true&url={$url}&amp;title={$title}";
$whatsapp = "https://wa.me/?text={$title}&amp; {$url}";
$hidemobile ? $class = "d-sm-none" : $class = "";
//echo $class. 'sss';
?>
<?php if(!$mobile):?>
<div class="social-sticky">
    <a href="<?= $facebook; ?>" target="_blank"><i class="ti-facebook"></i></a>
    <a href="<?= $twitter; ?>" target="_blank"><i class="ti-twitter"></i></i></a>
    <a href="<?= $gplus; ?>" target="_blank"><i class="ti-google"></i></a>
    <!--<a  href="<?= $pinterest; ?>" target="_blank"><i class="ti-pinterest"></i></a>-->
    <!--LinkedIn-->
    <!--<a href="<?= $linkedin; ?>" target="_blank"><i class="ti-linkedin" aria-hidden="true"></i></a>-->
    <!-- whatsapp -->
    <a href="<?= $whatsapp; ?>" data-action="share/whatsapp/share" ><i class="fab fa-whatsapp"></i></a>
</div>
<?php else: ?>
<ul class="d-inline-block <?= $class;?> list-inline float-md-right mt-md-0 mt-4">
    <li class="list-inline-item">
        <a class="social-icon facebook-icon text-xs-center " target="_blank" href="<?= $facebook; ?>">
            <i class="ti-facebook"></i>
        </a>
    </li>
    <li class="list-inline-item">
        <a class="social-icon twitter-icon text-xs-center" target="_blank" href="<?= $twitter; ?>">
            <i class="ti-twitter-alt"></i>
        </a>
    </li>
<!--    <li class="list-inline-item">
        <a class="social-icon pinterest-icon text-xs-center" target="_blank" href="<?= $linkedin; ?>">
            <i class="ti-linkedin"></i></a>
    </li>-->
    <li class="list-inline-item">
        <a class="social-icon instagram-icon text-xs-center" href="<?= $whatsapp; ?>">
            <i class="fab fa-whatsapp"></i></a>
    </li>
</ul>
<?php endif; ?>