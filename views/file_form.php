<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo file_get_contents("./parts/head.html")?>
	<title>SportTracks - Courses</title>
</head>

<body>

	<?php require("./parts/nav.php")?>

	<form id="form" method="POST" enctype="multipart/form-data">
		<h6 id="form-title">Importation de Données de Course !</h6>
		<div class="row">
			<form class="col s12">

				<div class="row">
					<div class="file-field input-field">
						<div class="btn">
							<i class="material-icons left">insert_drive_file</i> Sélectionne un fichier
							<input type="file" placeholder="file" name="thefile">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload one">
						</div>
					</div>
				</div>
				<div class="submit-form">
					<button class="waves-effect waves-light btn" id="submit">
						<i class="material-icons left">upload</i> Send File(s)
					</button>
				</div>
			</form>
		</div>
	</form>

	<?php echo file_get_contents("./parts/footer.html")?>

	<?php include("./parts/bottomPage.php"); ?>
</body>

</html>