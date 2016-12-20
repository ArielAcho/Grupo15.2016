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
		public function listAll(){
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			return $this->queryList("SELECT * FROM persona",[],$mapper);
		}
		public function agregar($args){
			return $this->queryExecute("INSERT INTO persona (nombrep, apellidop, emailp, fec_nacp, passwp, premiump, baneadop, adminp)VALUES(?, ?, ?, ?, ?, ?, ?, ?)",[$args]);
		}
		public function verificarUsuario($usuario,$clave){
			$mapper = function($row){
				return $resource = new Persona($row['idpersona'],$row['nombrep'], $row['apellidop'], $row['emailp'], $row['fec_nacp'], $row['passwp'], $row['premiump'], $row['baneadop'], $row['adminp']);
			};
			return $this->queryList("SELECT * FROM persona where emailp=? and passwp=?",[$usuario,$clave],$mapper);
		}
	}
?>