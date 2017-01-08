<?php

	class PublicacionRepository extends PDORepository{
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
				return $resource = new Publicacion($row['idpublicacion'],$row['imagen'],$row['puntos'],$row['titulo'],
					$row['descripcion'],$row['fechapubl'],$row['idtipohosp0'],$row['idpersona3'],
					$row['direccion'],$row['respaldo'],$row['capacidad'],$row['estado']);
			};
			return $this->queryList("SELECT * FROM publicacion where estado=0",[],$mapper);
		}
		public function myPublications($myId){
			$mapper = function($row){
				return $resource = new Publicacion($row['idpublicacion'],$row['imagen'],$row['puntos'],$row['titulo'],
					$row['descripcion'],$row['fechapubl'],$row['idtipohosp0'],$row['idpersona3'],
					$row['direccion'],$row['respaldo'],$row['capacidad'],$row['estado']);
			};
			return $this->queryList("SELECT * FROM publicacion where estado=0 and idpersona3=?",[$myId],$mapper);
		}
		public function habilitarPublicaciones($id){
			return $this->queryExecute("UPDATE publicacion SET estado=0 where idpersona3=?",[$id]); # el Valor 0 se identifica como habilitado
		}
		public function deshabilitarPublicaciones($id){
			return $this->queryExecute("UPDATE publicacion SET estado=1 where idpersona3=?",[$id]); # el Valor 1 se identifica como deshabilitado
		}
	}
?>