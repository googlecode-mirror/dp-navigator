<?php
class Actor{
	private $actorId;
	private $actorName;
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
		return $this->actorId;
	}

	public function getName(){
		return $this->actorName;
	}

	public function setId($actorId){
		$this->actorId = $actorId;
	}

	public function setName($actorName){
		$this->actorName = $actorName;
	}

	static public function getAllActor(){
		$db = self::getDb();
		$query = "select * from actors";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet))
		{
			$actors[$i]['num'] = $i+1;
			$actors[$i]['id'] =  $row["actors_id"];
			$actors[$i]['name'] = $row["actors_type"];
			$i++;
		}
		$_SESSION['actorsize'] = $db->resultSetNumRows($resultSet); ;
		return $actors;
	}
	
	static public function getOneActor($id)
	{
		$db = self::getDb();
		$query = "select * from actors where actors_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$actor['id'] = $row["actors_id"];
		$actor['name'] = $row["actors_type"];
		return $actor;
	}
	
	public function newActor(){
		$db = $this->getDb();
		$flag = true;
		$query = "INSERT INTO actors VALUES ('','".$this->actorName."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateActor($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update actors SET actors_type='".$this->actorName."' where actors_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteActor($id)
	{
		$db = self::getDb();
		$flag = true;
		$query = "delete from actors where actors_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}

}
?>