  <?php get_header(); ?>
  <section class="music_all">
    <div class="inner">
      <!-- 楽曲一覧 -->
      <div class="music_list">
        <h1 class="con_ubttl">
          <?php
          if (is_tax()) {
            single_term_title();
          } else {
            echo '楽曲一覧';
          }
          ?>
        </h1>
        <?php
          $args = array(
            'post_type' => 'music',
          );
          if (have_posts()) : ?>
        <div class="pia pc pc2"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/pia.svg') ?>" alt="ピアノモチーフイラスト"></div>
        <?php endif; ?> 
        <ul class="lists">
          <?php
          $args = array(
            'post_type' => 'music',
          );
          $music_query = new WP_Query($args);
          if (have_posts()) : while (have_posts()) : the_post(); ?>
              <li class="item">
                <h2 class="ttl">
                  <?php
                  if (mb_strlen($post->post_title, 'UTF-8') > 15) {
                    $title = mb_substr($post->post_title, 0, 15, 'UTF-8');
                    echo $title . '....';
                  } else {
                    echo $post->post_title;
                  } ?>
                </h2>
                <figure>
                  <div class="pic shadow2">
                    <a href="<?php echo get_permalink($music_query->ID); ?>"></a>
                    <?php
                    $post_time = get_the_time('U');
                    $days = 30;
                    $last = time() - ($days * 24 * 60 * 60);
                    if ($post_time > $last) {
                      echo '<span class="new_txt en">New</span>';
                    }
                    ?>
                    <?php if (has_post_thumbnail()) {
                      the_post_thumbnail();
                    } else {
                      echo '<img src="' . get_template_directory_uri() . '/img/noimg.png" alt="アイキャッチ">';
                    } ?>
                  </div>
                  <figcaption class="catch_copy">
                    <?php
                    if (mb_strlen(get_field('music_catchcopy')) > 17) {
                      $text = mb_substr(strip_tags(get_field('music_catchcopy')), 0, 17);
                      echo $text . '…';
                    } else {
                      echo strip_tags(get_field('music_catchcopy'));
                    }
                    ?>
                  </figcaption>
                  <div class="tag">
                    <?php if (get_the_terms(get_the_ID(), 'music_tag')) : ?>
                      <div class="tags">
                        <?php the_terms(get_the_ID(), 'music_tag', '', ''); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </figure>
              </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
          <?php else : ?>
            <li class="center full">誠意作成中です。</li>
          <?php endif ?>
        </ul>
      </div>
      <div class="pagi_nation">
        <?php
        $pagi = array(
          'prev_text' => 'Prev',
          'next_text' => 'Next'
        );
        the_posts_pagination($pagi);
        ?>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>