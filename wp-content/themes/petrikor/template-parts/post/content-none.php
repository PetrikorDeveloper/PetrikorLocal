<?php
/*
 * TEMPLATE PART FOR DISPLAYING A MESSAGE THAT POSTS CANNOT BE FOUND
 * @PACKAGE petrikor
 */
?>
<div class="row">
    <div id="page-404">

        <div class="error-404">
            <div class="error-404-content">
                <div class="header-404">
                    <h1><?php _e('Nothing found.', 'petrikor'); ?></h1>
                </div>
                <div class="content-404">
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'petrikor'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div><!-- .error-404 -->

    </div>
</div>