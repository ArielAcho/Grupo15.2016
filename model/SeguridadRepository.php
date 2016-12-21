<?php
	class SeguridadRepository{
		/*Esta variable esta para "instanciar" la clase sin hacer el new*/
		private static $instance;
		/*La funcion retorna una instancia de la clase*/
		public static function getInstance(){
	    	if(!isset(self::$instance)){
		      self::$instance=new self();
		    }
		    return self::$instance;
		}

		public function loguear($args){ 
			session_start();
			$_SESSION['usuarioId']= $args->getId();
			$_SESSION['usuarioNombre']= $args->getNombre();
			$_SESSION['usuarioApellido']= $args->getApellido();
			$_SESSION['usuarioEmail']= $args->getEmail();
			$_SESSION['usuarioFechaNac']= $args->getFechaNac();
			$_SESSION['usuarioPremium']= $args->getPremium();
			$_SESSION['usuarioRol']=$args->getAdmin();
			$_SESSION['token'] = md5(uniqid(mt_rand(), true));
			header('Location: admin.php');
		}

	    public function verificarLogueo(){	
			if ( isset($_SESSION['usuarioId']) 
				&& isset($_SESSION['usuarioNombre']) 
				&& isset($_SESSION['usuarioApellido']) 
				&& isset($_SESSION['usuarioEmail']) 
				&& isset($_SESSION['usuarioFechaNac'])
				&& isset($_SESSION['usuarioPremium'])
				&& isset($_SESSION['usuarioRol'])){
				return true;
			}
		}

		public function cerrarSesion(){ 
			session_destroy();
			header('Location: index.php');
		}

		/*public function verificarRolGestor(){
			$usuario = $_SESSION['usuarioID'];
			if(isset ($_SESSION['rolUsuario'])){
				if($_SESSION['rolUsuario'] == 2){
					return true;
				}
			}
			else{return false;}
		}

		public function verificarRolAdministrador(){
			//Tomo al usuario para luego mostrarlo en la pagina.
			$usuario = $_SESSION['usuarioID'];

			if(isset ($_SESSION['rolUsuario'])){

				//Si es administrador
				if($_SESSION['rolUsuario'] == 1){
					return true;
				}
			}
			else{ return false;
			}
		}

		/*public function getRol(){
				$nombreRol;
				if(isset ($_SESSION['rolUsuario'])){
					$roles=RolRepository::getInstance()->listAll();
					for ($i=0; $i<sizeof($roles);$i++){
							if($roles[$i]->getId() == $_SESSION['rolUsuario']){
								$nombreRol=$roles[$i]->getNombre();
							}
					}
					return $nombreRol;
				}else {
					return false;
				}
		}*/

		public function verificarToken($token){
			if (isset ($token) && ($token == $_SESSION['token'])) {
				return 0;
	        }
	    }
    }
    ?>