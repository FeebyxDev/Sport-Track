<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define ("__ROOT__",__DIR__);

// Configuration
require_once (__ROOT__.'/config.php');

// ApplicationController
require_once (CONTROLLERS_DIR.'/ApplicationController.php');


// Add routes here
$AddDAO = ApplicationController::getInstance();
$AddDAO->addRoute('login', CONTROLLERS_DIR.'/login.php');
$AddDAO->addRoute('register', CONTROLLERS_DIR.'/register.php');
$AddDAO->addRoute('informations', CONTROLLERS_DIR.'/informations.php');
$AddDAO->addRoute('upload', CONTROLLERS_DIR.'/upload.php');
$AddDAO->addRoute('activities', CONTROLLERS_DIR.'/activities.php');
$AddDAO->addRoute('activityModify', CONTROLLERS_DIR.'/activityModify.php');
$AddDAO->addRoute('activityEntries', CONTROLLERS_DIR.'/activityEntries.php');
$AddDAO->addRoute('activityEntryModify', CONTROLLERS_DIR.'/activityEntryModify.php');
$AddDAO->addRoute('disconnect', CONTROLLERS_DIR.'/disconnect.php');

// Process the request
ApplicationController::getInstance()->process();

?>
