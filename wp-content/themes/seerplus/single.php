  <?php get_header();?>
  <section class="music_details">
    <div class="inner">
      <h2 class="white_out sub_ttl">
        <?php the_field('music_catchcopy'); ?>
      </h2>
      <h1 class="ttl"><?php the_title(); ?></h1>

      <div class="video_wrapper">
        <div class="video">
          <?php the_field('music_url'); ?>
        </div>
      </div>

      <div class="under_video">
        <div class="tw_share">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/img/twi_white.svg') ?>" alt="twitter">
          <a href="https://twitter.com/share?url=<?php echo get_the_permalink();?>%0a&text=<?php echo get_the_title();?>%0a&hashtags=オリジナル曲,作曲,拡散希望" target="_blank" rel="nofollow noopener"></a>
          <p>曲をシェア</p>
        </div>

        <?php if (get_the_terms(get_the_ID(), 'music_tag')) : ?>
          <div class="tags">
            <?php the_terms(get_the_ID(), 'music_tag', '', ''); ?>
          </div>
        <?php endif; ?>
      </div>

      <h3 class="white_out en con_ttl">About Music</h3>

      <div class="explain">

        <div class="txt">
          <?php the_field('music_txt'); ?>
        </div>
        <div class="lyrics">
          <?php the_field('music_lyrics'); ?>
        </div>
      </div>

      <div class="page_nation2">

        <div class="prev"><?php previous_post_link('%link', '<img src="'. get_template_directory_uri().'/img/arrow_left.png" alt="前の曲">前の曲'); ?></div>
        <div class="next"><?php next_post_link('%link', '<img src="'. get_template_directory_uri().'/img/arrow_right.png" alt="次の曲">次の曲'); ?></div>
      </div>

    </div>
  </section>

  <?php get_footer();?>
