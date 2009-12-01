<?php
class Situation{
	private $situationId;
	private $situationName;
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
		return $this->situationId;
	}

	public function getName(){
		return $this->situationName;
	}

	public function setId($situationId){
		$this->situationId = $situationId;
	}

	public function setName($situationName){
		$this->situationName = $situationName;
	}

	static public function getAllSituation(){
		$db = self::getDb();
		$query = "select * from situation_type";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet))
		{
			$situations[$i]['num'] = $i+1;
			$situations[$i]['id'] =  $row["situation_type_id"];
			$situations[$i]['name'] = $row["situation_type"];
			$i++;
		}
		$_SESSION['situationsize'] = $db->resultSetNumRows($resultSet); ;
		return $situations;
	}
	
	static public function getOneSituation($id)
	{
		$db = self::getDb();
		$query = "select * from situation_type where situation_type_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$situation['id'] = $row["situation_type_id"];
		$situation['name'] = $row["situation_type"];
		return $situation;
	}
	
	public function newSituation(){
		$db = $this->getDb();
		$flag = true;
		$query = "INSERT INTO situation_type VALUES ('','".$this->situationName."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateSituation($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update situation_type SET situation_type='".$this->situationName."' where situation_type_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteSituation($id)
	{
		$db = self::getDb();
		$flag = true;
		$query = "delete from situation_type where situation_type_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}

}
?>