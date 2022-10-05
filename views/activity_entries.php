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

			<h1>Détails de l'activité :</h1>
			
			<?php
				$activityDAO = ActivityDAO::getInstance();
				$activityEntryDAO = ActivityEntryDAO::getInstance();
				$UserDAO = UtilisateurDAO::getInstance();

				$user = $_SESSION['user'];
				$activity = $activityDAO->findAll($user->getId(), $_GET['id']);

				echo '<h3>'. $activity[0]->getDescription() .' - '. $activity[0]->getdate() .'</h3>';

				echo '<div class="d-flex row">';
					echo '<div class="d-flex fcol ai-c w40">';
						echo '<h5 class="t-ac">Distance : '. $activity[0]->getDistance() .' mètre(s)</h5>';
						echo '<div class="w100">';
							echo '<div class="col bd bdr pd-10 w46 mg-2">';
								echo '<div class="row bd-b t-ac"><h5>Temps d\'activité : </h5></div>';
								echo '<div class="row t-ac">';
									echo '<div class="col s6 bd-r"><h6>'. $activity[0]->getTempsSeconde() .' s</h6></div>';
									echo '<div class="col s6"><h6>'. $activity[0]->getTemps() .'</h6></div>';
								echo '</div>';
							echo '</div>';
							
							echo '<div class="col bd bdr pd-10 w46 mg-2">';
								echo '<div class="row bd-b t-ac"><h5>Vitesse Moyenne : </h5></div>';
								echo '<div class="row t-ac">';
									echo '<div class="col s6 bd-r"><h6>'. $activity[0]->getVitesseMoy() .' m/s</h6></div>';
									echo '<div class="col s6"><h6>'. $activity[0]->getVitesseMoyKilo() .' km/h</h6></div>';
								echo '</div>';
							echo '</div>';
						echo'</div>';

						echo '<div class="col bd bdr pd-10 w96 mg-2">';
							echo '<div class="row bd-b t-ac"><h5>Cardio : </h5></div>';
							echo '<div class="row t-ac">';
								echo '<div class="col s4 bd-r"><p>Min</p><h6>'. $activity[0]->getCardioMin() .' bpm</h6></div>';
								echo '<div class="col s4 bd-r"><p>Moy</p><h6>'. $activity[0]->getCardioMoy() .' bpm</h6></div>';
								echo '<div class="col s4"><p>Max</p><h6>'. $activity[0]->getCardioMax() .' bpm</h6></div>';
							echo '</div>';
						echo '</div>';
						
						$denivele = $activity[0]->calculDenivele();
						echo '<div class="col bd bdr pd-10 w40 mg-2 mx-auto">';
							echo '<div class="row bd-b t-ac"><h5>Dénivelé : </h5></div>';
							echo '<div class="row t-ac">';
								echo '<div class="col s6 bd-r"><p>Positif</p><h6>'. $denivele[0] .' m</h6></div>';
								echo '<div class="col s6"><p>Négatif</p><h6>'. $denivele[1] .' m</h6></div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

					$records = $activity[0]->getEntry();


					echo '<ul class="collection w60" style="height: fit-content;">';

					foreach ($activity[0]->getEntry() as $record) {
						echo '<li class="collection-item">';
						echo '<div class="d-flex frow spacebw">';
						$html = '<h6>Temps : '. $record->getTemps() . ' - Cardio : '. $record->getCardio() .' b/m - Latitude : '. $record->getLatitude() .' - Longitude : '. $record->getLongitude() .'</h6>' . '<a href="/activityEntryModify?id='. $record->getId() .'" class="secondary-content"><i class="material-icons">edit</i></a>';
						echo $html;
						echo '</div>';
						echo '</li>';
					}
					echo '</ul>';
				echo '</div>';
			?>

		</div>	
		
		<?php echo file_get_contents("./parts/footer.html")?>


	</main>

	<?php include("./parts/bottomPage.php"); ?>

</body>

</html>