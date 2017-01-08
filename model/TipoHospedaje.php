<?php
	class TipoHospedaje{
		private $id;
		private $nombre;
		private $estado;

		public function __construct($id, $nombre, $estado) {
			$this->id = $id;
			$this->nombre = $nombre;			
			$this->estado = $estado;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getNombre() {
			return $this->nombre;
		}
		public function getEstado() {
			return $this->estado;
		}

		public function setId($args){
			$this->id;
		}
		public function setNombre($args) {
			$this->nombre=$args;
		}
		public function setEstado($args) {
			$this->estado=$args;
		}
	}
?>