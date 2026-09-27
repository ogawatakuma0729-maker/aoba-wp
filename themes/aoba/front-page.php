<?php get_header(); ?>
<section class="wrap hero">
  <p class="eyebrow">WORDPRESS SAMPLE</p>
  <h1>小さな会社の、<br>直せる案内ページ。</h1>
  <p class="lead">架空の制作会社「青葉ワークス」の会社サイト見本です。事業・実績・採用・お知らせは管理画面から足せます。実在の会社ではありません。</p>
  <a class="btn" href="<?php echo esc_url(home_url('/contact/')); ?>">相談してみる</a>
</section>
<section class="content">
  <div class="wrap">
    <div class="grid">
      <a class="card" href="<?php echo esc_url(get_post_type_archive_link('aoba_service')); ?>">
        <h2>事業内容</h2>
        <p>事業ごとにページを分けて出せます。</p>
      </a>
      <a class="card" href="<?php echo esc_url(get_post_type_archive_link('aoba_work')); ?>">
        <h2>実績</h2>
        <p>導入事例を一覧と詳細で出せます。</p>
      </a>
      <a class="card" href="<?php echo esc_url(get_post_type_archive_link('aoba_job')); ?>">
        <h2>採用</h2>
        <p>募集要項を管理画面から足せます。</p>
      </a>
      <a class="card" href="<?php echo esc_url(home_url('/news/')); ?>">
        <h2>お知らせ</h2>
        <p>ブログ形式で更新できます。</p>
      </a>
      <a class="card" href="<?php echo esc_url(home_url('/about/')); ?>">
        <h2>会社概要</h2>
        <p>固定ページで会社情報を出します。</p>
      </a>
      <a class="card" href="<?php echo esc_url(home_url('/contact/')); ?>">
        <h2>お問い合わせ</h2>
        <p>送信内容は管理画面の「問い合わせ」に残ります。</p>
      </a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
