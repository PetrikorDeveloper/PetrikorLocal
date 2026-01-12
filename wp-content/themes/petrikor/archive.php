<?php /*
@package theme
*/
get_header();
$term = get_queried_object();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main category-page" role="main">
       <!--archive header-->
       <div class="archive-header text-center">
           <div class="font-small">
               <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
           </div>
           <h2 class="font-weight-bold"><span class="font-family-normal"><?= $term->name; ?></span></h2>
           <p class="width-50">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure vero qui dolore dolor quo, at, aut iste ad quas, error excepturi nobis, laboriosam sit atque! Laudantium qui porro enim illo.
           </p>
           <span class="line-dots mt-30 mb-30"></span>
       </div>
        <?php 
//         var_dump(get_query_var( 'taxonomy' ));
        // get_template_part( 'template-parts/category/content');
        ?>
    </main>
</div><!-- #primary -->

<?php get_footer(); ?>
