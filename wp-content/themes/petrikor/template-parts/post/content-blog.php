<?php
/*
 * Template part for displaying posts
 * @package petrikor
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4'); ?> data-aos="fade-down" >
    <div class="blog-in-list">
        <div class="blog-img">
            <?php $image_id = get_post_thumbnail_id();
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE); ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $image_alt; ?>" />
        </div>
        <div class="blog-content">
            <h4 class="blog-title">
                <?php
                $post_id = get_the_ID();
                $title = get_the_title( $post_id );
                $firstStringCharacter = substr($title, 0, 40);
                $threedots = '...';
                if(strlen($title)<=40){
                ?>
                    <a href="<?php the_permalink(); ?>"><?php echo $title; ?></a>

                <?php }
                else{?>
                <a href="<?php the_permalink(); ?>"><?php echo $firstStringCharacter.$threedots; ?></a>
                <?php }?>
            </h4>
            <div class="blog-date">
                <?= the_time('M Y, D'); ?>
            </div>
            <div class="content">
                <?php the_excerpt(); ?>
            </div>
            <a class="read-more-btn" href="<?php the_permalink(); ?>"><?= __('read more'); ?></a>
        </div>
    </div>
</article><!-- #post -->