document.addEventListener("DOMContentLoaded", function () {
  const passwordLength = document.getElementById("passwordLength");
  const passwordCount = document.getElementById("passwordCount");
  const lowercase = document.getElementById("lowercase");
  const uppercase = document.getElementById("uppercase");
  const numbers = document.getElementById("numbers");
  const symbols = document.getElementById("symbols");
  const generateBtn = document.getElementById("generateBtn");
  const passwordList = document.getElementById("passwordList");

  generateBtn.addEventListener("click", generatePasswords);

  function generatePasswords() {
    let charset = "";

    if (lowercase.checked) charset += "abcdefghijklmnopqrstuvwxyz";
    if (uppercase.checked) charset += "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if (numbers.checked) charset += "0123456789";
    if (symbols.checked) charset += "!@#$%^&*";

    if (charset === "") {
      alert("Выберите хотя бы один тип символов");
      return;
    }

    passwordList.innerHTML = "";

    const count = parseInt(passwordCount.value);
    const length = parseInt(passwordLength.value);

    if (length < 4 || length > 128) {
      alert("Длина пароля должна быть от 4 до 128 символов");
      return;
    }

    if (count < 1 || count > 10) {
      alert("Количество паролей должно быть от 1 до 10");
      return;
    }

    for (let i = 0; i < count; i++) {
      let password = "";
      for (let j = 0; j < length; j++) {
        password += charset.charAt(Math.floor(Math.random() * charset.length));
      }

      const passwordItem = document.createElement("div");
      passwordItem.className = "password-item";

      const numberSpan = document.createElement("span");
      numberSpan.className = "password-number";
      numberSpan.textContent = `#${i + 1}`;

      const input = document.createElement("input");
      input.type = "text";
      input.value = password;
      input.readOnly = true;

      const copyBtn = document.createElement("button");
      copyBtn.className = "copy-btn";
      copyBtn.innerHTML = '<i class="fas fa-copy"></i>';

      copyBtn.addEventListener("click", function () {
        input.select();
        document.execCommand("copy");
        copyBtn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(() => {
          copyBtn.innerHTML = '<i class="fas fa-copy"></i>';
        }, 1500);
      });

      passwordItem.appendChild(numberSpan);
      passwordItem.appendChild(input);
      passwordItem.appendChild(copyBtn);
      passwordList.appendChild(passwordItem);
    }
  }

  // Генерируем первый пароль при загрузке
  generatePasswords();
});
