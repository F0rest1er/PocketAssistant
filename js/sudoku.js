document.addEventListener("DOMContentLoaded", () => {
  const boardElement = document.getElementById("sudoku-board");
  const messageElement = document.getElementById("sudoku-message");
  const difficultySelect = document.getElementById("difficulty");
  const newGameButton = document.getElementById("new-game");
  const resetButton = document.getElementById("reset-game");
  const confirmButton = document.getElementById("confirm-game");

  let board = [];
  let initialBoard = [];
  let solvedBoard = [];

  function generateSudoku(difficulty) {
    const emptyBoard = Array.from({ length: 9 }, () => Array(9).fill(0));
    const newBoard = generateRandomSudoku(emptyBoard, difficulty);
    board = newBoard.board;
    initialBoard = newBoard.board.map((row) => [...row]);
    solvedBoard = newBoard.solution;
    renderBoard();
    showMessage("");
  }

  function renderBoard() {
    boardElement.innerHTML = "";
    for (let i = 0; i < 9; i++) {
      for (let j = 0; j < 9; j++) {
        const cell = document.createElement("div");
        cell.classList.add("sudoku-cell");
        if (initialBoard[i][j] !== 0) {
          cell.textContent = initialBoard[i][j];
          cell.classList.add("fixed");
        } else {
          cell.contentEditable = true;
          cell.classList.add("editable");
          cell.addEventListener("input", (e) => {
            const value = parseInt(e.target.textContent);
            if (value >= 1 && value <= 9) {
              board[i][j] = value;
              e.target.classList.remove("error");
              showMessage("");
            } else {
              e.target.textContent = "";
            }
          });
        }
        boardElement.appendChild(cell);
      }
    }
  }

  function checkWin() {
    if (JSON.stringify(board) === JSON.stringify(solvedBoard)) {
      showMessage("Поздравляем! Вы решили судоку!", "win");
    }
  }

  function confirmGame() {
    let hasErrors = false;
    for (let i = 0; i < 9; i++) {
      for (let j = 0; j < 9; j++) {
        const cell = boardElement.children[i * 9 + j];
        if (initialBoard[i][j] === 0 && board[i][j] !== 0 && !isValidMove(board, i, j, board[i][j])) {
          cell.classList.add("error");
          hasErrors = true;
        } else {
          cell.classList.remove("error");
        }
      }
    }
    if (hasErrors) {
      showMessage("Есть ошибки! Проверьте выделенные клетки.", "error");
    } else {
      showMessage("Все правильно! Продолжайте.", "success");
      checkWin();
    }
  }

  function resetGame() {
    board = initialBoard.map((row) => [...row]);
    renderBoard();
    showMessage("");
  }

  function showMessage(message, type = "") {
    messageElement.textContent = message;
    messageElement.className = type;
  }

  difficultySelect.addEventListener("change", () => {
    generateSudoku(difficultySelect.value);
  });

  newGameButton.addEventListener("click", () => {
    generateSudoku(difficultySelect.value);
  });

  resetButton.addEventListener("click", resetGame);

  confirmButton.addEventListener("click", confirmGame);

  generateSudoku(difficultySelect.value);
});

function generateRandomSudoku(board, difficulty) {
  const solution = solveSudoku(board);
  if (!solution) return { board: [], solution: [] };

  const puzzle = JSON.parse(JSON.stringify(solution));

  let cellsToRemove;
  switch (difficulty) {
    case "easy":
      cellsToRemove = 30;
      break;
    case "medium":
      cellsToRemove = 45;
      break;
    case "hard":
      cellsToRemove = 60;
      break;
    default:
      cellsToRemove = 30;
  }

  for (let i = 0; i < cellsToRemove; i++) {
    let row, col;
    do {
      row = Math.floor(Math.random() * 9);
      col = Math.floor(Math.random() * 9);
    } while (puzzle[row][col] === 0);
    puzzle[row][col] = 0;
  }

  return {
    board: puzzle,
    solution: solution,
  };
}

function solveSudoku(board) {
  const emptyCell = findEmptyCell(board);
  if (!emptyCell) return board;

  const [row, col] = emptyCell;

  const numbers = shuffleArray([1, 2, 3, 4, 5, 6, 7, 8, 9]);

  for (let num of numbers) {
    if (isValidMove(board, row, col, num)) {
      board[row][col] = num;

      if (solveSudoku(board)) {
        return board;
      }

      board[row][col] = 0;
    }
  }

  return false;
}

function findEmptyCell(board) {
  for (let i = 0; i < 9; i++) {
    for (let j = 0; j < 9; j++) {
      if (board[i][j] === 0) {
        return [i, j];
      }
    }
  }
  return null;
}

function isValidMove(board, row, col, num) {
  for (let i = 0; i < 9; i++) {
    if (board[row][i] === num || board[i][col] === num) {
      return false;
    }
  }

  const startRow = Math.floor(row / 3) * 3;
  const startCol = Math.floor(col / 3) * 3;
  for (let i = 0; i < 3; i++) {
    for (let j = 0; j < 3; j++) {
      if (board[startRow + i][startCol + j] === num) {
        return false;
      }
    }
  }

  return true;
}

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}
