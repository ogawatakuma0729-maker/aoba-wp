<?php
function aoba_setup() {
  add_theme_support('title-tag');
  register_nav_menus(array(
    'main' => 'メイン',
  ));
}
add_action('after_setup_theme', 'aoba_setup');

function aoba_assets() {
  wp_enqueue_style('aoba-style', get_stylesheet_uri(), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'aoba_assets');
