<?php
	session_start();
	require_once('PDORepository.php');
	require_once('SeguridadRepository.php');

	require_once('Persona.php');
	require_once('PersonaRepository.php');
	require_once('Publicacion.php');
	require_once('PublicacionRepository.php');
	require_once('TipoHospedaje.php');
	require_once('TipoHospedajeRepository.php');
	
		PublicacionRepository::getInstance()->habilitarPublicaciones('1');



?>