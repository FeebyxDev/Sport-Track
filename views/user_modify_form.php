<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo file_get_contents("./parts/head.html")?>
	<title>SportTracks</title>
</head>

<body>
	<?php require("./parts/nav.php")?>

	<?php
			$UserDAO = UtilisateurDAO::getInstance();
			$user = $_SESSION['user'];
		?>

	<form id="form" method="POST">
		<h6 id="form-title"> Modification de tes informations !</h6>
		<div class="row">

			<div class="input-field col s6">
				<input id="first_name" type="text" class="validate" name="first_name"
					value="<?php echo $user->getPrenom() ?>" required>
				<label for="first_name">Prénom</label>
			</div>

			<div class="input-field col s6">
				<input id="last_name" type="text" class="validate" name="last_name"
					value="<?php echo $user->getNom() ?>" required>
				<label for="last_name">Nom de Famille</label>
			</div>

			<div id="gender-box">
				<div class="input-field col s12">
					<select title="Gender" name="gender">
						<option value="Homme" <?php if($user->getSexe()=="Homme") echo "selected" ?>>Homme</option>
						<option value="Femme" <?php if($user->getSexe()=="Femme") echo "selected" ?>>Femme</option>
						<option value="Non-Binaire" <?php if($user->getSexe()=="Non-Binaire") echo "selected" ?>>
							Non-Binaire</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="birthdate" type="date" class="validate" name="birthdate"
						value="<?php echo $user->getDate() ?>" required>
					<label for="birthdate">Date de Naissance</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="range-field s12">
				<label for="weight">Poids</label>
				<input type="range" id="weight" name="weight" min="0" max="200"
					value="<?php echo $user->getPoids() ?>" />
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="size" type="text" name="size" class="validate" value="<?php echo $user->getTaille() ?>">
				<label for="size">Taille</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<input id="email" type="email" name="mail" class="validate" value="<?php echo $user->getMail() ?>">
				<label for="email">Email</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="old-password" type="password" name="oldpass" class="validate">
				<label for="old-password">Ancien Mot de passe</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="password" type="password" name="pass" class="validate">
				<label for="password">Nouveau Mot de passe</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="confirm-password" type="password" name="confpass" class="validate">
				<label for="confirm-password">Confirmation de Mot de passe</label>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<div class="submit-form">
					<a href="?remove=true" class="waves-effect waves-light btn modal-trigger">
						<i class="material-icons left">delete_forever</i> Supprimer
					</a>
				</div>
			</div>
			<div class="col s6">
				<div class="submit-form">
					<button type="submit" id="submit" class="waves-effect waves-light btn modal-trigger">
						<i class="material-icons left">save</i> Sauvegarder
					</button>
				</div>
			</div>
		</div>
	</form>

	<?php echo file_get_contents("./parts/footer.html")?>

	<?php include("./parts/bottomPage.php"); ?>
	
</body>

</html>