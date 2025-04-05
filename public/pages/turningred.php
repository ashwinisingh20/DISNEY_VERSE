<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turning Red - Movie Summary | DisneyVerse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #8b0000, #ff6f61);
            color: #ffffff;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
        }
        h1 {
            color: #ffc0cb;
        }
        h2, h3 {
            color: #ffe4e1;
        }
        .highlight {
            background: rgba(255, 182, 193, 0.2);
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            color: #ffffff;
        }
        .image-container img {
            width: 100%;
            border-radius: 10px;
        }
        .poll, .comments {
            margin-top: 20px;
            text-align: left;
        }
        .poll-options {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .poll button {
            flex: 1 1 30%;
            min-width: 150px;
            background: #ffc0cb;
            color: #8b0000;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }
        .poll-results {
            margin-top: 15px;
            font-weight: bold;
            color: #ffe4e1;
        }
        @media (max-width: 600px) {
            .poll-options {
                flex-direction: column;
            }
            .poll button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Turning Red (2022)</h1>
        <p><strong>Directed by:</strong> Domee Shi | <strong>IMDb Rating:</strong> 7.0/10</p>
        
        <div class="image-container">
            <img src="assets/images/turningred.jpg" alt="Turning Red Movie Poster">
        </div>
        
        <h2>📌 Movie Summary</h2>
        <p>13-year-old Meilin "Mei" Lee discovers that strong emotions cause her to transform into a giant red panda. As she navigates friendships, family expectations, and self-acceptance, she embarks on a hilarious and heartfelt journey of growing up.</p>
        
        <h2>🌟 Key Highlights</h2>
        <p class="highlight">✅ Vibrant Animation | ✅ Cultural Representation | ✅ Coming-of-Age Story | ✅ Emotional & Funny | ✅ Amazing Soundtrack</p>
        
        <div class="poll">
            <h3>🗳️ Vote for Your Favorite Scene!</h3>
            <div class="poll-options">
                <button onclick="castVote(0)">Panda Transformation</button>
                <button onclick="castVote(1)">Boy Band Concert</button>
                <button onclick="castVote(2)">Mother-Daughter Moments</button>
            </div>
            <div class="poll-results" id="pollResults">
                <!-- Poll results will appear here -->
            </div>
        </div>
    </div>

    <script>
        let votes = [0, 0, 0];
        let voted = false;

        function castVote(index) {
            if (voted) return;
            votes[index]++;
            voted = true;

            const buttons = document.querySelectorAll('.poll-options button');
            buttons.forEach(btn => btn.disabled = true);

            updateResults();
        }

        function updateResults() {
            const total = votes.reduce((a, b) => a + b, 0);
            const results = document.getElementById("pollResults");
            results.innerHTML = `
                🐼 Panda Transformation – ${getPercent(votes[0], total)}%<br>
                🎤 Boy Band Concert – ${getPercent(votes[1], total)}%<br>
                👩‍👧 Mother-Daughter Moments – ${getPercent(votes[2], total)}%
            `;
        }

        function getPercent(value, total) {
            return total ? ((value / total) * 100).toFixed(1) : 0;
        }
    </script>
</body>
</html>
