<?php
    $rootdir = $_SERVER['DOCUMENT_ROOT'];
    include_once($rootdir . '/Model/Utilisateur.php');
    include_once($rootdir . '/Model/Activity.php');
    include_once($rootdir . '/Model/Entry.php');
    include_once($rootdir . '/DataAccessObject/UtilisateurDAO.php');
    include_once($rootdir . '/DataAccessObject/ActivityDAO.php');
    include_once($rootdir . '/DataAccessObject/ActivityEntryDAO.php');
    include_once($rootdir . '/CalculDist/CalculDistanceImpl.php');
    include_once($rootdir . '/database/SqliteConnection.php');
    session_start();
?>