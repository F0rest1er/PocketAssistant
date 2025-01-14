<?php 
$pageTitle = 'Конвертер изображений - Pocket Assistant';
$pageDescription = 'Конвертируйте изображения в различные форматы с настройкой качества с помощью Pocket Assistant.';
$currentPage = 'converter';
$canonical = 'https://pocket-assistant.ru/converter';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Конвертер изображений</h1>
    <div class="converter-form">
        <div class="upload-area" id="dropZone">
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Перетащите изображения сюда или</p>
            <label class="upload-btn">
                Выберите файлы
                <input type="file" id="fileInput" accept="image/*" multiple hidden>
            </label>
            <p class="formats-info">Поддерживаемые форматы: JPG, PNG, WEBP, BMP, GIF</p>
        </div>

        <div class="preview-area" id="previewArea" style="display: none;">
            <div id="imagePreviews" class="image-preview"></div>
            <div class="conversion-options">
                <div class="option-group">
                    <label>Конвертировать в:</label>
                    <select id="formatSelect">
                        <option value="jpg">JPG</option>
                        <option value="png">PNG</option>
                        <option value="webp">WEBP</option>
                        <option value="bmp">BMP</option>
                        <option value="gif">GIF</option>
                    </select>
                </div>
                <div class="option-group">
                    <label>Качество:</label>
                    <input type="range" id="qualityRange" min="1" max="100" value="85">
                    <span id="qualityValue">85%</span>
                </div>
                <button id="convertBtn" class="convert-btn">Конвертировать</button>
            </div>
        </div>

        <div class="result-area" id="resultArea" style="display: none;">
            <h2 class="result-title-h2">Результат конвертации</h2>
            <button id="downloadAllBtn" class="download-all-btn">Скачать все</button>
            <div id="convertedImages" class="converted-image">
               
            </div>
        </div>
    </div>
</div>

<script src="/js/converter.js"></script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Конвертер изображений - Pocket Assistant",
  "description": "Конвертируйте изображения в различные форматы с настройкой качества с помощью Pocket Assistant.",
  "url": "https://pocket-assistant.ru/converter",
  "mainEntity": {
    "@type": "WebSite",
    "name": "Pocket Assistant",
    "url": "https://pocket-assistant.ru"
  }
}
</script>

<?php include 'includes/footer.php'; ?> 