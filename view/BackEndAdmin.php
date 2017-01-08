<?php
	class BackEndAdmin extends TwigView {
		private $rol;
		private function getRol(){
			return $this->rol=SeguridadRepository::getInstance()->getRol();
		}
		public function show($args,$fecha){
			echo self::getTwig()->render('backend.html.twig', array('args' => $args, 'fecha' => $fecha, 'rol' => $this->getRol()));
		}
		public function showConfiguracion($args){
			echo self::getTwig()->render('Admin/configuracion.html.twig', array('args' => $args, 'rol' => $this->getRol()));
		}
		public function showError($str){
			echo self::getTwig()->render('error.html.twig', array('error' => $str ));
		}
	}
?>