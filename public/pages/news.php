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
        }
        img {
            width: 50px;
            vertical-align: middle;
            margin-right: 10px;
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
                <?php
                $updates = [
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/3/3f/Elsa_Disney.png', 'text' => "New 'Frozen' attraction opening in Epcot this summer!"],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/3/3d/Mickey_Mouse.png', 'text' => "Disney World introduces new nighttime parade at Magic Kingdom."],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/5/5f/Yoda_Empire_Strikes_Back.png', 'text' => "New Star Wars hotel experience now available for booking!"],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/6/64/Donald_Duck.png', 'text' => "Donald Duck is getting his own themed ride at Animal Kingdom!"],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/2/26/Buzz_Lightyear.png', 'text' => "New Toy Story Land expansion announced!"]
                ];

                foreach ($updates as $update) {
                    echo "<li><img src=\"{$update['img']}\" alt=\"\">{$update['text']}</li>";
                }
                ?>
            </ul>
        </section>

        <section class="facts">
            <h2>Disney Fun Facts & Trivia 🎉</h2>
            <ul id="facts">
                <?php
                $facts = [
                    ['img' => 'pictures/marvels/marvel1.jpg', 'text' => "Did you know? Cinderella Castle is 189 feet tall!"],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/3/3d/Mickey_Mouse.png', 'text' => "Over 58 million guests visit Disney World each year."],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/d/db/Minnie_Mouse.png', 'text' => "Hidden Mickeys can be found all over the park!"],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/e/e7/Goofy.png', 'text' => "Goofy originally had a different name—he was called \"Dippy Dawg\"!"],
                    ['img' => 'https://upload.wikimedia.org/wikipedia/en/8/8a/Pluto_disney.png', 'text' => "Pluto was named after the planet, which was discovered the same year he debuted!"]
                ];

                foreach ($facts as $fact) {
                    echo "<li><img src=\"{$fact['img']}\" alt=\"\">{$fact['text']}</li>";
                }
                ?>
            </ul>
        </section>
    </main>
</body>
</html>
