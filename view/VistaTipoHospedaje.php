<?php
	class VistaTipoHospedaje extends TwigView {
		private $rol;
		private function getRol(){
			return $this->rol=SeguridadRepository::getInstance()->getRol();
		}
		public function showListadoTh($args){
			echo self::getTwig()->render('TipoHosp/listadotipohospedaje.html.twig', array('args' => $args, 'rol' => $this->getRol()));
		}
		public function showError($str){
			echo self::getTwig()->render('error.html.twig', array('error' => $str ));
		}
	}
?>