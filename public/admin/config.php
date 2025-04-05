<?php
// config/config.php

$servername = "localhost";       // Server name (XAMPP default is "localhost")
$username = "root";              // MySQL username (XAMPP default is "root")
$password = "";                  // MySQL password (XAMPP default is empty)
$dbname = "disney"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
