<?php
require(__ROOT__.'/controllers/Controller.php');
include_once(__ROOT__.'/parts/includes.php');

class LoginController extends Controller{

    public function get($request){
        if(isset($_SESSION['user'])){
            $this->render('activity_entry_modify_form',['id' => $request['id']]);
		} else {
			$_SESSION['error'] = "Vous devez être connecté pour accéder à cette page !";
			header("Location: http://" . $_SERVER['HTTP_HOST']."/login");
		}
    }

    public function post($request){
        if(
            isset($request['id']) &&
            isset($request['cardio']) && 
            isset($request['latitude']) && 
            isset($request['longitude']) && 
            isset($request['altitude']) && 
            isset($request['temps'])
        ){
            $activityEDAO = ActivityEntryDAO::getInstance();
			$entry = $activityEDAO->findAll($_GET['id'])[0];
			$entry->setCardio($request['cardio']);
			$entry->setLatitude($request['latitude']);
			$entry->setLongitude($request['longitude']);
			$entry->setAltitude($request['altitude']);
			$entry->setTemps($request['temps']);
			$activityEDAO->update($entry, $request['id']);
            $_SESSION['message'] = "Les données d'activité ont bien été modifiées !";
            header("Location: http://". $_SERVER['HTTP_HOST']."/activityEntries?id=".$entry->getActiviteId());
        }
    }
}

?>
