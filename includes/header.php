<!DOCTYPE html>
<html lang="ru" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pageTitle ?? 'Pocket Assistant'; ?></title>
    <meta name="description" content="<?php echo $pageDescription; ?>" />

    <link rel="icon" type="image/png" href="/img/favicon.png">
    <link rel="apple-touch-icon" href="/img/favicon.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <meta property="og:title" content="<?php echo $pageTitle ?? 'Pocket Assistant'; ?>" />
    <meta property="og:description" content="Pocket Assistant - ваш карманный помощник для генерации паролей, конвертации изображений и других полезных инструментов." />
    <meta property="og:image" content="/img/favicon.ong" />
    <meta property="og:url" content="<?php echo 'https://pocket-assistant.ru' . $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:type" content="website" />
    
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />  
    <link rel="canonical" href="<?php echo $canonical; ?>" />

    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(99525008, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/99525008" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  </head>
  <body>
    <header>
      <nav>
        <a href="/" class="logo-link">
          <div class="logo">
            <span>Pocket Assistant</span>
          </div>
        </a>
        <div class="nav-links">
          <a href="/generator" <?php echo $currentPage === 'generator' ? 'class="active"' : ''; ?>>
            <span>Генератор паролей</span>
          </a>
          <a href="/random" <?php echo $currentPage === 'random' ? 'class="active"' : ''; ?>>
            <span>Случайные числа</span>
          </a>
          <a href="/converter" <?php echo $currentPage === 'converter' ? 'class="active"' : ''; ?>>
            <span>Конвертер</span>
          </a>
          <a href="/check_password" <?php echo $currentPage === 'check-password' ? 'class="active"' : ''; ?>>
            <span>Проверка пароля</span>
          </a>
          <a href="/wheel" <?php echo $currentPage === 'wheel' ? 'class="active"' : ''; ?>>
            <span>Колесо фортуны</span>
          </a>
          <a href="/coin" <?php echo $currentPage === 'coin' ? 'class="active"' : ''; ?>>
            <span>Монетка</span>
          </a>
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
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Pocket Assistant",
      "url": "https://pocket-assistant.ru",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://pocket-assistant.ru/?s={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
  </body>
</html>