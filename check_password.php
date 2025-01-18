<?php 
$pageTitle = 'Проверка пароля - Pocket Assistant';
$pageDescription = 'Безопасная проверка надежности пароля онлайн с помощью сайта Pocket Assistant.';
$currentPage = 'check_password';
$canonical = 'https://pocket-assistant.ru/check_password';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Проверка надежности пароля</h1>
    <div class="password-checker">
        <div class="input-group">
            <input type="password" id="passwordInput" placeholder="Введите пароль для проверки" 
                   class="password-input">
            <button type="button" id="togglePassword" class="toggle-password">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        <div class="strength-meter">
            <div class="meter-bar">
                <div id="strengthBar" class="strength-bar"></div>
            </div>
            <div id="strengthText" class="strength-text">Введите пароль</div>
        </div>

        <div class="requirements">
            <h3>Требования к надежному паролю:</h3>
            <ul>
                <li id="length">
                    <i class="fas fa-times"></i> Минимум 8 символов
                </li>
                <li id="lowercase">
                    <i class="fas fa-times"></i> Строчные буквы (a-z)
                </li>
                <li id="uppercase">
                    <i class="fas fa-times"></i> Заглавные буквы (A-Z)
                </li>
                <li id="numbers">
                    <i class="fas fa-times"></i> Цифры (0-9)
                </li>
                <li id="special">
                    <i class="fas fa-times"></i> Специальные символы (!@#$%^&*)
                </li>
            </ul>
        </div>

        <div id="suggestions" class="suggestions" style="display: none;">
            <h3>Рекомендации по улучшению:</h3>
            <ul id="suggestionsList"></ul>
        </div>
    </div>
</div>

<!-- Yandex.RTB R-A-13687682-5 -->
<div id="yandex_rtb_R-A-13687682-5"></div>
<script>
window.yaContextCb.push(() => {
    Ya.Context.AdvManager.render({
        "blockId": "R-A-13687682-5",
        "renderTo": "yandex_rtb_R-A-13687682-5"
    })
})
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Проверка пароля - Pocket Assistant",
  "description": "Безопасная проверка надежности пароля онлайн.",
  "url": "https://pocket-assistant.ru/check_password",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>

<script src="/js/check_password.js"></script>
<?php include 'includes/footer.php'; ?> 