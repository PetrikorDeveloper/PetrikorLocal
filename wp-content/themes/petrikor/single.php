<?php
/*
 * THE TEMPLATE FOT DISPLAYING ALL SINGLE POSTS
 * @PACKAGE petrikor
 * 
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('template-parts/content', 'header'); ?>

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/post/content');

            }
        } else {
            get_template_part('template-parts/post/content', 'none');
        }

 if (get_post_type() === 'case_studies') {?>
				<div class=" divider-blog-before-new">
		    <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-big.png"/>
        </div>

		<div class="lets_talk-section bg-image bg-image-fixed has-clouds lazyloaded new-case-bottom" data-clouds="has-clouds" data-bg="" style="background-image: url(data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20500%20300%22%3E%3C/svg%3E);">
                <div class="container">
                    <div class="d-flex flex-column justify-content-between align-items-center">
                        <p class="title pt-3 aos-init aos-animate" data-aos="zoom-in-up" style="color:#F1E4B2 !important;"><?php $red_section=get_field('red_part_Content'); echo$red_section['title']; ?></p>
                        <div class="content aos-init aos-animate" data-aos="zoom-in-up" style="text-align:center;">
                            <h4><span style="color: #F1E4B2;"><?php echo$red_section['text1']; ?></span></h4>
                            <h4><span style="color: #F1E4B2;"><?php echo$red_section['text2']; ?></span></h4>
                        </div>
<!--  <a href="#contact"  ><i class="fas fa-chevron-down" style="color:#F1E4B2;"></i></a> -->

                         
                    </div>
                </div>
            </div>
 		<div class="divider-blog-after divider-blog-after-new">
            <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-small.png"/>
        </div>
     <?php
		}
		else{?>
		<div class="divider-blog-before">
		    <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-big.png"/>
        </div>

		<div class="lets_talk-section bg-image bg-image-fixed has-clouds lazyloaded" data-clouds="has-clouds" data-bg="" style="background-image: url(data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20500%20300%22%3E%3C/svg%3E);">
                <div class="container">
                    <div class="d-flex flex-column justify-content-between align-items-center">
                        <p class="title pt-3 aos-init aos-animate" data-aos="zoom-in-up" style="color:#F1E4B2 !important;">Interested in working with us?</p>
                        <div class="content aos-init aos-animate" data-aos="zoom-in-up" style="text-align:center;">
                            <h4><span style="color: #F1E4B2;">Tell Us Your Problem</span></h4>
<h4><span style="color: #F1E4B2;">and Get The Best Services for You</span></h4>
                        </div>
 <a href="#contact"  ><i class="fas fa-chevron-down" style="color:#F1E4B2;"></i></a>

                         
                    </div>
                </div>
            </div>
		<div class="divider-talk-portfolio divider-blog-after">
            <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-small.png"/>
        </div>
		<?php }?>
<section class="contact-form<?php if (get_post_type() === 'case_studies') { echo' new-contact-from-23';}?>" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 column-1 social-sec-box aos-init aos-animate" data-aos="fade-right">
                    <div class="social-sec">
                        <div class="boxed aos-init aos-animate" data-aos="fade-right">

                            <a class="linkedin aos-init aos-animate" target="_blank" href="https://www.linkedin.com/company/petrikorsolutions/" data-aos="fade-left"></a>
                            <a class="instagram aos-init aos-animate" target="_blank" href="https://www.instagram.com/petrikorsolutions/" data-aos="fade-down"></a>
                            <a class="tiktok aos-init aos-animate" target="_blank" href="https://www.tiktok.com/@petrikor.solutions" data-aos="fade-down"></a>
                            <a class="facebook aos-init aos-animate" target="_blank" href="https://www.facebook.com/petrikorsolutions" data-aos="fade-up"></a>
                            <a class="twitter aos-init aos-animate" target="_blank" href="https://twitter.com/petrikor_agency?s=08" data-aos="fade-down"></a>
                            <a class="behance aos-init aos-animate" target="_blank" href="https://www.behance.net/petrikorsolutions" data-aos="fade-up"></a>
                            <a class="youtube aos-init aos-animate" target="_blank" href="https://www.youtube.com/PetrikorAgency" data-aos="fade-down"></a>
                            <a class="pinterest aos-init aos-animate" target="_blank" href="https://www.pinterest.com/PetrikorSolutions/_created/" data-aos="fade-right"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 column-2 aos-init aos-animate" data-aos="fade-left">
                    <div class="form-sec">
                        
<div class="wpcf7 js" id="wpcf7-f5-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form action="/#wpcf7-f5-o1" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="5">
<input type="hidden" name="_wpcf7_version" value="5.8">
<input type="hidden" name="_wpcf7_locale" value="en_US">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f5-o1">
<input type="hidden" name="_wpcf7_container_post" value="0">
<input type="hidden" name="_wpcf7_posted_data_hash" value="">
<input type="hidden" name="_wpcf7_recaptcha_response" value="03AFcWeA6kwS5LZbatdZPvHn3XSvz59ZaIilOmUjHll2ekI008PY1hoLFPly_T_UiqYEGb5aLNTy5gsnDo3Hm0ct-pVozkPwOIaqWk2oXnkSRhbzjvuYwT58Qeprb2hIPcfAn8GrTJYhMeuBFXvFDFC849aLuL1Er7v0-SDK58imOC9168N0h26BC_RHBkjxbezEU-6XmjofWxOcFbePmw2l0JdQe8mvVley6gLXsPYHNlcP0LCR8ls_wMnLMxld09O9vvqWUvGsXqLvxh_vSzm4LDW1GiVYsKuwplxTcUWC35vEcXhXCU3zVJlK59HIrs-SkmcQm-lK3T62V46ZKXDvlLocfq9-SmwEiA5ozv-rluONSKCZxJcK7NRnhBexrKQuXTMyW9A3I5p7AcNQd5NkyamVUoLHUD-Gthx48KHeMGbSz2QzYQHgP8pVmzp6gfqTJcmVew7x14HUkB9ipWQG9k0PHzq9SV6BzvwVYF2BEo6Vi-NkWuk8soRrr-niXmd89fWkatZxTHq8e-RcrbXfQYlyo9Gx2G8XHne6ex7R1h6Heq2ZQ3jGA">
</div>
<div class="contact-form-box">
	<h5 class="contact-us-title" style="font-size:40px;">let’s talk
	</h5>
	<div class="contact-content">
		<p>If you’re interested in what we stand for and how we do things and think we could be a match, then let’s meet. We’ll ask you some questions about what you are looking for which we can discuss over coffee or tea.
		</p>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<p><span class="wpcf7-form-control-wrap" data-name="your-name"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your full name" value="" type="text" name="your-name"></span>
				</p>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<p><span class="wpcf7-form-control-wrap" data-name="your-email"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your email" value="" type="text" name="your-email"></span>
				</p>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<p><span class="wpcf7-form-control-wrap" data-name="your-subject"><input size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Subject" value="" type="text" name="your-subject"></span>
				</p>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<p><span class="wpcf7-form-control-wrap" data-name="your-message"><textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" placeholder="Message" name="your-message"></textarea></span>
				</p>
			</div>
		</div>
	<input class="wpcf7-form-control wpcf7-hidden" value="https://petrikorsolutions.com/" type="hidden" name="current-page">
	</div>
	<div class="contact-bottom">
		<p><input class="wpcf7-form-control wpcf7-submit has-spinner btn-contact" type="submit" value="Hit It!"><span class="wpcf7-spinner"></span>
		</p>
	</div>
</div><p style="display: none !important;"><label>Δ<textarea name="_wpcf7_ak_hp_textarea" cols="45" rows="8" maxlength="100"></textarea></label><input type="hidden" id="ak_js_1" name="_wpcf7_ak_js" value="1695389749324"><script defer="" src="data:text/javascript;base64,ZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoICJha19qc18xIiApLnNldEF0dHJpYnV0ZSggInZhbHVlIiwgKCBuZXcgRGF0ZSgpICkuZ2V0VGltZSgpICk7"></script></p><div class="wpcf7-response-output" aria-hidden="true"></div>
</form>
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
</div>
<!-- <script>
  document.getElementById('contact-link').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
  });
</script> -->
<?php
get_footer();