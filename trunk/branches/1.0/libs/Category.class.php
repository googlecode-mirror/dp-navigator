<?php
class Category{
	private $categoryId;
	private $categoryName;
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
		return $this->categoryId;
	}

	public function getName(){
		return $this->categoryName;
	}

	public function setId($categoryId){
		$this->categoryId = $categoryId;
	}

	public function setName($categoryName){
		$this->categoryName = $categoryName;
	}

	static public function getAllCategory(){
		$db = self::getDb();
		$query = "select * from category";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet))
		{
			$categories[$i]['num'] = $i+1;
			$categories[$i]['id'] =  $row["category_id"];
			$categories[$i]['name'] = $row["category_name"];
			$i++;
		}
		$_SESSION['categorysize'] = $db->resultSetNumRows($resultSet); ;
		return $categories;
	}
	
	static public function getOneCategory($id)
	{
		$db = self::getDb();
		$query = "select * from category where category_id='".$id."'";
		$resultSet = $db->execQuery($query);
		$row = $db->nextLine($resultSet);
		$category['id'] = $row["category_id"];
		$category['name'] = $row["category_name"];
		return $category;
	}
	
	public function newCategory(){
		$db = $this->getDb();
		$flag = true;
		$query = "INSERT INTO category VALUES ('','".$this->categoryName."')";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateCategory($id)
	{
		$db = $this->getDb();
		$flag = true;
		$query = "update category SET category_name='".$this->categoryName."' where category_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}
	
	static public function deleteCategory($id)
	{
		$db = self::getDb();
		$flag = true;
		$query = "delete from category where category_id='".$id."'";
		if(!$db->execQuery($query)){
			$flag = false;
		}
		return $flag;
	}

}
?>