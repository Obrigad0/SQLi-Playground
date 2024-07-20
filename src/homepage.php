<?php
session_start();
require_once('dbConnection.php');

if (!isset($_SESSION["username"])) {
    // Se l'utente non è loggato, reindirizza alla pagina di login
    header("location: login.php");
    exit;
}

$search_term = '';
if (isset($_POST['search'])) {
    $search_term = $_POST['search'];
}

$query = "SELECT * FROM ricette WHERE descrizione LIKE '%$search_term%'";

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
        }
        .title {
            font-size: 70px;
            margin-bottom: 10px;
        }
        .subtitle {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .search-bar {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .logout-button:hover {
            background-color: #0056b3;
        }
        .results {
            width: 80%;
            max-height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            background-color: white;
        }
        .recipe {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .recipe:last-child {
            border-bottom: none;
        }
        .recipe-name {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Benvenuta/o!</h1>
        <p class="subtitle">Inserisci un ingrediente per scoprire nuove ricette!</p>
        <form method="post" action="">
            <input type="text" name="search" class="search-bar" placeholder="Cerca..." value="<?php echo htmlspecialchars($search_term); ?>">
            <button type="submit">Cerca</button>
        </form>
    </div>
    <form action="logout.php" method="post">
        <button type="submit" class="logout-button">Logout</button>
    </form>
    <?php if (!empty($search_term)): ?>
   
    <div class="results">
        <?php
        if (mysqli_multi_query($dbConn, $query)) {
            do {
                // Memorizza il primo set di risultati
                if ($result = mysqli_store_result($dbConn)) {
                    while ($row = mysqli_fetch_row($result)) {
                        echo '<div class="recipe">';
                        echo '<div class="recipe-name">' . htmlspecialchars($row[0]) . '</div>'; // Prima colonna
                        echo '<div class="recipe-description">' . htmlspecialchars($row[1]) . '</div>'; // Seconda colonna
                        echo '</div>';
                    }
                    mysqli_free_result($result);
                }
                // Se ci sono più set di risultati, continua
                if (mysqli_more_results($dbConn)) {
                    printf("-----------------\n");
                }
            } while (mysqli_next_result($dbConn));
        } else {
            echo "Errore: " . mysqli_error($dbConn);
        }
        mysqli_close($dbConn);

        die($query);

        ?>
    </div>
    <?php endif; ?>

</body>
</html>