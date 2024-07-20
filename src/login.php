<?php
session_start();
require_once('dbConnection.php');

if (isset($_SESSION["username"]))
{
    header("location: homepage.php");
    exit("Utente gia loggato, lo trasferisco alla homepage");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Preleviamo in modo diretto, senza controlli, il testo inserito nel form dall'utente.
    //Questo ci rende completamente vulnerabili all'SQLi visto che non controlliamo il testo che ci viene fornito in input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(!empty($password) && !empty($username)){ //controllo che siano stati inseriti dei valori nel form.

        $query = "SELECT * FROM user WHERE username = '$username' and password = '$password' ";
        //die($query);
        $result = mysqli_query($dbConn, $query);

        // in questo caso non controlliamo solo se ci viene data almeno una riga come risultato
        //Un codice capace di prevenire l'SQLi controllerebbe il numero di righe, se uguali a quelle previste (in questo caso <=1), allora tutto ok. 
        if (mysqli_num_rows($result) > 0) {
            
            //non controlliamo i valori che ci vengono dati, creiamo la sessione con 
            $_SESSION['username'] = $username;
            header("Location: homepage.php");
            exit();

        } else {

            $error = "Utente non trovato.";

        }

    }
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h1 {
            margin-bottom: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-container button:hover {
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
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <p>Non hai un account? <a href="index.php">Registrati qui</a></p>
    </div>
</body>
</html>