<?php 
$pageTitle = 'Pocket Assistant - Ваш карманный помощник';
$currentPage = 'home';
include 'includes/header.php'; 
?>

<div class="container home-page">
  <h1>Добро пожаловать в Pocket Assistant</h1>
  
  <div class="features">
    <div class="feature-card">
      <i class="fas fa-key"></i>
      <h2>Генератор паролей</h2>
      <p>Создавайте надежные пароли с настраиваемыми параметрами.</p>
      <a href="/generator" class="feature-btn">Создать пароль</a>
    </div>
    <div class="feature-card">
        <i class="fas fa-dice"></i>
        <h2>Генератор чисел</h2>
        <p>Генерируйте случайные числа с настраиваемыми параметрами.</p>
        <a href="/random" class="feature-btn">Сгенерировать числа</a>
    </div>
    <div class="feature-card">
        <i class="fas fa-image"></i>
        <h2>Конвертер изображений</h2>
        <p>Конвертируйте изображения в различные форматы с настройкой качества.</p>
        <a href="/converter" class="feature-btn">Конвертировать</a>
    </div>
    <div class="feature-card">
        <i class="fas fa-dharmachakra"></i>
        <h2>Колесо фортуны</h2>
        <p>Случайный выбор с красивой анимацией вращения колеса.</p>
        <a href="/wheel" class="feature-btn">Запустить колесо</a>
    </div>
    <div class="feature-card">
        <i class="fas fa-shield-alt"></i>
        <h2>Проверка пароля</h2>
        <p>Проверьте надежность вашего пароля и получите рекомендации по улучшению.</p>
        <a href="/check_password" class="feature-btn">Проверить пароль</a>
    </div>
    <div class="feature-card">
        <i class="fas fa-coins"></i>
        <h2>Подбрасывание монетки</h2>
        <p>Простой способ принять решение, когда есть только два варианта.</p>
        <a href="/coin.php" class="feature-btn">Подбросить</a>
    </div>
  </div>

  <div class="about-section">
    <h2>О проекте</h2>
    <p>Pocket Assistant - это многофункциональный онлайн-инструмент, который поможет вам в решении повседневных задач. От генерации надежных паролей до конвертации изображений и случайного выбора - всё необходимое собрано в одном месте.</p>
    
    <div class="advantages">
        <div class="advantage">
            <i class="fas fa-bolt"></i>
            <h3>Быстро</h3>
            <p>Мгновенная обработка запросов без задержек</p>
        </div>
        <div class="advantage">
            <i class="fas fa-lock"></i>
            <h3>Безопасно</h3>
            <p>Надёжная защита данных и конфиденциальность</p>
        </div>
        <div class="advantage">
            <i class="fas fa-desktop"></i>
            <h3>Удобно</h3>
            <p>Интуитивно понятный интерфейс и адаптивный дизайн</p>
        </div>
        <div class="advantage">
            <i class="fas fa-code"></i>
            <h3>Современно</h3>
            <p>Регулярные обновления и новые функции</p>
        </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?> 