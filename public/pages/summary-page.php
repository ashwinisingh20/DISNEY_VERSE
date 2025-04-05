<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DisneyVerse</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Playfair+Display:wght@500&family=Raleway:wght@400&display=swap');

    /* General */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #000;
      color: #eee;
      font-size: 12px;
      overflow-x: hidden;
    }
    a {
      text-decoration: none;
      color: #eee;
    }
    header {
      width: 1140px;
      max-width: 80%;
      margin: auto;
      height: 50px;
      display: flex;
      align-items: center;
      z-index: 100;
      position: relative;
    }
    header a {
      margin-right: 40px;
    }

    /* Carousel */
    .carousel {
      height: 740px;
      width: 100%;
      overflow: hidden;
      position: relative;
    }
    .carousel .list {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }
    .carousel .item {
      min-width: 100%;
      position: relative;
    }
    .carousel img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .carousel .content {
      position: absolute;
      top: 20%;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      color: #fff;
      text-shadow: 0 5px 10px #0004;
    }
    .carousel .content .author {
      font-weight: bold;
      letter-spacing: 10px;
      font-size: 2em;
    }
    .carousel .content .title,
    .carousel .content .topic {
      font-size: 5em;
      font-weight: bold;
      line-height: 1.3em;
    }
    .carousel .content .topic {
      color: #f1683a;
    }
    .carousel .content .des {
      font-size: 1.2rem;
      color: #fad5b1;
      margin-top: 10px;
      font-family: 'Playfair Display', serif;
    }
    .carousel .buttons {
      margin-top: 20px;
    }
    .carousel button {
      padding: 10px 20px;
      background: #eee;
      border: none;
      font-family: Poppins;
      cursor: pointer;
      margin-right: 10px;
    }

    /* Movie Grid */
    .container {
      max-width: 1100px;
      margin: auto;
      padding: 40px 20px;
      text-align: center;
    }
    h1 {
      color: #FACC15;
      font-size: 3rem;
      font-family: 'Playfair Display', serif;
      margin-bottom: 20px;
    }
    .movie-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
    }
    .movie {
      padding: 15px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.1);
      transition: transform 0.3s;
    }
    .movie:hover {
      transform: scale(1.05);
    }
    .movie img {
      width: 100%;
      border-radius: 8px;
      border: 2px solid #FACC15;
    }
    .movie strong {
      display: block;
      margin-top: 10px;
      font-family: 'Playfair Display', serif;
      font-size: 1.1rem;
      color: #FACC15;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <nav>
      <a href="newhomepage.html">Home</a>
      <a href="#">Contacts</a>
      <a href="#">News</a>
      <a href="poll1.html">Games</a>
    </nav>
  </header>

  <!-- Carousel -->
  <div class="carousel">
    <div class="list">
      <div class="item">
        <img src="images/turningred.jpg" alt="Turning Red">
        <div class="content">
          <div class="author">DisneyVerse</div>
          <div class="title">PIXAR</div>
          <div class="topic">Turning Red</div>
          <div class="des">
            Mei Lee, a confident 13-year-old, discovers a family curse that transforms her into a giant red panda whenever she gets too emotional. She must learn to embrace her true self.
          </div>
          <div class="buttons">
            <button onclick="location.href='turningred.php'">SEE MORE</button>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="images/brave.jpg" alt="Brave">
        <div class="content">
          <div class="author">DisneyVerse</div>
          <div class="title">PIXAR</div>
          <div class="topic">Brave</div>
          <div class="des">
            Princess Merida defies tradition and accidentally turns her mother into a bear. She must fix things before it's too late.
          </div>
          <div class="buttons">
            <button onclick="location.href='brave.php'">SEE MORE</button>
          </div>
        </div>
      </div>
      <div class="item">
        <img src="images/coco.jpg" alt="Coco">
        <div class="content">
          <div class="author">DisneyVerse</div>
          <div class="title">PIXAR</div>
          <div class="topic">Coco</div>
          <div class="des">
            Miguel enters the Land of the Dead to find his great-great-grandfather, a legendary musician, and uncovers his family's true legacy.
          </div>
          <div class="buttons">
            <button onclick="location.href='coco.php'">SEE MORE</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Movie Section -->
  <div class="container">
    <h1>More Pixar Magic</h1>
    <div class="movie-grid">
      <div class="movie">
        <img src="images/up.jpg" alt="Up">
        <strong>Up</strong>
      </div>
      <div class="movie">
        <img src="images/soul.jpg" alt="Soul">
        <strong>Soul</strong>
      </div>
      <div class="movie">
        <img src="images/luca.jpg" alt="Luca">
        <strong>Luca</strong>
      </div>
      <div class="movie">
        <img src="images/insideout.jpg" alt="Inside Out">
        <strong>Inside Out</strong>
      </div>
    </div>
  </div>

</body>
</html>
