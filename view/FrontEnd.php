<?php
	class FrontEnd extends TwigView {
		public function show(){
			echo self::getTwig()->render('frontend.html.twig');
		}
		public function showRegistrar(){
			echo self::getTwig()->render('./Frontendhome/registrar.html.twig');
		}
		public function showIngresar(){
			echo self::getTwig()->render('./Frontendhome/ingresar.html.twig');
		}
		public function showError($str){
			echo self::getTwig()->render('./Frontendhome/error.html.twig', array('error' => $str ));
		}
	}
?>