const questions = [
    {
        question: "What is the capital of Tamil Nadu?",
        options: ["Chennai", "Mumbai", "Paris", "Rome"],
        answer: "Chennai"
    },
    {
        question: "Which planet is known as the Red Planet?",
        options: ["Earth", "Mars", "Venus", "Jupiter"],
        answer: "Mars"
    },
    {
        question: "What is the capital of Maharashtra?",
        options: ["Chennai", "Mumbai", "Paris", "Rome"],
        answer: "Mumbai"
    },  
    {
        question: "What is the capital of Madhya Pradesh?",
        options: ["Bhopal", "Mumbai", "Paris", "Rome"],
        answer: "Bhopal"
    }, 
    {
        question:"What is the currency of Japan?",
        options: ["Yen", "Dollar", "Euro", "Pound"],
        answer: "Yen"
    }, 
    {
        question:"Who is the Prime Minister of India?",
        options: ["Narendra Modi", "Rajiv Gandhi", "Rahul Gandhi", "Nitish Kumar"],
        answer: "Narendra Modi"
    }, 
    {
        question:"Which Programming Language does not Support OPPS Concept?",
        options: ["C", "C++", "JAVA", "None of these"],
        answer: "C"
    }, 
    {
        question: "What is the capital of Tamil Nadu?",
        options: ["Chennai", "Mumbai", "Paris", "Rome"],
        answer: "Chennai"
    },
    {
        question: "Which planet is known as the Red Planet?",
        options: ["Earth", "Mars", "Venus", "Jupiter"],
        answer: "Mars"
    },
    {
        question: "What is the capital of Maharashtra?",
        options: ["Chennai", "Mumbai", "Paris", "Rome"],
        answer: "Mumbai"
    },  
    {
        question: "What is the capital of Madhya Pradesh?",
        options: ["Bhopal", "Mumbai", "Paris", "Rome"],
        answer: "Bhopal"
    }, 
    {
        question:"What is the currency of Japan?",
        options: ["Yen", "Dollar", "Euro", "Pound"],
        answer: "Yen"
    }, 
    {
        question:"Who is the Prime Minister of India?",
        options: ["Narendra Modi", "Rajiv Gandhi", "Rahul Gandhi", "Nitish Kumar"],
        answer: "Narendra Modi"
    }, 
    {
        question:"Which Programming Language does not Support OPPS Concept?",
        options: ["C", "C++", "JAVA", "None of these"],
        answer: "C"
    }, 
    {
        question: "What is the capital of Tamil Nadu?",
        options: ["Chennai", "Mumbai", "Paris", "Rome"],
        answer: "Chennai"
    },
    {
        question: "Which planet is known as the Red Planet?",
        options: ["Earth", "Mars", "Venus", "Jupiter"],
        answer: "Mars"
    },
    {
        question: "What is the capital of Maharashtra?",
        options: ["Chennai", "Mumbai", "Paris", "Rome"],
        answer: "Mumbai"
    },  
    {
        question: "What is the capital of Madhya Pradesh?",
        options: ["Bhopal", "Mumbai", "Paris", "Rome"],
        answer: "Bhopal"
    }, 
    {
        question:"What is the currency of Japan?",
        options: ["Yen", "Dollar", "Euro", "Pound"],
        answer: "Yen"
    }, 

    {
        question:"Which Programming Language does not Support OPPS Concept?",
        options: ["C", "C++", "JAVA", "None of these"],
        answer: "C"
    }, 
];

let currentQuestionIndex = 0;
let score = 0;

const questionElement = document.getElementById("question");
const optionsContainer = document.getElementById("options-container");
const nextButton = document.getElementById("next-button");
const scoreElement = document.getElementById("score");

function displayQuestion() {
    const currentQuestion = questions[currentQuestionIndex];
    questionElement.textContent = currentQuestion.question;

    optionsContainer.innerHTML = "";

    currentQuestion.options.forEach((option, index) => {
        const optionElement = document.createElement("button");
        optionElement.textContent = option;
        optionElement.addEventListener("click", () => checkAnswer(option));
        optionsContainer.appendChild(optionElement);
    });
}

function checkAnswer(selectedOption) {
    const currentQuestion = questions[currentQuestionIndex];

    if (selectedOption === currentQuestion.answer) {
        score++;
    }

    currentQuestionIndex++;

    if (currentQuestionIndex < questions.length) {
        displayQuestion();
    } else {
        endQuiz();
    }
}

function endQuiz() {
    questionElement.textContent = "Quiz complete!";
    optionsContainer.innerHTML = "";
    nextButton.style.display = "none";
    scoreElement.textContent = `Score: ${score} out of ${questions.length}`;
}

nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < questions.length) {
        displayQuestion();
    } else {
        endQuiz();
    }
});

displayQuestion();
