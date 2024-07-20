<?php

$dbConn = mysqli_connect('localhost', 'root', '', 'sqli'); //server DB, username, password, nome del database //x
 
if(!$dbConn){ // connessione non creata correttamente //x
    die("Errore di connessione al db" . mysqli_connect_error());
}
?>