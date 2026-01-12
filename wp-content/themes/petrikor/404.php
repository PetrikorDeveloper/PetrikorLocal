<?php
/*
 * THE TEMPLATE FOR DISPLAYING 404 PAGES (NOT FOUND)
 * @PACKAGE petrikor
 * 
 */
get_header();
global $petrikor_options;
$logo = $petrikor_options['logo']['url'];
$contact_url = getTplPageURL('template-contact.php');
?>

<div class="entry-wraper">
    <div class="row">
        <div id="primary" class="content-area m-auto">
            <main id="main" class="site-main">

                <div class="error-404">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/page-404-icon.png" alt="" title="" />
                    <h2><?php esc_html_e(' Oops! That page can&#39;t be found.', 'shopstore'); ?></h2>
                    <h5><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'shopstore'); ?></h5>

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-style-2"><span class="btn-content"><?php esc_html_e('Back to home', 'shopstore'); ?></span><span class="icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></span></a>
                </div>


            </main><!-- #main -->
        </div><!-- #primary -->
    </div>


    <?php
    get_footer();
