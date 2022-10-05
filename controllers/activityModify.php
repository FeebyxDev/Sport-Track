<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class LoginController extends Controller{

    public function get($request){
        if(isset($_SESSION['user'])){
            $this->render('activity_modify',['id' => $request['id']]);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

    public function post($request){
        $activityDAO = ActivityDAO::getInstance();
        $user = $_SESSION['user'];
        $activity = $activityDAO->findAll($user->getId(), $_GET['id'])[0];
        if(isset($_POST['desc']) && isset($_POST['date'])){
            $activity->setDesc($_POST['desc']);
            $activity->setDate($_POST['date']);
            $activityDAO->update($activity, $activity->getId());
            $_SESSION['message'] = "L'activité a bien été modifiée !";
            header("Location: http://".$_SERVER['HTTP_HOST']."/activities");
        }
    }
}

?>
