<?php
$princess = null;
$description = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answers = [
        $_POST['q1'] ?? '',
        $_POST['q2'] ?? '',
        $_POST['q3'] ?? '',
        $_POST['q4'] ?? '',
        $_POST['q5'] ?? ''
    ];

    $counts = array_count_values($answers);
    arsort($counts);
    $princess = array_key_first($counts);

    $descriptions = [
        'Ariel' => "You're curious, adventurous, and love discovering new things—just like Ariel!",
        'Belle' => "You value knowledge, kindness, and love stories. Belle would be proud!",
        'Mulan' => "Brave and determined, you’re a warrior at heart like Mulan.",
        'Rapunzel' => "Creative, energetic, and always dreaming—you're just like Rapunzel!"
    ];

    $description = $descriptions[$princess] ?? '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Which Disney Princess Are You?</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #fceabb, #f8b500);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .quiz-container {
      background: #fff;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      max-width: 600px;
      width: 90%;
    }

    h1 {
      text-align: center;
      color: #cc3366;
    }

    .question {
      margin: 20px 0;
    }

    .question h3 {
      margin-bottom: 10px;
      color: #333;
    }

    .options label {
      display: block;
      margin-bottom: 8px;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      cursor: pointer;
      background: #f9f9f9;
      transition: all 0.3s;
    }

    .options label:hover {
      background: #ffe6f0;
    }

    button {
      background: #cc3366;
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
      color: #444;
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
    <h1>Which Disney Princess Are You?</h1>
    <form method="POST" action="">

      <?php
      $questions = [
        "Pick a hobby:" => [
          "Ariel" => "Exploring new things",
          "Belle" => "Reading books",
          "Mulan" => "Practicing martial arts",
          "Rapunzel" => "Painting"
        ],
        "Choose a pet:" => [
          "Rapunzel" => "A chameleon",
          "Belle" => "A horse",
          "Ariel" => "A fish",
          "Mulan" => "A dragon"
        ],
        "Pick your dream location:" => [
          "Mulan" => "Mountains of China",
          "Ariel" => "Under the sea",
          "Belle" => "A quiet village",
          "Rapunzel" => "A hidden tower"
        ],
        "Pick a trait you value:" => [
          "Rapunzel" => "Creativity",
          "Mulan" => "Bravery",
          "Belle" => "Intelligence",
          "Ariel" => "Curiosity"
        ],
        "Your ideal weekend is:" => [
          "Ariel" => "Discovering hidden places",
          "Belle" => "Reading all day",
          "Rapunzel" => "Painting or crafting",
          "Mulan" => "Training or adventuring"
        ]
      ];

      $qNumber = 1;
      foreach ($questions as $question => $options) {
        echo "<div class='question'>";
        echo "<h3>$qNumber. $question</h3><div class='options'>";
        foreach ($options as $value => $label) {
          $required = $qNumber === 1 ? 'required' : '';
          echo "<label><input type='radio' name='q$qNumber' value='$value' $required> $label</label>";
        }
        echo "</div></div>";
        $qNumber++;
      }
      ?>

      <button type="submit">Find Out!</button>
    </form>

    <?php if ($princess): ?>
      <div class="result">
        <strong>You are <?= htmlspecialchars($princess) ?>!</strong><br>
        <?= htmlspecialchars($description) ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
