<?php
// Handle votes
$votes = [0, 0, 0];
$voted = false;

if (isset($_GET['vote'])) {
    $index = intval($_GET['vote']);
    if ($index >= 0 && $index <= 2) {
        $votes[$index]++;
        $voted = true;
    }
}

function getPercent($value, $total) {
    return $total ? number_format(($value / $total) * 100, 1) : 0;
}

$totalVotes = array_sum($votes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brave - Movie Summary | DisneyVerse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #2e8b57, #3c9d75);
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
            color: #a0e8af;
        }
        .highlight {
            background: rgba(160, 232, 175, 0.2);
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
        .poll button {
            background: #a0e8af;
            color: #2e8b57;
            border: none;
            padding: 10px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Brave (2012)</h1>
        <p><strong>Directed by:</strong> Mark Andrews & Brenda Chapman | <strong>IMDb Rating:</strong> 7.1/10</p>
        
        <div class="image-container">
            <img src="assets/images/brave.jpg" alt="Brave Movie Poster">
        </div>
        
        <h2>📌 Movie Summary</h2>
        <p>Princess Merida, a skilled archer and the free-spirited daughter of King Fergus and Queen Elinor, defies an age-old tradition to carve her own path in life. But when her actions unleash a dangerous curse, she must rely on her bravery and archery skills to undo the chaos and restore harmony to her kingdom.</p>
        
        <h2>🌟 Key Highlights</h2>
        <p class="highlight">✅ Stunning Animation | ✅ Strong Female Lead | ✅ Mythical Adventure | ✅ Emotional Mother-Daughter Bond | ✅ Thrilling Action</p>
        
        <div class="poll">
            <h3>🗳️ Vote for Your Favorite Scene!</h3>
            <?php if (!$voted): ?>
                <div class="poll-options">
                    <form method="GET">
                        <button type="submit" name="vote" value="0">Merida's Archery Stunt</button>
                        <button type="submit" name="vote" value="1">Bear Transformation</button>
                        <button type="submit" name="vote" value="2">Final Battle</button>
                    </form>
                </div>
            <?php endif; ?>
            
            <?php if ($voted): ?>
                <div class="poll-results">
                    🏹 Merida's Archery Stunt – <?= getPercent($votes[0], $totalVotes) ?>%<br>
                    🐻 Bear Transformation – <?= getPercent($votes[1], $totalVotes) ?>%<br>
                    ⚔️ Final Battle – <?= getPercent($votes[2], $totalVotes) ?>%
                </div>
            <?php endif; ?>
        </div>
        
        <div class="comments">
            <h3>📢 Fan Comments</h3>
            <p>Share your thoughts about <em>Brave</em>! (Coming Soon)</p>
        </div>
    </div>
</body>
</html>
