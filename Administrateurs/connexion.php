<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";


$connect = new mysqli("$servername", "$username", "$password", "$dbname");


/* Verification de la connexion */
if ($connect->connect_errno) {
    printf("Echec de connexion: %s\n", $connect->connect_error);
    exit();
}

/* Verifier si le serveur est vivant */
if ($connect->ping()) {

} else {
    printf ("Erreur: %s\n", $mysqli->error);
}


?>
