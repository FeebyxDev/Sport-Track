<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class LoginController extends Controller{

    public function get($request){
        $this->render('login_form',[]);
    }

    public function post($request){
        if(isset($request['mail']) && isset($request['pass'])){
			$dao = UtilisateurDAO::getInstance();

			$connect = $dao->connect($request['mail'], $request['pass']);
			
			if($connect) {
				$_SESSION['user'] = $connect;
                $_SESSION['message'] = "Connexion réussie !";
                header("Location: http://".$_SERVER['HTTP_HOST']);
			} else {
                $_SESSION['error'] = "Email ou mot de passe incorrect !";
                header("Location: http://".$_SERVER['HTTP_HOST']."/login");
			}
		}
    }
}

?>
