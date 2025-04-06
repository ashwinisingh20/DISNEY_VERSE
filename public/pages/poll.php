<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DisneyVerse - Quizzes, Facts, and Polls</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f7ebd6;
            color: #333;
        }

        header {
            background: linear-gradient(to right, #ff6b6b, #ffcc5c);
            color: white;
            padding: 15px 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            background: #ffcc5c;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .content-section {
            text-align: center;
            padding: 50px 20px;
        }

        h2 {
            font-size: 36px;
            color: #d6336c;
            margin-bottom: 20px;
        }

        .quiz-list, .fact-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .quiz-item, .fact-item {
            background: white;
            padding: 20px;
            margin: 15px;
            width: 300px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .quiz-item:hover, .fact-item:hover {
            transform: scale(1.05);
        }

        .quiz-item h3, .fact-item h3 {
            color: #ff6b6b;
        }

        .quiz-link {
            display: inline-block;
            background: #ff6b6b;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .quiz-link:hover {
            background: #d6336c;
        }

        .poll-item {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            margin-top: 30px;
        }

        #pollResult {
            background-color: #f0f8ff;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }

        button {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #d6336c;
        }

        @media (max-width: 768px) {
            .quiz-item, .fact-item {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .quiz-item, .fact-item {
                width: 100%;
            }
        }

        footer {
            background: #2a2a2a;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>DisneyVerse - Quizzes, Facts, and Polls</header>
    <nav>
        <ul>
            <li><a href="newhomepage.php">Home</a></li>
            <li><a href="summary_page.php">Summaries</a></li>
            <li><a href="#polls">News</a></li>
            <li><a href="#quizzes">Quizzes</a></li>
            <li><a href="#facts">Facts</a></li>
            <li><a href="#polls">Polls</a></li>
        </ul>
    </nav>

    <main>
        <section id="quizzes" class="content-section">
            <h2>Disney Quizzes</h2>
            <div class="quiz-list">
                <div class="quiz-item">
                    <h3>Which Disney Princess Are You?</h3>
                    <a href="princess_quiz.php" class="quiz-link">Take the Quiz</a>
                </div>
                <div class="quiz-item">
                    <h3>How Well Do You Know Disney Villains?</h3>
                    <a href="villain_quiz.php" class="quiz-link">Take the Quiz</a>
                </div>
                <div class="quiz-item">
                    <h3>Which Disney Movie Should You Star In?</h3>
                    <a href="moviestarring_quiz.php" class="quiz-link">Take the Quiz</a>
                </div>
            </div>
        </section>

        <?php
$conn = new mysqli("localhost", "root", "", "disney");
$result = $conn->query("SELECT * FROM fun_facts ORDER BY id DESC LIMIT 6");
?>

<section id="facts" class="content-section">
    <h2>Disney Fun Facts</h2>
    <div class="fact-list">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="fact-item">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><?php echo htmlspecialchars($row['content']); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>

        <section id="polls" class="content-section">
            <h2>Disney Polls</h2>
            <div class="poll-item">
                <h3>Which Disney Movie Is Your Favorite?</h3>
                <form id="moviePollForm" onsubmit="return handlePollSubmit(event)">
                    <label><input type="radio" name="movie_poll" value="Frozen" required> Frozen</label><br>
                    <label><input type="radio" name="movie_poll" value="The Lion King" required> The Lion King</label><br>
                    <label><input type="radio" name="movie_poll" value="Toy Story" required> Toy Story</label><br>
                    <label><input type="radio" name="movie_poll" value="Aladdin" required> Aladdin</label><br><br>
                    <button class="quiz-link" type="submit">Vote</button>
                </form>

                <div id="pollResult" style="display:none;">
                    <h4>Poll Results:</h4>
                    <p id="resultText"></p>
                    <div id="resultPercentage"></div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        &copy; <?php echo date("Y"); ?> DisneyVerse. All rights reserved.
    </footer>

    <script>
        let pollData = {
            "Frozen": 0,
            "The Lion King": 0,
            "Toy Story": 0,
            "Aladdin": 0,
            "totalVotes": 0
        };

        function handlePollSubmit(event) {
            event.preventDefault();
            const form = document.getElementById('moviePollForm');
            const selectedOption = form.movie_poll.value;
            if (!selectedOption) {
                alert("Please select a movie before submitting!");
                return;
            }
            pollData[selectedOption]++;
            pollData.totalVotes++;
            displayPollResult();
        }

        function displayPollResult() {
            const resultText = document.getElementById('resultText');
            const resultPercentage = document.getElementById('resultPercentage');
            const resultDiv = document.getElementById('pollResult');
            const form = document.getElementById('moviePollForm');

            let highestVoteCount = 0;
            let highestVoteOption = '';
            for (const option in pollData) {
                if (pollData[option] > highestVoteCount && option !== 'totalVotes') {
                    highestVoteCount = pollData[option];
                    highestVoteOption = option;
                }
            }

            const percentage = ((highestVoteCount / pollData.totalVotes) * 100).toFixed(2);
            resultText.textContent = `${highestVoteOption} is currently leading with ${highestVoteCount} votes.`;
            resultPercentage.textContent = `${highestVoteOption} has ${percentage}% of the total votes.`;
            resultDiv.style.display = 'block';
            form.querySelector('button').disabled = true;
        }

        function adjustLayoutForResponsiveDesign() {
            const resultText = document.getElementById('resultText');
            const resultPercentage = document.getElementById('resultPercentage');
            if (window.innerWidth <= 480) {
                resultText.style.fontSize = '1rem';
                resultPercentage.style.fontSize = '1rem';
            } else {
                resultText.style.fontSize = '1.2rem';
                resultPercentage.style.fontSize = '1.2rem';
            }
        }

        window.addEventListener('load', adjustLayoutForResponsiveDesign);
        window.addEventListener('resize', adjustLayoutForResponsiveDesign);

        function setupAccessibility() {
            const pollFormButton = document.querySelector('button[type="submit"]');
            pollFormButton.setAttribute('aria-label', 'Submit Poll');
        }

        setupAccessibility();
    </script>
</body>
</html>
