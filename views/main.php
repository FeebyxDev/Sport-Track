<!DOCTYPE html>
<html lang="en">
<head>	
    <?php echo file_get_contents("./parts/head.html")?>
    <title>SportTracks</title>
</head>
<body>

	<main>

        <?php require("./parts/nav.php")?>

        <div id="content">
            <h1>Bienvenue <?php if(isset($_SESSION['user'])) { echo $_SESSION['user']->getPrenom();} ?> sur SportTracks</h1>
            <h3>Une seule application de sport qui regroupe tant de fonctionnalités !</h3>

			<?php 
				if (!isset($_SESSION['user'])) {
					echo '	<div class="col w50 mx-auto" style="margin-top:70px;">
								<div class="card orange lighten-1 ">
									<div class="card-content c-primary">
										<span class="card-title">Vous n\'êtes pas connecté</span>
										<p>Connectez-vous pour accéder à toutes les fonctionnalités de SportTracks !</p>
									</div>
									<div class="card-action c-primary">
										<a href="/login" class="waves-effect waves-light btn w30">Se connecter</a>
										<a href="/register" class="waves-effect waves-light btn w30">S\'inscrire</a>
									</div>
								</div>
							</div>';
				} 
			?>

        </div>

        <?php echo file_get_contents("./parts/footer.html")?>

    </main>

	<?php include("./parts/bottomPage.php"); ?>
</body>
</html>