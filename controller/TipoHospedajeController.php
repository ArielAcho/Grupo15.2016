<?php
	class TipoHospedajeController {
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
		public function getRolPermitido(){	# Esta Funcion Retornara el Rol Permitido para esta Clase
	    	return $this->rolPermitido;
	    }
		public function listadoTh(){	
		# Muestra El listado de Hospedajes y un formulario para poder agregar nuevos tipos de hospedajes
		#
			$view = new VistaTipoHospedaje;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				$th = TipoHospedajeRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Tipo Hosp.
				$view->showListadoTh($th);
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
		}
		public function habilitarTh($id){
		# Habilita El Tipo de Hospedaje para futuras publicaciones que quisieran usarlo
		#
			$view = new VistaTipoHospedaje;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				TipoHospedajeRepository::getInstance()->habilitarTh($id); #Modifica el Parametro de la BD 
				$th = TipoHospedajeRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Tipo Hosp.
				$view->showListadoTh($th); #Renderiza La Vista del Listado
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
		}
		public function deshabilitarTh($id){
		# Deshabilita El Tipo de Hospedaje para futuras publicaciones no lo puedan utilizar
		#
			$view = new VistaTipoHospedaje;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				TipoHospedajeRepository::getInstance()->deshabilitarTh($id); #Modifica el Parametro de la BD
				$th = TipoHospedajeRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Tipo Hosp.
				$view->showListadoTh($th); #Renderiza La Vista del Listado
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
		}
		public function ejecutarAgregarTh($nombre){
		#Ejecuta el Agregar Tipo de Hospedaje, agrega a la base de datos el "nombre del Tipo de Hospedaje"
		#
			$view = new VistaTipoHospedaje;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				TipoHospedajeRepository::getInstance()->agregar($nombre);
				$th = TipoHospedajeRepository::getInstance()->listAll(); #Solicita a la BD el Listado de Tipo Hosp.
				$view->showListadoTh($th); #Renderiza La Vista del Listado
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
		}
	}
?>