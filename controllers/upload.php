<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class UploadController extends Controller{

    public function get($request){
        if(isset($_SESSION['user'])){
            $this->render('file_form',[]);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

    public function post($request){
        include_once("./DataAccessObject/File.php");
		if(isset($_FILES['thefile'])){
			$res = file_get_contents($_FILES['thefile']['tmp_name']);
            $json = parseJson($res);
            if(isset($json)) {
                insertActivity($json);
                $_SESSION['message'] = "Activité importée avec succès !";
                header("Location: http://".$_SERVER['HTTP_HOST']);
            }
		}
    }
}

?>
