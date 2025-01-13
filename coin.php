<?php 
$pageTitle = 'Подбрасывание монетки - Pocket Assistant';
$pageDescription = 'Простой способ принять решение с помощью подбрасывания монетки в Pocket Assistant.';
$currentPage = 'coin';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Подбрасывание монетки</h1>
    <div class="coin-container">
        <div class="coin" id="coin">
            <div class="side front"></div>
            <div class="side back"></div>
        </div>
        <button id="flipBtn" class="flip-btn">Подбросить монетку</button>
    </div>
</div>

<script src="/js/coin.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Подбрасывание монетки - Pocket Assistant",
  "description": "Простой способ принять решение с помощью подбрасывания монетки в Pocket Assistant.",
  "url": "https://pocket-assistant.ru/coin",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
  }
}
</script>
<?php include 'includes/footer.php'; ?> 