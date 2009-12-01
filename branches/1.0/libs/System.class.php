<?php
class System{
	private $systemId;
	private $systemName;
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
		return $this->systemId;
	}

	public function getName(){
		return $this->systemName;
	}

	public function setId($systemId){
		$this->systemId = $systemId;
	}

	public function setName($systemName){
		$this->systemName = $systemName;
	}

	static public function getAllSystem(){
		$db = self::getDb();
		$query = "select * from system_type";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet))
		{
			$systems[$i]['num'] = $i+1;
			$systems[$i]['id'] =  $row["system_type_id"];
			$systems[$i]['name'] = $row["system_type"];
			$i++;
		}
		$_SESSION['systemsize'] = $db->resultSetNumRows($resultSet); ;
		return $systems;
	}
	
	static public function getOneSystem($id)
	{
		$db = self::getDb();
		$query = "select * from system_type where system_type_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$system['id'] = $row["system_type_id"];
		$system['name'] = $row["system_type"];
		return $system;
	}
	
	public function newSystem(){
		$db = $this->getDb();
		$flag = true;
		$query = "INSERT INTO system_type VALUES ('','".$this->systemName."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateSystem($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update system_type SET system_type='".$this->systemName."'  where system_type_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteSystem($id)
	{
		$db = self::getDb();
		$flag = true;
		$query = "delete from system_type_id where system_type_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}

}
?>