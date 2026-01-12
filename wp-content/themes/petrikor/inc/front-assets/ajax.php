<?php
/*
 * AJAX
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. petrikor SETUP
 * 
 * *****************************************************************************
 * ****************************** 1. petrikor SETUP ********************************
 * ************************************************************************** */
add_action('wp_ajax_nopriv_petrikor_load_more', 'petrikor_load_more');
add_action('wp_ajax_petrikor_load_more', 'petrikor_load_more');

add_action('wp_ajax_nopriv_petrikor_save_user_contact_form', 'petrikor_save_contact');
add_action('wp_ajax_petrikor_save_user_contact_form', 'petrikor_save_contact');

function petrikor_load_more()
{
    $paged = $_POST['page'] + 1;
    $prev = $_POST['prev'];
    $archive = $_POST['archive'];

    if ($prev == 1 && $_POST['page'] != 1) {
        $paged = $_POST['page'] - 1;
    }

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
    );

    if ($archive != '0') {
        $archVal = explode('/', $archive);
        $flipped = array_flip($archVal);

        switch (isset($flipped)) {

            case $flipped['category']:
                $type = 'category_name';
                $key = 'category';
                break;

            case $flipped['tag']:
                $type = 'tag';
                $key = $type;
                break;

            case $flipped['author']:
                $type = 'author';
                $key = $type;
                break;

        }

        $currKey = array_keys($archVal, $key);
        $nextKey = $currKey[0] + 1;
        $value = $archVal[ $nextKey ];

        $args[ $type ] = $value;

        //check page trail and remove "page" value
        if (isset($flipped['page'])) {
            $pageVal = explode('page', $archive);
            $page_trail = $pageVal[0];
        } else {
            $page_trail = $archive;
        }
    } else {
        $page_trail = '';
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):

    while ($query->have_posts()): $query->the_post();

    get_template_part('template-parts/post/content', 'blog');

    endwhile;

     else:

        echo 0;

    endif;

    wp_reset_postdata();

    die();
}
function petrikor_check_paged($num = null)
{
    $output = '';

    if (is_paged()) {
        $output = get_query_var('paged');
    }

    if ($num == 1) {
        $paged = (get_query_var('paged') == 0 ? 1 : get_query_var('paged'));

        return $paged;
    } else {
       return $output;
    }
}