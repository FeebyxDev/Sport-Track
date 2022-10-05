<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class LoginController extends Controller{

    public function get($request){
        if(isset($_SESSION['user'])){
            $this->render('activity_entries',['id' => $request['id']]);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

}

?>
