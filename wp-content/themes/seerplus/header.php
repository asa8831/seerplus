<!DOCTYPE html>
<html lang="ja">

<head prefix="og: https://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    if (is_archive()) {
      if (is_tax()) {
        single_term_title();
      } else {
        echo '楽曲一覧';
      }
    } else {
      the_title();
    }
    ?> | SeerPlus
  </title>
  <meta name="description" content="音楽系同人サークルSeerPlusとは、『同人という場を活かして好きな音楽を好きに発表する』というコンセプトの元で立ち上げたサークルです。">

  <!-- ogp -->
  <?php if (is_archive()) : ?>
    <?php if (is_tax()) : ?>
      <meta property="og:url" content="<?php echo get_term_link($term, $taxonomy); ?>">
      <meta property="og:title" content="<?php single_term_title(); ?>">
      <meta property="twitter:title" content="<?php single_term_title(); ?>">
    <?php else : ?>
      <meta property="og:url" content="<?php echo esc_url(home_url('music')); ?>">
      <meta property="og:title" content="楽曲一覧">
      <meta property="twitter:title" content="楽曲一覧">
    <?php endif; ?>
  <?php else : ?>
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:title" content="<?php the_title(); ?>">
    <meta property="twitter:title" content="<?php the_title(); ?>">
  <?php endif; ?>

  <?php if (is_single()) : ?>
    <?php if (has_post_thumbnail()) : ?>
      <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
    <?php else : ?>
      <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/img/ogp.png'); ?>" />
    <?php endif; ?>
  <?php else : ?>
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/img/ogp.png'); ?>" />
  <?php endif; ?>
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="音楽系同人サークルSeerPlus">
  <meta property="og:description" content="
  <?php
  if (is_single()) {
    the_field('music_txt');
  } else {
    echo '音楽系同人サークルSeerPlusとは、『同人という場を活かして好きな音楽を好きに発表する』というコンセプトの元で立ち上げたサークルです。';
  }
  ?>">
  <!-- ogp -->

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-KZW7MVP');</script>
  <!-- End Google Tag Manager -->

  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/img/favicon.ico') ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/img/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/img/android-chrome-192x192.png') ?>">
  <!-- //favicon  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/morden-css-reset.css?<?php echo filemtime(get_stylesheet_directory() . '/morden-css-reset.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css?<?php echo filemtime(get_stylesheet_directory() . '/style.css'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZW7MVP"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header class="header">
    <div class="inner">
      <div class="logo">
        <a href="<?php echo esc_url(home_url()); ?>"></a>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/logo_round.png') ?>" alt="SeerPlusロゴ">
      </div>
      <nav class="nav en">
        <ul>
          <li><a href="<?php echo esc_url(home_url()); ?>">TOP</a></li>

          <li>
            <a href="<?php if (is_front_page()) : ?>#music_l<?php else : ?><?php echo esc_url(home_url()); ?>/#music_l<?php endif; ?>">Music List</a>
          </li>
          <li>
            <a href="<?php if (is_front_page()) : ?>#pro<?php else : ?><?php echo esc_url(home_url()); ?>/#pro<?php endif; ?>">Profile</a>
          </li>
          <li>
            <a href="<?php if (is_front_page()) : ?>#event<?php else : ?><?php echo esc_url(home_url()); ?>/#event<?php endif; ?>">Event</a>
          </li>
        </ul>
      </nav>
      <div class="hambtn sp">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
  </header>

  <main class="content">
    <div class="float_tw<?php if (is_single()) : ?> tw_share_round<?php endif;?>">
      <?php if (is_single()) : ?>
        <a href="https://twitter.com/share?url=<?php echo get_the_permalink(); ?>%0a&text=<?php echo get_the_title(); ?>%0a&hashtags=オリジナル曲,作曲,拡散希望" target="_blank" rel="nofollow noopener"></a>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/twi_blue.png') ?>" alt="シェア">
        <img class="round_en" src="<?php echo esc_url(get_template_directory_uri() . '/img/share_en.png') ?>" alt="シェア">

      <?php else : ?>
        <a href="https://twitter.com/<?php
                                      the_field('twitter_id', '7'); ?>" target="_blank"></a>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/img/twi_black.png') ?>" alt="ツイッターフォロー">
        <img class="round_en" src="<?php echo esc_url(get_template_directory_uri() . '/img/follow_en.png') ?>" alt="フォローミー">
      <?php endif; ?>
    </div>