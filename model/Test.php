<?php
	
	require_once('PDORepository.php');
	require_once('Persona.php');
	require_once('PersonaRepository.php');

	
	$persona = PersonaRepository::getInstance()->verificarUsuario('carl.12@gmail.com','car123');

	var_dump($persona);


	
?>+