<?php
	session_start();
	require_once('model/SeguridadRepository.php');
	if(!SeguridadRepository::getInstance()->verificarLogueo()){
	  header('Location: index.php');
	}
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	require_once('controller/BackEndAdminController.php');
	require_once('controller/PersonaAdminController.php');
	require_once('controller/TipoHospedajeController.php');
	require_once('model/PDORepository.php');
	require_once('model/PersonaRepository.php');
	require_once('model/Persona.php');
	require_once('model/PublicacionRepository.php');
	require_once('model/Publicacion.php');
	require_once('model/SeguridadRepository.php');
	require_once('model/TipoHospedaje.php');
	require_once('model/TipoHospedajeRepository.php');
	require_once('view/TwigView.php');
	require_once('view/BackEndAdmin.php');
	require_once('view/VistaTipoHospedaje.php');
	require_once('view/VistaPersona.php');

	if(isset($_GET["action"])&& $_GET["action"] == 'configuracion'){
		BackEndAdminController::getInstance()->configuracion();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'cerrarsesion'){
		SeguridadRepository::getInstance()->cerrarSesion();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'listadoTipoHospedaje'){
		TipoHospedajeController::getInstance()->listadoTh();
	}	
	else if(isset($_GET["action"])&& $_GET["action"] == 'listadoUsuarios'){
		PersonaAdminController::getInstance()->listadoUsuarios();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'habilitarUsuario'){
		PersonaAdminController::getInstance()->habilitarUh($_GET['id']);
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'deshabilitarUsuario'){
		PersonaAdminController::getInstance()->deshabilitarUd($_GET['id']);
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'listadoUsuariosPremium'){
		PersonaAdminController::getInstance()->listadoUp();
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'ejecutarAgregarTh'){
		TipoHospedajeController::getInstance()->ejecutarAgregarTh($_POST['nombre']);
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'habilitarTh'){
		TipoHospedajeController::getInstance()->habilitarTh($_GET['id']);
	}
	else if(isset($_GET["action"])&& $_GET["action"] == 'deshabilitarTh'){
		TipoHospedajeController::getInstance()->deshabilitarTh($_GET['id']);
	}
	else{
		BackEndAdminController::getInstance()->home();
	}


?>