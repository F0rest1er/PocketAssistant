<?php 
$pageTitle = 'Крестики-нолики - Pocket Assistant';
$pageDescription = 'Играйте в классическую игру Крестики-нолики с друзьями или против бота.';
$currentPage = 'tictactoe';
$canonical = 'https://pocket-assistant.ru/tictactoe';
include 'includes/header.php'; 
?>

<div class="container tic-tac">
    <h1>Крестики-нолики</h1>
    <div class="game-controls">
        <div class="control-group">
            <label for="playerSymbol">Выберите символ:</label>
            <select id="playerSymbol">
                <option value="X">Крестики (X)</option>
                <option value="O">Нолики (O)</option>
            </select>
        </div>
        <div class="control-group">
            <label for="difficulty">Сложность:</label>
            <select id="difficulty">
                <option value="easy">Низкая</option>
                <option value="medium">Средняя</option>
                <option value="hard">Высокая</option>
            </select>
        </div>
        <div class="control-group">
            <label for="gameMode">Режим игры:</label>
            <select id="gameMode">
                <option value="single">Игра против бота</option>
                <option value="multi">Два игрока</option>
            </select>
        </div>
        <button id="startGame">Начать игру</button>
    </div>
    <div class="game-board" id="gameBoard">
        <div class="cell" data-index="0"></div>
        <div class="cell" data-index="1"></div>
        <div class="cell" data-index="2"></div>
        <div class="cell" data-index="3"></div>
        <div class="cell" data-index="4"></div>
        <div class="cell" data-index="5"></div>
        <div class="cell" data-index="6"></div>
        <div class="cell" data-index="7"></div>
        <div class="cell" data-index="8"></div>
    </div>
    <div id="status"></div>
</div>
<!-- Yandex.RTB R-A-13687682-10 -->
<div id="yandex_rtb_R-A-13687682-10"></div>
<script>
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-13687682-10",
        "renderTo": "yandex_rtb_R-A-13687682-10"
    })
})
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Крестики-нолики в кармане - Pocket Assistant",
  "description": "Поиграйте в классическую игру Крестики-нолики и проверьте свои логические способности.",
  "url": "https://pocket-assistant.ru/tictactoe",
  "mainEntity": {
    "@type": "Organization",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru",
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>

<script src="/js/tictactoe.js"></script>
<?php include 'includes/footer.php'; ?>