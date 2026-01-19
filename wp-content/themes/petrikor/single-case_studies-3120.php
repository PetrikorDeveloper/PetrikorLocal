<?php
/* Template for a single Case Study (ID 3120) */

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



    <div class="case-study paid-growth" id="<?php the_title(); ?>">

      <?php if ($display_header_image == 'true') : ?>
        <header class="page-top-section has-clouds desktop-banner">
          <section class="header-img edited-header-img" style="<?= esc_attr($style); ?>" data-aos="fade-down">
            <div class="container">
              <div class="page-title edited-width" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                data-aos-easing="ease-in-sine">
                <?= wp_kses_post($title); ?>
                <p class="desc-desc">How our full-funnel SEO & SEM strategy helped a luxury niche perfume retailer in UAE scale their online performance, turning struggling digital channels into powerful revenue generators.</p>
                <div class="flex-riv-row-ch2 justify-content-start edited-buttons ">
                  <a href="#contact-">Request a Strategy Session</a>
                  <a href="/case-studies/">All Case Studies</a>
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



      <?php if ($display_header_image == 'true') : ?>
        <header class="page-top-section has-clouds mobile-banner">
          <section class=" edited-header-img-mobile" style="<?= esc_attr($style); ?>;background-image:url(https://petrikorsolutions.com/wp-content/uploads/2026/01/Mask-group-24.webp)" data-aos="fade-down">
            <div class="container">
              <div class="page-title edited-width" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                data-aos-easing="ease-in-sine">
                <?= wp_kses_post($title); ?>

              </div>

            </div>
          </section>
          <div class="container mobile-buttons">
            <p class="desc-desc text-center">How our full-funnel SEO & SEM strategy helped a luxury niche perfume retailer in UAE scale their online performance, turning struggling digital channels into powerful revenue generators.</p>
            <div class="flex-riv-row-ch2 justify-content-center edited-buttons ">
              <a href="#contact-">Request a Strategy Session</a>
              <a href="/case-studies/">All Case Studies</a>
            </div>
          </div>

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
          .page-top-section .edited-header-img-mobile .container {
            min-height: 600px;
            display: flex;
            justify-content: center;
            align-items: end;

          }

          .edited-header-img-mobile .title-case-studies-23 {
            text-align: center !important;
          }

          .mobile-buttons .edited-buttons a {
            font-size: 0.8rem !important;
          }

          .mobile-buttons .flex-riv-row-ch2 a {
            padding: 20px 17px !important;
          }

          @media (max-width:479px) {
            .mobile-buttons .flex-riv-row-ch2 a:nth-of-type(2) {
              padding: 30px 17px !important;
            }

          }

          .edited-header-img-mobile {
            min-height: 650px;
            background-color: transparent !important;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;

            background-attachment: scroll;
          }
        </style>
      <?php endif; ?>
      <section class="pb-5 challenge-section position-relative">
        <div class="container mt-5">
          <h5 class="usc-sec-title mb-5" data-aos="fade-right">Project Overview</h5>
          <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">1. Project Scope</h5>
                <p>
                  Comprehensive SEO audit, content strategy, technical SEO implementation, and Paid Ads management across Google & Meta platforms.
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
                <h5 class="challenge-title">2. Timeline</h5>
                <p>
                  January – June 2025, with particular focus on the crucial Ramadan shopping season.
                </p>
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
                <h5 class="challenge-title">3. Markets</h5>
                <p>
                  United Arab Emirates, with infrastructure readiness for future regional expansion throughout the Middle East.
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card postion-relative">
                <h5 class="challenge-title">4. Goal</h5>
                <p>
                  Fix digital visibility issues, eliminate inefficient ad spend, and build a performance-driven acquisition engine across search and social platforms.
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Phase 1 Section -->
      <section class=" py-5 position-relative">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2026/01/Group-171-1-scaled.webp" class="w-100">
      </section>


      <!-- Phase 2 Section -->
      <section class="phase2-section pb-5">
        <div class="container text-center">
          <h5 class="usc-sec-title mb-3" data-aos="fade-right">The Challenge</h5>
          <p class="results-note mb-4 px-5 text-gray" data-aos="fade-right">
            Despite selling luxury perfumes (a high-demand category), this retailer's digital presence was underperforming across both organic and paid channels. SEO lacked consistency between Arabic and English content, while paid campaigns suffered from poor structure and tracking.
          </p>
          <p class="results-note mb-4 px-5 text-gray" data-aos="fade-right">
            Additionally, the website’s UX and UI did not meet luxury consumer expectations, impacting engagement and conversion. Leadership had no consolidated reporting system to connect ad spend with actual revenue, making ROI assessment nearly impossible. With a website migration approaching, these foundational issues needed urgent correction.
          </p>
        </div>
      </section>



      <!-- Phase 3 Section -->
      <section class="phase3-section pb-2 position-relative">
        <div class="container mt-5">
          <div class="row g-4 mb-5">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">Technical Audit</h5>
                <p>
                  Comprehensive review uncovered critical issues in metadata, indexing, page speed, and multilingual handling across the site.
                </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-137.svg" class="border-img borderr-top" alt="">

              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">Technical Fixes</h5>
                <p>
                  Implemented solutions for structured markup, canonicalization, and SEO-friendly site architecture while also improving UX and UI across legacy and new Shopify platforms </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Mask-group-1.svg" class="border-img borderr-top" alt="">

              </div>
            </div>
          </div>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card">
                <h5 class="challenge-title">Content & On-page SEO Strategy</h5>
                <p>
                  Developed bilingual content briefs aligned with search intent in both Arabic and English, optimizing for local market nuances and incorporating key on-page SEO factors.  </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-139.svg" class="border-img borderr-top" alt="">

              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card postion-relative">
                <h5 class="challenge-title">Performance & Results</h5>
                <p>
                  Ongoing monitoring and iterative improvements to maintain organic performance and user engagement. </p>
                <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-138.svg" class="border-img borderr-top" alt="">

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Results Section -->
      <section class="py-5 half-pyramid ">
        <div class="container">
          <div class="row ">
            <div class="col-md-12 col-lg-5">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/a-sleek-conceptual-product-advertisement_o0G-rGGHSAmEqZsokrWGhg_57SY_jU6SHOhf6WpVK9LVw-1-1-1-1.png" class="half-pyramid-image">
            </div>
            <div class="col-md-12 col-lg-7">
              <div class=" mb-3">
                <h5 class="challenge-title">Rebuild for Control</h5>
                <p class="border-accent-edited-red results-note text-gray">Restructured campaigns for more effective targeting across platforms, utilizing different campaign types with a bottom funnel focus. Fixed tracking parameters and aligned with back-end purchase data for more accurate reporting</p>
              </div>
              <div class="rebuild ml-4 mb-3">
                <h5 class="challenge-title">Optimize for Efficiency</h5>
                <p class="border-accent-edited-yellow results-note text-gray">Tested multiple creative variations, audience segments, and bidding strategies with bottom funnel focus. Special attention given to Ramadan period, adapting to seasonal shopping behaviors.</p>
              </div>
              <div class="rebuild ml-5">
                <h5 class="challenge-title">Scale with Insight</h5>
                <p class="border-accent-edited-blue results-note text-gray">Built custom dashboards tracking ROAS, MER, and platform-specific trends, giving leadership clear visibility into the relationship between ad spend and revenue for the first time.</p>
              </div>
            </div>


          </div>

        </div>
      </section>



      <!-- Key Takeaways Section -->
      <section class="takeaways-section py-5">
        <div class="container">
          <h5 class="usc-sec-title mb-4 text-center">Remarkable Results</h5>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6 stats text-center ">
              <h3 class="stat-number red">5.5x</h3>
              <p class="stat-title red">Revenue Increase</p>
              <p class="result-note text-gray">Revenue from paid channels jumped from AED 90,000 to over AED 499,000 in just four months.</p>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6 stats text-center">
              <h3 class="stat-number light-green">31%</h3>
              <p class="stat-title light-green"> ROAS Growth</p>
              <p class="result-note text-gray">Return on ad spend improved from 2.5x to 3.28x, demonstrating significantly stronger campaign targeting and efficiency.</p>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6 stats text-center ">
              <h3 class="stat-number green">790%</h3>
              <p class="stat-title green ">Ramadan MER</p>
              <p class="result-note text-gray">Media efficiency ratio peaked during the critical Ramadan shopping season, with good performance continuing in Q2</p>
            </div>

            <div class="col-lg-3 col-md-6 stats text-center ">
              <h3 class="stat-number text-gray">39%</h3>
              <p class="stat-title text-gray">Revenue Contribution</p>
              <p class="result-note text-gray">Paid media's share of total online revenue grew from just 4.5% to 39% year-over-year—a transformation in sales attribution.</p>
            </div>
          </div>


        </div>
      </section>

      <section class="py-5 half-pyramid position-relative">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/ChatGPT-Image-Aug-15-2025-04_58_40-PM-1.png" class="settings-image">
        <div class="container">
          <h5 class="usc-sec-title mb-5">What Made It Work</h5>
          <div class="row ">
            <div class="col-md-12 col-lg-8">
              <div class="row g-4 mb-2">
                <!-- Card 1 -->
                <div class="col-lg-6 col-md-6">
                  <div class="challenge-card">
                    <h5 class="challenge-title red mb-1">Focus on Fundamentals</h5>
                    <p>
                      We prioritized fixing what truly matters—tracking integrity, campaign structure, visibility, and alignment with actual buying behavior—instead of chasing vanity metrics.
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
                    <h5 class="challenge-title red mb-1">Seasonal Agility</h5>
                    <p>
                      Campaigns adapted in real-time to the Ramadan surge and subsequent seasonal patterns, maintaining efficiency through market fluctuations. </p>
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
                    <h5 class="challenge-title red mb-1">Bilingual Excellence</h5>
                    <p>
                      Our SEO and content strategies respected language-specific nuances, with proper keyword mapping and intent analysis in both Arabic and English. </p>
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
                  </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-6 col-md-6">
                  <div class="challenge-card postion-relative">
                    <h5 class="challenge-title red mb-1">Unified Reporting</h5>
                    <p>
                      We replaced scattered platform metrics with consolidated performance dashboards that connected spend directly to sales outcomes. </p>
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>

      <section class="new-section py-5">
        <div class="container">
          <h5 class="usc-sec-title pt-5 pb-3">Key Takeaways for Luxury Marketers</h5>

          <div class="row g-4 pb-5 pt-2">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="number-text mr-3 edited-number">1</p>
                <div class="">
                  <h5 class="challenge-title  mb-2">Fix Your Foundation First</h5>
                  <p class="result-result">Whether SEO or SEM, foundational technical hygiene is what unlocks sustainable growth. Proper tracking, campaign structure, and clear KPIs aren't optional—they're essential prerequisites.</p>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="number-text mr-3">2</p>
                <div class="">
                  <h5 class="challenge-title mb-2">Simplify Your Data Approach</h5>
                  <p class="result-result">Complex reporting often obscures actionable insights. By aligning metrics with real business outcomes, we helped the team focus on what drives revenue.</p>
                </div>
              </div>

            </div>


          </div>
          <div class="row g-4 py-5">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="number-text mr-3">3</p>
                <div class="">
                  <h5 class="challenge-title mb-2">Prepare for High-Intent Seasons</h5>
                  <p class="result-result">For luxury retail in the UAE, periods like Ramadan represent disproportionate growth opportunities. Having the right campaigns, offers, and landing experiences ready made a measurable difference.</p>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="number-text mr-3">4</p>
                <div class="">
                  <h5 class="challenge-title mb-2">Strategy Outperforms Budget Size</h5>
                  <p class="result-result">Even as overall market sales decreased year-over-year, our optimized channels delivered higher efficiency and greater revenue contribution—proving that smarter structure beats bigger budgets.</p>
                </div>
              </div>

            </div>


          </div>


        </div>
      </section>
      <div class="divider-talk-portfolio divider-blog-after">
        <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/uploads/2026/01/Vector-10.svg" />
      </div>
      <?php
      $last_section_group = get_field('last_section'); // Assuming 'analytics' is the field name
      $left_title = '';
      $center_title_image = '';
      $center_description = '';
      $center_small_image = '';
      if ($last_section_group) {
        $left_title = $last_section_group['left_title']; // Subfield 'title'
        $center_title_image = $last_section_group['center_title_image']; // Subfield 'description'
        $center_description = $last_section_group['center_description']; // Subfield 'title'
        $center_small_image = $last_section_group['center_small_image']; // Subfield 'description'
      }
      ?>
      <section class="usc-end-section" data-aos="fade-up">
        <img class="yellow-cloud" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Cloud-green-1.png">
        <div class="container">
          <div class="row">
            <div class="col-md-6 last-col-1">
              <img class="top-starts" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Group-5.svg" />
              <p><?php echo $left_title; ?></p>
              <img class="bottom-quota" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Group-7.svg">
            </div>
            <div class="col-md-6 last-col-2">
              <img class="top-quota" src="https://petrikorsolutions.com/wp-content/uploads/2023/10/Frame-7.svg">
              <div class="content-c-bio">
                <div class="usc-header-bio">
                  <img class="ucs-small-img" src="<?php echo $center_small_image; ?>">
                  <img src="<?php echo $center_title_image; ?>">
                </div>
                <p><?php echo $center_description; ?></p>
              </div>
              <div class="btn-section">
                <a class="seo-btn" href="https://petrikorsolutions.com/services/seo-agency/">Do SEO</a>
                <a class="sem-btn" href="https://petrikorsolutions.com/services/search-engine-marketing-sem/">Get SEM</a>
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
        const tiers = document.querySelectorAll('.pyramid-tier');
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
