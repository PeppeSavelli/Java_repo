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

// Registration
if (isset($_POST['register'])) {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $username = $_POST['username'];

    $sql = "INSERT INTO users (nome, cognome, email, password, username) VALUES ('$nome', '$cognome', '$email', '$password', '$username')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?login");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
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
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="login">Login</button>
            </form>
            <p>Don't have an account? <a href="index.php?register">Register here</a></p>
        <?php else: ?>
            <h2>Welcome</h2>
            <p>Please <a href="index.php?login">login</a> or <a href="index.php?register">register</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>