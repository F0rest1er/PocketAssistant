document.addEventListener("DOMContentLoaded", function () {
  const minRange = document.getElementById("minRange");
  const maxRange = document.getElementById("maxRange");
  const numberCount = document.getElementById("numberCount");
  const uniqueNumbers = document.getElementById("uniqueNumbers");
  const generateBtn = document.getElementById("generateBtn");
  const numberAnimation = document.getElementById("numberAnimation");
  const numberList = document.getElementById("numberList");

  let animationInterval;

  function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function animateNumbers(min, max) {
    return setInterval(() => {
      numberAnimation.textContent = getRandomNumber(min, max);
    }, 50);
  }

  function generateNumbers() {
    const min = parseInt(minRange.value);
    const max = parseInt(maxRange.value);
    const count = parseInt(numberCount.value);

    if (min >= max) {
      alert("Минимальное значение должно быть меньше максимального");
      return;
    }

    if (uniqueNumbers.checked && max - min + 1 < count) {
      alert("Невозможно сгенерировать указанное количество уникальных чисел в заданном диапазоне");
      return;
    }

    numberList.innerHTML = "";
    generateBtn.disabled = true;

    numberAnimation.style.display = "block";
    animationInterval = animateNumbers(min, max);

    setTimeout(() => {
      clearInterval(animationInterval);
      let numbers = [];

      if (uniqueNumbers.checked) {
        let availableNumbers = Array.from({ length: max - min + 1 }, (_, i) => min + i);
        for (let i = 0; i < count; i++) {
          const randomIndex = Math.floor(Math.random() * availableNumbers.length);
          numbers.push(availableNumbers.splice(randomIndex, 1)[0]);
        }
      } else {
        for (let i = 0; i < count; i++) {
          numbers.push(getRandomNumber(min, max));
        }
      }

      numberAnimation.style.display = "none";
      numbers.forEach((number, index) => {
        const numberElement = document.createElement("div");
        numberElement.className = "number-item";
        numberElement.textContent = number;
        numberElement.style.animationDelay = `${index * 0.1}s`;
        numberList.appendChild(numberElement);
      });

      generateBtn.disabled = false;
    }, 1500);
  }

  generateBtn.addEventListener("click", generateNumbers);
});
