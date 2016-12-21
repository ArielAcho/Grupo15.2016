<?php
	class Persona{
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
		
		public function getId(){
			return $this->id;
		}
		public function getNombre() {
			return $this->nombre;
		}
		public function getApellido() {
			return $this->apellido;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getFechanac() {
			return $this->fechanac;
		}
		public function getContrasenia() {
			return $this->contrasenia;
		}
		public function getPremium() {
			return $this->premium;
		}
		public function getBaneado() {
			return $this->baneado;
		}
		public function getAdmin() {
			return $this->admin;
		}
	}
?>