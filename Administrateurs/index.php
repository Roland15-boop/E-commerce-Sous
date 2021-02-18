<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>E-commerce | Connexion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../Utilisateurs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Utilisateurs/css/magnific-popup.css">
    <link rel="stylesheet" href="../Utilisateurs/css/jquery-ui.css">
    <link rel="stylesheet" href="../Utilisateurs/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Utilisateurs/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../Utilisateurs/css/aos.css">

    <link rel="stylesheet" href="../Utilisateurs/css/style.css">
	</head>

	<body>
		<?php require 'login.php'; ?>

			<div class="container">

				<div class="wrapper">
					<div class="inner">
						<div class="image-holder">
							<img src="images/model_6.png" alt="">
						</div>
						<form action="login.php" method="post">
							<h3 class="text-black">Connexion</h3>
							<div class="form-wrapper">
								<input type="text" placeholder="Nom d'utilisateur" name="pseudo" class="form-control" required autocomplete="off">
							</div>
							<div class="form-wrapper">
								<input type="password" placeholder="Mot de passe" name="mdp" class="form-control" required autocomplete="off">
							</div>
							<button type="submit" class="btn btn btn-outline-primary" name="login">Se connecter</button><br><br>

					    <?php if (isset($_SESSION['messageLogin'])): ?>

					      	<div class="alert alert-<?=$_SESSION['msgLogin']?>" >
					        	<?php
					          	echo $_SESSION['messageLogin'];
					          	unset($_SESSION['messageLogin']);
					        	?>
					      	</div>

					    <?php endif; ?>
						</form>
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
