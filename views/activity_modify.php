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
				$activityDAO = ActivityDAO::getInstance();
				$UserDAO = UtilisateurDAO::getInstance();
				
				$user = $_SESSION['user'];
				$activity = $activityDAO->findAll($user->getId(), $_GET['id'])[0];
			?>
	
			<div class="content">
				<h6 id="form-title">Modification de l'activité !</h6>
		
				<form id="form" method="POST">
					<input type="hidden" name="id"  value="<?php echo $_GET['id']; ?>">
					<div class="row">
						<form class="col s12">
		
							<div class="row">
								<div class="input-field col s12">
									<input id="desc" type="text" class="validate" name="desc"
										value="<?php echo $activity->getDescription() ?>" required>
									<label for="desc">Description</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="date" type="text" class="validate" name="date"
										value="<?php echo $activity->getdate() ?>" required>
									<label for="date">Date</label>
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
		</div>




		<?php echo file_get_contents("./parts/footer.html")?>

	</main>


	<?php include("./parts/bottomPage.php"); ?>
	
	<?php 
        
	?>
</body>

</html>