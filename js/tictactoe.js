document.addEventListener("DOMContentLoaded", () => {
  const gameBoard = document.getElementById("gameBoard");
  const status = document.getElementById("status");
  const playerSymbolSelect = document.getElementById("playerSymbol");
  const difficultySelect = document.getElementById("difficulty");
  const gameModeSelect = document.getElementById("gameMode");
  const startGameButton = document.getElementById("startGame");

  let board = ["", "", "", "", "", "", "", "", ""];
  let currentPlayer = "X";
  let gameActive = false;
  let gameMode = "single";
  let playerSymbol = "X";
  let botSymbol = "O";
  let difficulty = "easy";

  const winningConditions = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];

  function checkWin() {
    for (let condition of winningConditions) {
      const [a, b, c] = condition;
      if (board[a] && board[a] === board[b] && board[a] === board[c]) {
        return board[a];
      }
    }
    return board.includes("") ? null : "T";
  }

  function handleCellClick(event) {
    const cell = event.target;
    const index = cell.getAttribute("data-index");

    if (board[index] !== "" || !gameActive) return;

    board[index] = currentPlayer;
    cell.textContent = currentPlayer;
    cell.classList.add(currentPlayer);

    const winner = checkWin();
    if (winner) {
      endGame(winner);
      return;
    }

    currentPlayer = currentPlayer === "X" ? "O" : "X";
    status.textContent = `Ход игрока: ${currentPlayer}`;

    if (gameMode === "single" && currentPlayer === botSymbol) {
      botMove();
    }
  }

  function botMove() {
    let move;
    if (difficulty === "easy") {
      move = getRandomMove();
    } else if (difficulty === "medium") {
      move = getMediumMove();
    } else {
      move = getHardMove();
    }

    board[move] = botSymbol;
    const cell = document.querySelector(`.cell[data-index="${move}"]`);
    cell.textContent = botSymbol;
    cell.classList.add(botSymbol);

    const winner = checkWin();
    if (winner) {
      endGame(winner);
      return;
    }

    currentPlayer = playerSymbol;
    status.textContent = `Ход игрока: ${currentPlayer}`;
  }

  function getRandomMove() {
    let available = board.map((val, idx) => (val === "" ? idx : null)).filter((val) => val !== null);
    return available[Math.floor(Math.random() * available.length)];
  }

  function getMediumMove() {
    for (let symbol of [botSymbol, playerSymbol]) {
      for (let condition of winningConditions) {
        const [a, b, c] = condition;
        if (board[a] === symbol && board[b] === symbol && board[c] === "") return c;
        if (board[a] === symbol && board[c] === symbol && board[b] === "") return b;
        if (board[b] === symbol && board[c] === symbol && board[a] === "") return a;
      }
    }
    return getRandomMove();
  }

  function getHardMove() {
    let bestScore = -Infinity;
    let move;
    for (let i = 0; i < board.length; i++) {
      if (board[i] === "") {
        board[i] = botSymbol;
        let score = minimax(board, 0, false);
        board[i] = "";
        if (score > bestScore) {
          bestScore = score;
          move = i;
        }
      }
    }
    return move;
  }

  function minimax(board, depth, isMaximizing) {
    const winner = checkWin();
    if (winner === botSymbol) return 10 - depth;
    if (winner === playerSymbol) return depth - 10;
    if (winner === "T") return 0;

    if (isMaximizing) {
      let bestScore = -Infinity;
      for (let i = 0; i < board.length; i++) {
        if (board[i] === "") {
          board[i] = botSymbol;
          let score = minimax(board, depth + 1, false);
          board[i] = "";
          bestScore = Math.max(score, bestScore);
        }
      }
      return bestScore;
    } else {
      let bestScore = Infinity;
      for (let i = 0; i < board.length; i++) {
        if (board[i] === "") {
          board[i] = playerSymbol;
          let score = minimax(board, depth + 1, true);
          board[i] = "";
          bestScore = Math.min(score, bestScore);
        }
      }
      return bestScore;
    }
  }

  function endGame(winner) {
    gameActive = false;
    if (winner === "T") {
      status.textContent = "Ничья!";
    } else {
      if (gameMode === "single") {
        status.textContent = `Победил ${winner === playerSymbol ? "Вы" : "Бот"}!`;
      } else {
        status.textContent = `Победил ${winner === "X" ? "X" : "O"}!`;
      }
    }
  }

  function resetGame() {
    board = ["", "", "", "", "", "", "", "", ""];
    currentPlayer = "X";
    gameActive = true;
    status.textContent = `Ход игрока: ${currentPlayer}`;
    document.querySelectorAll(".cell").forEach((cell) => {
      cell.textContent = "";
      cell.classList.remove("X", "O");
    });
  }

  startGameButton.addEventListener("click", () => {
    playerSymbol = playerSymbolSelect.value;
    botSymbol = playerSymbol === "X" ? "O" : "X";
    difficulty = difficultySelect.value;
    gameMode = gameModeSelect.value;
    resetGame();
  });

  document.querySelectorAll(".cell").forEach((cell) => {
    cell.addEventListener("click", handleCellClick);
  });
});
