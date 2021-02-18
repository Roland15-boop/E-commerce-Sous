<?php
require "addProductTreat.php";

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }else {
    $page = 1;
  }

  $nb_pr_page = 04;
  $start_from = ($page-1)*04;

  $idProduit = "";
  $idClient = "";
  $prix = "";
  $a = 0;
  $b = 0;

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-commerce | Administration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="../Utilisateurs/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Utilisateurs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Utilisateurs/css/magnific-popup.css">
    <link rel="stylesheet" href="../Utilisateurs/css/jquery-ui.css">
    <link rel="stylesheet" href="../Utilisateurs/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Utilisateurs/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../Utilisateurs/css/aos.css">

    <link rel="stylesheet" href="../Utilisateurs/css/style.css">

  </head>
  <body>

  <div class="site-wrap">


    <div class="site-navbar bg-white">

      <div class="container">
        <div class="d-flex align-items-center justify-content-end">
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="adminPage.php">Accueil</a></li>
                <li class="has-children">
                  <a href="#"><?php echo strtoupper($_SESSION['prenom']).' '.strtoupper($_SESSION['nom']); ?></a>
                  <ul class="dropdown">
                    <li><a href="information.php?modifier=<?php echo $_SESSION['pseudo']; ?>">Modifier mes informations</a></li>
                    <li><a href="deconnect.php">Me deconnecter</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container-fluid">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Administration</h2>
          </div>
        </div>

        <?php if (isset($_SESSION['message'])): ?>

          <div class="alert alert-<?=$_SESSION['msg']?>" >
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </div>

        <?php endif; ?>

        <div class="row">
          <h3 class="h3 mb-3 text-black text-center">Commandes</h3>
          <table class="table table-bordered text-black">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Clients</th>
                <th scope="col">Numéro de téléphone</th>
                <th scope="col">Lieu d'habitation</th>
                <th scope="col">Nom du produit</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix</th>
                <th scope="col">Information supplémentaire</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
                $infoCommande = $connect->query("SELECT * FROM commander");
              ?>

              <?php  while ($rowInfo = $infoCommande->fetch_assoc()){

                  $idProduit = $rowInfo['IDPRODUIT'];
                  $idClient = $rowInfo['IDCLIENT'];
                  $a++;
                  $client = $connect->query("SELECT * FROM client WHERE IDCLIENT = '$idClient' ");
                  $produit = $connect->query("SELECT * FROM produit WHERE IDPRODUIT = '$idProduit' ");
                 ?>
              <?php  while ($rowClient = $client->fetch_assoc() && $rowProduit = $produit->fetch_assoc()){ ?>
              <tr>
                <th scope="row"><?php echo $a; ?></th>
                <td><?php echo $rowClient['NOMCLIENT']. " " .$rowClient['PRENOMCLIENT']; ?></td>
                <td><?php echo $rowClient['NUMEROCLIENT']; ?></td>
                <td><?php echo $rowClient['LIEUHABITATCLIENT']; ?></td>
                <td><?php echo $rowProduit['NOMPRODUIT']; ?></td>
                <td><?php echo $rowInfo['QUANTITECOMMANDE']; ?></td>
                <td><?php echo $rowInfo['PRIXPRODUIT'].'£'; ?></td>
                <td><?php echo $rowInfo['DETAILSCOMMANDE']; ?></td>
                <td><?php echo $rowInfo['DATECOMMANDE']; ?></td>
                <td><?php echo $rowInfo['HEURECOMMANDE']; ?></td>
                <td>
                  <a href="addProductTreat.php?supprimerCommande=<?php echo $rowInfo['IDCLIENT']; ?>" style="width:120px; font-size:18px;" class="icons-btn btn btn-outline-danger"><span class="icon-delete">Supprimer</span></a>
                </td>
              </tr>
            <?php } ?>
              <?php } ?>
            </tbody>
          </table>

          <div class="col-md-12">
            <div class="text-center">
              <?php
/*
                $query0 = 'SELECT * FROM commander';
                $pr_result0 = mysqli_query($connect, $query0);
                $total_record0 = $pr_result0->num_rows;
                //echo $total_record;
                $totalpages0 = ceil($total_record0/$nb_pr_page);
                //echo $totalpages;

                for ($i=1; $i<=$totalpages0; $i++) {
                  echo "<a href='adminPage.php?page=".$i." '  class='btn btn-outline-primary' >$i</a>";
                }*/
              ?>
            </div>
          </div>
        </div>

        <br>
        <br>

          <div class="row">
            <h3 class="h3 mb-3 text-black text-center">Produits</h3>
            <table class="table table-bordered text-black">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom du produit</th>
                  <th scope="col">Prix du produit</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

              <?php
                $infoProduit = $connect->query("SELECT * FROM produit");
              ?>
              <?php  while ($rowInfoProduit = $infoProduit->fetch_assoc()): ?>
                <?php $b++; ?>

                <tr>
                  <th scope="row"><?php echo $b; ?></th>
                  <td><?php echo $rowInfoProduit['NOMPRODUIT']; ?></td>
                  <td><?php echo $rowInfoProduit['PRIXPRODUIT'].'£'; ?></td>
                  <td class="">
                    <a href="add_product.php?modifierProduit=<?php echo $rowInfoProduit['IDPRODUIT']; ?>" style="width:110px; font-size:18px;" class="icons-btn btn btn-outline-success"><span class="icon-pencil">Modifier</span></a>
                    <a href="addProductTreat.php?supprimerProduit=<?php echo $rowInfoProduit['IDPRODUIT']; ?>" style="width:120px; font-size:18px;" class="icons-btn btn btn-outline-danger"><span class="icon-delete">Supprimer</span></a>
                  </td>
                </tr>

              <?php endwhile; ?>
              </tbody>
            </table>
        </div>

        <div class="col-md-12">
          <div class="text-center">
            <?php
/*
              $query = 'SELECT * FROM produit';
              $pr_result = mysqli_query($connect, $query);
              $total_record = $pr_result->num_rows;
              //echo $total_record;
              $totalpages = ceil($total_record/$nb_pr_page);
              //echo $totalpages;

              for ($i=1; $i<=$totalpages; $i++) {
                echo "<a href='adminPage.php?page=".$i." '  class='btn btn-outline-primary' >$i</a>";
              }*/
            ?>
          </div>
        </div>

        <div class="row">
          <a href="add_product.php" style="width:155px; font-size:18px;" class="icons-btn btn btn-outline-primary"><span class="icon-add">Ajouter produit</span></a>
        </div>

      </div>
    </div>


  <script type="text/javascript">
    function noBack(){window.history.forward()}
    noBack();
    window.onload=noBack;
    window.onpageshow=function(evt){if(evt.persisted)noBack()}
    window.onunload=function(){void(0)}
  </script>

  <script src="../Utilisateurs/js/jquery-3.3.1.min.js"></script>
  <script src="../Utilisateurs/js/jquery-ui.js"></script>
  <script src="../Utilisateurs/js/popper.min.js"></script>
  <script src="../Utilisateurs/js/bootstrap.min.js"></script>
  <script src="../Utilisateurs/js/owl.carousel.min.js"></script>
  <script src="../Utilisateurs/js/jquery.magnific-popup.min.js"></script>
  <script src="../Utilisateurs/js/aos.js"></script>

  <script src="../Utilisateurs/js/main.js"></script>

  </body>
</html>
