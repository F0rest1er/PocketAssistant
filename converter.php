<?php 
$pageTitle = 'Конвертер изображений - Pocket Assistant';
$currentPage = 'converter';
include 'includes/header.php'; 
?>

<div class="container">
    <h1>Конвертер изображений</h1>
    <div class="converter-form">
        <div class="upload-area" id="dropZone">
            <i class="fas fa-cloud-upload-alt"></i>
            <p>Перетащите изображение сюда или</p>
            <label class="upload-btn">
                Выберите файл
                <input type="file" id="fileInput" accept="image/*" hidden>
            </label>
            <p class="formats-info">Поддерживаемые форматы: JPG, PNG, WEBP, BMP, GIF</p>
        </div>

        <div class="preview-area" id="previewArea" style="display: none;">
            <div class="image-preview">
                <img id="imagePreview" src="" alt="Предпросмотр">
                <div class="image-info">
                    <span id="imageName"></span>
                    <span id="imageSize"></span>
                    <span id="imageFormat"></span>
                </div>
            </div>

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
            <h3>Результат конвертации</h3>
            <div class="converted-image">
                <img id="convertedImage" src="" alt="Конвертированное изображение">
                <div class="image-info">
                    <span id="convertedName"></span>
                    <span id="convertedSize"></span>
                </div>
            </div>
            <button id="downloadBtn" class="download-btn">
                <i class="fas fa-download"></i> Скачать
            </button>
        </div>
    </div>
</div>

<script src="/js/converter.js"></script>
<?php include 'includes/footer.php'; ?> 