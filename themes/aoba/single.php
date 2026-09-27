<?php get_header(); ?>
<section class="content">
  <div class="wrap">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <p class="eyebrow"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></p>
      <h1><?php the_title(); ?></h1>
      <div class="entry"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>
</section>
<?php get_footer(); ?>
