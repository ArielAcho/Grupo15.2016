<?php
	class Home extends TwigView {
		public function show(){
			echo self::getTwig()->render('frontend.html.twig');
		}
		public function showRegistrar(){
			echo self::getTwig()->render('./home/registrar.html.twig');
		}
		public function showIngresar(){
			echo self::getTwig()->render('./home/ingresar.html.twig');
		}
	}
?>