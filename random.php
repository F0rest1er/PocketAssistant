<?php 
$pageTitle = 'Генератор случайных чисел - Pocket Assistant';
$pageDescription = 'Генерируйте случайные числа с настраиваемыми параметрами с помощью Pocket Assistant.';
$currentPage = 'random';
$canonical = 'https://pocket-assistant.ru/random';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Генератор случайных чисел</h1>
    <div class="random-form">
        <div class="options">
            <div class="option-group">
                <label>Диапазон от:</label>
                <input type="number" id="minRange" value="1">
            </div>
            <div class="option-group">
                <label>до:</label>
                <input type="number" id="maxRange" value="100">
            </div>
            <div class="option-group">
                <label>Количество чисел:</label>
                <input type="number" id="numberCount" min="1" max="100" value="1">
            </div>
            <div class="option-group">
                <label>
                    <input type="checkbox" id="uniqueNumbers" checked>
                    Только уникальные числа
                </label>
            </div>
        </div>
        <button id="generateBtn" class="generate-btn">Сгенерировать числа</button>
        <div class="number-display">
            <div id="numberAnimation" class="number-animation"></div>
            <div id="numberList" class="number-list"></div>
        </div>
    </div>
</div>

<!-- Yandex.RTB R-A-13687682-3 -->
<div id="yandex_rtb_R-A-13687682-3"></div>
<script>
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-13687682-3",
        "renderTo": "yandex_rtb_R-A-13687682-3"
    })
})
</script>

<script src="/js/random.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Генератор случайных чисел - Pocket Assistant",
  "description": "Генерируйте случайные числа с настраиваемыми параметрами с помощью Pocket Assistant.",
  "url": "https://pocket-assistant.ru/random",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>
<?php include 'includes/footer.php'; ?> 