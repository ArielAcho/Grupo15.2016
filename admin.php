<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	require_once('controller/HomeController.php');
	require_once('model/PDORepository.php');
	require_once('model/PersonaRepository.php');
	require_once('model/Persona.php');
	require_once('model/SeguridadRepository.php');
	require_once('view/TwigView.php');
	require_once('view/Home.php');

	if(isset($_GET["action"])&& $_GET["action"] == 'registrar'){
		#HomeController::getInstance()->registrar();
	}
	else{
		HomeController::getInstance()->home();
	}


?>