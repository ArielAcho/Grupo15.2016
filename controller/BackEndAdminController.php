<?php
	class BackEndAdminController {
		private static $instance;
  		private $rolPermitido = array('1'); # El Administrador se identificara con el Valor "1"
		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance = new self();
			}
			return self::$instance;
		}
		private function __construct() {

		}
		public function getRolPermitido(){ # Esta Funcion Retornara el Rol Permitido para esta Clase
	    	return $this->rolPermitido;
	    }
		public function home(){
			$view = new BackEndAdmin();	# Se Crea un Objeto del Tipo Vista Administrador
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				$publicaciones = PublicacionRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Publicaciones.
				$tipohospedaje = TipoHospedajeRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Tipo Hosp.
				foreach ($publicaciones as $p){	# Se modifica el indice de tipo de hospedaje por el nombre del Tipo Hosp.
					foreach ($tipohospedaje as $tp) {
						if($p->getIdtipohosp()==$tp->getId()){
							$p->setIdtipohosp($tp->getNombre());
						}
					}
				} #
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$fecha=date('Y-m-d'); # Se setea la fecha con el formato actual del Pais y la Provincia
				$view->show($publicaciones,$fecha);	# Se Renderizan Todas las publicaciones hasta la fecha
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
		}
		public function configuracion(){
			$view = new BackEndAdmin(); # Se Crea un Objeto del Tipo Vista Administrador
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				$myId = SeguridadRepository::getInstance()->getId(); # A la Clase de Seguridad se le solicita el ID del Usuario
				$publications = PublicacionRepository::getInstance()->myPublications($myId); # Se utiliza el ID para solicitar a la BD las Publicaciones
				$tipohospedaje = TipoHospedajeRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Tipo Hosp.
				foreach ($publications as $p){ # Se modifica el indice de tipo de hospedaje por el nombre del Tipo Hosp.
					foreach ($tipohospedaje as $tp) {
						if($p->getIdtipohosp()==$tp->getId()){
							$p->setIdtipohosp($tp->getNombre());
						}
					}
				}
				$view->showConfiguracion($publications); # Se Renderizan Todas las publicaciones hasta la fecha
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
		}
	}



?>