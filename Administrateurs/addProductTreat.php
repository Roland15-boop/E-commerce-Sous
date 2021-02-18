<?php
  session_start();
  require 'connexion.php';

  $modifierProduitBool = false;
  $nomProduit1 = "";
  $prixProduit1 = "";
  $descriptionProduit1 = "";

// Supprimer une commande

  if (isset($_GET['supprimerCommande'])) {
    $no = $_GET['supprimerCommande'];

    $sql = "DELETE FROM commander WHERE IDCLIENT = '$no' ";

    $connect->query($sql) or die($connect->error);

    $_SESSION['message'] = "Commande supprimée !";
    $_SESSION['msg'] = "danger";

    header('location:adminPage.php');

  }

// Supprimer un produit

  if (isset($_GET['supprimerProduit'])) {
    $no = $_GET['supprimerProduit'];

    $sql = "DELETE FROM produit WHERE IDPRODUIT = '$no' ";

    $connect->query($sql) or die($connect->error);

      $_SESSION['message'] = "Produit supprimé !";
      $_SESSION['msg'] = "danger";

      header('location:adminPage.php');
  }

// Modifier un produit

  if (isset($_GET['modifierProduit'])) {
      $id = $_GET['modifierProduit'];
      $_SESSION['IdProduitModif'] = $id;
      $modifierProduitBool = true;
      $selectModification = $connect->query("SELECT * FROM produit WHERE IDPRODUIT = '$id' ") or die($connect->error);

      if (count(array($selectModification))>0) {
        $row = $selectModification->fetch_array();
        $nomProduit1 = $row['NOMPRODUIT'];
        $prixProduit1 = $row['PRIXPRODUIT'];
        $descriptionProduit1 = $row['DESCRIPPRODUIT'];
      }
  }


// Actualiser un produit

if (isset($_POST['actualiserProduit'])) {

   $nomProduit = $_POST['nomProduit'];
   $categorieProduit = $_POST['categorieProduit'];
   $prixProduit = $_POST['prixProduit'];
   $descriptionProduit = $_POST['descriptionProduit'];
   $idModification =$_SESSION['IdProduitModif'];

      $imageProd1 = addslashes($_FILES['imageProduit1']['tmp_name']);
      $nameProd1 = addslashes($_FILES['imageProduit1']['name']);
      $imageProd1 = file_get_contents($imageProd1);
      $imageProd1 = base64_encode($imageProd1);

      $imageProd2 = addslashes($_FILES['imageProduit2']['tmp_name']);
      $nameProd2 = addslashes($_FILES['imageProduit2']['name']);
      $imageProd2 = file_get_contents($imageProd2);
      $imageProd2 = base64_encode($imageProd2);

      $imageProd3 = addslashes($_FILES['imageProduit3']['tmp_name']);
      $nameProd3 = addslashes($_FILES['imageProduit3']['name']);
      $imageProd3 = file_get_contents($imageProd3);
      $imageProd3 = base64_encode($imageProd3);

      $imageProd4 = addslashes($_FILES['imageProduit4']['tmp_name']);
      $nameProd4 = addslashes($_FILES['imageProduit4']['name']);
      $imageProd4 = file_get_contents($imageProd4);
      $imageProd4 = base64_encode($imageProd4);

   $sql = "UPDATE produit SET NOMPRODUIT = '$nomProduit', PRIXPRODUIT = '$prixProduit', DESCRIPPRODUIT = '$descriptionProduit', CATEGORIEPRODUIT = '$categorieProduit', IMAGEPRODUIT1 = '$imageProd1', IMAGEPRODUIT2 = '$imageProd2', IMAGEPRODUIT3 = '$imageProd3', IMAGEPRODUIT4 = '$imageProd4' WHERE IDPRODUIT = '$idModification'";

   $resultActualiser = $connect->query($sql) or die($connect->error);

   if ($resultActualiser) {
        $_SESSION['message'] = "Modification réussie !";
        $_SESSION['msg'] = "warning";

        header('location:adminPage.php');
   }
   else {
     echo "Erreur: " . $sql . "<br>" . $connect->error;
   }
}

// Enregistrer un produit

if (isset($_POST['ajouterProduit'])) {

  function verification($param){
   $param = htmlspecialchars_decode($param);
   return $param;
  }

  if(isset($_POST['nomProduit']) && isset($_POST['categorieProduit']) && isset($_POST['prixProduit']) && isset($_POST['descriptionProduit']))
    {
      $nomProduit = verification($_POST['nomProduit']);
      $categorieProduit = verification($_POST['categorieProduit']);
      $prixProduit = verification($_POST['prixProduit']);
      $descriptionProduit = verification($_POST['descriptionProduit']);

      $imageProd1 = addslashes($_FILES['imageProduit1']['tmp_name']);
      $nameProd1 = addslashes($_FILES['imageProduit1']['name']);
      $imageProd1 = file_get_contents($imageProd1);
      $imageProd1 = base64_encode($imageProd1);

      $imageProd2 = addslashes($_FILES['imageProduit2']['tmp_name']);
      $nameProd2 = addslashes($_FILES['imageProduit2']['name']);
      $imageProd2 = file_get_contents($imageProd2);
      $imageProd2 = base64_encode($imageProd2);

      $imageProd3 = addslashes($_FILES['imageProduit3']['tmp_name']);
      $nameProd3 = addslashes($_FILES['imageProduit3']['name']);
      $imageProd3 = file_get_contents($imageProd3);
      $imageProd3 = base64_encode($imageProd3);

      $imageProd4 = addslashes($_FILES['imageProduit4']['tmp_name']);
      $nameProd4 = addslashes($_FILES['imageProduit4']['name']);
      $imageProd4 = file_get_contents($imageProd4);
      $imageProd4 = base64_encode($imageProd4);

      $resultAjouter = $connect->query("INSERT INTO produit(NOMPRODUIT,PRIXPRODUIT,DESCRIPPRODUIT,CATEGORIEPRODUIT,IMAGEPRODUIT1,IMAGEPRODUIT2,IMAGEPRODUIT3,IMAGEPRODUIT4) VALUES('$nomProduit','$prixProduit','$descriptionProduit','$categorieProduit','$imageProd4','$imageProd4','$imageProd4','$imageProd4')") or die($connect->error);

      if ($resultAjouter) {
        $_SESSION['message'] = "Enregistrement réussi !";
        $_SESSION['msg'] = "success";
        header("location:add_product.php");
    }
    else {
      echo "Erreur: " ;
    }
  }
}

 ?>
