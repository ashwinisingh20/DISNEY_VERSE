<?php
$conn = new mysqli("localhost", "root", "", "disney");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function handleUpload($fileInputName) {
    $filename = basename($_FILES[$fileInputName]['name']);
    $target = "uploads/" . time() . "_" . $filename;

    if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $target)) {
        return $target;
    } else {
        return false;
    }
}

// Handle Insertions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_news'])) {
        $text = $conn->real_escape_string($_POST['news_text']);
        $imagePath = handleUpload('news_image_file');

        if ($imagePath) {
            $sql = "INSERT INTO disney_news (image_url, news_text) VALUES ('$imagePath', '$text')";
            echo $conn->query($sql) ? "News added!<br>" : "Error: " . $conn->error;
        } else {
            echo "Image upload failed.<br>";
        }
    }

    if (isset($_POST['add_fact'])) {
        $text = $conn->real_escape_string($_POST['fact_text']);
        $imagePath = handleUpload('fact_image_file');

        if ($imagePath) {
            $sql = "INSERT INTO disney_facts (image_url, fact_text) VALUES ('$imagePath', '$text')";
            echo $conn->query($sql) ? "Fact added!<br>" : "Error: " . $conn->error;
        } else {
            echo "Image upload failed.<br>";
        }
    }

    // Handle Deletion
    if (isset($_POST['delete_news'])) {
        $id = (int)$_POST['news_id'];
        $result = $conn->query("SELECT image_url FROM disney_news WHERE id=$id");
        if ($row = $result->fetch_assoc()) {
            if (file_exists($row['image_url'])) unlink($row['image_url']);
        }
        $conn->query("DELETE FROM disney_news WHERE id=$id");
    }

    if (isset($_POST['delete_fact'])) {
        $id = (int)$_POST['fact_id'];
        $result = $conn->query("SELECT image_url FROM disney_facts WHERE id=$id");
        if ($row = $result->fetch_assoc()) {
            if (file_exists($row['image_url'])) unlink($row['image_url']);
        }
        $conn->query("DELETE FROM disney_facts WHERE id=$id");
    }
}

// Fetch Data
$newsList = $conn->query("SELECT * FROM disney_news ORDER BY id DESC");
$factsList = $conn->query("SELECT * FROM disney_facts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Disney Admin Panel</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f0f8ff; }
        form, .preview { background: white; padding: 20px; margin-bottom: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="file"] { margin: 10px 0; }
        button { padding: 10px 20px; background: #0077cc; color: white; border: none; border-radius: 5px; cursor: pointer; }
        h2 { color: #00509e; }
        img { max-width: 200px; height: auto; margin-bottom: 10px; border: 2px solid #ccc; }
        .item { border-bottom: 1px solid #ddd; padding: 15px 0; }
        .item:last-child { border-bottom: none; }
    </style>
</head>
<body>

    <h1>🎯 Disney Admin Panel</h1>

    <!-- Add News -->
    <form method="POST" enctype="multipart/form-data">
        <h2>🗞️ Add Latest Update</h2>
        <input type="file" name="news_image_file" required>
        <textarea name="news_text" rows="3" placeholder="Enter update text..." required></textarea>
        <button type="submit" name="add_news">Add Update</button>
    </form>

    <!-- Add Fact -->
    <form method="POST" enctype="multipart/form-data">
        <h2>🎉 Add Disney Fun Fact</h2>
        <input type="file" name="fact_image_file" required>
        <textarea name="fact_text" rows="3" placeholder="Enter fun fact..." required></textarea>
        <button type="submit" name="add_fact">Add Fact</button>
    </form>

    <!-- News Preview -->
    <div class="preview">
        <h2>📜 Latest Updates Preview</h2>
        <?php while ($row = $newsList->fetch_assoc()): ?>
            <div class="item">
                <img src="<?= $row['image_url'] ?>" alt="News Image">
                <p><?= htmlspecialchars($row['news_text']) ?></p>
                <form method="POST">
                    <input type="hidden" name="news_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete_news" onclick="return confirm('Delete this update?')">🗑️ Delete</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Facts Preview -->
    <div class="preview">
        <h2>✨ Disney Fun Facts Preview</h2>
        <?php while ($row = $factsList->fetch_assoc()): ?>
            <div class="item">
                <img src="<?= $row['image_url'] ?>" alt="Fact Image">
                <p><?= htmlspecialchars($row['fact_text']) ?></p>
                <form method="POST">
                    <input type="hidden" name="fact_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete_fact" onclick="return confirm('Delete this fact?')">🗑️ Delete</button>
                </form>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
