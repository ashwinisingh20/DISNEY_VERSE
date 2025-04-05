<?php
$score = 0;
$message = "";
$submitted = false;

$correctAnswers = [
  'q1' => 'Ursula',
  'q2' => 'Maleficent',
  'q3' => 'Dr. Facilier',
  'q4' => 'Cruella',
  'q5' => 'Jafar'
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $submitted = true;
  foreach ($correctAnswers as $question => $correct) {
    if (!empty($_POST[$question]) && $_POST[$question] === $correct) {
      $score++;
    }
  }

  if ($score === 5) {
    $message = "🎯 You're a true Disney Villain expert!";
  } elseif ($score >= 3) {
    $message = "😈 Not bad! You know your villains.";
  } else {
    $message = "👻 Looks like you need to rewatch some Disney classics!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>How Well Do You Know Disney Villains?</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #1c1c1c, #3a0d0d);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .quiz-container {
      background: #2c2c2c;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.6);
      max-width: 600px;
      width: 90%;
    }

    h1 {
      text-align: center;
      color: #e60000;
    }

    .question {
      margin: 20px 0;
    }

    .question h3 {
      margin-bottom: 10px;
      color: #ffcccc;
    }

    .options label {
      display: block;
      margin-bottom: 8px;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #444;
      background: #3e3e3e;
      cursor: pointer;
      transition: all 0.3s;
    }

    .options label:hover {
      background: #660000;
    }

    button {
      background: #e60000;
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
      color: #f0f0f0;
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
    <h1>How Well Do You Know Disney Villains?</h1>
    <form method="POST" action="">

      <?php
      $questions = [
        "What is the name of the sea witch in The Little Mermaid?" => [
          "Ursula", "Morgana", "Vanessa", "Ariel"
        ],
        "What villain turns into a dragon in *Sleeping Beauty*?" => [
          "Maleficent", "Queen Grimhilde", "Ursula", "Lady Tremaine"
        ],
        "Who is the villain in *The Princess and the Frog*?" => [
          "Dr. Facilier", "Scar", "Gaston", "Jafar"
        ],
        "Which villain wanted to turn 99 puppies into a coat?" => [
          "Cruella", "Yzma", "Gothel", "Maleficent"
        ],
        "Who is the villain in *Aladdin*?" => [
          "Jafar", "Hades", "Hook", "Scar"
        ]
      ];

      $qNum = 1;
      foreach ($questions as $question => $options) {
        echo "<div class='question'><h3>$qNum. $question</h3><div class='options'>";
        foreach ($options as $option) {
          $name = "q$qNum";
          $checked = isset($_POST[$name]) && $_POST[$name] === $option ? "checked" : "";
          $required = $qNum === 1 ? "required" : "";
          echo "<label><input type='radio' name='$name' value='$option' $required $checked> $option</label>";
        }
        echo "</div></div>";
        $qNum++;
      }
      ?>

      <button type="submit">Check My Score</button>
    </form>

    <?php if ($submitted): ?>
      <div class="result">
        <strong>You got <?= $score ?>/5 correct.</strong><br>
        <?= $message ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
