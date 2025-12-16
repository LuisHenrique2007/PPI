
const urlParams = new URLSearchParams(window.location.search);
const subject = urlParams.get('subject');
document.getElementById('subject-title').textContent = subject.toUpperCase() + " TEST";

let correctAnswers = 0;
let currentQuestion = 0;
let timeLeft = 30;
let timer;

const questions = {
    vocabulary: [
        { q: "Marque o que NÃO é plural", options: ["They", "He", "We", "Are"], answer: 1 },
        { q: "Choose the correct spelling(escolha a expressão correta):", options: ["Tey", "Morning", "Nigt", "Exuse"], answer: 1 },
        { q: "Translate 'excuse me'", options: ["Obrigado", "Medo", "Com licença", "Tchau"], answer: 2 },
        { q: "Um cara se expressou parecido com: 'Ráu ar iúu?'. O que é isso", options: ["Como vai você?", "Qual o seu nome?", "De onde você é?", "Quem é?"], answer: 0 },
        { q: "Marque a opção que pode ser usada para despedir", options: ["Tiny", "Goodbye", "Hello", "Look"], answer: 1 }
    ],
    grammar: [
        {
            q: "Which sentence is correct?",
            options: ["He go to school.", "He goes to school.", "He gues to school", "School go to the downtown"],
            answer: 1
        },
        {
            q: "Select the past tense of 'run':",
            options: ["Ran", "Running", "Runs", "Run"],
            answer: 0
        },
        {
            q: "Identify the verb in this sentence: 'She reads a book.'",
            options: ["She", "reads", "a", "book"],
            answer: 1
        },
        {
            q: "Which is a correct question form?",
            options: ["You are coming?", "Are you coming?", "Coming are you?", "Is coming you?"],
            answer: 1
        },
        {
            q: "Choose the correct pronoun for: '___ am going to the store.'",
            options: ["Me", "I", "She", "They"],
            answer: 1
        }
    ],
    reading: [
        {
            q: "What is the main idea of a passage?",
            options: ["A detail", "A summary", "The author’s name"],
            answer: 1
        },
        {
            q: "What do supporting details do?",
            options: ["Explain the main idea", "Change the topic", "Tell a joke", "None of these"],
            answer: 0
        },
        {
            q: "Which of these is a fiction genre?",
            options: ["Biography", "Mystery", "News Article", "Autobiography"],
            answer: 1
        },
        {
            q: "What is an author’s purpose in a persuasive text?",
            options: ["To entertain", "To convince", "To inform", "To confuse"],
            answer: 1
        },
        {
            q: "What is a synonym for 'conclusion'?",
            options: ["Beginning", "Middle", "End", "None"],
            answer: 2
        }
    ]
};

const quiz = questions[subject] || [];
const timeDisplay = document.getElementById('time');
const questionText = document.getElementById('question');
const optionsContainer = document.getElementById('options');


function startTimer() {
    timer = setInterval(() => {
        if (timeLeft > 0) {
            timeLeft--;
            timeDisplay.textContent = timeLeft;
        } else {
            currentQuestion++
            loadQuestion();
        }
    }, 1000);
}


function loadQuestion() {
    if (currentQuestion < quiz.length) {
        const qData = quiz[currentQuestion];
        questionText.textContent = qData.q;
        optionsContainer.innerHTML = "";
        timeLeft = 30;
        timeDisplay.textContent = timeLeft;
        qData.options.forEach((option, index) => {
            const btn = document.createElement("button");
            btn.textContent = option;
            btn.classList.add("option-button");
            btn.onclick = () => checkAnswer(index, qData.options.indexOf(qData.options[qData.answer]));
            optionsContainer.appendChild(btn);
        });
    } else {
        finishQuiz();
    }

    localStorage.setItem('currentQuestion', currentQuestion);
    localStorage.setItem('correctAnswers', correctAnswers);
}


function checkAnswer(selected, correct) {
    const buttons = document.querySelectorAll(".option-button");
    if (selected === correct) {
        buttons[selected].style.background = "green";
        correctAnswers++;
    } else {
        buttons[selected].style.background = "red";
        buttons[correct].style.background = "green";
    }

    setTimeout(() => {
        currentQuestion++;
        loadQuestion();
    }, 1000);
}


function finishQuiz() {
    clearInterval(timer);
    localStorage.clear();
    window.location.href = "principal.php?n" + subject + "=" + correctAnswers * 2;
}
startTimer();
loadQuestion();