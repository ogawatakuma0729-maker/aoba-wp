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
      wp_nav_menu(array(
        'theme_location' => 'main',
        'container' => false,
        'menu_class' => 'nav-list',
        'fallback_cb' => false,
      ));
      ?>
    </nav>
  </div>
</header>
