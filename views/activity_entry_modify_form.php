<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo file_get_contents("./parts/head.html")?>
	<title>SportTracks - Activités</title>
</head>

<body>

	<main>

		<?php require("./parts/nav.php")?>

		<div class="content">

			<h1>Modification de l'activité :</h1>

			<?php
				$activityEDAO = ActivityEntryDAO::getInstance();
				$UserDAO = UtilisateurDAO::getInstance();
				
				$user = $_SESSION['user'];
				
				$entry = $activityEDAO->findAll($_GET['id'])[0];
			?>


			<form id="form" method="POST">
				<input type="hidden" name="id"  value="<?php echo $id; ?>">
				<h6 id="form-title">Modification de l'activité !</h6>
				<div class="row">
					<form class="col s12">

						<div class="row">
							<div class="input-field col s12">
								<input id="cardio" type="text" class="validate" name="cardio"
									value="<?php echo $entry->getCardio() ?>" required>
								<label for="cardio">Cardio</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="latitude" type="text" class="validate" name="latitude"
									value="<?php echo $entry->getLatitude() ?>" required>
								<label for="latitude">Latitude</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="longitude" type="text" class="validate" name="longitude"
									value="<?php echo $entry->getLongitude() ?>" required>
								<label for="longitude">Longitude</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="altitude" type="text" class="validate" name="altitude"
									value="<?php echo $entry->getAltitude() ?>" required>
								<label for="altitude">Altitude</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="temps" type="text" class="validate" name="temps"
									value="<?php echo $entry->getTemps() ?>" required>
								<label for="temps">Temps</label>
							</div>
						</div>
						<div class="submit-form">
							<button type="submit" class="waves-effect waves-light btn" id="submit">
								<i class="material-icons left">check</i> Modifier
							</button>
						</div>
					</form>
				</div>
			</form>

		</div>

		<?php echo file_get_contents("./parts/footer.html")?>

	</main>

	<?php include("./parts/bottomPage.php"); ?>

</body>

</html>