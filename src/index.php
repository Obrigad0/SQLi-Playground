<?php
session_start();
require_once('dbConnection.php');

if (isset($_SESSION["username"])) {
    header("location: homepage.php");
    exit("Utente già loggato, lo trasferisco alla homepage");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (!empty($username) && !empty($password) && !empty($confirm_password)) {
        if ($password === $confirm_password) {
            $query = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($dbConn, $query);

            if (mysqli_num_rows($result) == 0) {
                $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
                if (mysqli_query($dbConn, $query)) {
                    $_SESSION['username'] = $username;
                    header("Location: homepage.php");
                    exit();
                } else {
                    $error = "Errore durante la registrazione. Riprova più tardi.";
                }
            } else {
                $error = "Username già esistente.";
            }
        } else {
            $error = "Le password non coincidono.";
        }
    } else {
        $error = "Tutti i campi sono obbligatori.";
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .register-container h1 {
            margin-bottom: 20px;
        }

        .register-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .register-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .register-container button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
        .title {
            font-size: 70px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1 class="title">IlSitodelleRicette.com!</h1>
    <div class="register-container">
        <h1>Registrazione</h1>
        <form action="index.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Conferma Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Registrati</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <p>Hai già un account? <a href="login.php">Accedi qui</a></p>
    </div>
</body>
</html>