document.addEventListener("DOMContentLoaded", function () {
  const dropZone = document.getElementById("dropZone");
  const fileInput = document.getElementById("fileInput");
  const previewArea = document.getElementById("previewArea");
  const imagePreview = document.getElementById("imagePreview");
  const imageName = document.getElementById("imageName");
  const imageSize = document.getElementById("imageSize");
  const imageFormat = document.getElementById("imageFormat");
  const formatSelect = document.getElementById("formatSelect");
  const qualityRange = document.getElementById("qualityRange");
  const qualityValue = document.getElementById("qualityValue");
  const convertBtn = document.getElementById("convertBtn");
  const resultArea = document.getElementById("resultArea");
  const convertedImage = document.getElementById("convertedImage");
  const convertedName = document.getElementById("convertedName");
  const convertedSize = document.getElementById("convertedSize");
  const downloadBtn = document.getElementById("downloadBtn");

  let originalFile = null;

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
    handleFile(e.dataTransfer.files[0]);
  });

  fileInput.addEventListener("change", (e) => {
    handleFile(e.target.files[0]);
  });

  qualityRange.addEventListener("input", () => {
    qualityValue.textContent = qualityRange.value + "%";
  });

  formatSelect.addEventListener("change", () => {
    const isPNG = formatSelect.value === "png";
    document.getElementById("pngOptions").style.display = isPNG ? "block" : "none";
    document.getElementById("qualityRange").parentElement.style.display = formatSelect.value === "jpg" || formatSelect.value === "webp" ? "block" : "none";
  });

  function handleFile(file) {
    if (!file || !file.type.startsWith("image/")) {
      alert("Пожалуйста, выберите изображение");
      return;
    }

    originalFile = file;
    const reader = new FileReader();

    reader.onload = (e) => {
      imagePreview.src = e.target.result;
      imageName.textContent = file.name;
      imageSize.textContent = formatSize(file.size);
      imageFormat.textContent = file.type.split("/")[1].toUpperCase();
      previewArea.style.display = "block";
      resultArea.style.display = "none";
    };

    reader.readAsDataURL(file);
  }

  convertBtn.addEventListener("click", () => {
    if (!originalFile) return;

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

      const format = formatSelect.value;
      const quality = qualityRange.value / 100;

      let mimeType = "image/jpeg";
      let blobQuality = quality;

      switch (format) {
        case "png":
          mimeType = "image/png";
          blobQuality = undefined;
          break;
        case "webp":
          mimeType = "image/webp";
          break;
        case "bmp":
          mimeType = "image/bmp";
          blobQuality = undefined;
          break;
        case "gif":
          mimeType = "image/gif";
          blobQuality = undefined;
          break;
      }

      canvas.toBlob(
        (blob) => {
          const url = URL.createObjectURL(blob);
          convertedImage.src = url;
          convertedName.textContent = `${originalFile.name.split(".")[0]}.${format}`;
          convertedSize.textContent = formatSize(blob.size);
          resultArea.style.display = "block";

          if (convertedImage.previousURL) {
            URL.revokeObjectURL(convertedImage.previousURL);
          }
          convertedImage.previousURL = url;

          downloadBtn.onclick = () => {
            const link = document.createElement("a");
            link.href = url;
            link.download = `${originalFile.name.split(".")[0]}_converted.${format}`;
            link.click();
          };
        },
        mimeType,
        blobQuality
      );
    };

    img.src = URL.createObjectURL(originalFile);
  });

  function formatSize(bytes) {
    if (bytes === 0) return "0 Bytes";
    const k = 1024;
    const sizes = ["Bytes", "KB", "MB", "GB"];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + " " + sizes[i];
  }
});
