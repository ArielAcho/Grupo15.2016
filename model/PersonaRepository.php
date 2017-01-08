<?php

	class PersonaRepository extends PDORepository{
		private static $instance;
		
		public static function getInstance(){
			if(!isset(self::$instance)){
				self::$instance=new self();
			}
			return self::$instance;
		}
		private function __construct(){
		}
		public function listAll(){	# Retorna el Listado de todos los Usuarios del Sistema
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			# Si no se encuentra se retorna un arreglo vacio
			return $this->queryList("SELECT * FROM persona",[],$mapper);
		}
		public function agregar($args){ # Agrega un Nuevo Usuario al Sistema
			return $this->queryExecute("INSERT INTO persona (nombrep, apellidop, emailp, fec_nacp, passwp, premiump, baneadop, adminp)VALUES(?, ?, ?, ?, ?, 0, 0, 0)",$args);
		}
		public function verificarUsuario($usuario,$clave){	# Verifica si coinciden el Usuario y la Contraseña
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			# Si no se encuentra se retorna un arreglo vacio
			return $this->queryList("SELECT * FROM persona where emailp=? and passwp=?",[$usuario,$clave],$mapper);
		}
		public function verificarCuenta($usuario){ # Verifica si el usuario Existe en el Sistema
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			# Si no se encuentra se retorna un arreglo vacio
			return $this->queryList("SELECT * FROM persona where emailp=?",[$usuario],$mapper);
		}
		public function listadoUp(){	# Retorna el Listado de todos los Usuarios Premium del Sistema
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			# Si no se encuentra se retorna un arreglo vacio
			return $this->queryList("SELECT * FROM persona WHERE premiump=1 and baneadop=0",[],$mapper);
		}
		public function listadoUsuariosHabilitados(){	# Retorna el Listado de todos los Usuarios Habilitados del Sistema
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			# Si no se encuentra se retorna un arreglo vacio
			return $this->queryList("SELECT * FROM persona WHERE baneadop=0",[],$mapper);
		}
		public function listadoUsuariosDeshabilitados(){	# Retorna el Listado de todos los Usuarios Deshabilitados del Sistema
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			# Si no se encuentra se retorna un arreglo vacio
			return $this->queryList("SELECT * FROM persona WHERE baneadop=1",[],$mapper);
		}
		public function habilitarUsuario($id){
			return $this->queryExecute("UPDATE persona SET baneadop=0 where idpersona=?",[$id]);
		}
		public function deshabilitarUsuario($id){
			return $this->queryExecute("UPDATE persona SET baneadop=1 where idpersona=?",[$id]);
		}
	}
?>