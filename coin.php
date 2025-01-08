<?php 
$pageTitle = 'Подбрасывание монетки - Pocket Assistant';
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
<?php include 'includes/footer.php'; ?> 