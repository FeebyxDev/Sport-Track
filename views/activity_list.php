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

			<h1>Liste des activités :</h1>

			<?php 
				$activityDAO = ActivityDAO::getInstance();

				$user = $_SESSION['user'];

				$activities = $activityDAO->findAll($user->getId(), null);
				
				if($activities != null) {
					echo '<ul class="collection with-header">';
					foreach ($activities as $activity) {
						echo '<li class="collection-item"><div class="">'.
						$activity->getDescription()." : " . $activity->getdate() . 
						'<div class="d-flex w10 secondary-content" style="justify-content: space-between;"><a href="/activityModify?id='. $activity->getId() .'" class="secondary-content"><i class="material-icons">edit</i></a>' . 
						'<a href="/activityEntries?id='. $activity->getId() .'" class="secondary-content"><i class="material-icons">open_in_new</i></a>' . 
						'<a href="/activities?remove=true&id='. $activity->getId() .'" class="secondary-content"><i class="material-icons">delete_forever</i></a></div></div></li>';
					}
					echo '</ul>';
				} else {
					echo '<h5>Vous n\'avez pas encore d\'activité !</h5>';
				}
			?>

		</div>

		<?php echo file_get_contents("./parts/footer.html")?>

	</main>

	<?php include("./parts/bottomPage.php"); ?>
	
</body>

</html>