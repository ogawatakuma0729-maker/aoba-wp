<?php get_header(); ?>
<section class="content">
  <div class="wrap">
    <p class="eyebrow">NEWS</p>
    <h1>お知らせ</h1>
    <div class="list">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a class="card" href="<?php the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
          <p><?php echo esc_html(get_the_date()); ?></p>
        </a>
      <?php endwhile; else : ?>
        <p>お知らせはまだありません。</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
