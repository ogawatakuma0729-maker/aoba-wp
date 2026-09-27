<?php
/*
Template Name: 会社概要
*/
get_header();
?>
<section class="content">
  <div class="wrap">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <p class="eyebrow">COMPANY</p>
      <h1><?php the_title(); ?></h1>
      <div class="entry"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
    <p class="admin-note">
      <?php echo esc_html(get_theme_mod('aoba_address', '架空県架空市1-2-3（実在しません）')); ?> /
      <?php echo esc_html(get_theme_mod('aoba_phone', '000-0000-0000')); ?>
    </p>
  </div>
</section>
<?php get_footer(); ?>
