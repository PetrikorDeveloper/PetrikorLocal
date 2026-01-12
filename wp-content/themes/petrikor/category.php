<?php /*
@package theme
*/
get_header();
$term = get_queried_object();
$header_layout = get_field("header_layout", $term);
$main_layout = get_field("main_layout", $term);
if(empty($header_layout)){
    $header_layout = "left";
}
if(empty($main_layout)){
    $main_layout = "default";
}
$l = 'default';
if($main_layout == 'video'){
    $l = 'video';
}
//echo $main_layout;
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main category-page" role="main">
        <!--archive header-->
        <?php if($header_layout == "center"): ?>
       <div class="archive-header text-center">
           <div class="font-small">
               <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
           </div>
           <h2 class="font-weight-bold"><span class="font-family-normal"><?php single_cat_title( __( '', 'textdomain' ) ); ?></span></h2>
           <p class="width-50">
             <?php echo category_description(); ?>
           </p>
           <span class="line-dots mt-30 mb-30"></span>
       </div>
        <?php endif; ?>
        <?php if($header_layout == "left"): ?>
        <!--archive header-->
        <div class="archive-header">
            <div class="font-small">
                <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
            </div>
            <h2 class="font-weight-bold"><span class="font-family-normal"><?php single_cat_title( __( '', 'textdomain' ) ); ?></span></h2>
            <ul class="sub-category list-inline font-x-small text-uppercase">
                 <?php 
                $categories = get_random_categories(8);
                foreach ($categories as $key => $category):
                ?>
                <li class="list-inline-item"><a href="<?= get_category_link($category); ?>"><?= $category->name; ?></a></li>
                 <?php endforeach; ?>
            </ul>
            <span class="line-dots mt-30 mb-30"></span>
        </div>
         <?php endif; ?>
        <?php // get_template_part('template-parts/category/content', $main_layout); ?>
        <?php get_template_part('template-parts/category/content', $l); ?>
    </main>
</div><!-- #primary -->
wissam

<?php get_footer(); ?>
