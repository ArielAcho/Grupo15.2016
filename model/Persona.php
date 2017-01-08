<?php
	class Persona{
		# Variables Del Tipo Privada
		private $id; 
		private $nombre; 
		private $apellido; 
		private $email; 
		private $fechanac; 
		private $contrasenia; 
		private $premium; 
		private $baneado; 
		private $admin; 

		public function __construct($id, $nombre, $apellido, $email, $fechanac, $contrasenia, $premium, $baneado, $admin) {
			$this->id = $id;
			$this->nombre = $nombre;			
			$this->apellido = $apellido;
			$this->email = $email;
			$this->fechanac = $fechanac;
			$this->contrasenia = $contrasenia;
			$this->premium = $premium;
			$this->baneado = $baneado;
			$this->admin = $admin;
		}
		
		public function getId(){ # Retorna el valor del Parametro
			return $this->id;
		}
		public function getNombre(){ # Retorna el valor del Parametro
			return $this->nombre;
		}
		public function getApellido(){ # Retorna el valor del Parametro
			return $this->apellido;
		}
		public function getEmail(){ # Retorna el valor del Parametro
			return $this->email;
		}
		public function getFechaNac(){ # Retorna el valor del Parametro
			return $this->fechanac;
		}
		public function getContrasenia(){ # Retorna el valor del Parametro
			return $this->contrasenia;
		}
		public function getPremium(){ # Retorna el valor del Parametro
			return $this->premium;
		}
		public function getBaneado(){ # Retorna el valor del Parametro
			return $this->baneado;
		}
		public function getAdmin(){ # Retorna el valor del Parametro
			return $this->admin;
		}

		public function setId($args){ # Se utilizan para modifiacar el Valor del Parametro
			$this->id;
		}
		public function setNombre($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->nombre=$args;
		}
		public function setApellido($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->apellido=$args;
		}
		public function setEmail($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->email=$args;
		}
		public function setFechaNac($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->fechanac=$args;
		}
		public function setContrasenia($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->contrasenia=$args;
		}
		public function setPremium($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->premium=$args;
		}
		public function setBaneado($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->baneado=$args;
		}
		public function setAdmin($args) { # Se utilizan para modifiacar el Valor del Parametro
			$this->admin=$args;
		}
	}
?>