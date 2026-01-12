<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type='text/javascript' src='/ajax-juicy-projects/unitegallery/js/jquery-11.0.min.js'></script>
	<script type='text/javascript' src='/ajax-juicy-projects/unitegallery/js/unitegallery.min.js'></script>

	<link rel='stylesheet' href='/ajax-juicy-projects/unitegallery/css/unite-gallery.css' type='text/css' />

	<script type='text/javascript' src='/ajax-juicy-projects/unitegallery/themes/default/ug-theme-default.js'></script>
	<link rel='stylesheet' href='/ajax-juicy-projects/unitegallery/themes/default/ug-theme-default.css' type='text/css' />
</head>

<body>
    <?php
        $name = $_GET['name'];
        $category = $_GET['category'];

        $folder = "/home/www/petrikorsolutions.com/ajax-juicy-projects/".strtolower(str_replace(" ","", $category))."/".strtolower(str_replace(" ","", $name));
        $path = "https://petrikorsolutions.com/ajax-juicy-projects/".strtolower(str_replace(" ","", $category))."/".strtolower(str_replace(" ","", $name));
        $thumbs = scandir($folder.'/thumbs',  SCANDIR_SORT_ASCENDING);
    ?>



	<div id="gallery" style="display:none;">

        <?php
            foreach ($thumbs as $thumb){
                if ($thumb != '.' && $thumb != '..'){
                    if (substr_compare($thumb, '__YOUTUBE.txt', -strlen('__YOUTUBE.txt')) === 0){
                        if (!file_exists($folder.'/thumbs/'.$thumb)) {
                            die('File does not exist');
                        }

                        clearstatcache();
                        $myfile = fopen($folder.'/thumbs/'.$thumb, "r") or die("Unable to open file!");
                        $youtube_videoid = fread($myfile,filesize($folder.'/thumbs/'.$thumb));
                        fclose($myfile);

                    ?>
                        <img alt="Youtube Video"
                         data-type="youtube"
                         data-videoid="<?php echo $youtube_videoid; ?>"
                         data-description="">
                    <?php
                    }
                    else if (substr_compare($thumb, '__VID.jpg', -strlen('__VID.jpg')) === 0){
                        $videomp4 = $path."/videos/".str_replace(".jpg", ".mp4",str_replace("__VID","", $thumb));
                    ?>
                        <img alt="Html5 Video"
                             data-type="html5video"
                             data-image="<?php echo $path;?>/thumbs/<?php echo $thumb; ?>"
                             data-videomp4="<?php echo $videomp4; ?>"
                             data-description="">
                    <?php
                    }
                    else {
                    ?>
                        <img src="<?php echo $path;?>/thumbs/<?php echo $thumb; ?>"
                             data-image="<?php echo $path;?>/big/<?php echo $thumb; ?>">
                    <?php
                    }
                ?>
                <?php
                }
            }
         ?>

		<!-- <img alt="Youtube Video"
			 data-type="youtube"
			 data-videoid="A3PDXmYoF5U"
			 data-description="You can include youtube videos easily!">



		 <img alt="Html5 Video"
			 src="images/thumbs/html5_video.png"
			 data-type="html5video"
			 data-image="http://vjs.zencdn.net/v/oceans.png"
			 data-videoogv="http://vjs.zencdn.net/v/oceans.ogv"
			 data-videowebm="http://vjs.zencdn.net/v/oceans.webm"
			 data-videomp4="http://vjs.zencdn.net/v/oceans.mp4#t=0.1"
	    	 data-description="This is html5 video demo played by mediaelement2 player">

		 <img alt="Sound Cloud Track"
			 src="images/thumbs/sound_cloud.jpg"
			 data-type="soundcloud"
			 data-image="images/thumbs/sound_cloud.jpg"
			 data-trackid="8390970"
			 data-description="This gallery can play a soundcloud track"> -->

	</div>

	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery({
                theme_enable_fullscreen_button: false,	//show, hide the theme fullscreen button. The position in the theme is constant
                theme_enable_play_button: false,			//show, hide the theme play button. The position in the theme is constant
                theme_enable_hidepanel_button: false,	//show, hide the hidepanel button
                theme_enable_text_panel: false,			//enable the panel text panel.

                gallery_width:1024,							//gallery width
                gallery_height:500,							//gallery height

                gallery_min_width: 350,						//gallery minimal width when resizing
                gallery_min_height: 500,					//gallery minimal height when resizing

                gallery_images_preload_type:"minimal",

                //slider options:
                slider_scale_mode: "fit",					//fit: scale down and up the image to always fit the slider
                                                            //down: scale down only, smaller images will be shown, don't enlarge images (scale up)
                                                            //fill: fill the entire slider space by scaling, cropping and centering the image
                slider_scale_mode_media: "fit",

		    });
		});

	</script>


</body>
</html>