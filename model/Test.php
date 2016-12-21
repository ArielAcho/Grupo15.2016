<?php
	
	require_once('PDORepository.php');
	require_once('Persona.php');
	require_once('PersonaRepository.php');

	
	//$persona = PersonaRepository::getInstance()->verificarUsuario('carl.12@gmail.com','car123');

	//var_dump($persona);

	$args = array();
	$args[0]='mmm<br>';
	$args[2]='<BR> lalalala';
	$list = [];
	foreach ($args as $key => $elemento) {
		if(isset($elemento)){
			$list[] = strip_tags($elemento);
		}
	}

	var_dump($list);


	#PersonaRepository::getInstance()->agregar(['carlos','Tulp','tulp@gmail','1983-09-28','123450','0','0','0']);

	
?>