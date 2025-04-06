<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$errors = [];
$name = $gender = $age = $phone = $email = $userpassword = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $userpassword = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($name)) $errors["name"] = "Name is required";
    if (empty($gender)) $errors["gender"] = "Gender is required";
    if (empty($age) || $age <= 0) $errors["age"] = "Valid age is required";
    if (!preg_match("/^\d{10}$/", $phone)) $errors["phone"] = "Enter a valid 10-digit phone number";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors["email"] = "Enter a valid email";
    if (strlen($userpassword) < 6) $errors["password"] = "Password must be at least 6 characters";
    if ($userpassword !== $confirmPassword) $errors["confirmPassword"] = "Passwords do not match";

    if (empty($errors)) {
        include_once("../config/config.php");
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, gender, age, phone, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $name, $gender, $age, $phone, $email, $hashedPassword);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            $errors["general"] = "Registration failed. Try again.";
        }
    }
}
?>
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
  body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background: url('assets/images/disneyverse.jpg') no-repeat center center fixed;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
}

  .register-container {
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 40px;
    width: 90%;
    max-width: 520px;
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.2);
    color: white;
  }

  .register-container h2 {
    text-align: center;
    font-size: 28px;
    margin-bottom: 30px;
    background: linear-gradient(90deg, #FFD700, #FF69B4, #8A2BE2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
  }

  .form-group {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
  }

  .form-group input,
  .form-group select,
  .register-container input,
  .register-container select {
    flex: 1;
    padding: 12px 15px;
    margin: 10px 0;
    border: none;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    font-size: 15px;
    width: 100%;
    transition: 0.3s ease;
  }

  input:focus, select:focus {
    background: rgba(255, 255, 255, 0.2);
    outline: none;
    box-shadow: 0 0 10px #FFD700;
  }

  .register-container button {
    width: 100%;
    padding: 14px;
    margin-top: 25px;
    background: linear-gradient(45deg, #ff0080, #7928ca, #ffcd1e);
    border: none;
    color: white;
    font-weight: bold;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
  }

  .register-container button:hover {
    background-position: right center;
    transform: scale(1.03);
    box-shadow: 0 0 20px #ffcd1e;
  }
  .register-container a:hover {
  text-shadow: 0 0 8px #FFD700;
}

</style>

<div class="register-container">
  <h2>🎆 Welcome to DisneyVerse 🎆</h2>
  <form action="register.php" method="POST">
    <!-- First row: Name & Gender -->
    <div class="form-group">
      <input type="text" name="name" placeholder="Full Name" value="<?= htmlspecialchars($name) ?>" required>
      <select name="gender" required>
        <option value="" disabled <?= $gender == '' ? 'selected' : '' ?>>Gender</option>
        <option value="male" <?= $gender == 'male' ? 'selected' : '' ?>>Male</option>
        <option value="female" <?= $gender == 'female' ? 'selected' : '' ?>>Female</option>
        <option value="other" <?= $gender == 'other' ? 'selected' : '' ?>>Other</option>
      </select>
    </div>

    <!-- Second row: Age & Phone -->
    <div class="form-group">
      <input type="number" name="age" placeholder="Age" value="<?= htmlspecialchars($age) ?>" required>
      <input type="tel" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($phone) ?>" required>
    </div>

    <!-- Email & Passwords -->
    <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>

    <!-- Error display -->
    <?php if (!empty($errors)): ?>
      <ul style="color: #FFD700; padding-left: 20px;">
        <?php foreach ($errors as $err): ?>
          <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <button type="submit">✨ Register Now ✨</button>

    <div style="text-align: center; margin-top: 20px;">
  <p style="color: #fff;">Already have an account? 
    <a href="login.php" style="color: #FFD700; text-decoration: none; font-weight: 600;">
      Login here
    </a>
  </p>
</div>
  </form>
</div>
