<?php 
$pageTitle = 'Поиск по номеру телефона - Pocket Assistant';
$currentPage = 'checker';
include 'includes/header.php'; 
?>

<div class="container">
  <h1>Поиск информации по номеру телефона</h1>
  <div class="search-form">
    <input type="tel" id="phoneNumber" placeholder="+7 (999) 999-99-99" maxlength="18" />
    <button id="searchBtn">Найти</button>
  </div>
  <div class="result" id="result">

  </div>
</div>

<?php include 'includes/footer.php'; ?> 