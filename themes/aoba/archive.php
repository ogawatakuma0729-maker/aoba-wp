<?php
$labels = array(
  'aoba_service' => '事業内容',
  'aoba_work' => '実績・導入事例',
  'aoba_job' => '採用情報',
);
$type = get_post_type();
$heading = $labels[$type] ?? '一覧';
get_header();
?>
<section class="content">
  <div class="wrap">
    <p class="eyebrow">ARCHIVE</p>
    <h1><?php echo esc_html($heading); ?></h1>
    <div class="list">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a class="card" href="<?php the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
          <p><?php echo esc_html(wp_trim_words(get_the_excerpt() ? get_the_excerpt() : get_the_content(), 24)); ?></p>
        </a>
      <?php endwhile; else : ?>
        <p>まだありません。管理画面から追加できます。</p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
