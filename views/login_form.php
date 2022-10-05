<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo file_get_contents("./parts/head.html")?>
	<title>SportTracks - Connexion</title>
</head>

<body>

	<main>

		<?php require("./parts/nav.php")?>

		<form id="form" method="POST" action="/login">
			<h6 id="form-title">Connexion à ton compte !</h6>
			<div class="row">
				<form class="col s12">

					<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" class="validate" name="mail" required>
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" class="validate" name="pass" required>
							<label for="password">Mot de passe</label>
						</div>
					</div>
					<div class="submit-form">
						<button type="submit" class="waves-effect waves-light btn" id="submit">
							<i class="material-icons left">check</i> Se connecter
						</button>
					</div>
				</form>
			</div>
		</form>

		<?php echo file_get_contents("./parts/footer.html")?>

	</main>

	<?php include("./parts/bottomPage.php"); ?>
</body>

</html>