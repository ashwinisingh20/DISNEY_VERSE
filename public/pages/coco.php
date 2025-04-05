<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coco - Movie Summary | DisneyVerse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #1a1a2e, #16213e);
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
            color: #ffcc80;
        }
        .highlight {
            background: rgba(255, 204, 128, 0.2);
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
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
            background: #ffcc80;
            color: #1a1a2e;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
            flex: 1 1 30%;
            min-width: 150px;
        }
        .poll-results {
            margin-top: 15px;
            font-weight: bold;
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
        <h1>Coco (2017)</h1>
        <p><strong>Directed by:</strong> Lee Unkrich & Adrian Molina | <strong>IMDb Rating:</strong> 8.4/10</p>
        
        <div class="image-container">
            <!-- Replace with your correct relative path or hosted image -->
            <img src="assets/images/coco.avif" alt="Coco Movie Poster">
        </div>
        
        <h2>📌 Movie Summary</h2>
        <p>Young Miguel dreams of becoming a musician like his idol, Ernesto de la Cruz. However, his family has banned music for generations. On Día de los Muertos, Miguel embarks on a journey to the Land of the Dead, where he uncovers hidden family secrets and learns the true meaning of remembrance, love, and pursuing one’s passion.</p>
        
        <h2>🌟 Key Highlights</h2>
        <p class="highlight">✅ Stunning Visuals | ✅ Heartfelt Story | ✅ Cultural Richness | ✅ Memorable Soundtrack | ✅ Family & Tradition</p>
        
        <div class="poll">
            <h3>🗳️ Vote for Your Favorite Scene!</h3>
            <div class="poll-options">
                <button onclick="castVote(0)">Remember Me Performance</button>
                <button onclick="castVote(1)">Journey to the Land of the Dead</button>
                <button onclick="castVote(2)">Miguel’s Reunion with Coco</button>
            </div>
            <div class="poll-results" id="pollResults"></div>
        </div>
        
        <div class="comments">
            <h3>📢 Fan Comments</h3>
            <p>Share your thoughts about <em>Coco</em>! (Coming Soon)</p>
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
                🎤 Remember Me Performance – ${getPercent(votes[0], total)}%<br>
                💀 Journey to the Land of the Dead – ${getPercent(votes[1], total)}%<br>
                👵 Miguel’s Reunion with Coco – ${getPercent(votes[2], total)}%
            `;
        }

        function getPercent(value, total) {
            return total ? ((value / total) * 100).toFixed(1) : 0;
        }
    </script>
</body>
</html>
