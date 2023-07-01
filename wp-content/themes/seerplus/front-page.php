<?php get_header(); ?>
<section class="fv">
  <div class="inner">
    <p class="sub_ttl">先の未来を照らす光を</p>
    <h1 class="main_ttl"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/logo_txt.png') ?>" alt="SeerPlus"></h1>
  </div>
  <div class="fv_pic"></div>
  <div class="scroll_down en">
    <span>Scroll</span>
  </div>
</section>
<section class="music_all">
  <div class="inner top">
    <h2 id="music_l" class="con_ttl">製作楽曲</h2>
    <?php
    $args = array(
      'post_type' => 'music',
      'posts_per_page' => '6',
    );
    $music_query = new WP_Query($args);
    if ($music_query->have_posts()) : ?>
      <!-- youtube -->
      <div class="youtube">
        <h3 class="con_subttl">最新の楽曲</h3>
        <div class="video_wrapper">
          <div class="video">
            <?php while ($music_query->have_posts()) : $music_query->the_post();
              $counter++;
              if ($counter == 1) :
                the_field('music_url');
              endif;
            endwhile; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <!-- //youtube -->
  </div>
  <div class="pia pc2"><img src="<?php echo esc_url(get_template_directory_uri() . '/img/pia.svg') ?>" alt="ピアノモチーフイラスト"></div>
  <div class="inner btm">
    <!-- 楽曲一覧 -->
    <div class="music_list">
      <h3 class="con_subttl">楽曲と解説ページ</h3>

      <ul class="lists">
        <?php if ($music_query->have_posts()) : ?>
          <?php while ($music_query->have_posts()) : $music_query->the_post(); ?>
            <li class="item">
              <h4 class="ttl">
                <?php
                if (mb_strlen($post->post_title, 'UTF-8') > 17) {
                  $title = mb_substr($post->post_title, 0, 17, 'UTF-8');
                  echo $title . '....';
                } else {
                  echo $post->post_title;
                } ?>
              </h4>
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
                  // the_field('music_catchcopy');
                  if (mb_strlen(get_field('music_catchcopy')) > 17) {
                    $text = mb_substr(strip_tags(get_field('music_catchcopy')), 0, 17);
                    echo $text . '…';
                  } else {
                    echo strip_tags(get_field('music_catchcopy'));
                  }
                  ?>
                </figcaption>
                <!-- 登録したタームの出力-->
                <?php if (get_the_terms(get_the_ID(), 'music_tag')) : ?>
                  <div class="tags">
                    <?php the_terms(get_the_ID(), 'music_tag', '', ''); ?>
                  </div>
                <?php endif; ?>
              </figure>
            </li>
          <?php endwhile;
          wp_reset_postdata();
        else : ?>
          <li class="center full">誠意作成中です。</li>
        <?php endif ?>
      </ul>
    </div>
    <!-- //楽曲一覧 -->

    <div class="btn">
      <a href="<?php echo esc_url(home_url('music')); ?>">作品一覧へ</a>
    </div>
  </div>
</section>

<!-- プロフィール -->
<section class="prof">
  <div class="inner">
    <h2 id="pro" class="con_ttl">プロフィール</h2>
    <div class="left">
      <div class="con_inner">
        <h3 class="con_subttl">SeerPlusとは</h3>
        <p><?php the_field('prof_seer'); ?></p>
      </div>
    </div>
    <div class="right">
      <div class="con_inner">
        <h3 class="con_subttl">とてたるとは</h3>
        <p><?php the_field('prof_owner'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- イベント情報 -->
<section class="event">
  <div id="event" class="inner">
    <h2 class="con_ttl">イベント</h2>
    <h3 class="con_subttl">イベント詳細</h3>
    <div class="list_wrapper shadow">
      <table class="list">
        <colgroup>
          <col class="c1">
          <col class="c2">
          <col class="c3">
          <col class="c4">
        </colgroup>
        <thead>
          <tr>
            <th>イベント名</th>
            <th>日時</th>
            <th>ブース番号</th>
            <th>イベントに向けて</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $args = array(
            'post_type' => 'event',
            'order' => 'ASC'
          );
          $event_query = new WP_Query($args);
          if ($event_query->have_posts()) : while ($event_query->have_posts()) : $event_query->the_post(); ?>
              <tr>
                <td><?php the_title(); ?></td>
                <td><?php
                    dateformat('event_date');
                    ?></td>
                <td><?php the_field('event_num'); ?></td>
                <td><?php the_field('event_about'); ?></td>
              </tr>
            <?php endwhile;
            wp_reset_postdata();
          else : ?>
            <tr>
              <td colspan="4" class="coming_soon">次のイベントに向けて誠意作成中です。</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="btn">
      <a href="https://twitter.com/<?php the_field('twitter_id'); ?>" target="_blank">最新情報はTwitterをチェック</a>
    </div>
  </div>
</section>



<?php get_footer();
