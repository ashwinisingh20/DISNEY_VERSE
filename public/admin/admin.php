<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Manage Images</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #ece9e6, #ffffff);
            padding: 30px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .upload-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
            max-width: 500px;
        }

        .upload-container input[type="file"],
        .upload-container select {
            display: block;
            margin-bottom: 15px;
            width: 100%;
            padding: 8px;
        }

        .upload-container button {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .upload-container button:hover {
            background-color: #218838;
        }

        .gallery {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .category-section {
            margin-bottom: 20px;
        }

        .category-title {
            font-size: 1.5em;
            color: #444;
            margin-bottom: 10px;
        }

        .image-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .image-box {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            text-align: center;
            transition: transform 0.2s;
        }

        .image-box:hover {
            transform: scale(1.03);
        }

        .image-box img {
            max-width: 150px;
            height: auto;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .delete-btn {
            display: inline-block;
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<h1>🖼️ Admin Dashboard - Manage Images by Category</h1>

<div class="upload-container">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Select Category:</label>
        <select name="category" required>
            <option value="Marvel">Marvel</option>
            <option value="Pixar">Pixar</option>
            <option value="Disney">Disney</option>
            <option value="Star Wars">Star Wars</option>
            <option value="Banner"> Banner</option>
           
            <option value="Featured">Featured</option> <!-- Add this -->
            <option value="Other">Other</option>
        </select>

        <label>Select Image:</label>
        <input type="file" name="image" required>

        <button type="submit">📤 Upload</button>
    </form>
</div>

<div class="gallery">
    <?php
    // Get distinct categories
    $categories = $conn->query("SELECT DISTINCT category FROM images ORDER BY category ASC");
    while ($catRow = $categories->fetch_assoc()):
        $category = $catRow['category'];
        $images = $conn->query("SELECT * FROM images WHERE category = '$category' ORDER BY id DESC");
    ?>
        <div class="category-section">
            <div class="category-title">📁 <?= htmlspecialchars($category) ?></div>
            <div class="image-row">
                <?php while ($row = $images->fetch_assoc()): ?>
                    <div class="image-box">
                        <img src="uploads/<?= htmlspecialchars($row['filename']) ?>" alt="Image">
                        <a class="delete-btn" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this image?')">🗑 Delete</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>
