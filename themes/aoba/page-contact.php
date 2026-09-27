<?php
/*
Template Name: 相談
*/
get_header();
$sent = isset($_GET['sent']);
?>
<section class="content">
  <div class="wrap">
    <h1>お問い合わせ</h1>
    <p class="lead">送信内容はメールではなく、管理画面の「問い合わせ」に残ります。本番では通知設定を足せます。</p>
    <?php if ($sent) : ?>
      <p class="thanks show">受け付けました。管理画面で内容を確認できます。</p>
    <?php else : ?>
      <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="aoba_contact">
        <?php wp_nonce_field('aoba_contact'); ?>
        <input name="name" required placeholder="お名前">
        <input name="company" placeholder="会社名（任意）">
        <textarea name="message" required placeholder="相談内容"></textarea>
        <button class="btn" type="submit">送る</button>
      </form>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
