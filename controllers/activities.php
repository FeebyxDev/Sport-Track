<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class LoginController extends Controller{

    public function get($request){
        if(isset($request['remove']) && isset($request['id']) && $request['remove'] == 'true'){
            $activityDAO = ActivityDAO::getInstance();
            $user = $_SESSION['user'];
            $activity = $activityDAO->findAll($user->getId(), $request['id'])[0];
            if(isset($activity) && $activity != null) {
                $activity->removeActivity();
                $_SESSION['message'] = "L'activité a bien été supprimée !";
            } else {
                $_SESSION['error'] = "L'activité n'existe pas !";
            }
            header("Location: http://".$_SERVER['HTTP_HOST']."/activities");
        } else if(isset($_SESSION['user'])){
            $this->render('activity_list', []);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

}

?>
