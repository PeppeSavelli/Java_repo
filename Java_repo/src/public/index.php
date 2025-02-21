<?php
session_start();

// Database connection
$servername = "localhost";
$username = "giuseppe.savelli";
$password = "Peppe2004.";
$dbname = "app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include Java classes
require_once("Java.inc");
$system = java("java.lang.System");
$system->setProperty("java.class.path", "/c:/xampp/htdocs/Java_repo/Java_repo/bin");

// Registration
if (isset($_POST['register'])) {
    $nome = $conn->real_escape_string($_POST['nome']);
    $cognome = $conn->real_escape_string($_POST['cognome']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $username = $conn->real_escape_string($_POST['username']);

    $userService = new Java("user.UserService");
    $user = $userService->registerUser($username, $password, $email, $nome, $cognome);

    $sql = "INSERT INTO utenti (nome, cognome, email, password, username) VALUES ('$nome', '$cognome', '$email', '".password_hash($password, PASSWORD_BCRYPT)."', '$username')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?login");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login
if (isset($_POST['login'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM utenti WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $userService = new Java("user.UserService");
            $user = $userService->loginUser($username, $password);

            if ($user->getUsername() == $username && $user->getPassword() == $password) {
                $_SESSION['username'] = $username;
                header("Location: welcome.php");
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration and Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #4cae4c;
        }
        p {
            margin-top: 20px;
        }
        a {
            color: #5cb85c;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['register'])): ?>
            <h2>Register</h2>
            <form method="post" action="">
                <input type="text" name="nome" placeholder="Nome" required><br>
                <input type="text" name="cognome" placeholder="Cognome" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="text" name="username" placeholder="Username" required><br>
                <button type="submit" name="register">Register</button>
            </form>
            <p>Already registered? <a href="index.php?login">Login here</a></p>
        <?php elseif (isset($_GET['login'])): ?>
            <h2>Login</h2>
            <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" id="password" required><br>
            <button type="button" onclick="togglePassword()">Show Password</button><br>
            <button type="submit" name="login">Login</button>
            </form>
            <p>Don't have an account? <a href="index.php?register">Register here</a></p>
            <script>
            function togglePassword() {
                var passwordField = document.getElementById("password");
                if (passwordField.type === "password") {
                passwordField.type = "text";
                } else {
                passwordField.type = "password";
                }
            }
            </script>
        <?php else: ?>
            <h2>Welcome</h2>
            <p>Please <a href="index.php?login">login</a> or <a href="index.php?register">register</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>