<?php
/*
 * THEME SUPPORT
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 */
/* * ***************************************************************************
 * ***************  -- Template Name: Landing Page Template
 * ************************************************************************** */

get_header();
?>
<div id="primary" class="content-area">
    <section class="landing-page page-main-content">

        <?php $landing_page_section_1 = get_field('section_1'); ?>
		<?php if ($landing_page_section_1['display'] == 'true') : ?>
		<div class="section-in-page section_1 bg-image has-clouds" style="background-image: url(<?= $landing_page_section_1['background']; ?>);" >
                        <div class="container">
                                    <h2 class="title" data-aos="fade-down"><?= $landing_page_section_1['title']; ?></h2>
                                    <div class="content" data-aos="fade-up">
                                        <?= $landing_page_section_1['content']; ?>
                                    </div>
							<div class="notification_message">	
							<small class="popup_msg"> </small>
							</div>
							
							<!-- 			sprite -->
			<div class="social-sprite-sheet">
				<ul class="animated-socialicons">
					<li>
						<a href="https://www.facebook.com/petrikorsolutions"><div class="facebook-animation"></div></a>
					</li>
					<li>
						<a href="https://www.instagram.com/petrikorsolutions/"><div class="instagram-animation"></div></a>
					</li>
					<li>
						<a href="https://www.youtube.com/channel/UCy-c5nd3PP0dMKSbm6eyndA/featured"><div class="youtube-animation"></div></a>
					</li>
					<li>
						<a href="https://www.linkedin.com/company/petrikorsolutions/"><div class="linkedin-animation"></div></a>
					</li>
					<li>
						<a href="https://twitter.com/petrikor_agency"><div class="twitter-animation"></div></a>
					</li>
					
				</ul>
				
			</div>
<!-- 			sprite -->
							<div class="container partnerships" style="max-width: 100%;z-index:11;text-align: center;">

                    <a href="https://certification-searchads.apple.com/certificate/I1Jqd1alNh/Saleem-El-Deek" target="_blank">
                        <noscript><img decoding="async" src="https://petrikorsolutions.com/images/apple01.svg" style="width:105px; height:auto;"></noscript><img decoding="async" class=" lazyloaded" src="https://petrikorsolutions.com/images/apple01.svg" data-src="https://petrikorsolutions.com/images/apple01.svg" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.google.com/partners/agency?id=7117290179" target="_blank">
                        <img src="https://petrikorsolutions.com/images/google.svg" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.semrush.com/agencies/petrikor-solutions/" rel="noreferrer noopener" target="_blank">
                        <img src="<?= BASE_URL;?>images/semrush-badge.svg" width="100" height="100"/>
                    </a>

                    <a href="https://www.credly.com/badges/b19447ac-1321-421b-8816-8379186785bf/public_url" target="_blank">
                        <img src="https://petrikorsolutions.com/images/meta-certified-media-planning-professional.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.credly.com/badges/d9c5d314-5e2c-4e53-810c-65d68d551e7f/public_url" target="_blank">
                        <img src="https://petrikorsolutions.com/images/meta-certified-creative-strategy-professional.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.credly.com/badges/5022b150-1ae7-4e80-87d8-51ff73832fe3/public_url" target="_blank">
                        <img src="https://petrikorsolutions.com/images/meta-certified-digital-marketing-associate.png" style="width:105px; height:auto;">
                    </a>

                    <a href="https://www.designrush.com/agency/profile/petrikor-solutions" target="_blank">
                        <img src="https://petrikorsolutions.com/images/designrush.png" style="width:190px; height:auto;">
                    </a>

                    <a>
                        <img src="https://petrikorsolutions.com/images/shopify-partner.svg" style="width:190px; height:auto;">
                    </a>

                </div>
                        </div>
                        <?php if ($landing_page_section_1['has_clouds'] == 'true') : ?>
                            <?php get_template_part('template-parts/content', 'clouds'); ?>
                        <?php endif; ?>
		

			
			
                    </div>
                
        <?php endif; ?>
		
		
		
			
		
		
		<?php $landing_page_section_2 = get_field('section_2'); ?>
		<?php if ($landing_page_section_2['display'] == 'true') : ?>
		<div class="section-in-page section_2 bg-image has-clouds" style="background-image: url(<?= $landing_page_section_2['background']; ?>);" >
                        <div class="container">
                                    <h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['title']; ?></h2>
                                    <div class="content desktop-section" data-aos="fade-up">
										<div class="row row-seo-sem-smm">
											<div class="col-sm-4">
												<div class="seo_icon icons">
													<img src="<?= $landing_page_section_2['seo_image']?>">
													<p>
													<?= $landing_page_section_2['seo_title'];?>	
													</p>
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="sem_icon icons">
													<img src="<?= $landing_page_section_2['sem_image']?>">
													<p>
													<?= $landing_page_section_2['sem_title'];?>	
													</p>
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="smm_icon icons">
													<img src="<?= $landing_page_section_2['smm_image']?>">
													<p>
													<?= $landing_page_section_2['smm_title'];?>	
													</p>
												</div>
											</div>
											
										</div>
                              
                                    </div>
							<div class="row desktop-section">
								<div class="col-sm-7 description-seo">
									<h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['seo_title']; ?></h2>
									<p class="aos-init aos-animate" data-aos="fade-down"><?= $landing_page_section_2['seo_content']?></p>
								</div>
								<div class="col-sm-7 description-sem" style="display: none">
									<h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['sem_title']; ?></h2>
									<p class="aos-init aos-animate" data-aos="fade-down"><?= $landing_page_section_2['sem_content']?></p>
								</div>
								<div class="col-sm-7 description-smm" style="display: none">
									<h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['smm_title']; ?></h2>
									<p class="aos-init aos-animate" data-aos="fade-down"><?= $landing_page_section_2['smm_content']?></p>
								</div>
							</div>
							
<!-- 							mobile-version -->
							 <div class="content mobile-section" data-aos="fade-up">
										<div class="row row-seo-sem-smm">
											<div class="col-sm-4 column-1">
												<div class="seo_icon icons">
													<img src="<?= $landing_page_section_2['seo_image']?>">
													<p>
													<?= $landing_page_section_2['seo_title'];?>	
													</p>
												</div>
												<div class="description-seo">
									<h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['seo_title']; ?></h2>
									<p class="aos-init aos-animate" data-aos="fade-down"><?= $landing_page_section_2['seo_content']?></p>
								</div>
											</div>
											
											<div class="col-sm-4 column-2">
												<div class="sem_icon icons">
													<img src="<?= $landing_page_section_2['sem_image']?>">
													<p>
													<?= $landing_page_section_2['sem_title'];?>	
													</p>
												</div>
												<div class="description-sem" style="display: none">
									<h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['sem_title']; ?></h2>
									<p class="aos-init aos-animate" data-aos="fade-down"><?= $landing_page_section_2['sem_content']?></p>
								</div>
											</div>
											
											<div class="col-sm-4 column-3">
												<div class="smm_icon icons">
													<img src="<?= $landing_page_section_2['smm_image']?>">
													<p>
													<?= $landing_page_section_2['smm_title'];?>	
													</p>
												</div>
												<div class="description-smm" style="display: none">
									<h2 class="title" data-aos="fade-down"><?= $landing_page_section_2['smm_title']; ?></h2>
									<p class="aos-init aos-animate" data-aos="fade-down"><?= $landing_page_section_2['smm_content']?></p>
								</div>
											</div>
											
										</div>
                              
                                    </div>
							
<!-- 							mobile-version -->
							<div class="row disp-flexcenter monthly-newsletter">
									<div class="col-sm-3 column-1">
										<p>Subscribe to Our Newsletter</p>
									</div>
								<div class="col-sm-5 column-2">
									<?php echo do_shortcode('[newsletter_form button_label="Hit it!"]
									[newsletter_field name="email" placeholder="Your best email"]
									[/newsletter_form]');?>
									<div class="notification_message">	
							<small class="popup_msg"> </small>
							</div>
									</div>
								
									</div>
						
			</div>
                      
			
			<?php if ($landing_page_section_2['has_clouds'] == 'true') : ?>
                            <?php get_template_part('template-parts/content', 'clouds'); ?>
                        <?php endif; ?>
			<div class="right_backimg">
				<img src="<?= $landing_page_section_2['background_right_image'];?>">
			</div>
                    </div>
                
        <?php endif; ?>
		
		
		<?php $landing_page_section_3 = get_field('section_3'); ?>
		<?php if ($landing_page_section_3['display'] == 'true') : ?>
		<div class="section-in-page section_3 bg-image has-clouds" style="background-image: url(<?= $landing_page_section_3['background']; ?>);" >
                        <div class="container">
                                    <h2 class="title" data-aos="fade-down"><?= $landing_page_section_3['title']; ?></h2>
                                    <div class="content" data-aos="fade-up">
                                        <?= $landing_page_section_3['content']; ?>
                                    </div>
                        </div>
                        <?php if ($landing_page_section_3['has_clouds'] == 'true') : ?>
                            <?php get_template_part('template-parts/content', 'clouds'); ?>
                        <?php endif; ?>
                    </div>
                
        <?php endif; ?>
		
		
    </section>
</div>

<?php
get_footer();
