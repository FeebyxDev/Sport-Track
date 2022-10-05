<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class InformationsController extends Controller{

    public function get($request){
		if(isset($_SESSION['user']) && isset($request['remove']) && $request['remove'] == 'true'){
			$_SESSION['user']->removeUser();
			header("Location: http://" . $_SERVER['HTTP_HOST']."/disconnect");
		} else if(isset($_SESSION['user'])){
			$this->render('user_modify_form',[]);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

    public function post($request){
        $user = $_SESSION['user'];
        if(isset($_GET['remove'])){
			
		}
        if(
            isset($request['last_name']) &&
			isset($request['first_name']) &&
			isset($request['gender']) &&
			isset($request['size']) &&
			isset($request['weight']) &&
			isset($request['birthdate']) && 
			isset($request['mail']) &&
			isset($request['pass'])
        ){
            if($request['last_name'] != "") $user->setNom($request['last_name']);
			if($request['first_name'] != "") $user->setPrenom($request['first_name']);
			if($request['gender'] != "") $user->setSexe($request['gender']);
			if($request['size'] != "") $user->setTaille($request['size']);
			if($request['weight'] != "") $user->setPoids($request['weight']);
			if($request['birthdate'] != "") $user->setDate($request['birthdate']);
			if($request['mail'] != "") $user->setMail($request['mail']);
			if($request['pass'] != "") $user->setMdp($request['pass']);
			$dao = UtilisateurDAO::getInstance();
			$dao->update($user);
            $_SESSION['message'] = "Informations modifiées avec succès !";
            header("Location: http://".$_SERVER['HTTP_HOST']);
		}
    }
}

?>
