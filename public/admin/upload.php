<?php
include 'config.php';

if (isset($_FILES['image']) && isset($_POST['category'])) {
    $image = $_FILES['image'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $targetDir = "uploads/";
    $filename = basename($image["name"]);
    $targetFile = $targetDir . $filename;

    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("INSERT INTO images (filename, category) VALUES (?, ?)");
        $stmt->bind_param("ss", $filename, $category);
        $stmt->execute();
        $stmt->close();
        header("Location: admin.php");
    } else {
        echo "Upload failed.";
    }
} else {
    echo "Image or category not set.";
}
?>
