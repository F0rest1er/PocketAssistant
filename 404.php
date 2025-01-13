<?php 
$pageTitle = 'Страница не найдена - Pocket Assistant';
$pageDescription = 'К сожалению, запрашиваемая страница не найдена. Вернитесь на главную страницу.';
$currentPage = '404';
include 'includes/header.php'; 
?>

<div class="container">
    <div class="error-404">
        <i class="fas fa-exclamation-circle"></i>
        <h1>404</h1>
        <h2>Страница не найдена</h2>
        <p>К сожалению, запрашиваемая страница не существует или была удалена.</p>
        <a href="/" class="back-home">
            Вернуться на главную
        </a>
    </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Страница не найдена - Pocket Assistant",
  "description": "К сожалению, запрашиваемая страница не найдена. Вернитесь на главную страницу.",
  "url": "https://pocket-assistant.ru/404",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
  }
}
</script>

<?php include 'includes/footer.php'; ?> 