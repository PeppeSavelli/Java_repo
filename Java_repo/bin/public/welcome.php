<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Benvenuto!</h1>
        <p>Hai effettuato l'accesso con successo.</p>
        <a href="login.php" class="button">Login</a>
        <a href="register.php" class="button">Registrazione</a>
        <a href="logout.php" class="button">Logout</a>
    </div>
</body>
</html>