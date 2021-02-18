<?php
  session_start();
  require '../Administrateurs/connexion.php';

// Enregistrer une commande et un client

if (isset($_POST['commandeClient'])) {

  function verification($param){
   $param = htmlspecialchars_decode($param);
   return $param;
  }

  if(isset($_POST['nomClient']) && isset($_POST['prenomClient']) && isset($_POST['lieuHabitationClient']) && isset($_POST['quantiteCommande']) && isset($_POST['numeroClient']) && isset($_POST['descriptionCommande']))
    {
      $nomClient = verification($_POST['nomClient']);
      $prenomClient = verification($_POST['prenomClient']);
      $lieuHabitationClient = verification($_POST['lieuHabitationClient']);
      $quantiteCommande = verification($_POST['quantiteCommande']);
      $numeroClient = verification($_POST['numeroClient']);
      $descriptionCommande = verification($_POST['descriptionCommande']);
      $dateCommande = date("d-m-Y");
      $heureCommande = date("h:i:s");
      $idProduitCommande = $_SESSION['idProduitClick'];

      //Recuperer le prix du produit commandé
      $recupPrixProduitCommande = $connect->query("SELECT * FROM produit WHERE IDPRODUIT = '$idProduitCommande' ");
      $rowPrixProduitCommande = $recupPrixProduitCommande->fetch_assoc();
      $prixCommande = $quantiteCommande * $rowPrixProduitCommande['PRIXPRODUIT'];



      $sqlClient = "INSERT INTO client(NOMCLIENT,PRENOMCLIENT,NUMEROCLIENT,LIEUHABITATCLIENT)
                    VALUES('$nomClient', '$prenomClient', '$numeroClient', '$lieuHabitationClient')";

      $resultClient = $connect->query($sqlClient) or die($connect->error);

      if ($resultClient) {

        $idClient = $connect->insert_id;
        $sqlCommande = "INSERT INTO commander(IDCLIENT,IDPRODUIT,QUANTITECOMMANDE,PRIXCOMMANDE,DETAILSCOMMANDE,DATECOMMANDE,HEURECOMMANDE)
                      VALUES('$idClient', '$idProduitCommande', '$quantiteCommande', '$prixCommande', '$descriptionCommande', '$dateCommande', '$heureCommande')";

        $resultCommande = $connect->query($sqlCommande) or die($connect->error);

        if ($resultCommande) {
          $_SESSION['message'] = "Commande reçu, vous serez contacté dans les heures qui suivent !";
          $_SESSION['msg'] = "primary";
        }
        else {
          echo "Erreur: " . $sqlCommande . "<br>" . $connect->error;
        }

      }
      else {
        echo "Erreur: " . $sqlClient . "<br>" . $connect->error;
      }

  }
}
 ?>
