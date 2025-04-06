<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$errors = [];
$success = "";
$showPasswordFields = false;
$verifiedMobile = "";

// Handle Form Submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Login form
    if (isset($_POST["username"])) {
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
                if (password_verify($userpassword, $user['password'])) {
                    $_SESSION["user_id"] = $user["id"];
                    $_SESSION["name"] = $user["name"];
                    header("Location: index.php");
                    exit;
                } else {
                    $errors["general"] = "Incorrect password.";
                }
            } else {
                $errors["general"] = "User with this email was not found.";
            }
        }
    }

    // Forget password - Step 1
    if (isset($_POST["verify_mobile"])) {
        $resetMobile = trim($_POST["reset_mobile"] ?? "");

        if (empty($resetMobile)) {
            $errors["reset_mobile"] = "Mobile number is required.";
        } else {
            include_once("../config/config.php");
            $stmt = $conn->prepare("SELECT * FROM users WHERE phone = ?");
            $stmt->bind_param("s", $resetMobile);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->fetch_assoc()) {
                $showPasswordFields = true;
                $verifiedMobile = $resetMobile;
            } else {
                $errors["reset"] = "We couldn’t find your number. Please try again or contact support.";
            }
        }
    }

    // Forget password - Step 2
    if (isset($_POST["update_password"])) {
        $newPassword = trim($_POST["new_password"] ?? "");
        $confirmPassword = trim($_POST["confirm_password"] ?? "");
        $verifiedMobile = $_POST["verified_mobile"] ?? "";

        if (empty($newPassword)) $errors["new_password"] = "New password is required.";
        if ($newPassword !== $confirmPassword) $errors["confirm_password"] = "Passwords do not match.";

        if (empty($errors)) {
            include_once("../config/config.php");
            $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE phone = ?");
            $stmt->bind_param("ss", $hashed, $verifiedMobile);
            if ($stmt->execute()) {
                $_SESSION['reset_success'] = "Password updated successfully!";
                header("Location: login.php");
                exit;
            } else {
                $errors["reset"] = "Failed to update password. Please try again.";
            }
            
        } else {
            $showPasswordFields = true;
        }
    }
}
?>
<?php if (!empty($success)): ?>
<script>
    setTimeout(() => {
        closeModal();
    }, 2000); // Close modal after 2 seconds
</script>
<?php endif; ?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
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

        /* Modal CSS */
        .modal {
            position: fixed;
            z-index: 10;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            position: relative;
        }
        .modal-content .close {
            position: absolute;
            top: 10px; right: 15px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php if (!empty($_SESSION['reset_success'])): ?>
    <script>
        alert("<?= $_SESSION['reset_success'] ?>");
    </script>
    <?php unset($_SESSION['reset_success']); ?>
<?php endif; ?>

    <div class="wrapper">
        <form method="POST" action="">
            <h1>LOGIN</h1>

            <?php if (!empty($errors["general"])): ?>
                <div class="error"><?= $errors["general"] ?></div>
            <?php endif; ?>

            <input type="text" name="username" placeholder="Email Address" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
            <div class="error"><?= $errors["username"] ?? "" ?></div>

            <input type="password" name="password" placeholder="Password">
            <div class="error"><?= $errors["password"] ?? "" ?></div>

            <div class="remember-forget">
                <label><input type="checkbox"> Remember me</label>
                <a href="javascript:void(0);" onclick="openModal()">Forget password?</a>
            </div>

            <button type="submit">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php"><font color="blue">Register</font></a></p>
            </div>
        </form>
        
    </div>
    <div id="forgetModal" class="modal" style="display:none;">
    <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form method="POST" action="">
                <h2>Reset Password</h2>

                <?php if (!empty($errors["reset"])): ?>
                    <div class="error"><?= $errors["reset"] ?></div>
                <?php endif; ?>

                <?php if (!$showPasswordFields): ?>
                    <input type="text" name="reset_mobile" placeholder="Enter Registered Mobile Number" value="<?= htmlspecialchars($_POST["reset_mobile"] ?? "") ?>">
                    <div class="error"><?= $errors["reset_mobile"] ?? "" ?></div>
                    <button type="submit" name="verify_mobile">Verify</button>
                <?php else: ?>
                    <input type="password" name="new_password" placeholder="New Password">
                    <div class="error"><?= $errors["new_password"] ?? "" ?></div>

                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                    <div class="error"><?= $errors["confirm_password"] ?? "" ?></div>

                    <input type="hidden" name="verified_mobile" value="<?= htmlspecialchars($verifiedMobile ?? "") ?>">
                    <button type="submit" name="update_password">Update Password</button>
                <?php endif; ?>
            </form>
            <?php if (!empty($errors["reset_mobile"]) || !empty($errors["reset"]) || $showPasswordFields): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        openModal(); // Keeps modal open if there's an error or password fields need to be shown
    });
</script>
<?php endif; ?>


        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('forgetModal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('forgetModal').style.display = 'none';
        }
    </script>
</body>
</html>
