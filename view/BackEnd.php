<?php
	class BackEnd extends TwigView {
		public function show($args){
			echo self::getTwig()->render('backend.html.twig', array('args' => $args));
		}
		public function showConfiguracion(){
			echo self::getTwig()->render('backend.html.twig');
		}
		public function showError($str){
			echo self::getTwig()->render('error.html.twig', array('error' => $str ));
		}
	}
?>