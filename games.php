<?php 
$pageTitle = 'Игры в браузере - Pocket Assistant';
$pageDescription = 'На нашем сайте есть много простых, но интересных игр. Вы сможете найти все, что вам интересно. Играть можно как на компьютере, так и на телефоне.';
$currentPage = 'games';
$canonical = 'https://pocket-assistant.ru/games';
include 'includes/header.php'; 
?>

<div class="container">
<h1>Добро пожаловать в раздел с играми</h1>
  <div class="about-section">
  <p>У нас вы можете поиграть в увлекательные игры, чтобы скрасить свое время.</p>
  </div>
  <div class="features">
    <div class="feature-card">
      <i class="fas fa-th"></i>
      <h2>Судоку</h2>
      <p>Поиграйте в классическую игру Судоку и развивайте свои логические навыки.</p>
      <a href="/sudoku" class="feature-btn">Играть в Судоку</a>
    </div>
    <div class="feature-card">
      <i class="fas fa-times"></i>
      <h2>Крестики-нолики</h2>
      <p>Поиграйте в классическую игру Крестики-нолики и проверьте свои логические способности.</p>
      <a href="/tictactoe" class="feature-btn">Играть в Крестики-нолики</a>
    </div>
  </div>
</div>

<!-- Yandex.RTB R-A-13687682-8 -->
<div id="yandex_rtb_R-A-13687682-8"></div>
<script>
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-13687682-8",
        "renderTo": "yandex_rtb_R-A-13687682-8"
    })
})
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Игры в браузере - Pocket Assistant",
  "description": "На нашем сайте есть много простых, но интересных игр. Вы сможете найти все, что вам интересно. Играть можно как на компьютере, так и на телефоне.",
  "url": "https://pocket-assistant.ru/games",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>

<?php include 'includes/footer.php'; ?> 