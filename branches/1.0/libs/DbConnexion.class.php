<?php
class DbConnexion extends AbstractDbConnexion{
	/*
	 * CONSTRUCTOR
	 */
	
	function __construct($host, $user, $password, $db){
		
	parent::__construct($host,$user,$password,$db);
	    
	}	

	protected function connect($host,$user,$password,$db){
	if(!$this->connexion = mysql_connect($host,$user,$password)){
		return 0; 
	} 
    if (!mysql_select_db($db, $this->connexion)){
    	return 0;
    }
   return $this->connexion;
	}
	protected function exec($query){
		$resultSet = mysql_query($query,$this->connexion);
		return $resultSet;
		
	}
	
	public function resultSetNumRows($resultSet){
	return $num =  mysql_num_rows($resultSet);	
	}
	public function freeResult($resultSet){
		mysql_free_result($resultSet);
	}
	/*
	 * next object in the resultSet
	 */
	 public function nextObject($resultSet){
	 	
		return mysql_fetch_object($resultSet);
	}
	 public function nextLine($resultSet){
		
		return mysql_fetch_assoc($resultSet);
	}
	 public function nextArray($resultSet){
		
		return mysql_fetch_row($resultSet);
	}
	
	 public function SGBDMessage(){
		return mysql_error($this->connexion);
	}
	 public function lastInsertId(){
	 	return mysql_insert_id($this->connexion);
	}
	
	
	/*
	 * DESTRUCTOR
	 */
	function __destruct(){
	if($this->connexion){
	//mysql_close($this->connexion);
	}	
	}
	
	
	
	
	
}

?>
