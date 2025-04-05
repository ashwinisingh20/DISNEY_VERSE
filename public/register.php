<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    

// Optional: Start session if needed
session_start();

// Initialize variables
$errors = [];
$name = $gender = $age = $phone = $email = $userpassword = $confirmPassword = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $userpassword = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validation
    if (empty($name)) $errors["name"] = "Name is required";
    if (empty($gender)) $errors["gender"] = "Gender is required";
    if (empty($age) || $age <= 0) $errors["age"] = "Valid age is required";
    if (!preg_match("/^\d{10}$/", $phone)) $errors["phone"] = "Enter a valid 10-digit phone number";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors["email"] = "Enter a valid email";
    if (strlen($userpassword) < 6) $errors["password"] = "Password must be at least 6 characters";
    if ($userpassword !== $confirmPassword) $errors["confirmPassword"] = "Passwords do not match";

    // If no errors, save to DB (example)
    if (empty($errors)) {
        // Example DB connection (update with your config)
        include_once("../config/config.php");

        // Hash password
        echo "Hashed Password from DB: " . htmlspecialchars($userpassword) . "<br>";
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, gender, age, phone, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $name, $gender, $age, $phone, $email, $hashedPassword);

        if ($stmt->execute()) {
            header("Location: login.php"); // Redirect after successful registration
            exit;
        } else {
            $errors["general"] = "Registration failed. Try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        /* ... Same CSS as your original file ... */
    </style>
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <?php if (!empty($errors["general"])) echo "<p class='error'>{$errors['general']}</p>"; ?>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" value="<?= htmlspecialchars($name) ?>">
        <div class="error"><?= $errors["name"] ?? "" ?></div>

        <select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" <?= $gender === "Male" ? "selected" : "" ?>>Male</option>
            <option value="Female" <?= $gender === "Female" ? "selected" : "" ?>>Female</option>
        </select>
        <div class="error"><?= $errors["gender"] ?? "" ?></div>

        <input type="number" name="age" placeholder="Age" value="<?= htmlspecialchars($age) ?>">
        <div class="error"><?= $errors["age"] ?? "" ?></div>

        <input type="text" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($phone) ?>">
        <div class="error"><?= $errors["phone"] ?? "" ?></div>

        <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>">
        <div class="error"><?= $errors["email"] ?? "" ?></div>

        <input type="password" name="password" placeholder="Password">
        <div class="error"><?= $errors["password"] ?? "" ?></div>

        <input type="password" name="confirmPassword" placeholder="Confirm Password">
        <div class="error"><?= $errors["confirmPassword"] ?? "" ?></div>

        <p class="login-link">Already have an account? <a href="login.php"><font color="black">Login here</font></a></p>

        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
