<?php
/*
 * Template part for displaying posts
 * @package petrikor
 * 
 */
?>
<?php /*
<div class="cbp-caption mb-2">
    <a href="<?= get_field('image', get_the_ID()); ?>" class="cbp-caption cbp-lightbox" data-title="<?= get_the_title(); ?>">
        <div class="cbp-caption-defaultWrap">
            <img src="<?= get_field('image', get_the_ID()); ?>" alt="">
        </div>
        <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title"><?= get_the_title(); ?></div>
                </div>
            </div>
        </div>
    </a>
</div>
 * <?php */

$lang=get_bloginfo("language");

?>
<div class="cbp-caption mb-2" >
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
                <div class="cbp-l-caption-title mb-3"><?= get_the_title(); ?></div>

                 <?php
                    if ($lang == 'ar'){
                        $more_info = 'معلومات أكثر';
                        $view_larger = 'شوف أوضح';
                    } else {
                        $more_info = 'More Info';
                        $view_larger = 'View Larger';
                    }
                ?>

	            <?php
	                $id = get_the_ID();
                    $single_portfolio = get_field('single_portfolio', $id);

                    //echo var_dump($wpdb->get_results("SELECT * FROM $wpdb->wp_term_relationships"));
                    if (isset($GLOBALS["polylang"])) {

                        $translations = $GLOBALS["polylang"]->model->post->get_translations($id);
                        $english_post_id = $translations["en"];

                    }

	            ?>
	            <?php if ($single_portfolio): ?>
                    <?php foreach ($single_portfolio as $section): ?>
                        <?php if ($section['display'] == 'true') :

                        ?>
                            <a href="<?= get_permalink( $english_post_id ); ?>" class="cbp-l-caption-buttonLeft" rel="nofollow"><?php echo $more_info;?></a>
                        <?php break; endif; ?>
                    <?php endforeach; ?>
	            <?php endif; ?>

                <a href="<?= get_field('image', get_the_ID()); ?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?= get_the_title(); ?>"><?php echo $view_larger;?></a>
            </div>
        </div>
    </div>
</div>