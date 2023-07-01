<?php
// 外観＞メニューを使用できるようにする
add_action('after_setup_theme', 'register_menu');
function register_menu()
{
  register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}

// アイキャッチを設定
add_theme_support('post-thumbnails');

//jQueryを読み込むようにする（ログアウトの際にjQueryをよみこまなくなるのを防止）
function theme_style()
{
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'theme_style');

// WP管理画面のメニュー名を変更
function change_admin_menu()
{
  global $menu, $submenu;
  $menu[20][0] = 'プロフィール'; //固定ページからプロフィールに変更
  $submenu['edit.php?post_type=page'][5][0] = 'プロフィール変更'; //固定ページのサブメニュー変更
  $menu[10][0] = '画像';
}
add_action('admin_menu', 'change_admin_menu');

// 管理画面で使わないメニュー項目を非表示
function remove_menus()
{
  // global $submenu;
  // var_dump($submenu);
  remove_menu_page('edit.php'); // 投稿
  remove_menu_page('edit-comments.php'); //コメント
}
add_action('admin_menu', 'remove_menus');

// bodyのクラスにスラッグを追加
function addClass($classes = '')
{
  if (is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;
  }
  return $classes;
}
add_filter('body_class', 'addClass');

// イベント日付出力形式変更
function dateformat($field_name)
{
  $week = array('日', '月', '火', '水', '木', '金', '土');
  $date = date_create(get_field($field_name));
  $format = 'Y.n.d';
  echo date_format($date, $format) . '(' . $week[(int) date_format($date, 'w')] . ')';
}

// タイトルタグを出力
add_theme_support( 'title-tag' );