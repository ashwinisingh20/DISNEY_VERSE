<?php
// Enable error reporting (only for development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
$errors = [];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $useremail = trim($_POST["username"] ?? '');
    $userpassword = trim($_POST["password"] ?? '');

    if (empty($useremail)) $errors["username"] = "Email is required";
    if (empty($userpassword)) $errors["password"] = "Password is required";

    if (empty($errors)) {
        include_once("../config/config.php");

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $useremail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            $hashedPasswordFromDB = $user['password'];

            // Debug output for verification (optional)
            echo "Entered Password: " . htmlspecialchars($userpassword) . "<br>";
            echo "Hashed Password from DB: " . htmlspecialchars($hashedPasswordFromDB) . "<br>";

            if (password_verify( htmlspecialchars($userpassword) , htmlspecialchars($hashedPasswordFromDB))) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["name"] = $user["name"];
                header("Location: index.php");
                exit;
            } else {
                $errors["general"] = "Invalid password.";
            }
        } else {
            $errors["general"] = "No user found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        /* Your CSS is kept same for styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .wrapper {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }
        h2, h1 {
            margin-bottom: 20px;
            color: #333;
        }
        input, select {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
        }
        input:focus, select:focus {
            border-color: #9b59b6;
        }
        .error {
            color: red;
            font-size: 12px;
            text-align: left;
        }
        .remember-forget label input {
            accent-color: #fff;
            margin-left: 10px;
            margin-right: 0px;
            margin-bottom: -15px;
        }
        .remember-forget a {
            color: #000;
            text-decoration: none;
        }
        .remember-forget a:hover {
            text-decoration: underline;
        }
        button {
            background: #9b59b6;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: #8e44ad;
        }
        .register-link {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="">
            <h1>LOGIN</h1>

            <?php if (!empty($errors["general"])): ?>
                <div class="error"><?= $errors["general"] ?></div>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="username" placeholder="Email Address" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
                <div class="error"><?= $errors["username"] ?? "" ?></div>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password">
                <div class="error"><?= $errors["password"] ?? "" ?></div>
            </div>

            <div class="remember-forget">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forget password?</a>
            </div>

            <button type="submit">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php"><font color="blue">Register</font></a></p>
            </div>
        </form>
    </div>
</body>
</html>
