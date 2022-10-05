<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class DisconnectController extends Controller{

    public function get($request){
        if(isset($_SESSION['user'])){
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['message'] = "Vous avez bien été déconnecté !";
            header("Location: http://" . $_SERVER['HTTP_HOST']);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

}

?>