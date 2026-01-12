<?php
/*
 * TEMPLATE PART FOR DISPLAYING POSTS
 * @PACKAGE petrikor
 * 
 */
?>
<div class="container">
    <!-- *********************** -->
    <div class="bn-breaking-news" id="petrikor-news">
        <div class="bn-controls d-none d-sm-block">
            <button><span class="bn-arrow bn-prev"></span></button>
            <button><span class="bn-action"></span></button>
            <button><span class="bn-arrow bn-next"></span></button>
        </div>
        <div class="bn-news">
            <ul>
                <?php
                $breaking_news_url = getTplPageURL('template-breaking-news.php');
                if(is_array($breaking_news_url)){
                    $breaking_news_url = $breaking_news_url[0];
                }
                $feed = fetch_feed(
                        array(
                            'http://arabic.cnn.com/rss/cnnarabic_topnews.rss',
                            'https://www.alarabiya.net/.mrss/ar/arab-and-world.xml',
//                                    'http://arabic.cnn.com/rss/cnnarabic_world.rss',
//                                    'http://arabic.cnn.com/rss/cnnarabic_mideast.rss',
//                                    'http://arabic.cnn.com/rss/cnnarabic_mideast.rss',
                        )
                );
                $limit = $feed->get_item_quantity(10); // specify number of items
                $items = $feed->get_items(0, $limit); // create an array of items
                if ($limit == 0)
                    echo '<li>'. _e( 'No items', 'petrikor' ).'</li>';
                else
                    foreach ($items as $item) :
                        ?>
                        <li>
                            <form action="<?=$breaking_news_url;?>" method="post" >
                                <button type="submit" class="btn">
                                <span class="bn-seperator ml-2 mr-2" style="background-image:url(<?= petrikor_ASSETS_URI; ?>imgs/logo.png);"></span>  
                                
                                <?= $item->get_title(); ?>
                                </button>
                                <input type="hidden" name="title" value="<?= $item->get_title(); ?>" />
                                <input type="hidden" name="content" value="<?= $item->get_description();?>" />
                                <input type="hidden" name="date" value="<?= $item->get_date('j F Y @ g:i a'); ?>" />
                                
                            </form>
                        </li>
                    <?php endforeach; ?>
            </ul>
        </div>
        <div class="bn-label">عاجل</div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#petrikor-news').breakingNews({
//                effect: 'typography',
            direction: 'rtl',
            themeColor: '#ed1c25'
        });
    });
</script>
<!-- *********************** -->