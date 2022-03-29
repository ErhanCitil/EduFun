const highScoreList = document.querySelector(".leaderboard");
const highScores = JSON.parse(localStorage.getItem("highScores")) || [];
const saveButton = document.getElementById("save-score");
const username = document.getElementById("username");
highScoreList.innerHTML = highScores
.map(score => {
   return `<div class="navbar-gebruikers">
    <div class="resultaat-kolom">
      <span class="resultaat-naam">${score.name}</span>
    </div>
    <div class="resultaat-kolom">
      <span class="resultaat-punten">${score.score}</span>
    </div>
  </div>`;
}).join("");
// console.log(highScores)

// // back to home-page

// function navigateHome() {
//   window.location.href = "index.php";
// }