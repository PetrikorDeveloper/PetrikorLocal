<?php /*
@package theme
*/
get_header();
$term = get_queried_object();

$main_layout = get_field("main_layout", $term);
if(empty($header_layout)){
    $header_layout = "left";
}

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main category-page" role="main">
        <!--archive header-->
        <?php get_template_part('template-parts/content', 'header'); ?>
         
        <?php get_template_part('template-parts/category/content', 'portfolio'); ?>
    </main>
</div><!-- #primary -->

<?php get_footer(); ?>
