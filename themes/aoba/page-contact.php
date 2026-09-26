<?php
/*
Template Name: 相談
*/
get_header();
?>
<section class="content">
  <div class="wrap">
    <h1>相談</h1>
    <p class="lead">この見本ではメールは飛びません。画面上の受付までです。</p>
    <form class="contact-form" id="contact-form">
      <input name="name" required placeholder="お名前">
      <input name="company" placeholder="会社名（任意）">
      <textarea name="message" required placeholder="相談内容"></textarea>
      <button class="btn" type="submit">送る</button>
    </form>
    <p class="thanks" id="thanks">受け付けました。本番では担当者へ通知が入ります。</p>
    <p class="admin-note">文章の見出しは WordPress の固定ページ「相談」から直せます。</p>
  </div>
</section>
<script>
  document.getElementById("contact-form").addEventListener("submit", function (e) {
    e.preventDefault();
    this.style.display = "none";
    document.getElementById("thanks").classList.add("show");
  });
</script>
<?php get_footer(); ?>
