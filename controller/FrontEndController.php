<?php

	class FrontEndController {
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
			$view = new FrontEnd();
			$view->showRegistrar();
		}
		public function ingresar(){
			$view = new FrontEnd();
			$view->showIngresar();
		}
		public function ejecutarRegistrar($args){
			$view = new FrontEnd();
			if( isset($args['email']) && isset($args['clave']) && isset($args['segclave']) && isset($args['nombre']) && isset($args['apellido']) && isset($args['fecha']) && (sizeof($args)==6)){
				if ( $args['clave'] == $args['segclave']){
					$existe = PersonaRepository::getInstance()->verificarCuenta($args['email']);
					if(is_null($existe[0])){
						PersonaRepository::getInstance()->agregar([strip_tags($args['nombre']),strip_tags($args['apellido']), strip_tags($args['email']),strip_tags($args['fecha']),strip_tags($args['clave'])]);
						$existe = PersonaRepository::getInstance()->verificarUsuario($args['email'],$args['clave']);
						SeguridadRepository::getInstance()->loguear($existe[0]);
					}else{
						$view->showError('Ya Se Encuentra Registrado');
					}
				}else{
					$view->showError('Clave No Coincidentes');
				}
			}else{
				$view->showError('Parametros Inesperados');
			}
		}
		public function ejecutarIngresar($args){
			$view = new FrontEnd();
			if(isset($args['email']) && isset($args['clave']) && sizeof($args)==2){
				$existe = PersonaRepository::getInstance()->verificarUsuario($args['email'],$args['clave']);
				if(!is_null($existe[0])){
					if($existe[0]->getBaneado() == 0){
						SeguridadRepository::getInstance()->loguear($existe[0]);
					}else{
						$view->showError('Cuenta Baneada');
					}
				}else{
					$view->showError('Usuario o Contraseña Incorrecta');
				}
			}else{
				$view->showError('Cantidad de Parametros Inesperada');
			}
		}
		public function home(){
			$view = new FrontEnd();
			$view->show();
		}
	}



?>