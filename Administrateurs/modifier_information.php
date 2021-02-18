<?php
require 'connexion.php';


$nomAd = "";
$prenomAd = "";
$pseudoAd = "";
$mdpAd = "";

if (isset($_GET['modifier'])) {

  $id = $_GET['modifier'];
  $requete = $connect->query("SELECT * FROM administrateur WHERE PSEUDOADMIN = '$id' ");

  if (count(array($requete)) == 1) {
    $row = $requete->fetch_array();
    $nomAd = $row['NOMADMIN'];
    $prenomAd = $row['PRENOMADMIN'];
    $pseudoAd = $row['PSEUDOADMIN'];
    $mdpAd = "";
  }
}

if (isset($_POST['actualiser'])) {
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $pseudo = $_POST['pseudo'];
   $mdp = ($_POST['mdp']);

   $requete = $connect->query("UPDATE administrateur SET NOMADMIN='$nom', PRENOMADMIN='$prenom', PSEUDOADMIN='$pseudo', MDPADMIN='$mdp'");

   $_SESSION['message'] = "Modification réussie !";
   $_SESSION['msg'] = "warning";

   header("Location:index.php");

}

 ?>
