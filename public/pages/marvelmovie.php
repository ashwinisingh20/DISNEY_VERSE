<?php
session_start();

// Initialize watchlist if not already set
if (!isset($_SESSION['watchlist'])) {
    $_SESSION['watchlist'] = [];
}

// Handle adding to watchlist
if (isset($_POST['add'])) {
    $movie = $_POST['add'];
    if (!in_array($movie, $_SESSION['watchlist'])) {
        $_SESSION['watchlist'][] = $movie;
    }
}

// Handle removing from watchlist
if (isset($_POST['remove'])) {
    $movie = $_POST['remove'];
    $_SESSION['watchlist'] = array_filter($_SESSION['watchlist'], fn($m) => $m !== $movie);
}

// Handle review submission
$review = "";
if (isset($_POST['review'])) {
    $review = htmlspecialchars($_POST['review']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>DisneyVerse - Marvel Movies</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    /* (Same CSS as your original, unchanged) */
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #1a1a2e, #16213e);
      margin: 0;
      padding: 0;
      color: #e0e0e0;
    }

    .header {
      text-align: center;
      padding: 30px 10px;
      background: #0f3460;
      color: #ffffff;
      margin-top: 60px;
      font-size: 32px;
      font-weight: bold;
      letter-spacing: 1px;
      box-shadow: 0 4px 12px rgba(15, 52, 96, 0.3);
    }

    .navbar {
      display: flex;
      align-items: right;
      padding: 15px;
      justify-content: right;
      background: rgba(0, 0, 0, 0.85);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    }

    .navbar a {
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      transition: 0.3s;
      font-weight: 600;
    }

    .navbar a:hover {
      color: #fdd835;
      transform: scale(1.1);
    }

    .section {
      padding: 40px 20px;
      background: #1b1b3a;
      margin: 30px 15px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(15, 52, 96, 0.3);
    }

    .section h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
      color: #a29bfe;
    }

    .movies-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .movie-card {
      background: #0f3460;
      color: #e0e0e0;
      width: 200px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(15, 52, 96, 0.2);
      text-align: center;
      padding: 15px;
      transition: transform 0.3s;
    }

    .movie-card:hover {
      transform: scale(1.05);
    }

    .movie-card img {
      width: 100%;
      border-radius: 8px;
      height: 260px;
      object-fit: cover;
    }

    button {
      background: #a29bfe;
      border: none;
      padding: 8px 12px;
      border-radius: 6px;
      margin-top: 10px;
      cursor: pointer;
      color: #1a1a2e;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #6c5ce7;
    }

    .watchlist, .reviews {
      background: #1b1b3a;
      margin: 30px 15px;
      padding: 25px;
      border-radius: 15px;
      color: #e0e0e0;
      box-shadow: 0 4px 10px rgba(15, 52, 96, 0.2);
      text-align: center;
    }

    .watchlist h3, .reviews h3 {
      color: #a29bfe;
    }

    textarea {
      padding: 10px;
      border: 2px solid #6c5ce7;
      border-radius: 8px;
      resize: none;
      font-family: 'Poppins', sans-serif;
      background: #0f3460;
      color: #e0e0e0;
    }

    #watchlist div {
      margin: 5px 0;
    }
  </style>
</head>
<body>

  <div class="header">DisneyVerse Movie World</div>

  <div class="navbar">
    <a href="newhomepage.php">Home</a>
    <a href="about.php">About</a>
    <a href="summary.php">Summaries</a>
    <a href="poll1.php">Games</a>
    <a href="news.php">News</a>
    <a href="#">Contact</a>
    <a href="account.php">My Account</a>
  </div>

  <!-- Marvel Section -->
  <div class="section">
    <h2>Marvel Movies</h2>
    <div class="movies-container">
      <?php
        $movies = [
          ["Iron Man", "https://lumiere-a.akamaihd.net/v1/images/ironman3_poster_2_198b0df5.jpeg", "Tony Stark becomes the armored Avenger."],
          ["Avengers Endgame", "https://lumiere-a.akamaihd.net/v1/images/avengers-endgame_poster_4f9db92d.jpeg", "Earth’s mightiest heroes unite once more."],
          ["Spider-Man: No Way Home", "https://lumiere-a.akamaihd.net/v1/images/spiderman-no-way-home-poster_d256fe51.jpeg", "Peter Parker’s identity is exposed."],
          ["Captain Marvel", "https://lumiere-a.akamaihd.net/v1/images/captain-marvel_313239ec.jpeg", "Carol Danvers becomes one of the galaxy’s mightiest heroes."]
        ];

        foreach ($movies as $movie) {
          echo '<div class="movie-card">';
          echo '<img src="' . $movie[1] . '" alt="' . $movie[0] . '">';
          echo '<h3>' . $movie[0] . '</h3>';
          echo '<p>' . $movie[2] . '</p>';
          echo '<form method="post"><button type="submit" name="add" value="' . $movie[0] . '">Add to Watchlist</button></form>';
          echo '</div>';
        }
      ?>
    </div>
  </div>

  <!-- Watchlist -->
  <div class="watchlist">
    <h3>My Watchlist</h3>
    <div id="watchlist">
      <?php
        foreach ($_SESSION['watchlist'] as $movie) {
          echo '<div>' . $movie;
          echo ' <form method="post" style="display:inline;"><button type="submit" name="remove" value="' . $movie . '">Remove</button></form>';
          echo '</div>';
        }
      ?>
    </div>
  </div>

  <!-- Reviews -->
  <div class="reviews">
    <h3>Leave a Review</h3>
    <form method="post">
      <textarea name="review" rows="4" cols="40" placeholder="Write your review..."></textarea><br><br>
      <button type="submit">Submit Review</button>
    </form>
    <?php if ($review): ?>
      <p>Your Review: <?= $review ?></p>
    <?php endif; ?>
  </div>

</body>
</html>
