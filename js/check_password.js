document.addEventListener("DOMContentLoaded", function () {
  const passwordInput = document.getElementById("passwordInput");
  const strengthBar = document.getElementById("strengthBar");
  const strengthText = document.getElementById("strengthText");
  const togglePassword = document.getElementById("togglePassword");
  const suggestions = document.getElementById("suggestions");
  const suggestionsList = document.getElementById("suggestionsList");

  const requirements = {
    length: document.getElementById("length"),
    lowercase: document.getElementById("lowercase"),
    uppercase: document.getElementById("uppercase"),
    numbers: document.getElementById("numbers"),
    special: document.getElementById("special"),
  };

  togglePassword.addEventListener("click", function () {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    togglePassword.innerHTML = type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
  });

  passwordInput.addEventListener("input", checkPassword);

  function checkPassword() {
    const password = passwordInput.value;
    let strength = 0;
    const checks = {
      length: password.length >= 8,
      lowercase: /[a-z]/.test(password),
      uppercase: /[A-Z]/.test(password),
      numbers: /[0-9]/.test(password),
      special: /[!@#$%^&*]/.test(password),
    };

    // Обновляем индикаторы требований
    for (const [key, value] of Object.entries(checks)) {
      const element = requirements[key];
      element.querySelector("i").className = value ? "fas fa-check text-success" : "fas fa-times text-danger";
      if (value) strength++;
    }

    // Обновляем индикатор силы пароля
    const percentage = (strength / 5) * 100;
    strengthBar.style.width = `${percentage}%`;
    strengthBar.className = "strength-bar " + getStrengthClass(strength);
    strengthText.textContent = getStrengthText(strength);

    // Генерируем рекомендации
    generateSuggestions(checks, password);
  }

  function getStrengthClass(strength) {
    if (strength <= 2) return "weak";
    if (strength <= 3) return "medium";
    if (strength <= 4) return "strong";
    return "very-strong";
  }

  function getStrengthText(strength) {
    if (strength === 0) return "Очень слабый";
    if (strength <= 2) return "Слабый";
    if (strength <= 3) return "Средний";
    if (strength <= 4) return "Сильный";
    return "Очень сильный";
  }

  function generateSuggestions(checks, password) {
    const suggestionList = [];

    if (!checks.length) {
      suggestionList.push("Увеличьте длину пароля до 8 или более символов");
    }
    if (!checks.lowercase) {
      suggestionList.push("Добавьте строчные буквы");
    }
    if (!checks.uppercase) {
      suggestionList.push("Добавьте заглавные буквы");
    }
    if (!checks.numbers) {
      suggestionList.push("Добавьте цифры");
    }
    if (!checks.special) {
      suggestionList.push("Добавьте специальные символы");
    }
    if (password && /(.)\1{2,}/.test(password)) {
      suggestionList.push("Избегайте повторяющихся символов");
    }

    if (suggestionList.length > 0) {
      suggestionsList.innerHTML = suggestionList.map((suggestion) => `<li>${suggestion}</li>`).join("");
      suggestions.style.display = "block";
    } else {
      suggestions.style.display = "none";
    }
  }
});
