<?php

	class HomeController {
		private static $instance;

		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new self();
			}
			return self::$instance;
		}

		private function __construct() {

		}
		public function registrar(){
			$view = new Home();
			$view->showRegistrar();
		}
		public function ingresar(){
			$view = new Home();
			$view->showIngresar();
		}
		public function ejecutarRegistrar($args){
			#$existe = PersonaRepository::getInstance()->verificarUsuario($args[''],$args['']);
			
		}
		public function ejecutarIngresar($args){
			$existe = PersonaRepository::getInstance()->verificarUsuario($args['email'],$args['clave']);
			if(is_null($existe[0])){

			}else{
				header(Location:)
			}

		}
		public function home(){
			$view = new Home();
			$view->show();
		}
	}



?>