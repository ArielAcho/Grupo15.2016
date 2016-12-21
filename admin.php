<?php
	session_start();
	require_once('model/SeguridadRepository.php');
	if(!SeguridadRepository::getInstance()->verificarLogueo()){
	  header('Location: index.php');
	}
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	require_once('controller/BackEndController.php');
	require_once('model/PDORepository.php');
	require_once('model/PersonaRepository.php');
	require_once('model/Persona.php');
	require_once('model/PublicacionRepository.php');
	require_once('model/Publicacion.php');
	require_once('model/SeguridadRepository.php');
	require_once('view/TwigView.php');
	require_once('view/BackEnd.php');

	if(isset($_GET["action"])&& $_GET["action"] == 'configuracion'){
		BackEndController::getInstance()->configuracion();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'cerrarsesion'){
		SeguridadRepository::getInstance()->cerrarSesion();
	}
	else{
		BackEndController::getInstance()->home();
	}


?>