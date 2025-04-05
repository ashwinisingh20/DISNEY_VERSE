<?php
session_start();

// Handle watchlist logic
if (!isset($_SESSION['watchlist'])) {
    $_SESSION['watchlist'] = [];
}

if (isset($_POST['add'])) {
    $movie = $_POST['add'];
    if (!in_array($movie, $_SESSION['watchlist'])) {
        $_SESSION['watchlist'][] = $movie;
    }
}

if (isset($_POST['remove'])) {
    $movie = $_POST['remove'];
    $_SESSION['watchlist'] = array_filter($_SESSION['watchlist'], fn($m) => $m !== $movie);
}

if (isset($_POST['review'])) {
    $_SESSION['review'] = $_POST['review'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>DisneyVerse - Movies</title>
  
     <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #1e1b4b, #2a1a5e);
      margin: 0;
      padding: 0;
      color: #e0e0e0;
    }

    .header {
      text-align: center;
      padding: 30px 10px;
      background: #3b0764;
      color: #f3e8ff;
       margin-top: 60px;
      font-size: 32px;
      font-weight: bold;
      letter-spacing: 1px;
      box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
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
      background: #2e1065;
      margin: 30px 15px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
    }

    .section h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
      color: #bb86fc;
    }

    .movies-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .movie-card {
      background: #4a148c;
      color: #e0e0e0;
      width: 200px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
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
      background: #6200ea;
      border: none;
      padding: 8px 12px;
      border-radius: 6px;
      margin-top: 10px;
      cursor: pointer;
      color: white;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #3700b3;
    }

    .watchlist, .reviews {
      background: #311b92;
      margin: 30px 15px;
      padding: 25px;
      border-radius: 15px;
      color: #e0e0e0;
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
      text-align: center;
    }

    .watchlist h3, .reviews h3 {
      color: #bb86fc;
    }

    textarea {
      padding: 10px;
      border: 2px solid #bb86fc;
      border-radius: 8px;
      resize: none;
      font-family: 'Poppins', sans-serif;
      background: #1e1b4b;
      color: #e0e0e0;
    }

    #watchlist div {
      margin: 5px 0;
    }
      button {
            background: #9b59b6;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: #8e44ad;
        }

 
  </style>
</head>
<body>

  <!-- <div class="navbar">
    <a href="newhomepage.php">Home</a>
    <a href="about.php">About</a>
    <a href="summary.php">Summaries</a>
    <a href="poll1.php">Games</a>
    <a href="news.php">News</a>
    <a href="#">Contact</a>
    <a href="account.php">My Account</a>
    <button type="button" class="btn">Login</button>
  </div> -->

  <!-- Pixar Section -->
  <div class="section">
    <h2>Pixar Movies</h2>
    <div class="movies-container">
      <div class="movie-card">
        <img src="https://lumiere-a.akamaihd.net/v1/images/p_up_19752_e6b63c7a.jpeg" alt="Up">
        <h3>Up</h3>
        <p>A man flies his house to South America with balloons.</p>
        <form method="post">
          <input type="hidden" name="add" value="Up">
          <button type="submit">Add to Watchlist</button>
        </form>
      </div>
      <div class="movie-card">
        <img src="https://lumiere-a.akamaihd.net/v1/images/p_luca_22081_e7fcd16f.jpeg" alt="Luca">
        <h3>Luca</h3>
        <p>A sea monster experiences a summer of friendship on land.</p>
        <form method="post">
          <input type="hidden" name="add" value="Luca">
          <button type="submit">Add to Watchlist</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Watchlist -->
  <div class="watchlist">
    <h3>My Watchlist</h3>
    <?php if (!empty($_SESSION['watchlist'])): ?>
      <?php foreach ($_SESSION['watchlist'] as $movie): ?>
        <div>
          <?= htmlspecialchars($movie) ?>
          <form method="post" style="display:inline;">
            <input type="hidden" name="remove" value="<?= htmlspecialchars($movie) ?>">
            <button type="submit">Remove</button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Your watchlist is empty.</p>
    <?php endif; ?>
  </div>

  <!-- Reviews -->
  <div class="reviews">
    <h3>Leave a Review</h3>
    <form method="post">
      <textarea name="review" rows="4" cols="40" placeholder="Write your review..."></textarea><br><br>
      <button type="submit">Submit Review</button>
    </form>
    <?php if (!empty($_SESSION['review'])): ?>
      <p id="submittedReview">Your Review: <?= htmlspecialchars($_SESSION['review']) ?></p>
    <?php endif; ?>
  </div>

</body>
</html>
