<?php 
$pageTitle = 'Генератор паролей - Pocket Assistant';
$pageDescription = 'Создавайте надежные пароли с помощью генератора паролей Pocket Assistant. Настройте параметры и получите уникальные пароли.';
$currentPage = 'generator';
$canonical = 'https://pocket-assistant.ru/generator';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Генератор паролей</h1>
    <div class="generator-form">
        <div class="options">
            <div class="option-group">
                <label>Длина пароля:</label>
                <input type="number" id="passwordLength" min="4" max="128" value="12">
            </div>
            <div class="option-group">
                <label>Количество паролей:</label>
                <input type="number" id="passwordCount" min="1" max="10" value="1">
            </div>
            <div class="option-group">
                <label>
                    <input type="checkbox" id="lowercase" checked>
                    Строчные буквы (a-z)
                </label>
            </div>
            <div class="option-group">
                <label>
                    <input type="checkbox" id="uppercase" checked>
                    Заглавные буквы (A-Z)
                </label>
            </div>
            <div class="option-group">
                <label>
                    <input type="checkbox" id="numbers" checked>
                    Цифры (0-9)
                </label>
            </div>
            <div class="option-group">
                <label>
                    <input type="checkbox" id="symbols">
                    Специальные символы (!@#$%^&*)
                </label>
            </div>
        </div>
        <button id="generateBtn" class="generate-btn">Сгенерировать пароли</button>
        <div id="passwordList" class="password-list">

        </div>
    </div>
</div>

<div id="yandex_rtb_R-A-13687682-2"></div>
<script>
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-13687682-2",
        "renderTo": "yandex_rtb_R-A-13687682-2"
    })
})
</script>

<script src="/js/generator.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Генератор паролей - Pocket Assistant",
  "description": "Создавайте надежные пароли с помощью генератора паролей Pocket Assistant. Настройте параметры и получите уникальные пароли.",
  "url": "https://pocket-assistant.ru/generator",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>
<?php include 'includes/footer.php'; ?> 