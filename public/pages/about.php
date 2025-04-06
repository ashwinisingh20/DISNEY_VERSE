<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0f111a;
            color: #e0e0e0;
        }
        header {
            background: linear-gradient(90deg, #0a1938, #1a2a6c);
            color: white;
            padding: 15px 20px 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 16px;
            font-size: 14px;
            background-color: #3e64ff;
            color: white;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }
        .back-button:hover {
            background-color: #2a48c4;
            transform: scale(1.05);
        }
        .container {
    max-width: 1100px; /* increased from 850px */
    margin: 40px auto;
    padding: 25px;
    background: #1a1c2b;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
}

        h1, h2, h3 {
            text-align: center;
            color: #f4f4f4;
        }
        p {
            line-height: 1.6;
            color: #d0d0d0;
        }
        .developers {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 30px;
    margin-top: 30px;
}

.developer-card {
    background-color: #23263a;
    border-radius: 12px;
    padding: 20px;
    flex: 1 1 300px; /* slightly wider */
    max-width: 300px; /* adjusted from 260px */
    text-align: center;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s, box-shadow 0.3s;
}


        .developer-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(255, 255, 255, 0.08);
        }
        .developer-card img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #3e64ff;
            margin-bottom: 15px;
        }
        footer {
            text-align: center;
            padding: 15px;
            background: #0a1938;
            color: #ccc;
            margin-top: 40px;
            font-size: 14px;
        }
        .glow {
            color: #ffffff;
            text-shadow: 0 0 8px #3e64ff, 0 0 16px #3e64ff;
        }
    </style>
</head>
<body>

<header>
    <button class="back-button" onclick="history.back()">← Back</button>
    <h1 class="glow">About Us</h1>
</header>

<div class="container">
    <h2>Meet the Developers 👩‍💻</h2>
    <div class="developers">
    <div class="developer-card">
        <img src="../assets/images/childfood.jpeg" alt="Ashwini">
        <h3>Ashwini</h3>
        <p>Creative coder and Disney dreamer 🌟. Ashwini brings DisneyVerse to life with passion and design magic.</p>
    </div>
    <div class="developer-card">
        <img src="../assets/images/childfood.jpeg" alt="Kaushiki">
        <h3>Kaushiki</h3>
        <p>Tech enthusiast and storytelling wizard ✨. Kaushiki weaves code and creativity into every part of DisneyVerse.</p>
    </div>
    <div class="developer-card">
        <img src="../assets/images/childfood.jpeg" alt="Monika">
        <h3>Monika</h3>
        <p>Design thinker and Disney explorer 🎨. Monika crafts delightful experiences and spreads the Disney charm with every click.</p>
    </div>
</div>






    <h2>Who We Are</h2>
    <p>Welcome to <span class="glow">DISNEYVERSE<sup><b>+</b></sup></span> — the ultimate destination for Disney fans! Whether you grew up with the magic of classic animations, fell in love with Pixar’s heartwarming stories, or dream of visiting Disney parks, this is your place to relive the enchantment.</p>

    <h2>Our Mission</h2>
    <p>At <span class="glow">DISNEYVERSE<sup><b>+</b></sup></span>, we aim to unite Disney fans worldwide by celebrating the magic, summaries, and novels that inspired generations. We keep the magic alive through content and community.</p>

    <h2>Why Choose Us?</h2>
    <p>✔ Unmatched Passion<br>
       ✔ AllThings Disney<br>
       ✔ Community Connection<br>
       ✔ Exclusive Content</p>

    <h2>Our Team</h2>
    <p>We’re just two passionate developers who grew up on Disney magic—and now we want to share that with the world! One magical page at a time. 💖</p>
</div>

<footer>
    <p>&copy; 2025 <span class="glow">DISNEYVERSE<sup><b>+</b></sup></span> All rights reserved.</p>
</footer>

</body>
</html>
