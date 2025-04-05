<?php
$novels = [
  [
    'title' => 'The Little Mermaid',
    'author' => 'Hans Christian Andersen',
    'language' => 'English',
    'genre' => 'Fantasy',
    'release' => '1989',
    'rating' => 4,
    'image' => 'https://i.imgur.com/Z2MYNbj.jpg',
    'story' => [
      'Chapter 1: Ariel longed for life on land.',
      'Chapter 2: She rescued Prince Eric from a storm.',
      'Chapter 3: A deal was made with Ursula.',
      'Chapter 4: Ariel fought to win her voice back.',
      'Chapter 5: True love saved them all.'
    ]
  ],
  [
    'title' => 'Cinderella',
    'author' => 'Charles Perrault',
    'language' => 'English',
    'genre' => 'Fairy Tale',
    'release' => '1950',
    'rating' => 5,
    'image' => 'https://i.imgur.com/WrU3gF3.jpg',
    'story' => [
      'Chapter 1: The cruel life under her stepmother.',
      'Chapter 2: Fairy godmother appeared with magic.',
      'Chapter 3: She went to the ball and met the prince.',
      'Chapter 4: Midnight struck and she fled.',
      'Chapter 5: The slipper found its match.'
    ]
  ],
  [
    'title' => 'Beauty and the Beast',
    'author' => 'Jeanne-Marie Leprince',
    'language' => 'English',
    'genre' => 'Romance',
    'release' => '1991',
    'rating' => 5,
    'image' => 'https://i.imgur.com/qK42fUu.jpg',
    'story' => [
      'Chapter 1: Belle found a cursed castle.',
      'Chapter 2: The Beast began to change.',
      'Chapter 3: Magic bloomed in every corner.',
      'Chapter 4: Love broke the spell.',
      'Chapter 5: A prince was reborn.'
    ]
  ],
  [
    'title' => 'Aladdin',
    'author' => 'Anonymous',
    'language' => 'English',
    'genre' => 'Magic',
    'release' => '1992',
    'rating' => 4,
    'image' => 'https://i.imgur.com/E9EJz1A.jpg',
    'story' => [
      'Chapter 1: A lamp in the Cave of Wonders.',
      'Chapter 2: Genie granted his wishes.',
      'Chapter 3: Jafar rose with power.',
      'Chapter 4: Courage and wit won the day.',
      'Chapter 5: Aladdin earned Jasmine’s love.'
    ]
  ],
  [
    'title' => 'Frozen',
    'author' => 'Jennifer Lee',
    'language' => 'English',
    'genre' => 'Adventure',
    'release' => '2013',
    'rating' => 4,
    'image' => 'https://i.imgur.com/zvImZFl.jpg',
    'story' => [
      'Chapter 1: Elsa feared her icy powers.',
      'Chapter 2: Arendelle froze in eternal winter.',
      'Chapter 3: Anna went in search of her sister.',
      'Chapter 4: Love thawed the snow.',
      'Chapter 5: A kingdom saved by family.'
    ]
  ],
  [
    'title' => 'Moana',
    'author' => 'Jared Bush',
    'language' => 'English',
    'genre' => 'Journey',
    'release' => '2016',
    'rating' => 5,
    'image' => 'https://i.imgur.com/VTP4FOt.jpg',
    'story' => [
      'Chapter 1: Chosen by the ocean.',
      'Chapter 2: Meeting the demigod Maui.',
      'Chapter 3: Fighting monsters and fear.',
      'Chapter 4: Restoring Te Fiti’s heart.',
      'Chapter 5: Wayfinding begins again.'
    ]
  ],
  [
    'title' => 'Tangled',
    'author' => 'Dan Fogelman',
    'language' => 'English',
    'genre' => 'Fantasy',
    'release' => '2010',
    'rating' => 5,
    'image' => 'https://i.imgur.com/tgbdZtF.jpg',
    'story' => [
      'Chapter 1: Rapunzel’s tower life.',
      'Chapter 2: Escape with Flynn Rider.',
      'Chapter 3: Hidden truths revealed.',
      'Chapter 4: Magic hair and lost royalty.',
      'Chapter 5: Freedom and love.'
    ]
  ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>DisneyVerse Novels</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    body {
      margin: 0;
      font-family: 'Georgia', serif;
      background: linear-gradient(to right, #141e30, #243b55);
      color: white;
      overflow-x: hidden;
    }

    header {
      text-align: center;
      padding: 20px;
      font-size: 2.5rem;
      background: #0b1a2e;
      color: #00d4ff;
      text-shadow: 1px 1px 5px #fff;
    }

    .carousel {
      display: flex;
      overflow-x: auto;
      gap: 20px;
      scroll-snap-type: x mandatory;
      padding: 30px;
      justify-content: center;
    }

    .novel-card {
      flex: 0 0 auto;
      background-color: #1e3c72;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
      scroll-snap-align: center;
      padding: 20px;
      color: #fff;
      width: 240px;
      transition: transform 0.4s ease;
      text-align: center;
      position: relative;
    }

    .novel-card:hover {
      transform: scale(1.05);
    }

    .novel-card img {
      width: 100%;
      border-radius: 10px;
      height: 220px;
      object-fit: cover;
    }

    .novel-details {
      margin-top: 10px;
      font-size: 0.9rem;
      text-align: left;
    }

    .btn-group {
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      justify-content: center;
    }

    button {
      padding: 8px 12px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .read-btn { background: #ffc107; }
    .fav-btn { background: #28a745; color: white; }
    .remove-btn { background: #dc3545; color: white; }

    .reader-popup {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100vw;
      height: 100vh;
      background-color: #001d3d;
      z-index: 1000;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .reader-content {
      background: white;
      color: black;
      width: 70%;
      max-width: 800px;
      height: 60vh;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.5);
      font-size: 1.1rem;
      position: relative;
      animation: flipIn 0.6s ease;
    }

    @keyframes flipIn {
      from { transform: rotateY(-90deg); opacity: 0; }
      to { transform: rotateY(0); opacity: 1; }
    }

    .reader-nav {
      margin-top: 20px;
    }

    .reader-nav button {
      background-color: #ffc107;
    }

    .close-btn {
      position: absolute;
      top: 10px;
      right: 15px;
      background: crimson;
      color: white;
    }

    .stars {
      color: gold;
      margin-top: 4px;
    }
  </style>
</head>
<body>
  <header>📚 DisneyVerse Novels</header>

  <div class="carousel" id="carousel">
    <?php foreach ($novels as $index => $novel): ?>
      <div class="novel-card">
        <img src="<?= $novel['image'] ?>" alt="<?= htmlspecialchars($novel['title']) ?>">
        <h3><?= htmlspecialchars($novel['title']) ?></h3>
        <div class="novel-details">
          <strong>Author:</strong> <?= $novel['author'] ?><br>
          <strong>Language:</strong> <?= $novel['language'] ?><br>
          <strong>Genre:</strong> <?= $novel['genre'] ?><br>
          <strong>Release:</strong> <?= $novel['release'] ?><br>
          <div class="stars"><?= str_repeat('⭐', $novel['rating']) ?></div>
        </div>
        <div class="btn-group">
          <button class="read-btn" onclick="openReader(<?= $index ?>)">📖 Read</button>
          <button class="fav-btn" onclick="addToFavorites(<?= $index ?>)">⭐ Favorite</button>
          <button class="remove-btn" onclick="removeFromFavorites(<?= $index ?>)">❌ Remove</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="reader-popup" id="readerPopup">
    <div class="reader-content" id="readerContent">Loading...</div>
    <div class="reader-nav">
      <button onclick="prevPage()">⬅️ Previous</button>
      <button onclick="nextPage()">Next ➡️</button>
    </div>
    <button class="close-btn" onclick="closeReader()">✖ Close</button>
  </div>

  <script>
    const novels = <?= json_encode($novels) ?>;
    const favorites = new Set();
    let currentStory = [], currentPage = 0;

    function openReader(index) {
      currentStory = novels[index].story;
      currentPage = 0;
      document.getElementById("readerPopup").style.display = "flex";
      showPage();
    }

    function showPage() {
      document.getElementById("readerContent").innerHTML = currentStory[currentPage];
    }

    function closeReader() {
      document.getElementById("readerPopup").style.display = "none";
    }

    function nextPage() {
      if (currentPage < currentStory.length - 1) {
        currentPage++;
        showPage();
      }
    }

    function prevPage() {
      if (currentPage > 0) {
        currentPage--;
        showPage();
      }
    }

    function addToFavorites(index) {
      favorites.add(index);
      alert(`${novels[index].title} added to favorites!`);
    }

    function removeFromFavorites(index) {
      if (favorites.has(index)) {
        favorites.delete(index);
        alert(`${novels[index].title} removed from favorites.`);
      } else {
        alert(`${novels[index].title} is not in your favorites.`);
      }
    }
  </script>
</body>
</html>
