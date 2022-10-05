<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo file_get_contents("./parts/head.html")?>
	<title>SportTracks - Register</title>
</head>

<body>

	<?php require("./parts/nav.php")?>

	<form method="POST" action="/register">

		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Les Conditions Générales d'utilisations :</h4>
				<p>Veuillez accepter les Conditions Générales d'utilisations détaillés ci-dessous : </p>
				<p>Fill with your conditions</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="modal-close waves-effect waves-green btn-flat">J'accepte</button>
				<button class="modal-close waves-effect waves-green btn-flat">Je refuse</button>
			</div>
		</div>



		<div id="form">
			<h6 id="form-title">Créer ton compte !</h6>
			<div class="row">
				<div class="col s12">

					<div class="row">

						<div class="input-field col s6">
							<input id="first_name" type="text" class="validate" name="first_name" required>
							<label for="first_name">Prénom</label>
						</div>

						<div class="input-field col s6">
							<input id="last_name" type="text" class="validate" name="last_name" required>
							<label for="last_name">Nom de Famille</label>
						</div>

						<div id="gender-box">
							<div class="input-field col s12">
								<select title="Gender" name="gender">
									<option value="" disabled selected>Sélectionne ton genre</option>
									<option value="Homme">Homme</option>
									<option value="Femme">Femme</option>
									<option value="Non-Binaire">Non-Binaire</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="range-field s12">
							<label for="weight">Poids</label>
							<input type="range" id="weight" name="weight" min="0" max="200" />
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="size" type="text" name="size" class="validate">
							<label for="size">Taille</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="age" type="date" name="age" class="validate" required>
							<label for="age">Date de Naissance</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" name="email" class="validate" required>
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" type="password" name="password" class="validate" required>
							<label for="password">Mot de passe</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="confirm-password" type="password" name="confirm-password" class="validate" required>
							<label for="confirm-password">Confirmation de Mot de passe</label>
						</div>
					</div>
					<div class="submit-form">
						<button data-target="modal1" id="submit" name="submit"
							class="waves-effect waves-light btn modal-trigger">
							<i class="material-icons left">check</i> S'inscrire
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php echo file_get_contents("./parts/footer.html")?>


	<?php include("./parts/bottomPage.php"); ?>

</body>

</html>