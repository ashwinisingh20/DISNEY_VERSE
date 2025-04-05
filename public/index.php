<!DOCTYPE html>
<html>
<head>
    <title>DisneyVerse - Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #1e1e2f, #3b3b58);
            color: white;
            text-align: center;
            overflow-x: hidden;
        }
        .navbar {
            display: flex;
            justify-content: right;
            padding: 15px;
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
        .hero img {
            width: 90%;
            margin-top: 100px;
            border-radius: 15px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.6);
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .category-section {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 50px auto;
            flex-wrap: wrap;
        }
        .category {
            width: 250px;
            height: 150px;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .category video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .category:hover video {
            opacity: 1;
        }
        .category:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.7);
        }
        .category img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .movies-section {
            margin: 50px 0;
            white-space: nowrap;
            overflow-x: auto;
            scrollbar-width: none;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
        .movies-section h2 {
            margin-bottom: 10px;
            font-size: 24px;
            text-transform: uppercase;
        }
        .movies-section img {
            width: 180px;
            margin: 10px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .movies-section img:hover {
            transform: scale(1.1);
        }
        .disney-house-container, .quiz-container {
            background: rgba(255, 255, 255, 0.15);
            padding: 30px;
            border-radius: 10px;
            margin: 30px auto;
            max-width: 800px;
            box-shadow: 0px 4px 12px rgba(255, 255, 255, 0.2);
        }
        .house-banners {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .house-banner {
            padding: 15px;
            width: 150px;
            text-align: center;
            border-radius: 10px;
            font-weight: bold;
        }
        .pixar { background-color: #ff5733; }
        .disney-animation { background-color: #3498db; }
        .marvel { background-color: #27ae60; }
        .star-wars { background-color: #f1c40f; }
        .house-title {
            font-size: 24px;
            font-weight: bold;
        }
        .quiz-container button, .disney-house-container button {
            background: linear-gradient(45deg, #ff9800, #ff5722);
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
            font-weight: 600;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }
        .quiz-container button:hover, .disney-house-container button:hover {
            background: linear-gradient(45deg, #e65100, #d84315);
            transform: scale(1.05);
        }
        .section {
            padding: 50px;
            background-size: cover;
            color: white;
            font-size: 2em;
            font-weight: bold;
        }
        .about-team {
            background: rgba(255, 255, 255, 0.1);
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-bottom: 50px;
        }
        .footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            margin-top: 50px;
            color: white;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="pages/about.php">About</a>
    <a href="pages/summary-page.php">Summaries</a>
    <a href="pages/poll.php">Games</a>
    <a href="pages/news.php">News</a>
    <a href="pages/novel.php">Novels</a>
    <a href="pages/contactus.php">Contact</a>
    <a href="pages/my-account.php">My Account</a>
</div>

<div class="hero">
    <img src="assets/images/Slider.jpeg" alt="DisneyVerse Banner">
</div>

<div class="category-section">
    <div class="category" onclick="window.location.href='pages/pixarmovies.php'">
        <img src="assets/images/pixar.png" alt="Pixar">
        <video autoplay muted loop>
            <source src="assets/videos/pixar.mp4" type="video/mp4">
        </video>
    </div>
    <div class="category" onclick="window.location.href='pages/marvelmovie.php'">
        <img src="assets/images/marvel.png" alt="Marvel">
        <video autoplay muted loop>
            <source src="assets/videos/marvel.mp4" type="video/mp4">
        </video>
    </div>
    <div class="category" onclick="window.location.href='pages/movie-section.php'">
        <img src="assets/images/disney.png" alt="Disney">
        <video autoplay muted loop>
            <source src="assets/videos/disney.mp4" type="video/mp4">
        </video>
    </div>
</div>

<div class="movies-section">
    <h2>Featured Movies</h2>
    <img src="assets/images/posters/poster1.png">
    <img src="assets/images/posters/poster2.png">
    <img src="assets/images/posters/poster10.png">
    <img src="assets/images/posters/m12.jpg">
    <img src="assets/images/posters/m10.jpg">
    <img src="assets/images/posters/m11.jpg">
    <img src="assets/images/posters/m6.jpg">
    <img src="assets/images/posters/m9.jpg">
</div>

<main>
    <section class="disney-house-container">
        <h2 class="house-title">What's Your Disney  Universe?</h2>
        <div class="house-banners">
            <div class="house-banner pixar">pixer</div>
            <div class="house-banner disney-animation">Disney Animation</div>
            <div class="house-banner marvel">Marvel</div>
        </div>
        <button onclick="window.location.href='pages/quiz.php'">Get Sorted Now</button>
    </section>
</main>

<div class="disney-house-container">
    <div class="section about-team">
        About Our Team
        <button onclick="window.location.href='pages/about.php'">Let's Go</button>
    </div>

    <div class="quiz-container">
        <h2>Explore Our Game Zone!</h2>
        <p>Answer a few questions to find out which Disney universe you belong to!</p>
        <button onclick="window.location.href='pages/poll.php'">Start</button>
    </div>
</div>

<div class="footer">&copy; 2025 DisneyVerse. All rights reserved.</div>

</body>
</html>
