<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	require_once('controller/FrontEndController.php');
	require_once('model/PDORepository.php');
	require_once('model/PersonaRepository.php');
	require_once('model/Persona.php');
	require_once('model/SeguridadRepository.php');
	require_once('view/TwigView.php');
	require_once('view/FrontEnd.php');

	if(isset($_GET["action"])&& $_GET["action"] == 'registrar'){
		FrontEndController::getInstance()->registrar();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'ingresar'){
		FrontEndController::getInstance()->ingresar();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'ejecutarRegistrar'){
		FrontEndController::getInstance()->ejecutarRegistrar($_POST);
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'ejecutarIngresar'){
		FrontEndController::getInstance()->ejecutarIngresar($_POST);
	}
	else{
		FrontEndController::getInstance()->home();
	}


?>