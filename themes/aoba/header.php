<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="wrap">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">AOBA WORKS</a>
    <nav>
      <?php
      if (!wp_nav_menu(array(
        'theme_location' => 'main',
        'container' => false,
        'menu_class' => 'nav-list',
        'fallback_cb' => false,
        'echo' => false,
      ))) {
        echo '<ul class="nav-list">';
        echo '<li><a href="' . esc_url(home_url('/about/')) . '">会社概要</a></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('aoba_service')) . '">事業</a></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('aoba_work')) . '">実績</a></li>';
        echo '<li><a href="' . esc_url(get_post_type_archive_link('aoba_job')) . '">採用</a></li>';
        echo '<li><a href="' . esc_url(home_url('/contact/')) . '">相談</a></li>';
        echo '</ul>';
      } else {
        wp_nav_menu(array(
          'theme_location' => 'main',
          'container' => false,
          'menu_class' => 'nav-list',
          'fallback_cb' => false,
        ));
      }
      ?>
    </nav>
  </div>
</header>
