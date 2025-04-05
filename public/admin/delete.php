<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT filename FROM images WHERE id = $id");
    $row = $result->fetch_assoc();
    $filepath = 'uploads/' . $row['filename'];

    if (file_exists($filepath)) unlink($filepath);
    $conn->query("DELETE FROM images WHERE id = $id");
}
header("Location: admin.php");
exit;
?>
