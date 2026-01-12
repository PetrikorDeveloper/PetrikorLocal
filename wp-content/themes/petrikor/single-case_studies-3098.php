<?php
/* Template for a single Case Study (ID 2542) */

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



    <div class="case-study" id="<?php the_title(); ?>">

      <?php if ($display_header_image == 'true') : ?>
        <header class="page-top-section has-clouds">
          <section class="header-img edited-header-img" style="<?= esc_attr($style); ?>" data-aos="fade-down">
            <div class="container">
              <div class="page-title edited-width" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                data-aos-easing="ease-in-sine">
                <?= wp_kses_post($title); ?>
                <p class="desc-desc">From launch to profitable growth, see how data transformed this UAE travel brand's digital journey.</p>
                <div class="flex-riv-row-ch2 justify-content-start edited-buttons ">
                  <a href="#contact-">Get Your Growth Strategy</a>
                  <a href="/case-studies/">View More Case Studies</a>
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
      <section class="pb-5 challenge-section position-relative">
        <div class="container mt-5">
          <h3 class="text-start mb-3 usc-sec-title ">The Challenge: Starting From Zero</h3>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card border-accent">
                <h5 class="challenge-title">No Digital Footprint</h5>
                <p>
                  As a newly launched store, Travelease had no historical data or
                  customer insights to build upon when they approached Petrikor.
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
              <div class="challenge-card border-accent">
                <h5 class="challenge-title">Limited Budget</h5>
                <p>
                  Budget constraints required highly strategic spending, with maximum
                  efficiency needed for every dirham invested in advertising.
                </p>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6  mx-auto">
              <div class="challenge-card border-accent">
                <h5 class="challenge-title">User Journey Gaps</h5>
                <p>
                  Initial campaigns revealed misalignment between customer expectations
                  and product offerings, causing lost purchase opportunities.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Phase 1 Section -->
      <section class="phase-section py-5 position-relative">
        <div class="container text-center edited-height">

          <!-- Text Content -->
          <div class="content-block">
            <h5 class="usc-sec-title" data-aos="fade-down">Phase 1 : Building Awareness (March–May 2024)</h5>
            <h6 class="youtube-approach" data-aos="fade-down">YouTube First Approach</h6>
            <p class="youtube-text" data-aos="fade-down">
              We launched YouTube awareness & traffic campaigns targeting UAE travel enthusiasts,
              focusing on brand introduction rather than immediate conversions.
            </p>

            <div class="row text-center stats mt-5" data-aos="fade-down">
              <div class="col-6">
                <h3 class="stat-number">1.3M+</h3>
                <p class="stat-label">Impressions</p>
                <p class="stat-stat-text">Brand visibility achieved <br> across the UAE market</p>
              </div>
              <div class="col-6">
                <h3 class="stat-number">4,500+</h3>
                <p class="stat-label">Clicks</p>
                <p class="stat-stat-text">Initial traffic generated <br> to the website</p>
              </div>
            </div>
          </div>

          <!-- Suitcase -->
          <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/envato-labs-ai-2a9ec6d5-fd77-4fed-b4dd-e57e17c95f40-1-1.png" alt="Suitcase" class="img-fluid suitcase-img">

          <!-- Arrows -->
          <svg xmlns="http://www.w3.org/2000/svg" width="177" height="118" viewBox="0 0 177 118" fill="none" class="arrow arrow1">
            <path d="M175.596 0.0791236L128.462 20.445C127.637 20.803 127.662 21.9851 128.508 22.3014L149.924 30.3595C143.85 37.4021 134.436 46.9503 121.946 56.6858C107.806 67.7075 91.8764 77.418 74.5965 85.5552C52.985 95.7319 29.185 103.457 3.85492 108.523C1.25772 109.043 -0.426507 111.565 0.0946018 114.154C0.549009 116.431 2.55423 118 4.78875 118C5.10141 118 5.41825 117.971 5.73508 117.904C31.9531 112.664 56.6036 104.639 79.0071 94.0587C96.9708 85.5719 113.538 75.4326 128.25 63.9115C142.449 52.7983 152.129 42.6049 157.957 35.6955L170.893 52.6151C171.452 53.3435 172.611 53.0064 172.69 52.0907L176.996 1.08639C177.059 0.333021 176.296 -0.216396 175.6 0.0832868L175.596 0.0791236Z" fill="#DABE88" />
          </svg>


          <svg xmlns="http://www.w3.org/2000/svg" width="264" height="199" viewBox="0 0 264 199" fill="none" class="arrow arrow2">
            <path d="M261.932 0.164271L198.755 34.0275C197.648 34.6199 197.824 36.2639 199.035 36.606L230.714 45.5808C210.844 80.3578 168.301 125.265 154.488 139.456L144.241 131.315C141.526 129.158 137.646 129.275 135.069 131.599C105.454 158.257 72.2842 171.299 49.67 177.546C25.1886 184.309 7.4155 184.801 6.96438 184.814C3.04219 184.889 -0.0738535 188.123 0.00133247 192.04C0.0765184 195.912 3.2385 199 7.09805 199C7.144 199 7.18994 199 7.23589 199C8.01699 198.983 26.7049 198.554 52.9907 191.348C93.2945 180.299 122.016 161.365 140.039 146.102L150.653 154.535C153.473 156.775 157.528 156.55 160.081 154.013C162.603 151.506 217.861 96.3673 242.764 53.1079L261.561 73.8322C262.421 74.7793 264 74.1743 264 72.8934V1.3993C264 0.343685 262.872 -0.332244 261.937 0.168444L261.932 0.164271Z" fill="#00677E" />
          </svg>

        </div>
      </section>


      <!-- Phase 2 Section -->
      <section class="phase2-section py-5 position-relative">
        <div class="container text-left position-relative">
          <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Petrikor-COins-02.svg" class="coin coin1" alt="coin">
          <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Petrikor-COins-02.svg" class="coin coin2" alt="coin">
          <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Petrikor-COins-02.svg" class="coin coin3" alt="coin">

          <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Petrikor-COins-02.svg" class="coin coin5" alt="coin">
          <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Petrikor-COins-02.svg" class="coin coin6" alt="coin">
          <!-- Text -->
          <h5 class="usc-sec-title" data-aos="fade-down">Phase 2 : First Conversions (June 2024)</h5>
          <h6 class="challenge-title" data-aos="fade-down">Performance Max Launch</h6>
          <p class="phase2-text" data-aos="fade-down">
            We introduced Performance Max campaigns, leveraging Google’s machine learning
            to find high-intent audiences across channels.
          </p>
          <p class="phase2-text" data-aos="fade-down">
            Initial results showed promising movement but with clear optimization needs:
          </p>
          <h6 class="challenge-title mt-3" data-aos="fade-down">Initial Google ads ROAS</h6>

          <!-- Stats Row -->
          <div class="row text-left mt-4" data-aos="fade-down">
            <!-- Stat 1 -->
            <div class="col-4 col-md-3 mb-4 phase2-stat">
              <p class="phase2-text">Return on ad spend<br>during first conversion phase</p>
              <h3 class="stat-number">27%</h3>

              <div class="bar"></div>

            </div>

            <!-- Stat 2 -->
            <div class="col-4 col-md-3 mb-4 phase2-stat">
              <p class=" phase2-text">First month total online<br>sales achieved</p>
              <h3 class="stat-number">10%</h3>

              <div class="bar"></div>

            </div>

            <!-- Stat 3 -->
            <div class="col-4 col-md-3 mb-4 phase2-stat">
              <p class="phase2-text">Starting total online cost<br>per acquisition</p>
              <h3 class="stat-number">221.6 <span class="currency">AED</span></h3>

              <div class="bar"></div>

            </div>
          </div>
        </div>
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-91.svg" alt="Airplane" class="img-fluid airplane-img">
      </section>



      <!-- Phase 3 Section -->
      <section class="phase3-section pb-2 position-relative">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Cloud-2.svg" class="right-cloud-image">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Cloud-2.svg" class="left-cloud-image">
        <div class="container mb-3">
          <h5 class="usc-sec-title" data-aos="fade-right">Phase 3: Strategic Pivot (March–August 2024)</h5>
        </div>

        <div class="container pyramid position-relative mobile-edits">

          <!-- Tier 1 -->
          <div class="pyramid-tier tier1 d-flex justify-content-between align-items-center" data-aos="fade-right">
            <div class="tier-text text-start">
              <p>Customer Feedback</p>
              <p>Qualitative surveys revealed misunderstandings about product promise and preferences for customization.</p>
            </div>
            <div class="mobile-icon">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/k7BAAG.svg" alt="Icon" class="">
            </div>

          </div>

          <!-- Tier 2 -->
          <div class="pyramid-tier tier2 d-flex justify-content-between align-items-center" data-aos="fade-right">
            <div class="tier-text text-start">
              <p>Messaging update</p>
              <p>Qualitative surveys revealed misunderstandings about product promise and preferences for customization.</p>
            </div>
            <div class="mobile-icon">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/TvpWo9.svg" alt="Icon" class="">
            </div>
          </div>

          <!-- Tier 3 -->
          <div class="pyramid-tier tier3 d-flex justify-content-between align-items-center" data-aos="fade-right">
            <div class="tier-text text-start">
              <p>UX Improvements</p>
              <p>Implemented kit customization features allowing users to personalize their travel solutions.</p>
            </div>
            <div class="mobile-icon">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/MWkO4y.svg" alt="Icon" class="">
            </div>
          </div>

          <!-- Tier 4 -->
          <div class="pyramid-tier tier4 d-flex justify-content-between align-items-center" data-aos="fade-right">
            <div class="tier-text text-start">
              <p>Product Focus Shift</p>
              <p>Introduced relatable kits (OCD and Safety kits) while emphasizing high-performing individual items like portable bidets and universal adaptors.</p>
            </div>
            <div class="mobile-icon">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-84.svg" alt="Icon" class="">
            </div>
          </div>

        </div>
      </section>

      <!-- Results Section -->
      <section class="results-section pb-3">
        <div class="container">
          <div class="row align-items-center">

            <!-- Left Content -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0 edited-margin">
              <h5 class="text-start mb-3 usc-sec-title " data-aos="fade-right">Results: June to August 2024</h5>

              <div class="result-item d-flex align-items-start stats" data-aos="fade-right">
                <span class="bar"></span>
                <div>
                  <h3 class="stat-number">44</h3>
                  <p class="results-note">Total purchases</p>
                </div>
              </div>

              <div class="result-item d-flex align-items-start stats" data-aos="fade-right">
                <span class="bar"></span>
                <div>
                  <h3 class="stat-number">7,512 <span class="currency">AED</span></h3>
                  <p class="results-note">Revenue generated from ad campaigns</p>
                </div>
              </div>

              <div class="result-item d-flex align-items-start stats" data-aos="fade-right">
                <span class="bar"></span>
                <div>
                  <h3 class="stat-number">111.95%</h3>
                  <p class="results-note">Media Efficiency Ratio (MER)</p>
                </div>
              </div>

              <div class="result-item d-flex align-items-start stats" data-aos="fade-right">
                <span class="bar"></span>
                <div>
                  <h3 class="stat-number">170.12 <span class="currency">AED</span></h3>
                  <p class="results-note">Optimized cost per acquisition (CPA)</p>
                </div>
              </div>

              <p class="results-note mt-4" data-aos="fade-right">
                Google Shopping emerged as the primary conversion channel, driving 100% of Google Ads conversions during this period.
              </p>
            </div>

            <!-- Right Content
            <div class="col-lg-6 col-md-12 text-center">
              <img src="http://localhost/petrikor/wp-content/uploads/2025/10/Mask-group-5-1.png" alt="Suitcase with glasses and passport" class="">
            </div>
            -->
          </div>

        </div>
      </section>



      <!-- Key Takeaways Section -->
      <section class="takeaways-section py-5">
        <div class="container">
          <h5 class="usc-sec-title mb-3">Key Takeaways for Marketers</h5>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
              <div class="takeaway-box">
                <p class="youtube-approach">1. Let Data Lead Your Strategy</p>
                <p class="results-note">
                  From zero sales to consistent growth, every decision was backed by campaign metrics
                  or qualitative insights, demonstrating the power of data-driven marketing.
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
              <div class="takeaway-box">
                <p class="youtube-approach">2. Be Ready to Pivot</p>
                <p class="results-note">
                  The biggest impact came not from increasing ad spend, but from rethinking product structure
                  and customer journey based on performance data.
                </p>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6 mx-auto">
              <div class="takeaway-box">
                <p class="youtube-approach">3. Double Down on What Works</p>
                <p class="results-note">
                  By identifying Google Shopping as the highest performer, budget was focused there.
                </p>
              </div>
            </div>
          </div>

          <!-- Button -->
          <div class="mt-5 flex-riv-row-ch2" data-aos="fade-right">
            <a href="#contact-" class="">Schedule a Strategy Call</a>
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
