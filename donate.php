<?php 
$pageTitle = 'Поддержать проект - Pocket Assistant';
$pageDescription = 'Поддержите проект Pocket Assistant и помогите нам развивать его. Узнайте, на что пойдут средства.';
$currentPage = 'donate';
$canonical = 'https://pocket-assistant.ru/donate';
include 'includes/header.php'; 
?>

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

<link rel="canonical" href="https://pocket-assistant.ru/donate" />

<div class="container">
    <h1>Поддержать проект</h1>
    <div class="donate-content">
        <p class="donate-description">
            Если вам нравится Pocket Assistant и вы хотите поддержать его развитие на добровольной основе, 
            вы можете сделать это с помощью разового доната. Любая поддержка поможет 
            нам продолжать улучшать проект и добавлять новые функции.
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
        <div class="donate-features supporters-list">
            <h2>Поддержавшие проект:</h2>
            <ol>
                <?/*<li></li>*/?>
            </ol>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?> 