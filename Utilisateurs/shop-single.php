<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-commerce | Informations produit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <?php require '../Administrateurs/connexion.php'; ?>

  <div class="site-wrap">


    <div class="site-navbar bg-white py-2">

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone">E-commerce</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="shop.php">Produits</a></li>
                <li><a href="a-propos.php">Qui sommes-nous ?</a></li>
                <li><a href="contact.php">Contactez-nous</a></li>
              </ul>
            </nav>
          </div>
        </div>
          <a href="#" style="" class="ml-auto site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
      </div>
    </div>

    <div class="site-blocks-cover inner-page" data-aos="fade">
      <div class="container">

        <div class="row align-items-center">
          <div class="col-lg-5 text-left">
            <div class="featured-hero-product w-100 text-left">
              <h1 class="mb-2">Informations sur produit</h1>
            </div>
          </div>
          <div class="col-lg-7 align-self-end text-center text-lg-right">
            <img src="images/prod_3.png" alt="Image" class="img-fluid img-1">
          </div>
        </div>

      </div>
    </div>

   <?php

     $id = $_GET['commande'];

     $info = $connect->query("SELECT * FROM produit WHERE IDPRODUIT ='$id' ") or die($connect->error);
     $row = $info->fetch_array();

    ?>

    <div class="site-section">
      <div class="container-fluid">
        <div class="row">
        <div id="" class="col-lg-6">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              <div class="product">
                <a href="#" class="item">
                  <?php echo '<img class="img-fluid " style="width:450px; height:300px;"  src="data:PHOTO;base64,'.$row['IMAGEPRODUIT1'].' ">'; ?>
                  <div class="item-info">
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="#" class="item">
                  <?php echo '<img class="img-fluid " style="width:450px; height:300px;"  src="data:PHOTO;base64,'.$row['IMAGEPRODUIT2'].' ">'; ?>
                  <div class="item-info">
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="#" class="item">
                  <?php echo '<img class="img-fluid " style="width:450px; height:300px;"  src="data:PHOTO;base64,'.$row['IMAGEPRODUIT3'].' ">'; ?>
                  <div class="item-info">
                  </div>
                </a>
              </div>

              <div class="product">
                <a href="#" class="item">
                  <?php echo '<img class="img-fluid " style="width:450px; height:300px;"  src="data:PHOTO;base64,'.$row['IMAGEPRODUIT4'].' ">'; ?>
                  <div class="item-info">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>


          <div class="col-lg-6">
            <h2 class="text-black"> <?php echo $row['NOMPRODUIT']; ?>  </h2>
            <p> <?php echo $row['DESCRIPPRODUIT']; ?> </p>
            <p><strong class="text-primary h4"> <?php echo $row['PRIXPRODUIT'].'£'; ?> </strong></p>

            <p class="" style="color:red">NB: Pour commander ce produit, vous serez obligé de remplir ce mini formulaire.</p>

            <?php if (isset($_SESSION['message'])): ?>

              <div class="alert alert-<?=$_SESSION['msg']?>" >
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
              </div>

            <?php endif; ?>

            <div class="text-black">
              <form action="clientTreat.php" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Nom</label>
                    <input type="text" name="nomClient" class="form-control" id="" placeholder="Ex: Fayieu" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Prénom(s)</label>
                    <input type="text" name="prenomClient" class="form-control" id="" placeholder="Ex: Lavare" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Adresse</label>
                  <input type="text" name="lieuHabitationClient" class="form-control" id="" placeholder="1234 Main St" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Quantité voulue</label>
                    <input type="text" class="form-control" name="quantiteCommande" placeholder="Ex: 5" required>
                </div>
                  <div class="form-group col-md-6">
                    <label for="">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="numeroClient" placeholder="Ex: +1 897 254 5634" required>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="">Ce que vous aimeriez preciser sur la commande</label>
                    <textarea name="descriptionCommande" class="form-control" rows="3" cols="89" placeholder="Ex: Je veux un produit de taille 5"></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-outline-primary" name="commandeClient">Commander</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <footer class="site-footer custom-border-top">
      <div class="container">
        <h1 class="h1 mb-3 text-black text-center">Informations</h1><br>
        <div class="row">
          <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">
            <div class="block-7">
              <h3 class="footer-heading mb-4">A propos de nous</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates sed dolorum excepturi iure eaque, aut unde.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-6">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Nos contacts</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </footer>
  </div>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>
