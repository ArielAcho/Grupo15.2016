<?php
abstract class PDORepository{
	const USERNAME="root";
	const PASSWORD="";
	const HOST="localhost";
	const DB="couchinn";

	private function getConnection(){
		$u=self::USERNAME;
		$p=self::PASSWORD;
		$db=self::DB;
		$host=self::HOST;

		$connection = new PDO("mysql:dbname=$db;host=$host",$u,$p);
		return $connection;
	}
	  protected function queryList($sql, $args, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
       	$list=[];
        while($element=$stmt->fetch()){
            $list[]=$mapper($element);
        }
        return $list;
    }
	protected function queryExecute($sql,$args){
		$connection= $this->getConnection();
		$stmt= $connection->prepare($sql);
		$stmt->execute($args);
	}
}