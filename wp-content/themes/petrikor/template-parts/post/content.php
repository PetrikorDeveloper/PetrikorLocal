<?php
/*
 * Template part for displaying posts
 * @package petrikor
 * 
 */
?>

<?php
$post_id = get_the_ID();
$image_url = wp_get_attachment_url();
setPostViews($post_id);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-content has-clouds'); ?> data-aos="fade-down">
    <div class="container mt-3 mb-4">
    <?php    the_content(); ?>
    </div>
</article><!-- #post -->