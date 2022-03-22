const questionElement = document.querySelector(".question")
const mathForm = document.querySelector(".math-form")
const mathField = document.querySelector(".math-field")
const pointNeeded = document.querySelector(".point-needed")
const mistakes = document.querySelector(".mistakes-made")
const progressBar = document.querySelector(".progress-inner")
const endMessage = document.querySelector(".end-message")
const resetButton = document.querySelector(".start-over")

let state = {
    score: 0,
    wrongAnswers: 0
}

function updateQuestion() {
    state.currentQuestion = generateQuestion()
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
        firstNum: getRandomDivBy5(10, 20),
        secondNum: getRandomDivBy5(2, 10),
        operator: ['+', '-', 'x', '/'][getRandomInt(0, 3)]
    }
}

mathForm.addEventListener("submit", submitHandler)
function round(num, decimalPlaces = 2) {
    var p = Math.pow(10, decimalPlaces);
    return Math.round(num * p) / p;
}
function submitHandler(e) {
    e.preventDefault();
    let correctAnswer
    const question = state.currentQuestion;
    if (question.operator == "+") correctAnswer = question.firstNum + question.secondNum;
    if (question.operator == "-") correctAnswer = question.firstNum - question.secondNum;
    if (question.operator == "x") correctAnswer = question.firstNum * question.secondNum;
    if (question.operator == "/") correctAnswer = Math.round(question.firstNum / question.secondNum);

    if (parseInt(Math.round(mathField.value), 10) === correctAnswer) {
        state.score++
        pointNeeded.textContent = 10 - state.score;
        updateQuestion()
        renderProgress()
    } else {
        state.wrongAnswers++
        mistakes.textContent = 2 - state.wrongAnswers;
        questionElement.classList.add("animate-wrong")
        setTimeout(() => questionElement.classList.remove("animate-wrong"), 451)
        updateQuestion()
    }
    checkstatus()
}

function checkstatus() {
    // you won
    if (state.score === 10) {
        endMessage.textContent = "Congrats! You won.";
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
    // you lost
    if (state.wrongAnswers === 3) {
        endMessage.textContent = "Sorry! You lost.";
        document.body.classList.add("show-overlay")
        setTimeout(() => resetButton.focus(), 330)
    }
}
resetButton.addEventListener("click", resetGame)

function resetGame() {
    document.body.classList.remove("show-overlay")
    updateQuestion()
    state.score = 0;
    state.wrongAnswers = 0;
    pointNeeded.textContent = 10;
    mistakes.textContent = 2;
    renderProgress()
}

function renderProgress() {
    progressBar.style.transform = `scaleX(${state.score / 10})`
}