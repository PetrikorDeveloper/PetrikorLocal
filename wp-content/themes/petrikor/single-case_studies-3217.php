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
            <div class="container h-md-100">
              <div class="page-title edited-width" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                data-aos-easing="ease-in-sine">
                <?= wp_kses_post($title); ?>
                <p class="desc-desc">From isolated systems and stalled traffic to data-driven growth—delivered in just 180 days.</p>
                <div class="flex-riv-row-ch2 justify-content-start edited-buttons ">
                  <a href="#contact-">Book a 30min Growth Conversation</a>
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
          <section class=" edited-header-img-mobile" style="<?= esc_attr($style); ?>;background-image:url(https://petrikorsolutions.com/wp-content/uploads/2026/01/Mask-group-2-1.png)" data-aos="fade-down">
            <div class="container">
              <div class="page-title edited-width" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200"
                data-aos-easing="ease-in-sine">
                <?= wp_kses_post($title); ?>

              </div>

            </div>
          </section>
          <div class="container mobile-buttons">
            <p class="text-center desc-desc">How our full-funnel SEO & SEM strategy helped a luxury niche perfume retailer in UAE scale their online performance, turning struggling digital channels into powerful revenue generators.</p>
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
              padding: 20px 17px !important;
            }

          }

          @media (min-width:1200px) {

            .header-img {
              aspect-ratio: 2.37;
              max-width: 100%;
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

          .bg-size-contain {
            background-size: contain;
          }

          .cloud-bg-centered {
            background-image: url('https://petrikorsolutions.com/wp-content/uploads/2026/01/Frame-2-1.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
          }

          .bg-custom-yellow {
            background-color: #e8c5834d;
            position: relative;
          }

          .divider-1-bottom:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            background: url('https://petrikorsolutions.com/wp-content/uploads/2026/01/Frame-3.svg') no-repeat center top;
            aspect-ratio: 23.8;
            background-size: 100%;
            transform: translateY(100%);
          }

          .line-top:before {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            aspect-ratio: 84 / 1;
            background: url('https://petrikorsolutions.com/wp-content/uploads/2026/01/Vector-1.svg') no-repeat center bottom;
            background-size: cover;
            z-index: 1;
            transform: translateY(-50%);
            top: 0;
          }

          .phase2-section {
            background-position: right bottom;
            background-size: 30%;
          }

          .bg-position-top {
            background-position: right top;
          }

          .half-yellow-divider {
            width: 100%;
            position: absolute;
            z-index: 111;
          }

          @media (min-width: 768px) {
            .h-md-100 {
              height: 100%;
            }
          }

          .paid-growth .half-pyramid .challenge-card {
            max-width: 100%;
            height: -webkit-fill-available;
          }

          .blue-text {
            color: #00677e;
          }

          .challenge-title {
            font-family: Retroking;
          }

          .challenge-card p {
            color: #00677e !important;
            font-weight: 400;
          }

          .paid-growth .challenge-card {
            padding: 30px 40px;
          }

          .paid-growth .challenge-card {
            background-image: url('https://petrikorsolutions.com/wp-content/uploads/2026/01/Vector-46.svg');
          }

          .playbookSection .border-img {
            filter: brightness(0) saturate(100%) invert(20%) sepia(35%) saturate(7424%) hue-rotate(177deg) brightness(87%) contrast(101%);
          }

          .bookBox {
            color: white;
            z-index: 1;
            position: absolute;
            inset: 0;
            display: flex;
            align-items: start;
            justify-content: center;
            flex-direction: column;
            padding: 1rem;
          }

          .bookBox h6 {
            font-family: Nexa;
            font-size: 18px;
            font-weight: 900;
          }

          .bookBox p {
            color: #FFF;
            font-family: Nexa;
            font-size: 16px;
            font-weight: 400;
          }

          .clippedImg {
            width: fit-content;
            position: relative;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: calc(100% + 30px);
          }

          .clippedImg.bgBlue {
            background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NTkiIGhlaWdodD0iMTc3IiB2aWV3Qm94PSIwIDAgNDU5IDE3NyIgZmlsbD0iIzAwNjc3RSI+CiAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0zMjIuOTgyIDE1OC44NDRDMzU1LjE0MiAxODQuMzEzIDQzNC43MyAxNzAuNTg4IDQ0Ni45MjYgMTc2LjVDNDQ5LjgzMSAxNzYuNSA0NTIuNzM2IDE3Ni41IDQ1NS42NDEgMTc2LjVDNDU1LjY0MSAxNTUuMDkgNDU1Ljg3MyAxMzMuODE5IDQ1Ni40NTQgMTEyLjU0N0M0NTYuMjIyIDEwMy4wMTYgNDU1Ljk4OSA5My42MjM0IDQ1NS44NzMgODMuOTU0NUM0NTUuNDA4IDU2Ljg4MTQgNDU1LjI5MiAyOS41MzIxIDQ1Ny41IDIuNDU5MTFDNDI3Ljg3IDIuMzIwOTkgMzk4LjI0IDAuMjQ5MDcgMzY4LjcyNiAwLjUyNTMyNkMzNTEuNDEzIDAuNjYzNDUzIDMzNC4xIDEuMzU0MDkgMzE2LjkwMiAyLjE4Mjg2QzMwNi45MSAyLjg3MzUgMjk2LjkxNyAzLjU2NDEzIDI4Ni45MjQgMy44NDAzOUMyODEuNTc5IDQuMTE2NjUgMjc2LjM1IDQuMzkyOSAyNzEuMDA1IDQuNjY5MTZDMjM4LjU4NiA2LjE4ODU2IDIwNi4wNTEgOC45NTExMSAxNzMuNjMyIDguNjc0ODZDMTQxLjc5NSA4LjM5ODYgMTEwLjE4OSA0LjUzMTAzIDc4LjM1MTUgMy4yODc4OEM2MS4xNTQ1IDIuNTk3MjQgNDMuODQxMiAyLjczNTM3IDI2LjY0NDIgMi4zMjA5OUMyNS4xMzM2IDIuMzIwOTkgMjMuNzM5MiAyLjE4Mjg2IDIyLjIyODcgMi4xODI4NkMyMS45OTYzIDMuNTY0MTMgMjEuNzYzOSA0LjgwNzI4IDIxLjg4MDEgNi40NjQ4MkMxOS45MDQ4IDUuMDgzNTQgMTcuODEzMiAzLjcwMjI2IDE1LjgzNzkgMi4zMjA5OUMxMi4zNTIgMi4xODI4NiA4Ljk4MjMyIDIuMDQ0NzMgNS40OTY0MyAyLjMyMDk5QzQuMTAyMDcgMi4zMjA5OSAyLjcwNzY4IDIuNDU5MTEgMS4zMTMzMiAyLjU5NzI0QzEuNjYxOTEgNy41Njk4NCAwLjUgMTMuNTA5MyAwLjUgMTguMzQzOEMwLjUgMjYuMzU1MiAwLjUwMDAxNSAzNC4zNjY2IDAuNjE2MjExIDQyLjM3OEMwLjg0ODYwNCA1OC4yNjI3IDEuMzEzMzMgNzQuMDA5MyAwLjg0ODU0MSA4OS44OTM5QzAuOTY0NzM4IDkzLjA3MDkgMS4wODA5NSA5Ni4zODU5IDEuMTk3MTQgOTkuNTYyOUMxLjc3ODEyIDExNS4xNzEgMi40NzUzMiAxMzEuMzMyIDEuMDgwOTYgMTQ2LjgwM0MwLjk2NDc2NyAxNDYuOTQxIDAuOTY0NzUyIDE0Ny4yMTcgMC45NjQ3NTIgMTQ3LjM1NUMxLjg5NDMyIDE1NS41MDUgMi45NDAwOCAxNjMuNzkyIDIuNTkxNDkgMTcxLjk0MkMyMi40NjExIDE3Mi4zNTYgNDIuMzMwNiAxNzEuNTI3IDYyLjIwMDIgMTcxLjI1MUM2MS45Njc4IDE2OS41OTQgNTMuMDE5NiAxNjAuNjg4IDUyLjY3MTEgMTU5LjMwN0M1Mi42NzExIDE1OC44OTIgNDEuMTIxMiAxNDUuMDQzIDYxLjI3MDYgMTY1LjU4OEM2My40Nzg0IDE2Ny4zODQgNjUuNTY5OSAxNjkuMzE3IDY3LjY2MTUgMTcxLjExM0M3My45MzYxIDE3MS4xMTMgODAuMjEwNiAxNzEuMTEzIDg2LjQ4NTIgMTcxLjI1MUMxOTYuNDk3IDE3NC40NTQgMTI1LjYyMyAxNjguOTAzIDI2Ny44NjggMTY4LjkwM0MyODkuNzc1IDE2OC45MDMgMjM5LjgxOSAxMzMuODEgMjk1Ljg3MSAxNjkuNTk0QzMxNi4wODkgMTcwLjQyMiAzMzYuNDIzIDE3Mi4zNTYgMzU2LjY0MiAxNzQuNDI4QzM2Ny43OTYgMTc1LjUzMyAzNzkuMDY4IDE3Ni4yMjQgMzkwLjIyMiAxNzYuNSIgc3Ryb2tlPSIjMDA2NzdFIj48L3BhdGg+CiAgICAgICAgICAgICAgICA8L3N2Zz4=);
          }

          .clippedImg.bgOrange {
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NTkiIGhlaWdodD0iMTc3IiB2aWV3Qm94PSIwIDAgNDU5IDE3NyIgZmlsbD0iI0NDNTU0MSI+CiAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0zMjIuOTgyIDE1OC44NDRDMzU1LjE0MiAxODQuMzEzIDQzNC43MyAxNzAuNTg4IDQ0Ni45MjYgMTc2LjVDNDQ5LjgzMSAxNzYuNSA0NTIuNzM2IDE3Ni41IDQ1NS42NDEgMTc2LjVDNDU1LjY0MSAxNTUuMDkgNDU1Ljg3MyAxMzMuODE5IDQ1Ni40NTQgMTEyLjU0N0M0NTYuMjIyIDEwMy4wMTYgNDU1Ljk4OSA5My42MjM0IDQ1NS44NzMgODMuOTU0NUM0NTUuNDA4IDU2Ljg4MTQgNDU1LjI5MiAyOS41MzIxIDQ1Ny41IDIuNDU5MTFDNDI3Ljg3IDIuMzIwOTkgMzk4LjI0IDAuMjQ5MDcgMzY4LjcyNiAwLjUyNTMyNkMzNTEuNDEzIDAuNjYzNDUzIDMzNC4xIDEuMzU0MDkgMzE2LjkwMiAyLjE4Mjg2QzMwNi45MSAyLjg3MzUgMjk2LjkxNyAzLjU2NDEzIDI4Ni45MjQgMy44NDAzOUMyODEuNTc5IDQuMTE2NjUgMjc2LjM1IDQuMzkyOSAyNzEuMDA1IDQuNjY5MTZDMjM4LjU4NiA2LjE4ODU2IDIwNi4wNTEgOC45NTExMSAxNzMuNjMyIDguNjc0ODZDMTQxLjc5NSA4LjM5ODYgMTEwLjE4OSA0LjUzMTAzIDc4LjM1MTUgMy4yODc4OEM2MS4xNTQ1IDIuNTk3MjQgNDMuODQxMiAyLjczNTM3IDI2LjY0NDIgMi4zMjA5OUMyNS4xMzM2IDIuMzIwOTkgMjMuNzM5MiAyLjE4Mjg2IDIyLjIyODcgMi4xODI4NkMyMS45OTYzIDMuNTY0MTMgMjEuNzYzOSA0LjgwNzI4IDIxLjg4MDEgNi40NjQ4MkMxOS45MDQ4IDUuMDgzNTQgMTcuODEzMiAzLjcwMjI2IDE1LjgzNzkgMi4zMjA5OUMxMi4zNTIgMi4xODI4NiA4Ljk4MjMyIDIuMDQ0NzMgNS40OTY0MyAyLjMyMDk5QzQuMTAyMDcgMi4zMjA5OSAyLjcwNzY4IDIuNDU5MTEgMS4zMTMzMiAyLjU5NzI0QzEuNjYxOTEgNy41Njk4NCAwLjUgMTMuNTA5MyAwLjUgMTguMzQzOEMwLjUgMjYuMzU1MiAwLjUwMDAxNSAzNC4zNjY2IDAuNjE2MjExIDQyLjM3OEMwLjg0ODYwNCA1OC4yNjI3IDEuMzEzMzMgNzQuMDA5MyAwLjg0ODU0MSA4OS44OTM5QzAuOTY0NzM4IDkzLjA3MDkgMS4wODA5NSA5Ni4zODU5IDEuMTk3MTQgOTkuNTYyOUMxLjc3ODEyIDExNS4xNzEgMi40NzUzMiAxMzEuMzMyIDEuMDgwOTYgMTQ2LjgwM0MwLjk2NDc2NyAxNDYuOTQxIDAuOTY0NzUyIDE0Ny4yMTcgMC45NjQ3NTIgMTQ3LjM1NUMxLjg5NDMyIDE1NS41MDUgMi45NDAwOCAxNjMuNzkyIDIuNTkxNDkgMTcxLjk0MkMyMi40NjExIDE3Mi4zNTYgNDIuMzMwNiAxNzEuNTI3IDYyLjIwMDIgMTcxLjI1MUM2MS45Njc4IDE2OS41OTQgNTMuMDE5NiAxNjAuNjg4IDUyLjY3MTEgMTU5LjMwN0M1Mi42NzExIDE1OC44OTIgNDEuMTIxMiAxNDUuMDQzIDYxLjI3MDYgMTY1LjU4OEM2My40Nzg0IDE2Ny4zODQgNjUuNTY5OSAxNjkuMzE3IDY3LjY2MTUgMTcxLjExM0M3My45MzYxIDE3MS4xMTMgODAuMjEwNiAxNzEuMTEzIDg2LjQ4NTIgMTcxLjI1MUMxOTYuNDk3IDE3NC40NTQgMTI1LjYyMyAxNjguOTAzIDI2Ny44NjggMTY4LjkwM0MyODkuNzc1IDE2OC45MDMgMjM5LjgxOSAxMzMuODEgMjk1Ljg3MSAxNjkuNTk0QzMxNi4wODkgMTcwLjQyMiAzMzYuNDIzIDE3Mi4zNTYgMzU2LjY0MiAxNzQuNDI4QzM2Ny43OTYgMTc1LjUzMyAzNzkuMDY4IDE3Ni4yMjQgMzkwLjIyMiAxNzYuNSIgc3Ryb2tlPSIjQ0M1NTQxIj48L3BhdGg+CiAgICAgICAgICAgICAgICA8L3N2Zz4=");
          }

          .clippedImg.bgYellow {
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NTkiIGhlaWdodD0iMTc3IiB2aWV3Qm94PSIwIDAgNDU5IDE3NyIgZmlsbD0iI0UxQkU4MCI+CiAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0zMjIuOTgyIDE1OC44NDRDMzU1LjE0MiAxODQuMzEzIDQzNC43MyAxNzAuNTg4IDQ0Ni45MjYgMTc2LjVDNDQ5LjgzMSAxNzYuNSA0NTIuNzM2IDE3Ni41IDQ1NS42NDEgMTc2LjVDNDU1LjY0MSAxNTUuMDkgNDU1Ljg3MyAxMzMuODE5IDQ1Ni40NTQgMTEyLjU0N0M0NTYuMjIyIDEwMy4wMTYgNDU1Ljk4OSA5My42MjM0IDQ1NS44NzMgODMuOTU0NUM0NTUuNDA4IDU2Ljg4MTQgNDU1LjI5MiAyOS41MzIxIDQ1Ny41IDIuNDU5MTFDNDI3Ljg3IDIuMzIwOTkgMzk4LjI0IDAuMjQ5MDcgMzY4LjcyNiAwLjUyNTMyNkMzNTEuNDEzIDAuNjYzNDUzIDMzNC4xIDEuMzU0MDkgMzE2LjkwMiAyLjE4Mjg2QzMwNi45MSAyLjg3MzUgMjk2LjkxNyAzLjU2NDEzIDI4Ni45MjQgMy44NDAzOUMyODEuNTc5IDQuMTE2NjUgMjc2LjM1IDQuMzkyOSAyNzEuMDA1IDQuNjY5MTZDMjM4LjU4NiA2LjE4ODU2IDIwNi4wNTEgOC45NTExMSAxNzMuNjMyIDguNjc0ODZDMTQxLjc5NSA4LjM5ODYgMTEwLjE4OSA0LjUzMTAzIDc4LjM1MTUgMy4yODc4OEM2MS4xNTQ1IDIuNTk3MjQgNDMuODQxMiAyLjczNTM3IDI2LjY0NDIgMi4zMjA5OUMyNS4xMzM2IDIuMzIwOTkgMjMuNzM5MiAyLjE4Mjg2IDIyLjIyODcgMi4xODI4NkMyMS45OTYzIDMuNTY0MTMgMjEuNzYzOSA0LjgwNzI4IDIxLjg4MDEgNi40NjQ4MkMxOS45MDQ4IDUuMDgzNTQgMTcuODEzMiAzLjcwMjI2IDE1LjgzNzkgMi4zMjA5OUMxMi4zNTIgMi4xODI4NiA4Ljk4MjMyIDIuMDQ0NzMgNS40OTY0MyAyLjMyMDk5QzQuMTAyMDcgMi4zMjA5OSAyLjcwNzY4IDIuNDU5MTEgMS4zMTMzMiAyLjU5NzI0QzEuNjYxOTEgNy41Njk4NCAwLjUgMTMuNTA5MyAwLjUgMTguMzQzOEMwLjUgMjYuMzU1MiAwLjUwMDAxNSAzNC4zNjY2IDAuNjE2MjExIDQyLjM3OEMwLjg0ODYwNCA1OC4yNjI3IDEuMzEzMzMgNzQuMDA5MyAwLjg0ODU0MSA4OS44OTM5QzAuOTY0NzM4IDkzLjA3MDkgMS4wODA5NSA5Ni4zODU5IDEuMTk3MTQgOTkuNTYyOUMxLjc3ODEyIDExNS4xNzEgMi40NzUzMiAxMzEuMzMyIDEuMDgwOTYgMTQ2LjgwM0MwLjk2NDc2NyAxNDYuOTQxIDAuOTY0NzUyIDE0Ny4yMTcgMC45NjQ3NTIgMTQ3LjM1NUMxLjg5NDMyIDE1NS41MDUgMi45NDAwOCAxNjMuNzkyIDIuNTkxNDkgMTcxLjk0MkMyMi40NjExIDE3Mi4zNTYgNDIuMzMwNiAxNzEuNTI3IDYyLjIwMDIgMTcxLjI1MUM2MS45Njc4IDE2OS41OTQgNTMuMDE5NiAxNjAuNjg4IDUyLjY3MTEgMTU5LjMwN0M1Mi42NzExIDE1OC44OTIgNDEuMTIxMiAxNDUuMDQzIDYxLjI3MDYgMTY1LjU4OEM2My40Nzg0IDE2Ny4zODQgNjUuNTY5OSAxNjkuMzE3IDY3LjY2MTUgMTcxLjExM0M3My45MzYxIDE3MS4xMTMgODAuMjEwNiAxNzEuMTEzIDg2LjQ4NTIgMTcxLjI1MUMxOTYuNDk3IDE3NC40NTQgMTI1LjYyMyAxNjguOTAzIDI2Ny44NjggMTY4LjkwM0MyODkuNzc1IDE2OC45MDMgMjM5LjgxOSAxMzMuODEgMjk1Ljg3MSAxNjkuNTk0QzMxNi4wODkgMTcwLjQyMiAzMzYuNDIzIDE3Mi4zNTYgMzU2LjY0MiAxNzQuNDI4QzM2Ny43OTYgMTc1LjUzMyAzNzkuMDY4IDE3Ni4yMjQgMzkwLjIyMiAxNzYuNSIgc3Ryb2tlPSIjRTFCRTgwIj48L3BhdGg+CiAgICAgICAgICAgICAgICA8L3N2Zz4=");
          }

          .clippedImg.bgLightBlue {
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NTkiIGhlaWdodD0iMTc3IiB2aWV3Qm94PSIwIDAgNDU5IDE3NyIgZmlsbD0iIzRGODA4QyI+CiAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0zMjIuOTgyIDE1OC44NDRDMzU1LjE0MiAxODQuMzEzIDQzNC43MyAxNzAuNTg4IDQ0Ni45MjYgMTc2LjVDNDQ5LjgzMSAxNzYuNSA0NTIuNzM2IDE3Ni41IDQ1NS42NDEgMTc2LjVDNDU1LjY0MSAxNTUuMDkgNDU1Ljg3MyAxMzMuODE5IDQ1Ni40NTQgMTEyLjU0N0M0NTYuMjIyIDEwMy4wMTYgNDU1Ljk4OSA5My42MjM0IDQ1NS44NzMgODMuOTU0NUM0NTUuNDA4IDU2Ljg4MTQgNDU1LjI5MiAyOS41MzIxIDQ1Ny41IDIuNDU5MTFDNDI3Ljg3IDIuMzIwOTkgMzk4LjI0IDAuMjQ5MDcgMzY4LjcyNiAwLjUyNTMyNkMzNTEuNDEzIDAuNjYzNDUzIDMzNC4xIDEuMzU0MDkgMzE2LjkwMiAyLjE4Mjg2QzMwNi45MSAyLjg3MzUgMjk2LjkxNyAzLjU2NDEzIDI4Ni45MjQgMy44NDAzOUMyODEuNTc5IDQuMTE2NjUgMjc2LjM1IDQuMzkyOSAyNzEuMDA1IDQuNjY5MTZDMjM4LjU4NiA2LjE4ODU2IDIwNi4wNTEgOC45NTExMSAxNzMuNjMyIDguNjc0ODZDMTQxLjc5NSA4LjM5ODYgMTEwLjE4OSA0LjUzMTAzIDc4LjM1MTUgMy4yODc4OEM2MS4xNTQ1IDIuNTk3MjQgNDMuODQxMiAyLjczNTM3IDI2LjY0NDIgMi4zMjA5OUMyNS4xMzM2IDIuMzIwOTkgMjMuNzM5MiAyLjE4Mjg2IDIyLjIyODcgMi4xODI4NkMyMS45OTYzIDMuNTY0MTMgMjEuNzYzOSA0LjgwNzI4IDIxLjg4MDEgNi40NjQ4MkMxOS45MDQ4IDUuMDgzNTQgMTcuODEzMiAzLjcwMjI2IDE1LjgzNzkgMi4zMjA5OUMxMi4zNTIgMi4xODI4NiA4Ljk4MjMyIDIuMDQ0NzMgNS40OTY0MyAyLjMyMDk5QzQuMTAyMDcgMi4zMjA5OSAyLjcwNzY4IDIuNDU5MTEgMS4zMTMzMiAyLjU5NzI0QzEuNjYxOTEgNy41Njk4NCAwLjUgMTMuNTA5MyAwLjUgMTguMzQzOEMwLjUgMjYuMzU1MiAwLjUwMDAxNSAzNC4zNjY2IDAuNjE2MjExIDQyLjM3OEMwLjg0ODYwNCA1OC4yNjI3IDEuMzEzMzMgNzQuMDA5MyAwLjg0ODU0MSA4OS44OTM5QzAuOTY0NzM4IDkzLjA3MDkgMS4wODA5NSA5Ni4zODU5IDEuMTk3MTQgOTkuNTYyOUMxLjc3ODEyIDExNS4xNzEgMi40NzUzMiAxMzEuMzMyIDEuMDgwOTYgMTQ2LjgwM0MwLjk2NDc2NyAxNDYuOTQxIDAuOTY0NzUyIDE0Ny4yMTcgMC45NjQ3NTIgMTQ3LjM1NUMxLjg5NDMyIDE1NS41MDUgMi45NDAwOCAxNjMuNzkyIDIuNTkxNDkgMTcxLjk0MkMyMi40NjExIDE3Mi4zNTYgNDIuMzMwNiAxNzEuNTI3IDYyLjIwMDIgMTcxLjI1MUM2MS45Njc4IDE2OS41OTQgNTMuMDE5NiAxNjAuNjg4IDUyLjY3MTEgMTU5LjMwN0M1Mi42NzExIDE1OC44OTIgNDEuMTIxMiAxNDUuMDQzIDYxLjI3MDYgMTY1LjU4OEM2My40Nzg0IDE2Ny4zODQgNjUuNTY5OSAxNjkuMzE3IDY3LjY2MTUgMTcxLjExM0M3My45MzYxIDE3MS4xMTMgODAuMjEwNiAxNzEuMTEzIDg2LjQ4NTIgMTcxLjI1MUMxOTYuNDk3IDE3NC40NTQgMTI1LjYyMyAxNjguOTAzIDI2Ny44NjggMTY4LjkwM0MyODkuNzc1IDE2OC45MDMgMjM5LjgxOSAxMzMuODEgMjk1Ljg3MSAxNjkuNTk0QzMxNi4wODkgMTcwLjQyMiAzMzYuNDIzIDE3Mi4zNTYgMzU2LjY0MiAxNzQuNDI4QzM2Ny43OTYgMTc1LjUzMyAzNzkuMDY4IDE3Ni4yMjQgMzkwLjIyMiAxNzYuNSIgc3Ryb2tlPSIjNEY4MDhDIj48L3BhdGg+CiAgICAgICAgICAgICAgICA8L3N2Zz4=");
          }

          .bookBoxContainer img {
            max-height: 100%;
            height: 100%;
          }

          .bookBoxContainer {
            display: flex;
            flex-direction: row;
          }

          .flipImg {
            aspect-ratio: 0.41;
            height: calc(100% + 30px);
          }
        </style>
      <?php endif; ?>
      <!-- our playbook section -->
      <section class="py-5 phase2-section position-relative bg-custom-yellow line-top divider-1-bottom">
        <div class="container mt-5 playbookSection">
          <h5 class="mb-5 usc-sec-title" data-aos="fade-right">Our Playbook</h5>
          <div class="mb-5 row g-4">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6">
              <div class="challenge-card ">
                <h4 class="challenge-title">Full-Stack Diagnostic</h4>
                <p class="blue-text">
                  •Deep-dive audits across UX, SEO, mobile, ads, influencer, and social channels<br><br>
                  •Mapped ERP–POS–CRM touch points to identify data leaks<br><br>
                  •Surfaced 60+ "fix now" and "build next" priorities
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
                <h4 class="challenge-title">Governance & Enablement</h4>
                <p class="blue-text">
                  •Established clear roles, RACI matrices and sprint rituals for marketing teams<br><br>
                  •Implemented zero-gap tracking with rebuilt GA4, Meta, and Google Ads tagging<br><br>
                  •Upskilled teams through live and remote coaching
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
                <h4 class="challenge-title">Growth Engines Lit</h4>
                <p class="blue-text">
                  •SEO clean-ups and technical hygiene across five brand domains<br><br>
                  •Re-architected Ads accounts with accurate SKUs and higher match scores<br><br>
                  •Planned automated journeys via email & WhatsApp for buyers
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
                <h4 class="challenge-title">Future-Proof Infrastructure</h4>
                <p class="blue-text">
                  •Conducted first formal POS & ERP assessment in the group's history <br><br>
                  •Created Shopify migration path with complete hand-off playbook <br><br>
                  •Implemented executive dashboard tracking online sales
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

      <!-- The Lift: Measurable Results -->
      <section class="py-5 ">
        <div class="container mt-5 playbookSection">
          <h5 class="mb-5 usc-sec-title" data-aos="fade-right">The Lift: Measurable Results</h5>
          <div class="mb-3 row g-4">
            <!-- Card 1 -->
            <div class="mb-5 col-lg-6 col-md-6 bookBoxContainer">
              <div class="flipImg">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2026/01/Isolation-Mode.svg" />
              </div>
              <div class="clippedImg bgBlue">
                <div class="bookBox">
                  <h6>ROAS 2.5 → 3.3</h6>
                  <p>Achieved during traditionally low-sales season, representing significant efficiency improvement</p>
                </div>
              </div>
            </div>
            <!-- Card 2 -->
            <div class="mb-5 col-lg-6 col-md-6 bookBoxContainer">
              <div class="flipImg">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2026/01/Isolation-Mode.svg" />
              </div>
              <div class="clippedImg bgOrange">
                <div class="bookBox">
                  <h6>Marketing Efficiency +32%</h6>
                  <p>Generated substantially more revenue on the same marketing spend</p>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-5 row">
            <!-- Card 3 -->
            <div class="mb-5 col-lg-6 col-md-6 bookBoxContainer">
              <div class="flipImg">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2026/01/Isolation-Mode.svg" />
              </div>
              <div class="clippedImg bgYellow">
                <div class="bookBox">
                  <h6>SEO Health Score +28%</h6>
                  <p>Reduced reliance on costly paid traffic with organic growth fundamentals</p>
                </div>
              </div>
            </div>
            <!-- Card 4 -->
            <div class="mb-5 col-lg-6 col-md-6 bookBoxContainer">
              <div class="flipImg">
                <img src="https://petrikorsolutions.com/wp-content/uploads/2026/01/Isolation-Mode.svg" />
              </div>
              <div class="clippedImg bgLightBlue">
                <div class="bookBox">
                  <h6>Zero Blind Spots</h6>
                  <p>Unified tracking and weekly insight reports provided complete visibility</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>



      <!-- Phase 2 Section -->
      <section class="pt-5 pb-2 phase2-section bg-size-contain">
        <div class="container text-center">
          <h5 class="mb-3 usc-sec-title" data-aos="fade-right">The Challenge</h5>
          <p class="mb-4 px-md-5 mx-md-5 results-note text-gray" data-aos="fade-right">
            Despite selling luxury perfumes (a high-demand category), this retailer's digital presence was underperforming across both organic and paid channels. SEO lacked consistency between Arabic and English content, while paid campaigns suffered from poor structure and tracking.
          </p>
          <p class="mb-4 px-md-5 mx-md-5 results-note text-gray" data-aos="fade-right">
            Additionally, the website’s UX and UI did not meet luxury consumer expectations, impacting engagement and conversion. Leadership had no consolidated reporting system to connect ad spend with actual revenue, making ROI assessment nearly impossible. With a website migration approaching, these foundational issues needed urgent correction.
          </p>
        </div>
      </section>



      <!-- Phase 3 Section -->
      <section data-aos="fade-right" class="pb-2 phase3-section position-relative cloud-bg-centered">
        <div class="container mt-5">
          <h5 class="mb-5 usc-sec-title" data-aos="fade-right">Our SEO Strategy</h5>
          <div class="mb-5 row g-4">
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
      <section data-aos="fade-right" class="py-5 half-pyramid phase2-section bg-position-top">
        <div class="container">
          <h5 class="mb-5 usc-sec-title" data-aos="fade-right">Our SEM Approach</h5>

          <div class="row ">
            <div class="col-md-12 col-lg-5">
              <img src="https://petrikorsolutions.com/wp-content/uploads/2026/01/a-sleek-conceptual-product-advertisement_o0G-rGGHSAmEqZsokrWGhg_57SY_jU6SHOhf6WpVK9LVw-1-1-1.webp" class="half-pyramid-image">
            </div>
            <div class="col-md-12 col-lg-7">
              <div class="mb-3 ">
                <h5 class="challenge-title">Rebuild for Control</h5>
                <p class="border-accent-edited-red results-note text-gray">Restructured campaigns for more effective targeting across platforms, utilizing different campaign types with a bottom funnel focus. Fixed tracking parameters and aligned with back-end purchase data for more accurate reporting</p>
              </div>
              <div class="mb-3 ml-4 rebuild">
                <h5 class="challenge-title">Optimize for Efficiency</h5>
                <p class="border-accent-edited-yellow results-note text-gray">Tested multiple creative variations, audience segments, and bidding strategies with bottom funnel focus. Special attention given to Ramadan period, adapting to seasonal shopping behaviors.</p>
              </div>
              <div class="ml-5 rebuild">
                <h5 class="challenge-title">Scale with Insight</h5>
                <p class="border-accent-edited-blue results-note text-gray">Built custom dashboards tracking ROAS, MER, and platform-specific trends, giving leadership clear visibility into the relationship between ad spend and revenue for the first time.</p>
              </div>
            </div>


          </div>

        </div>
      </section>



      <!-- Key Takeaways Section -->
      <section data-aos="fade-up" class="py-5 mb-5 bg-custom-yellow divider-1-bottom line-top">
        <div class="container">
          <h5 class="mb-4 text-center usc-sec-title">Remarkable Results</h5>

          <div class="row g-4">
            <!-- Card 1 -->
            <div class="text-center col-lg-3 col-md-6 stats ">
              <h3 class="stat-number red">5.5x</h3>
              <p class="stat-title red">Revenue Increase</p>
              <p class="result-note text-gray">Revenue from paid channels jumped from AED 90,000 to over AED 499,000 in just four months.</p>
            </div>

            <!-- Card 2 -->
            <div class="text-center col-lg-3 col-md-6 stats">
              <h3 class="stat-number light-green">31%</h3>
              <p class="stat-title light-green"> ROAS Growth</p>
              <p class="result-note text-gray">Return on ad spend improved from 2.5x to 3.28x, demonstrating significantly stronger campaign targeting and efficiency.</p>
            </div>

            <!-- Card 3 -->
            <div class="text-center col-lg-3 col-md-6 stats ">
              <h3 class="stat-number green">790%</h3>
              <p class="stat-title green ">Ramadan MER</p>
              <p class="result-note text-gray">Media efficiency ratio peaked during the critical Ramadan shopping season, with good performance continuing in Q2</p>
            </div>

            <div class="text-center col-lg-3 col-md-6 stats ">
              <h3 class="stat-number text-gray">39%</h3>
              <p class="stat-title text-gray">Revenue Contribution</p>
              <p class="result-note text-gray">Paid media's share of total online revenue grew from just 4.5% to 39% year-over-year—a transformation in sales attribution.</p>
            </div>
          </div>


        </div>
      </section>

      <section data-aos="fade-right" class="py-5 half-pyramid position-relative">
        <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/ChatGPT-Image-Aug-15-2025-04_58_40-PM-1.png" class="settings-image">
        <div class="container">
          <h5 class="mb-5 usc-sec-title">What Made It Work</h5>
          <div class="row ">
            <div class="col-md-12 col-lg-8">
              <div class="mb-2 row ">
                <!-- Card 1 -->
                <div class="col-lg-6 col-md-6">
                  <div class="challenge-card">
                    <h5 class="mb-1 challenge-title red">Focus on Fundamentals</h5>
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
                    <h5 class="mb-1 challenge-title red">Seasonal Agility</h5>
                    <p>
                      Campaigns adapted in real-time to the Ramadan surge and subsequent seasonal patterns, maintaining efficiency through market fluctuations. </p>
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-132.svg" class="border-img borderr-top" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-right" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-135.svg" class="border-img borderr-bottom" alt="">
                    <img src="https://petrikorsolutions.com/wp-content/uploads/2025/10/Group-133.svg" class="border-img borderr-left" alt="">
                  </div>
                </div>
              </div>

              <div class="row ">
                <!-- Card 1 -->
                <div class="col-lg-6 col-md-6">
                  <div class="challenge-card">
                    <h5 class="mb-1 challenge-title red">Bilingual Excellence</h5>
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
                    <h5 class="mb-1 challenge-title red">Unified Reporting</h5>
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

      <section data-aos="fade-up" class="py-5 bg-custom-yellow line-top">
        <div class="container">
          <h5 class="pt-5 pb-3 usc-sec-title">Key Takeaways for Luxury Marketers</h5>

          <div class="pt-2 pb-md-5 row g-4">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="mr-3 number-text edited-number">1</p>
                <div class="">
                  <h5 class="mb-2 challenge-title">Fix Your Foundation First</h5>
                  <p class="result-result">Whether SEO or SEM, foundational technical hygiene is what unlocks sustainable growth. Proper tracking, campaign structure, and clear KPIs aren't optional—they're essential prerequisites.</p>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="mr-3 number-text">2</p>
                <div class="">
                  <h5 class="mb-2 challenge-title">Simplify Your Data Approach</h5>
                  <p class="result-result">Complex reporting often obscures actionable insights. By aligning metrics with real business outcomes, we helped the team focus on what drives revenue.</p>
                </div>
              </div>

            </div>


          </div>
          <div class="py-5 row g-4">
            <!-- Card 1 -->
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="mr-3 number-text">3</p>
                <div class="">
                  <h5 class="mb-2 challenge-title">Prepare for High-Intent Seasons</h5>
                  <p class="result-result">For luxury retail in the UAE, periods like Ramadan represent disproportionate growth opportunities. Having the right campaigns, offers, and landing experiences ready made a measurable difference.</p>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-md-6 stats ">
              <div class="d-flex align-items-start justify-content-start ">
                <p class="mr-3 number-text">4</p>
                <div class="">
                  <h5 class="mb-2 challenge-title">Strategy Outperforms Budget Size</h5>
                  <p class="result-result">Even as overall market sales decreased year-over-year, our optimized channels delivered higher efficiency and greater revenue contribution—proving that smarter structure beats bigger budgets.</p>
                </div>
              </div>

            </div>


          </div>


        </div>
      </section>
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

      <div class="divider-blog-before">
        <img style="width:100%;height:25px;" src="https://petrikorsolutions.com/wp-content/themes/petrikor/assets/img/divider-blog-big.png" />
      </div>
      <div class="lets_talk-section bg-image bg-image-fixed has-clouds lazyloaded" data-clouds="has-clouds" data-bg="" style="background-image: url(data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20500%20300%22%3E%3C/svg%3E);">
        <div class="d-flex flex-column justify-content-between align-items-center">
          <p class="pt-3 title aos-init aos-animate" data-aos="zoom-in-up" style="color:#F1E4B2 !important;">Interested in working with us?</p>
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
