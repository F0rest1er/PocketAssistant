<?php 
$pageTitle = 'Генератор случайных чисел - Pocket Assistant';
$currentPage = 'random';
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

<script src="/js/random.js"></script>
<?php include 'includes/footer.php'; ?> 