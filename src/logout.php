<?php

// riprende la sessione corrente
session_start(); 
 
// distrugge i valori della sessione corrente
$_SESSION = array(); 
 
// elimina la sessione corrente
session_destroy();

//ritorniamo alla pagina di login
header("location: login.php");
exit("Torno alla schermata di login"); //x
?>