<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Which Disney Movie Should You Star In?</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #dbeafe, #fcd34d);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .quiz-container {
      background: #ffffff;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      max-width: 600px;
      width: 90%;
    }

    h1 {
      text-align: center;
      color: #2563eb;
    }

    .question {
      margin: 20px 0;
    }

    .question h3 {
      margin-bottom: 10px;
      color: #1e293b;
    }

    .options label {
      display: block;
      margin-bottom: 8px;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #cbd5e1;
      background: #f8fafc;
      cursor: pointer;
      transition: all 0.3s;
    }

    .options label:hover {
      background: #e0f2fe;
    }

    button {
      background: #2563eb;
      color: #fff;
      padding: 12px 25px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 20px;
      width: 100%;
    }

    .result {
      margin-top: 30px;
      text-align: center;
      font-size: 1.2rem;
      color: #334155;
    }

    @media (max-width: 500px) {
      .quiz-container {
        padding: 1.5rem;
      }

      h1 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="quiz-container">
    <h1>Which Disney Movie Should You Star In?</h1>
    <form method="POST" action="">

      <?php
      $questions = [
        "1. What’s your ideal adventure?" => [
          "Moana" => "Sailing across the ocean",
          "Frozen" => "Exploring icy mountains",
          "Encanto" => "Living with a magical family",
          "The Lion King" => "Journey through the savanna"
        ],
        "2. Choose a power you'd love to have:" => [
          "Frozen" => "Ice and snow magic",
          "Encanto" => "A unique magical gift",
          "Moana" => "Talking to the ocean",
          "The Lion King" => "Roar with authority"
        ],
        "3. What's your personality like?" => [
          "Moana" => "Brave and adventurous",
          "Encanto" => "Loving and quirky",
          "Frozen" => "Calm but powerful",
          "The Lion King" => "Loyal and strong"
        ],
        "4. Pick a companion:" => [
          "The Lion King" => "A wise baboon or warthog",
          "Frozen" => "A talking snowman",
          "Moana" => "A silly chicken",
          "Encanto" => "Your magical family"
        ],
        "5. What’s most important to you?" => [
          "Encanto" => "Family",
          "Moana" => "Destiny",
          "Frozen" => "Inner strength",
          "The Lion King" => "Honor and legacy"
        ]
      ];

      $i = 1;
      foreach ($questions as $question => $options) {
        echo "<div class='question'>";
        echo "<h3>$i. $question</h3><div class='options'>";
        foreach ($options as $value => $label) {
          echo "<label><input type='radio' name='q$i' value='$value' required> $label</label>";
        }
        echo "</div></div>";
        $i++;
      }
      ?>

      <button type="submit">Reveal My Movie!</button>
    </form>

    <div class="result">
      <?php
      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $counts = [];

        for ($j = 1; $j <= 5; $j++) {
          $answer = $_POST["q$j"] ?? '';
          if ($answer) {
            $counts[$answer] = ($counts[$answer] ?? 0) + 1;
          }
        }

        arsort($counts);
        $topMovie = array_key_first($counts);

        $descriptions = [
          "Moana" => "🌊 You're destined for the ocean! You should star in <em>Moana</em>, full of courage, curiosity, and connection to nature.",
          "Frozen" => "❄️ Cool, powerful, and graceful—you belong in <em>Frozen</em>! Let it go and embrace your inner magic.",
          "Encanto" => "🌸 You shine with love and family values! <em>Encanto</em> is your perfect magical home.",
          "The Lion King" => "🦁 You were born to lead! <em>The Lion King</em> is where your legacy begins. Hakuna Matata!"
        ];

        if ($topMovie && isset($descriptions[$topMovie])) {
          echo "<strong>You should star in <em>$topMovie</em>!</strong><br>{$descriptions[$topMovie]}";
        }
      }
      ?>
    </div>
  </div>

</body>
</html>
