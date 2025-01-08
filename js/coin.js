class CoinFlipper {
  constructor() {
    this.coin = document.getElementById("coin");
    this.flipBtn = document.getElementById("flipBtn");
    this.isFlipping = false;

    this.flipBtn.addEventListener("click", () => this.flip());
  }

  flip() {
    if (this.isFlipping) return;

    this.isFlipping = true;
    this.flipBtn.disabled = true;

    const rotations = 3 + Math.floor(Math.random() * 3);
    const result = Math.round(Math.random());
    const degrees = rotations * 360 + result * 180;

    this.coin.style.transform = `rotateY(${degrees}deg)`;

    setTimeout(() => {
      this.isFlipping = false;
      this.flipBtn.disabled = false;
    }, 3000);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new CoinFlipper();
});
