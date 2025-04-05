<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disney Sorting Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  
        <style>
        body {
            background: linear-gradient(120deg, #ff6f61, #ffcc5c);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding: 20px;
        }
        .quiz-container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
            text-align: center;
            width: 60%;
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }
        h1 {
            font-size: 2.5em;
            font-family: 'Fredoka One', cursive;
            margin-bottom: 20px;
            text-shadow: 3px 3px 10px rgba(255, 255, 255, 0.5);
        }
        .question {
            font-size: 1.3em;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .options label {
            display: block;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            margin: 10px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1em;
            font-weight: bold;
        }
        .options label:hover {
            background: #ffeb3b;
            color: #1e1e2f;
            transform: scale(1.05);
        }
        .options input {
            display: none;
        }
        .options input:checked + label {
            background: #ff5722;
            color: white;
            transform: scale(1.1);
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.5);
        }
        .btn {
            background: linear-gradient(45deg, #ff4081, #ff1744);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 1.1em;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.3);
        }
        .btn:hover {
            background: linear-gradient(45deg, #d50000, #c51162);
            transform: scale(1.1);
        }
        .result-container {
            display: none;
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 60%;
            margin: 20px auto;
            box-shadow: 0px 4px 15px rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }
    </style>
   
</head>
<body>
    <h1>Find Your Disney Universe!</h1>
    <div class="quiz-container" id="quiz-container">
        <h2>Answer these questions to get sorted!</h2>
        <div id="question-container">
            <p class="question" id="question-text"></p>
            <div class="options" id="answers"></div>
        </div>
        <button class="btn" id="next-button" onclick="nextQuestion()">Next</button>
        <button class="btn" id="submit-button" onclick="submitQuiz()" style="display:none;">Get My Result</button>
    </div>
    <div class="result-container" id="result-container">
        <h2>Your Disney Universe</h2>
        <p id="result-text"></p>
        <button class="btn" onclick="restartQuiz()">Retake Quiz</button>
        <button class="btn" onclick="window.location.href='newhomepage.php'">Previous page</button>
    </div>

    <script>
       const questions = [
    {
        text: "What's your ideal adventure?",
        options: [
            { text: "A heartwarming journey", value: "pixar" },
            { text: "A magical fairytale", value: "disney" },
            { text: "A heroic battle", value: "marvel" }
        ]
    },
    {
        text: "Which character do you relate to most?",
        options: [
            { text: "Woody (Toy Story)", value: "pixar" },
            { text: "Elsa (Frozen)", value: "disney" },
            { text: "Iron Man", value: "marvel" }
        ]
    },
    {
        text: "Choose a setting:",
        options: [
            { text: "A small but wonderful world", value: "pixar" },
            { text: "A magical kingdom", value: "disney" },
            { text: "A futuristic city", value: "marvel" }
        ]
    }
];

let currentQuestionIndex = 0;
let scores = { pixar: 0, disney: 0, marvel: 0 };

function showQuestion() {
    document.getElementById("answers").innerHTML = "";
    document.getElementById("question-text").innerText = questions[currentQuestionIndex].text;
    questions[currentQuestionIndex].options.forEach(option => {
        let label = document.createElement("label");
        label.innerHTML = `<input type="radio" name="question" value="${option.value}" onchange="highlightSelection(this)"> ${option.text}`;
        document.getElementById("answers").appendChild(label);
    });
}

function highlightSelection(input) {
    document.querySelectorAll('.options label').forEach(label => {
        label.style.background = 'rgba(255, 255, 255, 0.2)';
        label.style.color = '#fff';
        label.style.transform = 'scale(1)';
    });
    input.parentElement.style.background = '#ff5722';
    input.parentElement.style.color = 'white';
    input.parentElement.style.transform = 'scale(1.1)';
}

function nextQuestion() {
    let selected = document.querySelector('input[name="question"]:checked');
    if (!selected) {
        alert("Please select an answer!");
        return;
    }
    scores[selected.value]++;
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        document.getElementById("quiz-container").style.display = "none";
        document.getElementById("result-container").style.display = "block";
        let sortedHouse = Object.keys(scores).reduce((a, b) => scores[a] > scores[b] ? a : b);
        document.getElementById("result-text").innerText = `You belong to: ${sortedHouse}`;
    }
}

function restartQuiz() {
    location.reload();
}

showQuestion();

    </script>
</body>
</html>
