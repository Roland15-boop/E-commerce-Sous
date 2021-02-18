<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>E-commerce | Ajouter produit</title>
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
  <?php require 'addProductTreat.php'; ?>

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
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Ajouter un produit</h2>
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

        <form action="addProductTreat.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="" class="text-black">Nom du produit</label>
            <input type="text" class="form-control" id="" value="<?php echo $nomProduit1; ?>" name="nomProduit" placeholder="Ex: Robe" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="" class="text-black">Catégorie du produit</label>
            <select class="custom-select" id="" name="categorieProduit" required>
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
              <option value="Enfant">Enfant</option>
            </select>
          </div>

          <div class="">
            <label for="" class="text-black">Prix du produit</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" value="<?php echo $prixProduit1; ?>" placeholder="Ex: 1500" name="prixProduit" autocomplete="off" required>
              <div class="input-group-prepend">
                <span class="input-group-text">£</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="custom-file">
              <label class="text-black">Image n°1 du produit</label>
              <input type="file" class="form-control" name="imageProduit1" id="" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <div class="custom-file">
              <label class="text-black">Image n°2 du produit</label>
              <input type="file" class="form-control" name="imageProduit2" id="" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <div class="custom-file">
              <label class="text-black">Image n°3 du produit</label>
              <input type="file" class="form-control" name="imageProduit3" id="" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <div class="custom-file">
              <label class="text-black">Image n°4 du produit</label>
              <input type="file" class="form-control" name="imageProduit4" id="" autocomplete="off" required>
            </div>
          </div>
          <div class="">
            <br>
            <div class="form-group">
              <label for="" class="text-black">Description du produit</label>
              <textarea class="form-control" value="<?php echo $descriptionProduit1; ?>" placeholder="Bien pour les Skinny..." name="descriptionProduit" autocomplete="off" required></textarea>
            </div>
          </div>

          <div class="">
            <?php if($modifierProduitBool == true): ?>
              <button type="submit" class="btn btn-outline-secondary" name="actualiserProduit">Actualiser</button>
            <?php else: ?>
              <button type="submit" class="btn btn-outline-primary" name="ajouterProduit">Ajouter</button>
            <?php endif; ?>
            <a href="adminPage.php" style="float:right;" class="icons-btn btn btn-outline-danger" >Retour</a>
          </div>
        </form>


      </div>
    </div>




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
