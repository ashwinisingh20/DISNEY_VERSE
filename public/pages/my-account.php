<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Account – DisneyVerse</title>
  <style>
    :root {
      --bg-color: #0b0c2a;
      --text-color: #ffffff;
      --accent-color: #00bfff;
      --box-color: #1c1d3f;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-color);
      color: var(--text-color);
      transition: background 0.5s ease, color 0.5s ease;
    }

    header {
      text-align: center;
      padding: 30px;
      font-size: 36px;
      font-weight: bold;
      color: white;
      text-shadow: 2px 2px 5px #00bfff;
      animation: slideDown 1s ease;
      position: relative;
    }

    @keyframes slideDown {
      from { transform: translateY(-100%); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .back-btn {
      position: absolute;
      left: 20px;
      top: 35px;
      background-color: var(--accent-color);
      border: none;
      color: black;
      padding: 8px 15px;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      font-size: 14px;
      transition: transform 0.3s, background 0.3s;
    }

    .back-btn:hover {
      transform: scale(1.05);
      background-color: #1ee3ff;
    }

    section {
      margin: 20px auto;
      max-width: 600px;
      background-color: var(--box-color);
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    form label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    form input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
    }

    form input:focus {
      outline: 2px solid var(--accent-color);
    }

    .settings {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
    }

    .theme-toggle, .language {
      cursor: pointer;
      font-weight: bold;
    }

    .btn {
      background-color: var(--accent-color);
      border: none;
      padding: 10px 20px;
      margin-top: 25px;
      border-radius: 6px;
      font-size: 16px;
      color: black;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .btn:hover {
      transform: scale(1.05);
    }

    footer {
      text-align: center;
      margin: 30px 0;
      font-size: 14px;
      color: #aaa;
    }

    .logo {
      color: white;
      font-size: 28px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
      animation: glow 2s infinite ease-in-out alternate;
    }

    @keyframes glow {
      0% { text-shadow: 0 0 5px #00bfff; }
      100% { text-shadow: 0 0 20px #00bfff; }
    }

    .light {
      --bg-color: #d9f2ff;
      --text-color: #003366;
      --box-color: #f0faff;
    }
  </style>
</head>
<body>

<header>
  <button class="back-btn" onclick="window.location.href='../index.php'">← Back</button>
  <span class="logo">🌟 DisneyVerse</span><br/>
  My Account
</header>

<section>
  <form method="POST" action="">
    <label for="name">👤 Name:</label>
    <input type="text" name="name" id="name" placeholder="Your Name" required>

    <label for="email">📧 Email:</label>
    <input type="email" name="email" id="email" placeholder="your@email.com" required>

    <label for="phone">📱 Phone:</label>
    <input type="tel" name="phone" id="phone" placeholder="+1234567890" required>

    <label for="gender">⚧ Gender:</label>
    <select name="gender" id="gender">
      <option value="">-- Select --</option>
      <option>Male</option>
      <option>Female</option>
      <option>Other</option>
    </select>

    <label for="age">🎂 Age:</label>
    <input type="number" name="age" id="age" min="0" max="120" placeholder="Age" required>

    <label for="password">🔒 Password:</label>
    <input type="password" name="password" id="password" placeholder="Enter password" required>

    <label for="confirm-password">🔐 Confirm Password:</label>
    <input type="password" id="confirm-password" placeholder="Confirm password" required>

    <button type="submit" name="save" class="btn">Save Settings</button>
  </form>

  <section class="settings">
    <span class="theme-toggle" onclick="toggleTheme()">🌓 Toggle Theme</span>
    <select id="lang" class="language">
      <option>🌐 English</option>
      <option>🇪🇸 Español</option>
      <option>🇫🇷 Français</option>
      <option>🇮🇳 हिन्दी</option>
    </select>
  </section>
</section>

<footer>
  © 2025 DisneyVerse • All rights reserved.
</footer>

<script>
  function toggleTheme() {
    document.body.classList.toggle("light");
  }

  const form = document.querySelector('form');
  form.addEventListener('submit', function (e) {
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("confirm-password").value;

    if (pass !== confirm) {
      e.preventDefault();
      alert("❌ Passwords do not match!");
    }
  });
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["save"])) {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $gender = htmlspecialchars($_POST["gender"]);
  $age = htmlspecialchars($_POST["age"]);
  $password = htmlspecialchars($_POST["password"]);

  // You can now insert this data into a database or process it
  echo "<script>alert('✅ Account updated for {$name}');</script>";
}
?>

</body>
</html>
