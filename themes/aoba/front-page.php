<?php get_header(); ?>
<section class="wrap hero">
  <p class="eyebrow">WORDPRESS SAMPLE</p>
  <h1>小さな会社の、<br>直せる案内ページ。</h1>
  <p class="lead">架空の制作会社「青葉ワークス」の WordPress 見本です。文章は管理画面から直せます。実在の会社ではありません。</p>
  <a class="btn" href="<?php echo esc_url(home_url('/contact/')); ?>">相談してみる</a>
</section>
<section class="content">
  <div class="wrap">
    <div class="grid">
      <article class="card">
        <h2>案内サイト</h2>
        <p>店舗や教室の顔になるページ。スマホでも読みやすい幅に合わせます。</p>
      </article>
      <article class="card">
        <h2>申し込み画面</h2>
        <p>予約や問い合わせの入力。送信後の案内文まで含めて納品する想定です。</p>
      </article>
      <article class="card">
        <h2>直せる入れ物</h2>
        <p>WordPress の管理画面から、ページの文章を依頼者が直せます。</p>
      </article>
    </div>
  </div>
</section>
<?php get_footer(); ?>
