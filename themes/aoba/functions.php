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
  wp_enqueue_style('aoba-style', get_stylesheet_uri(), array(), '1.3');
}
add_action('wp_enqueue_scripts', 'aoba_assets');

function aoba_register_types() {
  $shared = array(
    'public' => true,
    'has_archive' => true,
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    'menu_position' => 5,
  );
  register_post_type('aoba_service', $shared + array(
    'label' => '事業',
    'rewrite' => array('slug' => 'service'),
  ));
  register_post_type('aoba_work', $shared + array(
    'label' => '実績',
    'rewrite' => array('slug' => 'works'),
  ));
  register_post_type('aoba_job', $shared + array(
    'label' => '採用',
    'rewrite' => array('slug' => 'jobs'),
  ));
  register_post_type('aoba_inquiry', array(
    'label' => '問い合わせ',
    'public' => false,
    'show_ui' => true,
    'supports' => array('title', 'editor'),
  ));
}
add_action('init', 'aoba_register_types');

function aoba_flush_rewrites() {
  aoba_register_types();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'aoba_flush_rewrites');

function aoba_handle_contact() {
  if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'aoba_contact')) {
    wp_die('不正な送信です。');
  }
  $name = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
  $company = sanitize_text_field(wp_unslash($_POST['company'] ?? ''));
  $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));
  wp_insert_post(array(
    'post_type' => 'aoba_inquiry',
    'post_status' => 'private',
    'post_title' => $name !== '' ? $name : '無題',
    'post_content' => "会社: {$company}\n\n{$message}",
  ));
  wp_safe_redirect(add_query_arg('sent', '1', wp_get_referer() ? wp_get_referer() : home_url('/contact/')));
  exit;
}
add_action('admin_post_nopriv_aoba_contact', 'aoba_handle_contact');
add_action('admin_post_aoba_contact', 'aoba_handle_contact');

function aoba_customize($wp_customize) {
  $wp_customize->add_section('aoba_measure', array(
    'title' => '店情報・測定',
    'description' => '地図登録と人数計測に使う情報です。本番の測定IDだけ、相手の番号に差し替えます。',
  ));
  $fields = array(
    'aoba_address' => array('label' => '住所', 'default' => '架空県架空市1-2-3（実在しません）'),
    'aoba_phone' => array('label' => '電話', 'default' => '000-0000-0000'),
    'aoba_hours' => array('label' => '営業時間', 'default' => '平日 10:00-18:00'),
    'aoba_ga4' => array('label' => '測定ID（G- から始まる番号）', 'default' => ''),
  );
  foreach ($fields as $id => $field) {
    $wp_customize->add_setting($id, array(
      'default' => $field['default'],
      'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control($id, array(
      'label' => $field['label'],
      'section' => 'aoba_measure',
      'type' => 'text',
    ));
  }
}
add_action('customize_register', 'aoba_customize');

function aoba_schema() {
  $data = array(
    '@context' => 'https://schema.org',
    '@type' => 'ProfessionalService',
    'name' => get_bloginfo('name'),
    'url' => home_url('/'),
    'description' => aoba_description(),
    'address' => array(
      '@type' => 'PostalAddress',
      'streetAddress' => get_theme_mod('aoba_address', '架空県架空市1-2-3（実在しません）'),
      'addressCountry' => 'JP',
    ),
    'telephone' => get_theme_mod('aoba_phone', '000-0000-0000'),
    'openingHours' => get_theme_mod('aoba_hours', '平日 10:00-18:00'),
  );
  echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'aoba_schema', 5);

function aoba_ga4() {
  $id = get_theme_mod('aoba_ga4', '');
  if (!$id || strpos($id, 'G-') !== 0) {
    return;
  }
  $id = esc_js($id);
  echo "<!-- 訪問者の人数を数えるタグ。本番の番号だけ入れます。 -->\n";
  echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $id . '"></script>' . "\n";
  echo "<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','{$id}');</script>\n";
}
add_action('wp_head', 'aoba_ga4', 20);

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
