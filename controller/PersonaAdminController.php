<?php
	class PersonaAdminController{
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
	    public function listadoUp(){	
	    # Retorna el Listado de Usuarios Premium del Sistema
	    #
	    	$view = new VistaPersona;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				$up = PersonaRepository::getInstance()->listadoUp(); #Solicita a la BD el Listado de Usuarios Premium.
				$view->showListadoUp($up);
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
	    }
	    public function listadoUsuarios(){	
	    # Retorna el Listado de Usuarios del Sistema
	    #
	    	$view = new VistaPersona;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				$uH = PersonaRepository::getInstance()->listadoUsuariosHabilitados(); #Solicita a la BD el Listado de Usuarios Habilitados.
				$uD = PersonaRepository::getInstance()->listadoUsuariosDeshabilitados(); #Solicita a la BD el Listado de Usuarios Deshabilitados.
				$view->showListadoUsuarios($uH,$uD);
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
	    }
	    public function habilitarUh($id){
		# Retorna el Listado de Usuarios Habilitados del Sistema
	    #
	    	$view = new VistaPersona;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				PersonaRepository::getInstance()->habilitarUsuario($id); # Habilita la Cuenta del Usuario
				PublicacionRepository::getInstance()->habilitarPublicaciones($id); # Habilita las Publicaciones de la Cuenta del Usuario
				$uH = PersonaRepository::getInstance()->listadoUsuariosHabilitados(); #Solicita a la BD el Listado de Usuarios Habilitados.
				$uD = PersonaRepository::getInstance()->listadoUsuariosDeshabilitados(); #Solicita a la BD el Listado de Usuarios Deshabilitados.
				$view->showListadoUsuarios($uH,$uD);
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
	    }
	    public function deshabilitarUd($id){
		# Retorna el Listado de Usuarios Deshabilitados del Sistema
	    #
	    	$view = new VistaPersona;
			if(in_array(SeguridadRepository::getInstance()->getRol(), $this->getRolPermitido())){ # Verifica su Rol
				PersonaRepository::getInstance()->deshabilitarUsuario($id); # Deshabilita la Cuenta del Usuario
				PublicacionRepository::getInstance()->deshabilitarPublicaciones($id); # Deshabilita las Publicaciones de la Cuenta del Usuario
				$uH = PersonaRepository::getInstance()->listadoUsuariosHabilitados(); #Solicita a la BD el Listado de Usuarios Habilitados.
				$uD = PersonaRepository::getInstance()->listadoUsuariosDeshabilitados(); #Solicita a la BD el Listado de Usuarios Deshabilitados.
				$view->showListadoUsuarios($uH,$uD);
			}else{
				$view->showError('Usted no es Administrador'); #Si No Cumple con el Rol se ejecuta una Alerta
			}
	    }
	}
?>