<?php
/*
 * Template part for displaying posts
 * @package petrikor
 * 
 */
?>
<?php

 $lang=get_bloginfo("language");
 $category = str_replace("-en", "", $args["category"]);
 $category = str_replace("-ar", "", $category);
// $category = explode(" ", $category)[0];


 $name = get_the_title();

 $folder = "/home/www/petrikorsolutions.com/ajax-juicy-projects/".strtolower(str_replace(" ","", $category))."/".strtolower(str_replace(" ","", $name));
// $folder = "C:\wamp\www\petrikor/ajax-juicy-projects/social-media/carmenlebbos";

$link = null;
$id = get_the_ID();
$single_portfolio = get_field('single_portfolio', $id);
$class = "";

if ($single_portfolio):
    foreach ($single_portfolio as $section):
        if ($section['display'] == 'true') :
            if (isset($GLOBALS["polylang"])) {
                $translations = $GLOBALS["polylang"]->model->post->get_translations($id);
                $english_post_id = $translations["en"];
            }
            $link = get_permalink( $english_post_id );
            break;
        endif;
    endforeach;
endif;

if (!$link && file_exists($folder)):
    $link = "https://petrikorsolutions.com/ajax-juicy-projects/gallery.php?category=".$category."&name=".$name;
    $class = "cbp-singlePage";
endif;


?>
<div class="cbp-caption mb-2" >
    <?php if ($link) { ?>
        <a href="<?= $link; ?>" class="<?php echo $class ?>" rel="nofollow">
    <?php } ?>
        <div class="cbp-caption-defaultWrap">
            <img src="<?= get_field('image', get_the_ID()); ?>" alt="">
             <?php $video_url= get_field('video');
    //         if ($video_url['value']!=''):?>
    <!--        <iframe width="560" height="315" src="https://www.youtube.com/embed/--><?//= get_field('video', get_the_ID()); ?><!--" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
    <!--        --><?php //endif;?>
        </div>
        <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title mb-3"><?= $name; ?></div>
                </div>
            </div>
        </div>
    <?php if (file_exists($folder)) { ?>
        </a>
    <?php } ?>
</div>