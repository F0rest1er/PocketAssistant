document.addEventListener("DOMContentLoaded", function () {
  const dropZone = document.getElementById("dropZone");
  const fileInput = document.getElementById("fileInput");
  const previewArea = document.getElementById("previewArea");
  const imagePreviews = document.getElementById("imagePreviews");
  const formatSelect = document.getElementById("formatSelect");
  const qualityRange = document.getElementById("qualityRange");
  const qualityValue = document.getElementById("qualityValue");
  const convertBtn = document.getElementById("convertBtn");
  const resultArea = document.getElementById("resultArea");
  const convertedImages = document.getElementById("convertedImages");
  const downloadAllBtn = document.getElementById("downloadAllBtn");

  let originalFiles = [];
  let convertedUrls = [];

  dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZone.classList.add("dragover");
  });

  dropZone.addEventListener("dragleave", () => {
    dropZone.classList.remove("dragover");
  });

  dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropZone.classList.remove("dragover");
    handleFiles(e.dataTransfer.files);
  });

  fileInput.addEventListener("change", (e) => {
    handleFiles(e.target.files);
  });

  qualityRange.addEventListener("input", () => {
    qualityValue.textContent = qualityRange.value + "%";
  });

  function handleFiles(files) {
    originalFiles = Array.from(files);
    previewArea.style.display = "block";
    imagePreviews.innerHTML = "";

    originalFiles.forEach((file) => {
      if (!file.type.startsWith("image/")) {
        alert("Пожалуйста, выберите изображение");
        return;
      }

      const reader = new FileReader();
      reader.onload = (e) => {
        const img = document.createElement("img");
        img.src = e.target.result;
        img.alt = file.name;
        img.style.maxWidth = "100px";
        img.style.margin = "5px";
        imagePreviews.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  }

  convertBtn.addEventListener("click", () => {
    if (originalFiles.length === 0) return;

    const format = formatSelect.value;
    const quality = qualityRange.value / 100;

    convertedImages.innerHTML = "";
    convertedUrls = [];

    originalFiles.forEach((originalFile) => {
      const canvas = document.createElement("canvas");
      const ctx = canvas.getContext("2d");
      const img = new Image();

      img.onload = () => {
        let width = img.width;
        let height = img.height;
        const MAX_SIZE = 2048;

        if (width > MAX_SIZE || height > MAX_SIZE) {
          if (width > height) {
            height = Math.round((height * MAX_SIZE) / width);
            width = MAX_SIZE;
          } else {
            width = Math.round((width * MAX_SIZE) / height);
            height = MAX_SIZE;
          }
        }

        canvas.width = width;
        canvas.height = height;

        ctx.imageSmoothingEnabled = true;
        ctx.imageSmoothingQuality = "high";
        ctx.drawImage(img, 0, 0, width, height);

        canvas.toBlob(
          (blob) => {
            const url = URL.createObjectURL(blob);
            convertedUrls.push(url);

            const convertedImg = document.createElement("img");
            convertedImg.src = url;
            convertedImg.alt = originalFile.name;
            convertedImg.style.maxWidth = "100px";

            const convertedImgContainer = document.createElement("div");
            convertedImgContainer.appendChild(convertedImg);

            const sizeInfo = document.createElement("div");
            sizeInfo.textContent = `Размер после конвертации: ${formatSize(blob.size)}`;
            convertedImgContainer.appendChild(sizeInfo);

            const downloadBtn = document.createElement("button");
            downloadBtn.textContent = "Скачать";
            downloadBtn.onclick = () => {
              const link = document.createElement("a");
              link.href = url;
              link.download = `${originalFile.name.split(".")[0]}_converted.${format}`;
              link.click();
            };
            convertedImgContainer.appendChild(downloadBtn);

            convertedImages.appendChild(convertedImgContainer);
          },
          `image/${format}`,
          quality
        );
      };

      img.src = URL.createObjectURL(originalFile);
    });

    resultArea.style.display = "block";
  });

  downloadAllBtn.addEventListener("click", () => {
    convertedUrls.forEach((url, index) => {
      const link = document.createElement("a");
      link.href = url;
      link.download = `${originalFiles[index].name.split(".")[0]}_converted.${formatSelect.value}`;
      link.click();
    });
  });

  function formatSize(bytes) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + " " + sizes[i];
  }
});
