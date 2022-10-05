<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class RegisterController extends Controller{

    public function get($request){
        $this->render('register_form',[]);
    }

    public function post($request){
        $stop = false;
		if(
			!isset($request['last_name']) || 
			!isset($request['first_name']) || 
			!isset($request['gender']) ||
			!isset($request['size']) ||
			!isset($request['weight']) ||
			!isset($request['age']) || 
			!isset($request['email']) || 
			!isset($request['password']) || 
			!isset($request['confirm-password'])
		){
			$_SESSION['error'] = "Veuillez remplir tous les champs !";
			header("Location: http://".$_SERVER['HTTP_HOST']."/register");
		}
		if(!$stop){
			$nom = $request['last_name'];
			$prenom = $request['first_name'];
			$genre = $request['gender'];
			$taille = $request['size'];
			$poids = $request['weight'];
			$age = $request['age'];
			$email = $request['email'];
			$password = $request['password'];
			$confirmPassword = $request['confirm-password'];			
		}

		if($password != $confirmPassword) {
			$_SESSION['error'] = "Les mots de passe ne correspondent pas !";
			header("Location: http://".$_SERVER['HTTP_HOST']."/register");
		}

		$utilisateur = new Utilisateur();
		$utilisateur->init($nom, $prenom, $genre, $email, $age, $poids, $taille, md5($password));

		$Udao = UtilisateurDAO::getInstance();
		$Udao->insert($utilisateur);

		$_SESSION['message'] = "Création de compte réussie !";

        header("Location: http://".$_SERVER['HTTP_HOST']."/login");
    }
}

?>
