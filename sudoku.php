<?php 
$pageTitle = 'Судоку в кармане - Pocket Assistant';
$pageDescription = 'Играйте в судоку онлайн. На телефоне, планшете, либо же компьютере. Каждый день судоку будет новое. Отличная тренировка для мозга.';
$currentPage = 'sudoku';
$canonical = 'https://pocket-assistant.ru/sudoku';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Судоку</h1>
    <div class="sudoku-controls">
        <select id="difficulty">
            <option value="easy">Легкий</option>
            <option value="medium">Средний</option>
            <option value="hard">Сложный</option>
        </select>
        <button id="new-game">Новая игра</button>
        <button id="reset-game">Сбросить</button>
        <button id="confirm-game">Подтвердить</button>
    </div>
    <div id="sudoku-board"></div>
    <div id="sudoku-message"></div>
</div>

<!-- Yandex.RTB R-A-13687682-9 -->
<div id="yandex_rtb_R-A-13687682-9"></div>
<script>
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-13687682-9",
        "renderTo": "yandex_rtb_R-A-13687682-9"
    })
})
</script>

<script src="/js/sudoku.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Судоку в кармане - Pocket Assistant",
  "description": "Играйте в судоку онлайн. На телефоне, планшете, либо же компьютере. Каждый день судоку будет новое. Отличная тренировка для мозга.",
  "url": "https://pocket-assistant.ru/sudoku",
  "mainEntity": {
    "@type": "Organization",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru",
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>

<?php include 'includes/footer.php'; ?>