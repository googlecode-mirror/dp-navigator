<?php
abstract class AbstractDbConnexion{
	protected $host;
	protected $user;
	protected $password;
	protected $db ;
	protected $connexion;	
	
	function __construct($host,$user,$password,$db){
		$this->db = $db;
		$this->connexion = $this->connect($host,$user,$password,$db);
		
		if($this->connexion==0){
					die(file_get_contents("Maintenance.html"));
		}
		
	}
	abstract protected function connect($host,$user,$password,$db);
	abstract protected function exec($query);
	public  function execQuery($query){
		if(!$resultSet = $this->exec($query)){
			throw new Exception($this->SGBDMessage());
			die(file_get_contents("Maintenance.html"));
		}else{
			
		return $resultSet;	
		}
		
		
	}
	
abstract public function nextObject($resultSet);
abstract public function nextLine($resultSet);
abstract public function nextArray($resultSet);
	
abstract public function SGBDMessage();
abstract public function resultSetNumRows($resultSet);
abstract public function freeResult($resultSet);
abstract public function lastInsertId();
	
	
}
?>