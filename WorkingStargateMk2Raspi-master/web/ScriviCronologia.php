<?php
    $server = "localhost"; // indirizzo del server
    $user = "root"; // utente gestore
    $psw = null; // simbolo di default
    $db = "Cronologie";

    $conne = mysqli_connect($server,$user,$psw,$db);

    if(!$conne) die("Errore di connessione");


    
?>