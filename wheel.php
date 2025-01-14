<?php 
$pageTitle = 'Колесо фортуны - Pocket Assistant';
$pageDescription = 'Используйте колесо фортуны для случайного выбора с помощью Pocket Assistant.';
$currentPage = 'wheel';
$canonical = 'https://pocket-assistant.ru/wheel';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Колесо фортуны</h1>
    <div class="wheel-container">
        <div class="wheel-options">
            <div class="option-group">
                <label>Добавить вариант:</label>
                <div class="input-group">
                    <input type="text" id="optionInput" placeholder="Введите вариант">
                    <button id="addOption" class="add-btn">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="options-list" id="optionsList">

            </div>
            <div class="wheel-controls">
                <button id="spinBtn" class="spin-btn">Крутить колесо</button>
                <button id="resetBtn" class="reset-btn">Сбросить</button>
            </div>
        </div>
        <div class="wheel-wrapper">
            <div class="wheel-arrow"></div>
            <canvas id="wheelCanvas"></canvas>
        </div>
        <div id="result" class="wheel-result"></div>
    </div>
</div>

<script src="/js/wheel.js"></script>
<?php include 'includes/footer.php'; ?> 