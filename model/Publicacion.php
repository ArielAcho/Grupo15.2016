<?php
	class Publicacion{
		private $id;
		private $imagen;
		private $puntos;
		private $titulo;
		private $descripcion;
		private $fecha;
		private $idtipohosp;
		private $idpersona;
		private $direccion;
		private $respaldo;
		private $capacidad;
		private $estado;

		public function __construct($id, $imagen, $puntos, $titulo, $descripcion, $fecha, $idtipohosp, $idpersona, $direccion,$respaldo,$capacidad,$estado) {
			$this->id = $id;
			$this->imagen = $imagen;			
			$this->puntos = $puntos;
			$this->titulo = $titulo;
			$this->descripcion = $descripcion;
			$this->fecha = $fecha;
			$this->idtipohosp = $idtipohosp;
			$this->idpersona = $idpersona;
			$this->direccion = $direccion;
			$this->respaldo = $respaldo;
			$this->capacidad = $capacidad;
			$this->estado = $estado;
		}
		
		public function getId() {
			return $this->id;
		}
		public function getImagen() {
			return $this->imagen;
		}
		public function getPuntos() {
			return $this->puntos;
		}
		public function getTitulo() {
			return $this->titulo;
		}
		public function getDescripcion() {
			return $this->descripcion;
		}
		public function getFecha() {
			return $this->fecha;
		}
		public function getIdtipohosp() {
			return $this->idtipohosp;
		}
		public function getIdpersona() {
			return $this->idpersona;
		}
		public function getDireccion() {
			return $this->direccion;
		}
		public function getRespaldo() {
			return $this->respaldo;
		}
		public function getCapacidad() {
			return $this->capacidad;
		}
		public function getEstado() {
			return $this->estado;
		}
	}
?>