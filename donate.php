<?php 
$pageTitle = 'Поддержать проект - Pocket Assistant';
$pageDescription = 'Поддержите проект Pocket Assistant и помогите нам развивать его. Узнайте, на что пойдут средства.';
$currentPage = 'donate';
$canonical = 'https://pocket-assistant.ru/donate';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Поддержать проект</h1>
    <div class="donate-content">
        <p class="donate-description">
        Содержание и развитие сайта требуют значительных ресурсов, особенно в долгосрочной перспективе. Если Pocket Assistant приносит вам пользу и вы хотите поддержать его развитие, мы будем искренне благодарны за ваше добровольное участие в виде разового доната. Даже небольшая помощь вдохновит нас на совершенствование проекта и внедрение новых возможностей!
        </p>
        
        <div class="donate-button">
            <a href="https://www.donationalerts.com/r/forestier" target="_blank" class="donate-link">
                <img src="/img/donation_alerts.png" alt="DonationAlerts" class="donate-icon">
            </a>
        </div>
        
        <div class="donate-features">
            <h2>На что пойдут средства:</h2>
            <ul>
                <li>Оплата хостинга и домена</li>
                <li>Разработка новых функций</li>
                <li>Улучшение существующего функционала</li>
                <li>Поддержка и обновление проекта</li>
            </ul>
        </div>
        <br>
        <p class="donate-description">
            Кроме того, все, кто окажет поддержку в течение текущего календарного месяца, будут увековечены в нашем почетном списке благодарностей — среди тех, кто помогает нам двигаться вперед. Список будет обновляться каждый месяц.
        </p>
        <div class="donate-features supporters-list">
            <h2>Поддержавшие проект в <?php echo $currentMonthPrepositional . ' ' . $currentYear?> года:</h2>
            <ol>
                <?/*<li></li>*/?>
            </ol>
        </div>
    </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Поддержать проект - Pocket Assistant",
  "description": "Поддержите проект Pocket Assistant и помогите нам развивать его. Узнайте, на что пойдут средства.",
  "url": "https://pocket-assistant.ru/donate",
  "mainEntity": {
    "@type": "Organization",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru",
    "logo": "https://pocket-assistant.ru/img/favicon.png"
  }
}
</script>

<?php include 'includes/footer.php'; ?> 