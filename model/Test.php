<?php
	
	require_once('PDORepository.php');
	require_once('Persona.php');
	require_once('PersonaRepository.php');
	require_once('Publicacion.php');
	require_once('PublicacionRepository.php');
	
	//$persona = PersonaRepository::getInstance()->verificarUsuario('carl.12@gmail.com','car123');

	//var_dump($persona);

	


	#PersonaRepository::getInstance()->agregar(['carlos','Tulp','tulp@gmail','1983-09-28','123450','0','0','0']);
			$publicaciones = PublicacionRepository::getInstance()->listAll();

var_dump($publicaciones);
	
?>