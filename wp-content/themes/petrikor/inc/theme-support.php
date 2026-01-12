<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. petrikor SETUP
 * 2. REGISTER NAVIGATION
 * 3. DISABLE GUTENBERG
 * 4. REQUIRE FRONT FUNCTIONS
 * 
 * *****************************************************************************
 * ****************************** 1. petrikor SETUP ********************************
 * ************************************************************************** */

function set_direction() {
    global $wp_locale, $wp_styles;

    //$direction = isset( $wp_locale->text_direction ) ? $wp_locale->text_direction : 'ltr';
    echo $direction;
    $wp_locale->text_direction = 'ltr';
    if (!is_a($wp_styles, 'WP_Styles')) {
        $wp_styles = new WP_Styles();
    }
    $wp_styles->text_direction = $direction;
}

// add_action('init', 'set_direction');

function petrikor_admin_lang() {
    global $wp_locale;

    if (is_admin()) {
        switch_to_locale('en_US');
        $direction = "ltr";
        $wp_locale->text_direction = $direction;
        return;
    }
}

// add_filter('init','petrikor_admin_lang');

function petrikor_post_formats_setup() {
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ));
    add_post_type_support('post', 'post-formats');

    add_theme_support('custom-header');

    add_theme_support('custom-background');

    add_theme_support('post-thumbnails');

    add_theme_support('html', array('control'));
}

add_action('after_setup_theme', 'petrikor_post_formats_setup');




/* * *********************************************************************************** *
 * ****************************** 2. REGISTER NAVIGATION ****************************** *
 * ************************************************************************************ */

function petrikor_register_nav_menu() {

    /*
     *  Add Theme Menu Area 
     */
    register_nav_menus(array(
        'primary-menu' => 'Main Menu',
        'primary-responsive-menu' => 'Primary Responsive Menu',
        'footer-menu' => 'Footer Menu',
    ));
}

add_action('after_setup_theme', 'petrikor_register_nav_menu');

/* * *********************************************************************************** *
 * ****************************** 2. REGISTER Widgets ****************************** *
 * ************************************************************************************ */

function petrikor_sidebar_init() {

    register_sidebar(
            array(
                'name' => esc_html__('Footer Colomn 1', 'petrikor'),
                'id' => 'footer-1',
                'description' => 'petrikor Footer',
                'before_widget' => '<section id="%1$s" class="%2$s footer-widget">',
                'after_widget' => '</section>',
                'before_title' => '<h6 class="mb-15">',
                'after_title' => '</h6>'
            )
    );

    register_sidebar(
            array(
                'name' => esc_html__('Footer Colomn 2', 'petrikor'),
                'id' => 'footer-2',
                'description' => 'petrikor Footer',
                'before_widget' => '<section id="%1$s" class="%2$s footer-widget">',
                'after_widget' => '</section>',
                'before_title' => '<h6 class="mb-15">',
                'after_title' => '</h6>'
            )
    );

    register_sidebar(
            array(
                'name' => esc_html__('Footer Colomn 3', 'petrikor'),
                'id' => 'footer-3',
                'description' => 'petrikor Footer',
                'before_widget' => '<section id="%1$s" class="%2$s footer-widget">',
                'after_widget' => '</section>',
                'before_title' => '<h6 class="mb-15">',
                'after_title' => '</h6>'
            )
    );
}

add_action('widgets_init', 'petrikor_sidebar_init');

/* * *********************************************************************************** *
 * ****************************** 3. DISABLE GUTENBERG ****************************** *
 * ************************************************************************************ */

if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {
    // WP > 5 beta
    add_filter('use_block_editor_for_post', '__return_false', 10);
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
} else {
    // WP < 5 beta
    add_filter('gutenberg_can_edit_post_type', '__return_false', 10);
}

function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 <i class="fas fa-eye" aria-hidden="true"></i>';
    }
    return $count . ' <i class="fas fa-eye" aria-hidden="true"></i>';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function limit_content_chr($the_content, $limit = 210) {
    // Take the existing content and return a subset of it
    $shortcode_tags = array('VC_COLUMN_INNTER');
    $values = array_values($shortcode_tags);
    $exclude_codes = implode('|', $values);

    // strip all shortcodes but keep content
    // $the_content = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $the_content);
    // strip all shortcodes except $exclude_codes and keep all content
    $the_content = preg_replace("~(?:\[/?)(?!(?:$exclude_codes))[^/\]]+/?\]~s", '', $the_content);
    //echo $the_content;
    $input_string = mb_strimwidth(strip_tags($the_content), 0, $limit, '...');

    return $input_string;
}

function example_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}

add_action('wp_before_admin_bar_render', 'example_admin_bar_remove_logo', 0);

function get_random_categories($number, $args = null) {
    $categories = get_categories($args); // Get all the categories, optionally with additional arguments
    // If there aren't enough categories, use as many as possible to avoid an error
    if ($number > count($categories))
        $number = count($categories);

    // If no categories are available or none were requested, return an empty array
    if ($number === 0)
        return array();

    shuffle($categories); // Mix up the category array randomly
    // Return the first $number categories from the shuffled list
    return array_slice($categories, 0, $number);
}

function getTplPageURL($TEMPLATE_NAME) {
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $TEMPLATE_NAME
    ));
    if (isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}

function add_custom_query_var($vars) {
    $vars[] = "page_in_list";
    $vars[] = "slug_in_list";
    return $vars;
}

add_filter('query_vars', 'add_custom_query_var');
add_action('init', 'portfolio_set');

function portfolio_set() {

    if (isset($_GET['page_in_list'])) {

        $paged = $_GET['page_in_list']+1;
        $terms = get_terms([
            'taxonomy' => 'portfolio-category',
            'hide_empty' => false,
            'orderby' => 'name',
            'order' => 'ASC',
            'number' => 6 //specify yours
        ]);
        $terms_slugs = wp_list_pluck($terms, 'slug');
        if (isset($_GET['current']) &&$_GET['current'] =="casestudy" ) {
            

        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 9,
            'orderby' => 'title',
            'order' => 'ASC',
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio-category',
                    'field' => 'slug',
                    'terms' => $terms_slugs
                )
            ),
            'meta_key'      => 'is_case_study',
            'meta_value'    => 1,
        );
        } else{
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => 9,
                'orderby' => 'title',
                'order' => 'ASC',
                'paged' => $paged,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio-category',
                        'field' => 'slug',
                        'terms' => $terms_slugs
                    )
                )
            );
        }
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
            ?>

            <?php
            while ($wp_query->have_posts()) :
                $wp_query->the_post();
                $term_obj_list = get_the_terms(get_the_ID(), 'portfolio-category');
                $terms_string = join('. ', wp_list_pluck($term_obj_list, 'slug'));
                ?>
                <div class="cbp-item <?= $terms_string ?>">
                    <input type="hidden" value="<?= petrikor_check_paged(); ?>" class="curent-page-<?= $paged; ?>" />
                    <?php
                    get_template_part('template-parts/post/content', 'portfolio');
                    ?>
                </div>
                <?php
            endwhile;
            ?>
            <?php
            wp_reset_postdata();
            wp_reset_query()
            ?>
            <?php else:?>
                0
            <?php endif;?>
        
        <?php
        die();
    }
}

function petrikor_pagination($_slug = 'ss') {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_next' => true,
        'prev_text' => __('<i class="fas fa-chevron-left"></i>'),
        'next_text' => __('<i class="fas fa-chevron-right"></i>'),
    ));

    if (is_array($pages)) {

        if (is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        } else {
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        }

        $pagination = '<ul class="pagination">';
        $class = "";
        foreach ($pages as $page) {

            if (strpos($page, "current") !== false) {
                $class = "active";
            }
            $pagination .= "<li class='page-item " . $class . "' data-page='" . $_slug . "' >$page</li>";
        }

        $pagination .= '</ul>';

        echo $pagination;
        return $pagination;
    }
}

// Set your Open Graph Meta Tags
function fbogmeta_header() {
    if (is_single()) {
        global $post;
        //getting the right post content
        $postsubtitrare = get_post_meta($post->ID, 'id-subtitrare', true);
        $post_subtitrare = get_post($postsubtitrare);
        $content = limit_content_chr(strip_tags($post_subtitrare->post_content), 297);
        ?>
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:description" content="<?php echo $content; ?>" />
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>
        <?php if ($fb_image) : ?>
            <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
        <?php endif; ?>
        <meta property="og:type" content="<?php
        if (is_single() || is_page()) {
            echo "article";
        } else {
            echo "website";
        }
        ?>" />
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
        <?php
    }
}

add_action('wp_head', 'fbogmeta_header');

/**
 * Social media share buttons
 */
function wcr_share_buttons($mobile = false, $hidemobile = true) {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include(locate_template('share-template.php', false, false));
}

/* video */

function getYoutubThumb($yturl) {
    // Get Youtube URL

    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $yturl, $matches);

    $video_id = $matches[1];

    // Get Thumbnail
    $video_thumbnail_url = 'http://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';

    return $video_thumbnail_url;
}

function petrikor_category_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_category()) {
            $query->set('posts_per_page', 2);
        }
    }
}

add_action('pre_get_posts', 'petrikor_category_query');

// Alter search posts per page
function pd_search_posts_per_page($query) {
    if ($query->is_search) {
        $query->set('posts_per_page', '2');
    }
    return $query;
}

add_filter('pre_get_posts', 'pd_search_posts_per_page');

add_action('admin_head', 'my_custom_fonts'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function my_custom_fonts() {
    echo '<style>
    .update-nag.notice.notice-warning.inline,
    #toplevel_page_youtube-my-preferences,
    #ytprefs_wiz_button{
       display: none
    }
  </style>';
}

//   add_filter( 'paginate_links', function( $link )
// {
//     return  
//        filter_input( INPUT_GET, 'tag' )
//        ? remove_query_arg( 'tag', $link )
//        : $link;
// } );
if (!function_exists('petrikor_post_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function petrikor_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail('post-thumbnail', array(
                    'alt' => the_title_attribute(array(
                        'echo' => false,
                    )),
                ));
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }

endif;
if (!function_exists('petrikor_posted_meta')) :

    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function petrikor_posted_meta() {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date())
        );

        $posted_on = '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>';

        $byline = sprintf(
                /* translators: %s: post author */
                __('by %s', 'petrikor'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<li>' . $posted_on . '</li> <li>' . $byline . '</li>'; // WPCS: XSS OK.
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'petrikor'));
            if ($categories_list && petrikor_categorized_blog()) {
                printf('<li class="cat-links">%1$s</li>', $categories_list); // WPCS: XSS OK.
            }
        }
        if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<li class="comments-link">';
            /* translators: %s: post title */
            comments_popup_link(sprintf(wp_kses(__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'petrikor'), array('span' => array('class' => array()))), get_the_title()));
            echo '</li>';
        }

        edit_post_link(
                sprintf(
                        /* translators: %s: Name of current post */
                        esc_html__('Edit %s', 'petrikor'), the_title('<li class="screen-reader-text">"', '"</li>', false)
                ), '<li class="edit-link">', '</li>'
        );
    }

endif;
if (!function_exists('petrikor_categorized_blog')) :

    /**
     * Returns true if a blog has more than 1 category.
     *
     * @return bool
     */
    function petrikor_categorized_blog() {
        if (false === ( $all_the_cool_cats = get_transient('petrikor_categories') )) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields' => 'ids',
                'hide_empty' => 1,
                // We only need to know if there is more than one category.
                'number' => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('petrikor_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1) {
            // This blog has more than 1 category so petrikor_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so petrikor_categorized_blog should return false.
            return false;
        }
    }

endif;
require petrikor_THEME_FRONT_PATH . 'ajax.php';
require petrikor_THEME_FRONT_PATH . 'breadcrumb.php';
require petrikor_THEME_FRONT_PATH . 'bs4navwalker.php';
