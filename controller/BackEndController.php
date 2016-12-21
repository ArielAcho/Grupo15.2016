<?php

	class BackEndController {
		private static $instance;
		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new self();
			}
			return self::$instance;
		}
		private function __construct() {

		}
		public function home(){
			$publicaciones = PublicacionRepository::getInstance()->listAll();
			$view = new BackEnd();
			$view->show($publicaciones);
		}
		public function configuracion(){
			$view = new BackEnd();
			$view->showConfiguracion();
		}
	}



?>