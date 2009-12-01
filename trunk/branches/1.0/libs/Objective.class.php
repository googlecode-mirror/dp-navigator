<?php
class Objective{
	private $objectiveId;
	private $objectiveName;
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
		return $this->objectiveId;
	}

	public function getName(){
		return $this->objectiveName;
	}

	public function setId($objectiveId){
		$this->objectiveId = $objectiveId;
	}

	public function setName($objectiveName){
		$this->objectiveName = $objectiveName;
	}

	static public function getAllObjective(){
		$db = self::getDb();
		$query = "select * from  solution_objective";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet))
		{
			$objectives[$i]['num'] = $i+1;
			$objectives[$i]['id'] =  $row["solution_objective_id"];
			$objectives[$i]['name'] = $row["solution_objective_name"];
			$i++;
		}
		$_SESSION['objectivesize'] = $db->resultSetNumRows($resultSet); ;
		return $objectives;
	}
	
	static public function getOneObjective($id)
	{
		$db = self::getDb();
		$query = "select * from solution_objective where solution_objective_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$objective['id'] = $row["solution_objective_id"];
		$objective['name'] = $row["solution_objective_name"];
		return $objective;
	}
	
	public function newObjective(){
		$db = $this->getDb();
		$flag = true;
		$query = "INSERT INTO solution_objective VALUES ('','".$this->objectiveName."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateObjective($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update solution_objective SET solution_objective_name='".$this->objectiveName."' where solution_objective_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteObjective($id)
	{
		$db = self::getDb();
		$flag = true;
		$query = "delete from objective where objective_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}

}
?>