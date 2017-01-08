<?php

	class TipoHospedajeRepository extends PDORepository{
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
				return $resource = new TipoHospedaje($row['idtipohospedaje'],$row['nombre'],$row['estado']);
			};
			return $this->queryList("SELECT * FROM tipohospedaje",[],$mapper);
		}
		public function listAllEnable(){
			$mapper = function($row){
				return $resource = new TipoHospedaje($row['idtipohospedaje'],$row['nombre'],$row['estado']);
			};
			return $this->queryList("SELECT * FROM tipohospedaje where estado=0",[],$mapper);
		}
		public function agregar($nombre){
			return $this->queryExecute("INSERT INTO tipohospedaje(nombre,estado) VALUES(?,0)",[$nombre]);
		}
		public function habilitarTh($id){
			return $this->queryExecute("UPDATE tipohospedaje SET estado=0 where idtipohospedaje=?",[$id]);
		}
		public function deshabilitarTh($id){
			return $this->queryExecute("UPDATE tipohospedaje SET estado=1 where idtipohospedaje=?",[$id]);
		}
	}
?>