<?php
	class VistaPersona extends TwigView {
		private $rol;
		private function getRol(){
			return $this->rol=SeguridadRepository::getInstance()->getRol();
		}
		public function showListadoUp($args){
			echo self::getTwig()->render('Usuario/usuariopremium.html.twig', array('args' => $args, 'rol' => $this->getRol()));
		}
		public function showListadoUsuarios($uH,$uD){
			echo self::getTwig()->render('Usuario/listadousuarios.html.twig', array('uh' => $uH, 'ud' => $uD, 'rol' => $this->getRol()));
		}
		public function showError($str){
			echo self::getTwig()->render('error.html.twig', array('error' => $str ));
		}
	}
?>