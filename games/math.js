const questionElement = document.querySelector(".question")
const mathForm = document.querySelector(".math-form")
const mathField = document.querySelector(".math-field")
const pointNeeded = document.querySelector(".point-needed")
const mistakes = document.querySelector(".mistakes-made")
const progressBar = document.querySelector(".progress-inner")
const endMessage = document.querySelector(".end-message")
const resetButton = document.querySelector(".start-over")
const timeincrement = document.querySelector(".timer_sec");
const username = document.getElementById("username");
const saveButton = document.getElementById("save-score");

let state = {
    score: 0,
    wrongAnswers: 0,
    sec: 20
}

function updateQuestion() {
    state.currentQuestion = generateQuestion()
    if ((state.currentQuestion.firstNum % state.currentQuestion.secondNum) == 0) {
        state.currentQuestion.operator = "/";
        questionElement.innerHTML = `${state.currentQuestion.firstNum} / ${state.currentQuestion.secondNum}`
    }
    questionElement.innerHTML = `${state.currentQuestion.firstNum} ${state.currentQuestion.operator} ${state.currentQuestion.secondNum}`
    mathField.value = "";
    mathField.focus();
}
updateQuestion()

function getRandomDivBy5(min, max) {
    return getRandomInt(min / 2, max / 2) * 2;
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function generateQuestion() {
    return {
        firstNum: getRandomDivBy5(18, 68),
        secondNum: getRandomDivBy5(2, 16),
        operator: ['+', '-', 'x'][getRandomInt(0, 2)]
    }
}

// timer function
var time = setInterval(myTimer, 1000);

function myTimer() {
    timeincrement.innerHTML = state.sec;
    state.sec--;
    if (state.sec < 0) {
        clearInterval(time);
        endMessage.textContent = "Your score is " + state.score;
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}

mathForm.addEventListener("submit", submitHandler)

function submitHandler(e) {
    e.preventDefault();
    let correctAnswer
    const question = state.currentQuestion;
    if (question.operator == "+") correctAnswer = question.firstNum + question.secondNum;
    if (question.operator == "-") correctAnswer = question.firstNum - question.secondNum;
    if (question.operator == "x") correctAnswer = question.firstNum * question.secondNum;
    if (question.operator == "/") correctAnswer = question.firstNum / question.secondNum;

    if (parseInt(mathField.value, 10) === correctAnswer) {
        state.score += 50;
        state.sec += 5;
        timeincrement.textContent = state.sec
        clearInterval(state.sec);
        myTimer();
        pointNeeded.textContent = state.score;
        updateQuestion();
        renderProgress();
    } else {
        state.wrongAnswers++
        state.sec--
        timeincrement.textContent = state.sec;
        clearInterval(state.sec);
        myTimer();
        mistakes.textContent = 6 - state.wrongAnswers;
        questionElement.classList.add("animate-wrong")
        setTimeout(() => questionElement.classList.remove("animate-wrong"), 451)
        updateQuestion()
    }
    checkstatus()
}

function checkstatus() {
    // you won
    
    if (state.score === 1000) {
        endMessage.textContent = "Congrats! You reached the maximum score!.";
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
    // you lost
    if (state.wrongAnswers === 6) {
        endMessage.textContent = "Try again!";
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}
resetButton.addEventListener("click", resetGame)

function resetGame() {
    document.body.classList.remove("show-overlay")
    updateQuestion()
    var time = setInterval(myTimer, 1000);

function myTimer() {
    timeincrement.innerHTML = state.sec;
    state.sec--;
    if (state.sec < 0) {
        clearInterval(time);
        endMessage.textContent = "Your score is " + state.score;
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}
    state.score = 0;
    state.wrongAnswers = 0;
    state.sec = 20;
    pointNeeded.textContent = 10;
    mistakes.textContent = 6;
    //clearInterval(state.sec);
    //setInterval(myTimer, 1000);
    //myTimer();
    renderProgress()
}

function renderProgress() {
    progressBar.style.transform = `scaleX(${state.score / 1000})`
}

// saving high scores

const MAX_HIGH_SCORES = 5;
const highScores = JSON.parse(localStorage.getItem('highScores')) || [];

//console.log(highScore);


username.addEventListener('keyup', () => {
    saveButton.disabled = !username.value;
})
saveHighscore = e => {
    e.preventDefault();

    const score = {
        score: state.score,
        name: username.value
    };

    highScores.push(score);
    highScores.sort((a, b) => b.score - a.score);
    highScores.splice(5);
    localStorage.setItem("highScores", JSON.stringify(highScores));
    window.location.href = "index.php";
    //console.log(highScores);
}

function navigateScore() {
    window.location.href = "highscore.php";
}
//localStorage.clear();
