<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-commerce | Accueil</title>
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

    <div class="site-blocks-cover" data-aos="fade">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 align-self-end text-center text-lg-right">
            <img src="images/new/person_transparent.png" alt="Image" class="img-fluid img-1">
          </div>
        </div>
      </div>
    </div>

  <div class="custom-border-top" style="margin-top:15px;">
      <div class="container">
        <h1 class="h1 mb-3 text-black text-center">Informations</h1><br>
      </div>
  </div>


    <div class="products-wrap">
      <div class="container">
        <div class="row no-gutters products">

        <?php $listeProduit = $connect->query("SELECT * FROM produit"); ?>

        <?php for ($i=0; $i < 6; $i++) {
                $rowListeProduit = $listeProduit->fetch_assoc();
        ?>
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card h-100">
                <a href="shop-single.php?commande=<?php $_SESSION['idProduitClick'] = $rowListeProduit['IDPRODUIT']; echo $rowListeProduit['IDPRODUIT']; ?>" class="item">
                  <?php echo '<img class="img-fluid card-img-top" style="width:350px; height:400px;"  src="data:PHOTO;base64,'.$rowListeProduit['IMAGEPRODUIT1'].' ">'; ?>
                </a>
                  <div class="card-body">
                    <h3> <?php echo $rowListeProduit['NOMPRODUIT']; ?> </h3>
                    <strong class="price"> <?php echo $rowListeProduit['PRIXPRODUIT'].'£'; ?> </strong>
                  </div>
              </div>
            </div>
          </div>

        <?php } ?>

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
