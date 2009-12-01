<?php
class Comment{
	private $id;
	private $dp;
	private $comment;
	private $autor;
	private $creationDate;
	private $dbm;
	private $dba;
	
	function __construct()	{
		//$dbm = $this->getDb();
	}

	/**
	 * SETTERS AND GETTERS
	 * @return unknown_type
	 */
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





	public function getId(){
		return $this->id;
	}
	
	public function getDp(){
		return $this->dp;
	}
	
	public function getComment(){
		return $this->comment;
	}
	
	public function getAutor(){
		return $this->autor;
	}
	public function getDate(){
	 return $this->creationDate;
	}
	
	
	public function setId($id){
	 $this->id = $id;
	}
	public function setDp($dp){
	 $this->dp= $dp;
	}
	public function setComment($comment){
	 $this->comment = $comment;
	}
	public function setAutor($autor){
	 $this->autor = $autor;
	}
	public function setDate($creationDate){
	 $this->creationDate = $creationDate;
	}
	
	
/*
	 * Save Dp comment
	 */
	
 public function saveDpComment(){
		$db = $this->getDb();
		$id = NULL;
		$query = "INSERT INTO comment VALUES ('".$id."','".$this->dp."','".$this->comment."','".$this->autor."','".$this->creationDate."')";
		$flag = $db->execQuery($query);
		$this->id = $db->lastInsertId();
		if($flag){
			return true;
		}else{
			return false;
		}
		
	}	
static public function getAllComment(){
	$db = self::getDb();
	$query = "SELECT C.comment_text,C.comment_date,U.user_id,P.pattern_id,P.pattern_name FROM comment C,pattern P,user U Where C.comment_autor = U.user_id AND C.comment_dp=P.pattern_id ";
	$resultSet = $db->execQuery($query);
	$i=0;
	while ($row = $db->nextLine($resultSet)){
				$comment[$i]['autor'] = $row['user_login'];
				$comment[$i]['comment'] = $row['comment_text'];
				$comment[$i]['commentDate'] = date('d/m/Y',$row['comment_date']);
				$comment[$i]['patternName'] = $row['pattern_name'];
				$comment[$i]['patternId'] = $row['pattern_id'];
				$i++;
			}	
	
return $comment;	
}


static public function getAllCommentByDpId($dpId){
	$db = self::getDb();
	$query = "SELECT C.comment_text,C.comment_date,U.user_id,P.pattern_id,P.pattern_name FROM comment C,pattern P,user U Where C.comment_autor = U.user_id AND C.comment_dp=P.pattern_id AND C.comment_dp='".$dpId."'";
	$resultSet = $db->execQuery($query);
	$i=0;
	while ($row = $db->nextLine($resultSet)){
				$comment[$i]['autor'] = $row['user_login'];
				$comment[$i]['comment'] = $row['comment_text'];
				$comment[$i]['commentDate'] = date('d/m/Y',$row['comment_date']);
				$comment[$i]['patternName'] = $row['pattern_name'];
				$comment[$i]['patternId'] = $row['pattern_id'];
				$i++;
			}	
	
return $comment;	
}

	
}
?>