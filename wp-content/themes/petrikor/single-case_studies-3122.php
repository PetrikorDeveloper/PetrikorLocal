<?php
/* Template for a single Case Study (ID 3122) */

get_header();

if (have_posts()) :
  while (have_posts()) : the_post();

    $post_id = get_the_ID();

    // 🔹 Header fields
    $header_image         = get_field('header_image', $post_id);
    $smal_header_image    = get_field('smal_header_image', $post_id);
    $display_header_image = get_field('display_header_image', $post_id);
    $has_clouds           = get_field('has_clouds', $post_id);
    $header_title         = get_field('header_title', $post_id);
    $bottom_banner        = get_field('bottom_banner', $post_id);

    $title     = $header_title ?: get_the_title();
    $style     = $smal_header_image ? "height: 300px" : "";
    $image_url = $header_image ?: '';

    // 🔹 Analytics group
    $analytics_group     = get_field('analytics', $post_id);
    $first_label_text    = $analytics_group['first_label_text'] ?? '';
    $first_label_value   = $analytics_group['first_label_value'] ?? '';
    $second_label_text   = $analytics_group['second_label_text'] ?? '';
    $second_label_value  = $analytics_group['second_label_value'] ?? '';
    $third_label_text    = $analytics_group['third_label_text'] ?? '';
    $third_label_value   = $analytics_group['third_label_value'] ?? '';
    $fourth_label_text   = $analytics_group['fourth_label_text'] ?? '';
    $fourth_label_value  = $analytics_group['fourth_label_value'] ?? '';

    // 🔹 Company description
    $company_description = get_field('company_description', $post_id);

    // 🔹 Sections repeater
    $sections            = get_field('section', $post_id);

    // 🔹 Last section group
    $last_section_group  = get_field('last_section', $post_id);
    $left_title          = $last_section_group['left_title'] ?? '';
    $center_title_image  = $last_section_group['center_title_image'] ?? '';
    $center_description  = $last_section_group['center_description'] ?? '';
    $center_small_image  = $last_section_group['center_small_image'] ?? '';


    global $petrikor_options;

    $lang = get_bloginfo("language");

    $facebook = array_key_exists("facebook", $petrikor_options) ? $petrikor_options['facebook'] : "";
    $gplus = array_key_exists("gplus", $petrikor_options) ? $petrikor_options['gplus'] : "";
    $linkedin = array_key_exists("linkedin", $petrikor_options) ? $petrikor_options['linkedin'] : "";
    $be = array_key_exists("be", $petrikor_options) ? $petrikor_options['be'] : "";
    $instagram = array_key_exists("instagram", $petrikor_options) ? $petrikor_options['instagram'] : "";
    $twitter = array_key_exists("twitter", $petrikor_options) ? $petrikor_options['twitter'] : "";
    $pinterest = array_key_exists("pinterest", $petrikor_options) ? $petrikor_options['pinterest'] : "";
    $youtube = array_key_exists("youtube", $petrikor_options) ? $petrikor_options['youtube'] : "";
    $tiktok = 'https://www.tiktok.com/@petrikor.solutions';

    $email = array_key_exists("email", $petrikor_options) ? $petrikor_options['email'] : "";
    $phone = array_key_exists("phone", $petrikor_options) ? $petrikor_options['phone'] : "";
    $copyright = array_key_exists("copyright", $petrikor_options) ? $petrikor_options['copyright'] : "";
    $copyright_bg = array_key_exists("copyright-bg", $petrikor_options) ? $petrikor_options['copyright-bg']['color'] : "";
    $logo = array_key_exists("logo", $petrikor_options) ? $petrikor_options['logo']['url'] : "";
    $footer_logo = array_key_exists("footer_logo", $petrikor_options) ? $petrikor_options['footer_logo']['url'] : "";
    $address = array_key_exists("address", $petrikor_options) ? $petrikor_options['address'] : "";
    $site_description = array_key_exists("site_description", $petrikor_options) ? $petrikor_options['site_description'] : "";
?>



    <div class="case-study perfume-dubai" id="<?php the_title(); ?>">

      <?php if ($display_header_image == 'true') : ?>
        <header class="page-top-section has-clouds">
          <section class="header-img edited-header-img" style="<?= esc_attr($style); ?>" data-aos="fade-down">
            <div class="container">
              <div class="page-title edited-width" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                data-aos-easing="ease-in-sine">
                <?= wp_kses_post($title); ?>
                <p class="desc-desc">A case study on achieving breakthrough online sales growth through strategic integrated SEM/PPC & SEO optimization.</p>
                <div class="flex-riv-row-ch2 justify-content-start edited-buttons ">
                  <a href="/case-studies/">View All Case Studies</a>
                  <a href="#contact-">Contact Us</a>
                </div>
              </div>

            </div>
          </section>

          <?php if (!empty($bottom_banner)) : ?>
            <section class="bottom_banner">
              <?= wp_kses_post($bottom_banner); ?>
            </section>
          <?php endif; ?>

          <?php if ($has_clouds == 'true') :
            get_template_part('template-parts/content', 'clouds');
          endif; ?>
        </header>

        <style>
          .header-img {
            background-image: url(<?= esc_url($image_url); ?>);
          }

          .edited-header-img {
            min-height: 650px;
            background-color: transparent !important;
          }
        </style>
      <?php endif; ?>
      <section class="py-5 challenge-section position-relative">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/a-sophisticated-product-shot-advertiseme_G2iIjyEYTCqvp80ZGZDhbw_LgjBrB_vSuiaXqrlMXA0bg-1-1.png" class="lap-image" alt="">
        <div class="container py-5">
          <div class="row g-4 py-5">

            <div class="col-lg-6 col-md-6">
              <h5 class="usc-sec-title mb-3" data-aos="fade-right">The Challenge: Breaking the AED 100,000 Barrier</h5>
              <p class="results-note mb-4 " data-aos="fade-right">
                The client established an ambitious target: achieve AED 100,000 per month in online sales. We determined the advertising investment needed to reach this threshold, powered by existing SEO efforts.
              </p>
              <p class="results-note mb-4 " data-aos="fade-right">
                Implementation began in February 2024, focusing on increasing Google Ads budget, unlocking Meta's potential, and improving SEO tactics.
              </p>

            </div>


            <div class="col-lg-6 col-md-6">

            </div>
          </div>

        </div>
      </section>

      <!-- Phase 1 Section -->
      <section class=" py-5 red-back position-relative paid-growth">
        <div class="container mt-5">
          <h5 class="usc-sec-title white-color  mb-3" data-aos="fade-right">Baseline Performance: Holiday Season 2023-2024</h5>
          <div class="row g-4 py-3">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 194,715</h3>
                <p class="youtube-approach my-0">Total Online Revenue</p>
                <p class="mt-1">
                  During the peak holiday shopping period
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-142.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 84,911</h3>
                <p class="youtube-approach my-0">Total Ad Spend</p>
                <p class="mt-1">
                  Investment across all digital advertising channels
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-142.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">229%</h3>
                <p class="youtube-approach my-0">MER</p>
                <p class="mt-1">
                  Return on advertising spend before optimization
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-142.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>

          <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 47,865</h3>
                <p class="youtube-approach my-0">Organic Revenue</p>
                <p class="mt-1">
                  Solid sales, yet technical issues limited growth potential
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-142.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">2.5 K</h3>
                <p class="youtube-approach my-0">Ranked Keywords</p>
                <p class="mt-1">
                  Good, yet highly expandable
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-142.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>
          <p class="text-white results-note text-center mb-2 mt-5">This baseline performance during the holiday season provided valuable insights into customer behavior and channel potential.</p>
          <p class="text-white results-note text-center">Organic traffic delivered solid sales, yet technical issues and limited content depth capped growth potential.</p>
        </div>
      </section>


      <!-- Phase 2 Section -->
      <section class="phase2-section py-5 paid-growth">
        <div class="container">
          <h5 class="usc-sec-title mb-3 edited-back">Baseline Metrics: Key Performance Indicators</h5>
          <div class="d-flex justify-content-start ">
            <div class="base-card stats ">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Vector-40.svg" class="image-border">
              <div class="left-left-border"></div>
              <h3 class="stat-number">AED 383.1</h3>
              <p class="mt-1">
                Average cost per acquisition through PPC campaigns
              </p>
            </div>
            <div class="base-card stats">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Vector-41.svg" class="image-border">
              <div class="left-left-border"></div>
              <h3 class="stat-number">AED 224.63</h3>
              <p class="mt-1">
                Overall cost per acquisition across all channels
              </p>
            </div>
            <div class="base-card stats ">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140-1.svg" class="image-border">
              <div class="left-left-border"></div>
              <h3 class="stat-number">0.33%</h3>
              <p class="mt-1">
                Overall conversion rate for the website
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="phase-section py-5 position-relative paid-growth pf">
        <div class="container mt-5">
          <h5 class="usc-sec-title " data-aos="fade-right">KStrategic Approach: Two-Pronged Strategy</h5>
          <div class="row align-items-center">
            <div class="col-12 col-md-4">
              <div class="big-div stats">
                <div class="d-flex align-items-start justify-content-start ">
                  <div class="number-text mr-3 edited-number">1</div>
                  <div class="">
                    <h5 class="challenge-title  mb-2">Budget Reallocation</h5>
                    <p class="result-result">
                      Increased Google Ads investment to capitalize on existing performance
                    </p>
                  </div>
                </div>
                <div class="d-flex align-items-start justify-content-start ">
                  <div class="number-text mr-3 ">2</div>
                  <div class="">
                    <h5 class="challenge-title  mb-2">Meta Expansion </h5>
                    <p class="result-result">
                      Expanded Meta budget, aiming for better use of channel capabilities </p>
                  </div>
                </div>
                <div class="d-flex align-items-start justify-content-start ">
                  <div class="number-text mr-3 ">3</div>
                  <div class="">
                    <h5 class="challenge-title  mb-2">Creative Optimization</h5>
                    <p class="result-result">
                      Enhanced assets to improve performance across channels </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-8">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/a-visually-engaging-infographic-advertis_VsDKmOCATnm8Dsx7QhP-0A_6-jJnkjFSXWVIowDooxUYA-1-2.png" class="">

            </div>
          </div>
          <p class=" results-note text-center mb-2 ">This reallocation was implemented in February 2024, with continuous </p>
          <p class=" results-note text-center">monitoring and adjustments based on performance data.</p>
        </div>
      </section>

      <section class="pb-5 pf challenge-section position-relative paid-growth">
        <div class="container mt-5">
          <h5 class="usc-sec-title mb-3" data-aos="fade-right">Key SEO Actions (Feb – May 2024)</h5>

          <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">1. Technical Fixes</h5>
                <p>
                  Fixed Google Search Console errors, enhanced site speed, and implemented schema markup
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">2. Content Enhancement</h5>
                <p>
                  Published SEO-optimized blogs, new landing pages, and seasonal banners (Ramadan, Mother's Day) </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">3. Local Presence</h5>
                <p>
                  Strengthened Google My Business presence & local links </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card postion-relative">
                <h5 class="challenge-title">4. UX Improvements</h5>
                <p>
                  Improved navigation, faster mobile experience, and easier product discovery. </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>
          <p class=" results-note text-center mb-2 mt-5">These foundational moves rebuilt SEO momentum and improved UX</p>
          <p class=" results-note text-center"> helping recover from the 3-month pause that had caused ranking and visibility drops.</p>
        </div>
      </section>

      <!-- Phase 3 Section -->
      <section class=" py-5 blue-back position-relative paid-growth">
        <div class="container mt-5">
          <h5 class="usc-sec-title white-color  mb-3" data-aos="fade-right">Results: Holiday Season 2024-2025</h5>
          <div class="row g-4 py-3">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 522,104</h3>
                <p class="youtube-approach my-0">Total Revenue</p>
                <p class="mt-1">
                  +168% year-over-year increase </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 180,524</h3>
                <p class="youtube-approach my-0">Total Ad Spend</p>
                <p class="mt-1">
                  +112.6% year-over-year increase </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">289%</h3>
                <p class="youtube-approach my-0">MER</p>
                <p class="mt-1">
                  +26.12% improvement in efficiency </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>

          <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 56,170</h3>
                <p class="youtube-approach my-0">Organic Revenue</p>
                <p class="mt-1">
                  +17.4% year-over-year increase </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">3.0 K</h3>
                <p class="youtube-approach my-0">Ranked Keywords</p>
                <p class="mt-1">
                  +20% year-over-year increase </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-160.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-161.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>

        </div>
      </section>

      <section class=" py-5  position-relative pf edited-pf">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Cloud-3.svg" class="cloud-1">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Cloud-4.svg" class="cloud-2">
        <div class="container mt-5">
          <h5 class="usc-sec-title  mb-3" data-aos="fade-right">Results: Holiday Season 2024-2025</h5>
          <p class="key-title  mb-2">PPC Campaign Performance</p>
          <div class="row g-4 py-3 justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 p-0">
              <div class="challenge-card stats text-start" style="background-image: url(https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-117.png);">
                <h3 class="stat-number">661 Sales</h3>

                <p class="mt-1">
                  +206% increase from previous period </p>

              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6 p-0">
              <div class="challenge-card stats text-start">
                <h3 class="stat-number">AED 273 CPA</h3>

                <p class="mt-1">
                  28.7% reduction in acquisition cost</p>

              </div>
            </div>


          </div>
          <p class="key-title  mb-2">PPC Campaign Performance</p>
          <div class="row g-4 justify-content-between">

            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 p-0">
              <div class="challenge-card stats text-start" style="background-image: url(https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-119.png);">
                <h3 class="stat-number">852 Sales</h3>

                <p class="mt-1">
                  +125% increase in total transactions </p>

              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6 p-0">
              <div class="challenge-card stats text-start" style="background-image: url(https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-117.png);">
                <h3 class="stat-number">0.51% Conversion Rate</h3>

                <p class="mt-1">
                  +35.29% improvement in conversion efficiency </p>

              </div>
            </div>
          </div>
          <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 p-0 mt-4">
              <div class="challenge-card stats text-start">
                <h3 class="stat-number">732 New Customers</h3>

                <p class="mt-1">
                  +121% growth in new customer acquisition </p>

              </div>
            </div>


          </div>
          <p class=" results-note text-center mb-2 mt-5">Revenue growth outpaced advertising spend increase, indicating improved efficiency in marketing dollar deployment.</p>
        </div>
      </section>


      <section class="phase-section py-5 position-relative paid-growth pf">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/a-vintage-style-conceptual-illustration-_lB1wd7u2QNOM_gCacIPkqA_Rb4kIXfLT7WplACHezk7Lw-1-1.png" class="settings-image-edited">
        <div class="container mt-5">

          <div class="row edited-row-row ">
            <div class="col-12 col-md-6">
              <h5 class="usc-sec-title mb-5 " data-aos="fade-right">Challenge #2: Scaling With Efficiency</h5>
              <p class="result-result mb-3">
                After exceeding our initial AED 100,000 monthly target, we identified an opportunity to scale operations further while maintaining or improving efficiency metrics.
              </p>
              <p class="result-result">
                Our enhanced strategy focused on sustainable scaling that would deliver consistent returns over time.
              </p>
            </div>

          </div>

          <div class="row ab-row">
            <div class="col-4">
              <div class="d-flex justify-start align-items-start flex-column">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-163.svg" />
                <p class="mt-4 result-result">Meta Budget Increase</p>
              </div>
            </div>
            <div class="col-4">
              <div class="d-flex justify-start align-items-start flex-column">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-164.svg" />
                <p class="mt-4 result-result">Controlled Targeting Funnel</p>
              </div>
            </div>
            <div class="col-4">
              <div class="d-flex justify-start align-items-start flex-column">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-165.svg" />
                <p class="mt-4 result-result">Full Customer Journey</p>
              </div>
            </div>

          </div>

        </div>


      </section>


      <section class=" py-5  position-relative edited-challenge-card paid-growth">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Cloud-3.svg" class="cloud-1">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Cloud-5.svg" class="cloud-2">
        <div class="container mt-5">
          <h5 class="usc-sec-title   mb-3" data-aos="fade-right">Results: Spring 2025 Performance</h5>
          <div class="row ggap-4 py-3 justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-5 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 639,361</h3>
                <p class="youtube-approach my-0">Total Online Revenue</p>
                <p class="mt-1">
                  +22.45% increase from previous period </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-5 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">AED 210,810</h3>
                <p class="youtube-approach my-0">Total Ad Spend</p>
                <p class="mt-1">
                  +16.77% increase from previous period </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>


          </div>

          <div class="row ggap-4 py-3 justify-content-center ">
            <!-- Card 1 -->
            <div class="col-lg-5 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">3.5 K</h3>
                <p class="youtube-approach my-0">Ranked Keywords</p>
                <p class="mt-1">
                  +40% YoY </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-5 col-md-6">
              <div class="challenge-card stats text-center">
                <h3 class="stat-number">303%</h3>
                <p class="youtube-approach my-0">MER</p>
                <p class="mt-1">
                  +4.76% improvement in efficiency </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-166.svg" class="border-img borderr-bottom" alt="">
                <img src=" https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-167.svg
                " class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>
          <p class=" results-note text-center mb-2 mt-5">The second phase of scaling delivered continued growth with improving efficiency, validating our approach to controlled expansion.</p>
        </div>
      </section>


      <section class="ruban-section py-5 position-relative paid-growth pf">
        <div class="container mt-5">
          <h5 class="usc-sec-title white-color mb-5 " data-aos="fade-right">The L1-L2-L3 Funnel Strategy</h5>
          <div>

            <div class="ruban-div mb-5">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-168.svg" class="ruban-imabe">
              <div class="ruban-text">
                <p class="youtube-approach white-color">Level 1: New Customer Acquisition</p>
                <p class="results-note white-color">Broad targeting parameters focused on reaching potential customers who match our ideal customer profile but have not yet engaged with the brand</p>
              </div>
            </div>
            <div class="ruban-div right-margin mb-4">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-169.svg" class="ruban-imabe">
              <div class="ruban-text">
                <p class="youtube-approach white-color">Level 2: Engagement Deepening</p>
                <p class="results-note white-color">Retargeting viewers of Level 1 ads while excluding website visitors from the past 90 days, focusing on nurturing interest</p>
              </div>
            </div>
            <div class="ruban-div right-right-margin">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-170.svg" class="ruban-imabe">
              <div class="ruban-text">
                <p class="youtube-approach white-color">Level 3: Conversion Focus</p>
                <p class="results-note white-color">Highly targeted campaigns for recent website visitors, driving final conversion at the moment of highest purchase intent</p>
              </div>
            </div>

            <div class="right-image">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Group-127.svg" />
            </div>
          </div>

        </div>
      </section>

      <section class=" py-5  position-relative  paid-growth">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Cloud-3.svg" class="cloud-1">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/12/Cloud-5.svg" class="cloud-2">
        <div class="container mt-5">
          <h5 class="usc-sec-title   mb-3" data-aos="fade-right">Eid Al Adha: Year-Over-Year Comparison</h5>
          <div class="row py-3 ">
            <!-- Card 1 -->
            <div class="col-12 col-md-6">
              <div class="card-card">
                <p class="youtube-approach mb-3">2024 PERFORMANCE</p>
                <ul class="mt-3 card-ul">
                  <li class="card-li ">AED 43,689 Total Revenue</li>
                  <li class="card-li">256% Media Efficiency Ratio</li>
                  <li class="card-li">82 Sales Total Transactions</li>
                  <li class="card-li">3.0K Ranked Keywordse</li>
                  <li class="card-li">11,923 Organic Sessions</li>
                  <li class="card-li">AED 4,408 Organic Sales</li>

                </ul>
              </div>




            </div>
            <!-- Card 2 -->
            <div class="col-12 col-md-6 ">
              <div class="card-card">
                <p class="youtube-approach mb-3">2025 PERFORMANCE</p>
                <ul class="mt-3 card-ul">
                  <li class="card-li">AED 99,731 Total Revenue (+128%)</li>
                  <li class="card-li">397% Media Efficiency Ratio (+55%)</li>
                  <li class="card-li">142 Sales Total Transactions (+73%)</li>
                  <li class="card-li">3.5K Ranked Keywords (+16%)</li>
                  <li class="card-li">13,300 Organic Sessions (+12%)</li>
                  <li class="card-li">AED 10,385 Organic Sales (+136%)</li>

                </ul>
              </div>
            </div>


          </div>
      </section>


      <section class="pb-5 pf  position-relative paid-growth">
        <div class="container mt-5">
          <h5 class="usc-sec-title text-white mb-5" data-aos="fade-right">Key Learnings & Future Opportunities </h5>

          <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">Strategic Scaling Requires Solid Foundations</h5>
                <p>
                  Baseline diagnostics in both channels de-risked spend increases.
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">Structured Funnels Provide Control</h5>
                <p>
                  The L1-L2-L3 Meta structure gave us leverage over the full customer journey, improving ROAS, CPA and retention metrics. </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">Seasonal Synergy Wins</h5>
                <p>
                  Coordinated SEM blitz + SEO-primed pages doubled holiday upside. </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card postion-relative">
                <h5 class="challenge-title">Structured Content Safeguards Visibility</h5>
                <p>
                  Consistent on-page, content, UX, and technical cadence prevented ranking erosion. </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-140.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-141.svg" class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>

        </div>
      </section>




      <div class="divider-blog-before">
        <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-big.png" />
      </div>
      <div class="lets_talk-section  bg-image bg-image-fixed has-clouds lazyloaded" data-clouds="has-clouds" data-bg="" style="background-image: url(data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20500%20300%22%3E%3C/svg%3E);">
        <div class="d-flex flex-column justify-content-between align-items-center">
          <p class="title pt-3 aos-init aos-animate" data-aos="zoom-in-up" style="color:#F1E4B2 !important;">Interested in working with us?</p>
          <div class="content aos-init aos-animate" data-aos="zoom-in-up" style="text-align:center;">
            <h4><span style="color: #F1E4B2;">Tell Us Your Problem</span></h4>
            <h4><span style="color: #F1E4B2;">and Get The Best Services for You</span></h4>
          </div>
          <a id="to-contact" href="#contact-"><i class="fas fa-chevron-down" style="color:#F1E4B2;"></i></a>
        </div>
      </div>
      <div class="divider-talk-portfolio divider-blog-after">
        <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-small.png" />
      </div>
      <section class="contact-form" id="<?= is_front_page() ? "contact" : "contact-" . $postType; ?>">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 column-1 social-sec-box" data-aos="fade-right">
              <div class="social-sec">
                <div class="boxed" data-aos="fade-right">

                  <?php if ($linkedin) : ?>
                    <a class="linkedin" target="_blank" href="<?= $linkedin; ?>" data-aos="fade-left"></a>
                  <?php endif; ?>
                  <?php if ($instagram) : ?>
                    <a class="instagram" target="_blank" href="<?= $instagram; ?>" data-aos="fade-down"></a>
                  <?php endif; ?>
                  <?php if ($tiktok) : ?>
                    <a class="tiktok" target="_blank" href="<?= $tiktok; ?>" data-aos="fade-down"></a>
                  <?php endif; ?>
                  <?php if ($facebook) : ?>
                    <a class="facebook" target="_blank" href="<?= $facebook; ?>" data-aos="fade-up"></a>
                  <?php endif; ?>
                  <?php if ($twitter) : ?>
                    <a class="twitter" target="_blank" href="<?= $twitter; ?>" data-aos="fade-down"></a>
                  <?php endif; ?>
                  <?php if ($be) : ?>
                    <a class="behance" target="_blank" href="<?= $be; ?>" data-aos="fade-up"></a>
                  <?php endif; ?>
                  <?php if ($youtube) : ?>
                    <a class="youtube" target="_blank" href="<?= $youtube; ?>" data-aos="fade-down"></a>
                  <?php endif; ?>
                  <?php if ($pinterest) : ?>
                    <a class="pinterest" target="_blank" href="<?= $pinterest; ?>" data-aos="fade-right"></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 column-2" data-aos="fade-left">
              <div class="form-sec">
                <?php
                $lang = get_bloginfo("language");
                if ($lang == 'ar')
                  echo do_shortcode('[contact-form-7 id="2098" title="Contact Us_ar"]');
                else
                  echo do_shortcode('[contact-form-7 id="5" title="Contact Us"]');
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script>
      function setEqualHeights() {
        const tiers = document.querySelectorAll('.base-card');
        if (!tiers.length) return;

        // Reset heights first (important when resizing smaller)
        tiers.forEach(tier => tier.style.height = 'auto');

        // Find the tallest one
        const maxHeight = Math.max(...Array.from(tiers).map(tier => tier.offsetHeight));

        // Apply that height to all
        tiers.forEach(tier => tier.style.height = `${maxHeight}px`);
      }

      // Run on load and on resize
      window.addEventListener('load', setEqualHeights);
      window.addEventListener('resize', setEqualHeights);
    </script>
<?php
  endwhile;
endif;

get_footer();
