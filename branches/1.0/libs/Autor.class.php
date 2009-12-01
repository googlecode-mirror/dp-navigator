<?php
class Autor{
	private $autorId;
	private $autorName;
	private $dbm;
	private $dbA;

	function __construct()	{
	}

	/**
	 * SETTERS AND GETTERS
	 * @return unknown_type
	 */
	/*
	 * MYSQL DB
	 */
	private function getDb(){
		if(isset($this)){
			if(! $this->dbm){
				global $dbm;
				$this->setDb(clone $dbm);
			}
			return $this->dbm;
		}else{
			global $dbm;
			$clonedDb = clone $dbm;
			return $clonedDb;
		}
	}

	public function setDb($dbm){
		$this->dbm = $dbm;
	}


	/*
	 * EXIST DB
	 */
	private function getDbA(){
		if(isset($this)){
			if(! $this->dbA){
				global $dbA;
				$this->setDbA(clone $dbA);
			}
			return $this->dbA;
		}else{
			global $dbA;
			$clonedDbA = clone $dbA;
			return $clonedDbA;
		}
	}

	public function setDbA($dbA){
		$this->dbA = $dbA;
	}

	/**
	 * SETTERS AND GETTERS
	 * @return unknown_type
	 */

	public function getId(){
		return $this->autorId;
	}

	public function getName(){
		return $this->autorName;
	}

	public function setId($autorId){
		$this->autorId = $autorId;
	}

	public function setName($autorName){
		$this->autorName = $autorName;
	}

	static public function getAllAutor(){
		$db = self::getDb();
		$query = "select * from autors";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet))
		{
			$autors[$i]['num'] = $i+1;
			$autors[$i]['id'] =  $row["autors_id"];
			$autors[$i]['name'] = $row["autors_name"];
			$i++;
		}
		$_SESSION['autorsize'] = $db->resultSetNumRows($resultSet); ;
		return $autors;
	}
	
	static public function getOneAutor($id)
	{
		$db = self::getDb();
		$query = "select * from autors where autors_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$autor['id'] = $row["autors_id"];
		$autor['name'] = $row["autors_name"];
		return $autor;
	}
	
	public function newAutor(){
		$db = $this->getDb();
		$flag = true;
		$query = "INSERT INTO autors VALUES ('','".$this->autorName."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateAutor($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update autors SET autors_name='".$this->autorName."' where autors_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteAutor($id)
	{
		$db = self::getDb();
		$flag = true;
		$query = "delete from autors where autors_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}

}
?>