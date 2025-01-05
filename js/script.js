const mobileMenu = document.getElementById("mobileMenu");
const navLinks = document.querySelector(".nav-links");

mobileMenu.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  mobileMenu.classList.toggle("active");
});

document.addEventListener("click", (e) => {
  if (!e.target.closest(".nav-links") && !e.target.closest(".mobile-menu")) {
    navLinks.classList.remove("active");
    mobileMenu.classList.remove("active");
  }
});

window.addEventListener("resize", () => {
  if (window.innerWidth > 768) {
    navLinks.classList.remove("active");
    mobileMenu.classList.remove("active");
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const phoneInput = document.getElementById("phoneNumber");
  const searchBtn = document.getElementById("searchBtn");
  const resultDiv = document.getElementById("result");
  const themeToggle = document.getElementById("themeToggle");

  const savedTheme = localStorage.getItem("theme") || "light";
  document.documentElement.setAttribute("data-theme", savedTheme);

  themeToggle.addEventListener("click", () => {
    const currentTheme = document.documentElement.getAttribute("data-theme");
    const newTheme = currentTheme === "light" ? "dark" : "light";

    document.documentElement.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
  });

  phoneInput.addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D+/g, "");
    let formatted = "";

    if (value.length > 0) {
      formatted = "+";
      if (value.length > 0) {
        formatted += value.substring(0, 1);
      }
      if (value.length > 1) {
        formatted += " (" + value.substring(1, 4);
      }
      if (value.length > 4) {
        formatted += ") " + value.substring(4, 7);
      }
      if (value.length > 7) {
        formatted += "-" + value.substring(7, 9);
      }
      if (value.length > 9) {
        formatted += "-" + value.substring(9, 11);
      }
    }

    e.target.value = formatted;
  });

  searchBtn.addEventListener("click", searchPhone);

  function searchPhone() {
    const phone = phoneInput.value.replace(/\D+/g, "");

    if (phone.length < 11) {
      alert("Пожалуйста, введите корректный номер телефона");
      return;
    }

    resultDiv.innerHTML = '<div class="loading">Поиск информации...</div>';
    resultDiv.classList.add("active");
    searchBtn.disabled = true;

    fetch("search.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ phone: phone }),
    })
      .then((response) => response.json())
      .then((data) => {
        displayResult(data);
      })
      .catch((error) => {
        console.error("Ошибка:", error);
        resultDiv.innerHTML = '<div class="error">Произошла ошибка при поиске информации</div>';
      })
      .finally(() => {
        searchBtn.disabled = false;
      });
  }

  function displayResult(data) {
    resultDiv.innerHTML = "";
    resultDiv.classList.add("active");

    if (data.error) {
      resultDiv.innerHTML = `<div class="info-item">${data.error}</div>`;
      return;
    }

    for (const [key, value] of Object.entries(data)) {
      resultDiv.innerHTML += `
                <div class="info-item">
                    <strong>${key}:</strong> ${value}
                </div>
            `;
    }
  }
});
