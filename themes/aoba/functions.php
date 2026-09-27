<?php
function aoba_setup() {
  add_theme_support('title-tag');
  add_post_type_support('page', 'excerpt');
  register_nav_menus(array(
    'main' => 'メイン',
  ));
}
add_action('after_setup_theme', 'aoba_setup');

function aoba_assets() {
  wp_enqueue_style('aoba-style', get_stylesheet_uri(), array(), '1.1');
}
add_action('wp_enqueue_scripts', 'aoba_assets');

function aoba_description() {
  if (is_singular()) {
    $excerpt = get_the_excerpt();
    if ($excerpt) {
      return wp_strip_all_tags($excerpt);
    }
  }
  return '架空の制作会社「青葉ワークス」の案内サイト見本です。実在の会社ではありません。';
}

function aoba_seo_tags() {
  $desc = aoba_description();
  $url = is_singular() ? get_permalink() : home_url('/');
  $title = wp_get_document_title();
  echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
  echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:locale" content="ja_JP">' . "\n";
  echo '<meta property="og:type" content="website">' . "\n";
  echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
  echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
  echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
}
add_action('wp_head', 'aoba_seo_tags', 1);
