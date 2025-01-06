<!DOCTYPE html>
<html lang="ru" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pageTitle ?? 'Pocket Assistant'; ?></title>
    
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <link rel="apple-touch-icon" href="/img/favicon.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-left">
          <div class="logo">
            <a href="/" class="logo-link">
              <span>Pocket Assistant</span>
            </a>
          </div>
          <ul class="nav-links">
            <li><a href="/generator" <?php echo $currentPage === 'generator' ? 'class="active"' : ''; ?>>Генератор паролей</a></li>
            <li><a href="/random" <?php echo $currentPage === 'random' ? 'class="active"' : ''; ?>>Случайные числа</a></li>
            <li><a href="/converter" <?php echo $currentPage === 'converter' ? 'class="active"' : ''; ?>>Конвертер</a></li>
            <li><a href="/wheel" <?php echo $currentPage === 'wheel' ? 'class="active"' : ''; ?>>Колесо фортуны</a></li>
            <li><a href="/check_password" <?php echo $currentPage === 'check-password' ? 'class="active"' : ''; ?>>Проверка пароля</a></li>
          </ul>
        </div>
        <div class="nav-right">
          <div class="theme-toggle">
            <button id="themeToggle">
              <i class="fas fa-sun"></i>
              <i class="fas fa-moon"></i>
            </button>
          </div>
          <button class="mobile-menu" id="mobileMenu">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </nav>
    </header>
  </body>
</html> 