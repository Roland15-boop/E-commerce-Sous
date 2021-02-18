<?php
require 'connexion.php';
session_start();

if (isset($_POST['login'])) {

  function verification($param){
    $param = htmlspecialchars_decode($param);
    return $param;
  }

  if(isset($_POST['pseudo']) && isset($_POST['mdp']))
  {
    $pseudo = verification($_POST['pseudo']);
    $mdp = verification(($_POST['mdp']));

    $sql = "SELECT * FROM administrateur WHERE PSEUDOADMIN = '$pseudo' AND MDPADMIN = '$mdp'";
    $result = $connect->query($sql);

    $cordonnes = $connect->query("SELECT * FROM administrateur WHERE PSEUDOADMIN = '$pseudo' AND MDPADMIN = '$mdp'");
    $row = $cordonnes->fetch_assoc();

    if ($result->num_rows == 1) {
        $_SESSION['id'] = $row['IDADMIN'];
        $_SESSION['nom'] = $row['NOMADMIN'];
        $_SESSION['prenom'] = $row['PRENOMADMIN'];
        $_SESSION['pseudo'] = $row['PSEUDOADMIN'];
        header("Location:adminPage.php");
    }

    else {
      $_SESSION['messageLogin'] = "Erreur d'identifiant ou de mot de passe !";
      $_SESSION['msgLogin'] = "danger";
      header("Location:index.php");
    }

  }

}

 ?>
