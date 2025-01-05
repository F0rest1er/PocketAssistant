class FortuneWheel {
  constructor() {
    this.canvas = document.getElementById("wheelCanvas");
    this.ctx = this.canvas.getContext("2d");
    this.optionInput = document.getElementById("optionInput");
    this.addOption = document.getElementById("addOption");
    this.optionsList = document.getElementById("optionsList");
    this.spinBtn = document.getElementById("spinBtn");
    this.resetBtn = document.getElementById("resetBtn");
    this.result = document.getElementById("result");

    this.options = ["Вариант 1", "Вариант 2", "Вариант 3", "Вариант 4"];
    this.rotation = 0;
    this.isSpinning = false;
    this.colors = ["#4a90e2", "#5c6bc0", "#3f51b5", "#7986cb"];

    this.init();
  }

  init() {
    this.setupCanvas();
    this.updateOptionsList();
    this.bindEvents();
  }

  bindEvents() {
    this.addOption.addEventListener("click", () => this.handleAddOption());
    this.optionInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter") this.handleAddOption();
    });
    this.optionsList.addEventListener("click", (e) => this.handleDeleteOption(e));
    this.spinBtn.addEventListener("click", () => this.spin());
    this.resetBtn.addEventListener("click", () => this.reset());
    window.addEventListener("resize", () => {
      this.setupCanvas();
      this.drawWheel();
    });
  }

  setupCanvas() {
    const size = Math.min(window.innerWidth * 0.8, 500);
    this.canvas.width = size;
    this.canvas.height = size;
  }

  drawWheel() {
    this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
    const centerX = this.canvas.width / 2;
    const centerY = this.canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 10;

    this.ctx.save();
    this.ctx.translate(centerX, centerY);
    this.ctx.rotate(this.rotation);

    const colorIndices = this.calculateColorIndices();
    this.drawSectors(radius, colorIndices);

    this.ctx.restore();
  }

  calculateColorIndices() {
    let colorIndices = [];
    for (let i = 0; i < this.options.length; i++) {
      let availableColors = [...Array(this.colors.length).keys()];

      if (i > 0) {
        availableColors = availableColors.filter((c) => c !== colorIndices[i - 1]);
      }
      if (i === this.options.length - 1 && colorIndices[0] !== undefined) {
        availableColors = availableColors.filter((c) => c !== colorIndices[0]);
      }

      const randomIndex = Math.floor(Math.random() * availableColors.length);
      colorIndices[i] = availableColors[randomIndex];
    }
    return colorIndices;
  }

  drawSectors(radius, colorIndices) {
    const sliceAngle = (2 * Math.PI) / this.options.length;

    this.options.forEach((option, i) => {
      this.ctx.beginPath();
      this.ctx.moveTo(0, 0);
      this.ctx.arc(0, 0, radius, i * sliceAngle, (i + 1) * sliceAngle);
      this.ctx.closePath();

      this.ctx.fillStyle = this.colors[colorIndices[i]];
      this.ctx.fill();
      this.ctx.stroke();

      this.drawSectorText(option, i, sliceAngle, radius);
    });
  }

  drawSectorText(text, index, sliceAngle, radius) {
    this.ctx.save();
    this.ctx.rotate(index * sliceAngle + sliceAngle / 2);
    this.ctx.textAlign = "right";
    this.ctx.fillStyle = "#ffffff";
    this.ctx.font = `${radius / 15}px Arial`;
    this.ctx.fillText(text, radius - 20, 0);
    this.ctx.restore();
  }

  spin() {
    if (this.isSpinning) return;
    this.isSpinning = true;
    this.result.textContent = "";

    const spinDuration = 5000;
    const spinRevolutions = 10;
    const startRotation = this.rotation;
    const targetRotation = startRotation + Math.PI * 2 * spinRevolutions + Math.random() * Math.PI * 2;
    const startTime = performance.now();

    const animate = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / spinDuration, 1);
      const easing = 1 - Math.pow(1 - progress, 3);

      this.rotation = startRotation + (targetRotation - startRotation) * easing;
      this.drawWheel();

      if (progress < 1) {
        requestAnimationFrame(animate);
      } else {
        this.finishSpin();
      }
    };

    requestAnimationFrame(animate);
  }

  finishSpin() {
    this.isSpinning = false;
    const winningIndex = Math.floor(this.options.length - ((this.rotation % (Math.PI * 2)) / (Math.PI * 2)) * this.options.length) % this.options.length;
    this.result.textContent = `Выпало: ${this.options[winningIndex]}`;
    this.result.style.opacity = 1;
  }

  updateOptionsList() {
    this.optionsList.innerHTML = "";
    this.options.forEach((option, index) => {
      const item = document.createElement("div");
      item.className = "option-item";
      item.innerHTML = `
                <span>${option}</span>
                <button class="delete-btn" data-index="${index}">
                    <i class="fas fa-times"></i>
                </button>
            `;
      this.optionsList.appendChild(item);
    });
    this.drawWheel();
  }

  handleAddOption() {
    const value = this.optionInput.value.trim();
    if (value && this.options.length < 12) {
      this.options.push(value);
      this.optionInput.value = "";
      this.updateOptionsList();
    }
  }

  handleDeleteOption(e) {
    if (e.target.closest(".delete-btn")) {
      const index = e.target.closest(".delete-btn").dataset.index;
      this.options.splice(index, 1);
      this.updateOptionsList();
    }
  }

  reset() {
    this.options = ["Вариант 1", "Вариант 2", "Вариант 3", "Вариант 4"];
    this.rotation = 0;
    this.result.textContent = "";
    this.updateOptionsList();
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new FortuneWheel();
});