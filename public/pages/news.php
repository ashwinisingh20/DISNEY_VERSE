<?php
$conn = new mysqli("localhost", "root", "", "disney");

$news = $conn->query("SELECT * FROM disney_news ORDER BY id DESC");
$facts = $conn->query("SELECT * FROM disney_facts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disney World News & Updates</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #cce7ff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            background-color: #0077cc;
            color: white;
            padding: 20px;
            font-size: 32px;
            text-shadow: 3px 3px 7px #99ccff;
            font-weight: bold;
        }
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        section {
            background: #e6f2ff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            margin: 10px;
        }
        h2 {
            color: #00509e;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
    background: #b3d9ff;
    margin: 10px 0;
    padding: 15px;
    border-radius: 10px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 15px;
    text-align: left;
}

li img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid white;
}

    </style>
</head>
<body>
    <header>
        <h1>✨ Disney World News & Updates ✨</h1>
    </header>
    <main>
        <section class="updates">
            <h2>Latest Updates 🏰</h2>
            <ul id="latest-updates">
<?php while($row = $news->fetch_assoc()): ?>
    <li>
        <img src="../admin/news/uploads/<?= htmlspecialchars(basename($row['image_url'])) ?>" alt="news Image" style="max-width:100px;">
        <?= htmlspecialchars($row['news_text']) ?>
    </li>
<?php endwhile; ?>
</ul>
        </section>

        <section class="facts">
            <h2>Disney Fun Facts & Trivia 🎉</h2>
            <ul id="facts">
<?php while($row = $facts->fetch_assoc()): ?>
    <li>
        <img src="admin/news/uploads/<?= htmlspecialchars(basename($row['image_url'])) ?>" alt="Fact Image" style="max-width:100px;">
        <?= htmlspecialchars($row['fact_text']) ?>
    </li>
<?php endwhile; ?>
</ul>

</ul>
        </section>
    </main>
</body>
</html>
