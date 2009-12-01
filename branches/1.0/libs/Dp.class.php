<?php
/**
 *
 * @author gilbert
 *
 */
class Dp{
	private $id;
	private $name;
	private $abstract;
	private $category;
	private $system;
	private $situation;
	private $actors;
	private $autors;
	private $description;
	private $problem;
	private $analysis;
	private $focusTracking;
	private $solution;
	private $solutionObjective;
	private $solutionDesc;
	private $solutionDisc;
	private $solutionIndicators;
	private $solutionMethods;
	private $relatedPatterns;
	private $version;
	private $bibliographic;
	private $creator;
	private $creationDate;
	private $dbm;
	private $dbA;

	function __construct()	{
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


	public function getName(){
		return $this->name;
	}

	public function getCategory(){
		return $this->category;
	}
	public function getProblem(){
		return $this->problem;
	}

	public function getSystem(){
		return $this->system;
	}
	public function getSituation(){
		return $this->situation;
	}
	public function getActors(){
		return $this->actors;
	}
	public function getDescription(){
		return $this->description;
	}
	public function getAnalysis(){
		return $this->analysis;
	}

	public function getFocusTracking(){
		return $this->focusTracking;
	}

	public function getSolution(){
		return $this->solution;
	}

	public function getSolutionObjective(){
		return $this->solutionObjective;
	}

	public function getCreator(){
		return $this->creator;
	}


	public function getSolutionDesc(){
		return $this->solutionDesc;
	}
	public function getSolutionDisc(){
		return $this->solutionDisc;
	}
	public function getSolutionIndicators(){
		return $this->solutionIndicators;
	}
	public function getSolutionMethods(){
		return $this->solutionMethods;
	}

	public function getRelatedPatterns(){
		return $this->relatedPatterns;
	}

	public function getVersion(){
		return $this->version;
	}

	public function getBibliographic(){
		return $this->bibliographic;
	}
	public function getCreationDate(){
		return $this->creationDate;
	}
	public function getAbstract(){
		return $this->abstract;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setAbstract($abstract){
		$this->abstract = $abstract;
	}
	public function setProblem($problem){
		return $this->problem = $problem;
	}


	public function setCategory($category){
		$this->category = $category;
	}
	public function setSystem($system){
		$this->system = $system;
	}
	public function setSituation($situation){
		$this->situation = $situation;
	}
	public function setActors($actors){
		$this->actors = $actors;
	}

	public function setAutors($autors){
		$this->autors = $autors;
	}

	public function setDescription($description){
		$this->description = $description;
	}
	public function setAnalysis($analysis){
		$this->analysis = $analysis;
	}

	public function setFocusTracking($focusTracking){
		$this->focusTracking = $focusTracking;
	}

	public function setSolution($solution){
		$this->solution = $solution;
	}

	public function setSolutionObjective($solutionObjective){
		$this->solutionObjective = $solutionObjective;
	}

	public function setSolutionDesc($solutionDesc){
		$this->solutionDesc = $solutionDesc;
	}
	public function setDiscussion($solutionDisc){
		$this->solutionDisc = $solutionDisc;
	}



	public function setRelatedPatterns($relatedPatterns){
		$this->relatedPatterns = $relatedPatterns;
	}
	public function setVersion($version){
		$this->version = $version;
	}

	public function setBibliographic($bibliographic){
		$this->bibliographic = $bibliographic;
	}

	public function setCreator($creator){
	 $this->creator = $creator;
	}

	public function setCreationDate($creationDate){
	 $this->creationDate = $creationDate;
	}


	public function setSolutionDisc($solutionDisc){
	 $this->solutionDisc = $solutionDisc;
	}
	public function setSolutionIndicators($solutionIndicators){
		$this->solutionIndicators = $solutionIndicators;
	}
	public function setSolutionMethods($solutionMethods){
		$this->solutionMethods = $solutionMethods;
	}





	/**
	 * save a DP
	 */
	public function saveDp(){
		$db = $this->getDb();
		$id = NULL;
		$query = "INSERT INTO pattern VALUES('".$id."','".$this->name."','".
		$this->abstract."','".$this->problem."','".$this->analysis."','".
		$this->solution."','".$this->solutionDesc."','".$this->solutionDisc."','".
		$this->solutionIndicators."','".$this->solutionMethods."','".
		$this->creationDate."','".$this->description."','".$this->bibliographic."','".$this->creator."')";
		$flag = $db->execQuery($query);
		$this->id = $db->lastInsertId();

		$numOfActors = count($this->actors);
		for ($a = 0; $a<$numOfActors; $a++){
			$query = "INSERT INTO pattern_actors VALUES('".$this->actors[$a]."','".$this->id."')";
			$db->execQuery($query);
		}

		$numOfAutors = count($this->autors);
		for ($a = 0; $a<$numOfAutors; $a++){
			$query = "INSERT INTO pattern_autors values('".$this->autors[$a]."','".$this->id."')";
			$db->execQuery($query);
		}

		$numOfCategories = count($this->category);
		for ($a = 0; $a<$numOfCategories; $a++){
			$query = "INSERT INTO pattern_category values('".$this->category[$a]."','".$this->id."')";
			$db->execQuery($query);
		}


		$numOfSituation = count($this->situation);
		if($numOfSituation>0){
			for ($a = 0; $a<$numOfSituation; $a++){
				$query = "INSERT INTO pattern_situation values('".$this->situation[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		$numOfSystem = count($this->system);
		if($numOfSystem>0){
			for ($a = 0; $a<$numOfSystem; $a++){
				$query = "INSERT INTO pattern_system values('".$this->system[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		$numOfObjective = count($this->solutionObjective);
		if($numOfObjective>0){
			for ($a = 0; $a<$numOfObjective; $a++){
				$query = "INSERT INTO pattern_solution_objective values('".$this->solutionObjective[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		$numOfFocus = count($this->focusTracking);
		if($numOfFocus>0){
			for ($a = 0; $a<$numOfFocus; $a++){
				$query = "INSERT INTO pattern_tracking_focus values('".$this->focusTracking[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		return $this->id;
	}


	function updateDp(){
		$db = $this->getDb();
		$query = "UPDATE  pattern SET pattern_name ='".$this->name."',pattern_abstract='".
		$this->abstract."',pattern_problem_statement='".$this->problem."',pattern_problem_analysis='".$this->analysis."',pattern_solution_name='".
		$this->solution."',pattern_solution_desc='".$this->solutionDesc."',pattern_solution_discussion='".$this->solutionDisc."',pattern_solution_indicators='".
		$this->solutionIndicators."',pattern_solution_methods='".$this->solutionMethods."',pattern_desc='".
		$this->description."',pattern_biblio='".$this->bibliographic."'WHERE pattern_id ='".$this->id."'";
		//var_dump($query);
		$flag = $db->execQuery($query);
		$numOfActors = count($this->actors);
		for ($a = 0; $a<$numOfActors; $a++){
			$query = "INSERT INTO pattern_actors VALUES('".$this->actors[$a]."','".$this->id."')";
			var_dump($query);
			$db->execQuery($query);
		}

		$numOfAutors = count($this->autors);
		for ($a = 0; $a<$numOfAutors; $a++){
			$query = "INSERT INTO pattern_autors values('".$this->autors[$a]."','".$this->id."')";
			$db->execQuery($query);
		}

		$numOfCategories = count($this->category);
		for ($a = 0; $a<$numOfCategories; $a++){
			$query = "INSERT INTO pattern_category values('".$this->category[$a]."','".$this->id."')";
			$db->execQuery($query);
		}


		$numOfSituation = count($this->situation);
		if($numOfSituation>0){
			for ($a = 0; $a<$numOfSituation; $a++){
				$query = "INSERT INTO pattern_situation values('".$this->situation[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		$numOfSystem = count($this->system);
		if($numOfSystem>0){
			for ($a = 0; $a<$numOfSystem; $a++){
				$query = "INSERT INTO pattern_system values('".$this->system[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		$numOfObjective = count($this->solutionObjective);
		if($numOfObjective>0){
			for ($a = 0; $a<$numOfObjective; $a++){
				$query = "INSERT INTO pattern_solution_objective values('".$this->solutionObjective[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}
		$numOfFocus = count($this->focusTracking);
		if($numOfFocus>0){
			for ($a = 0; $a<$numOfFocus; $a++){
				$query = "INSERT INTO pattern_tracking_focus values('".$this->focusTracking[$a]."','".$this->id."')";
				$db->execQuery($query);
			}
		}


	}

	static public function saveRelatedPatterns($relatedPatterns){
		$db = self::getDb();
		$flag = true;
		$numOfRelation = count($relatedPatterns);
		if($numOfRelation>0){
			for ($a = 0; $a<$numOfRelation; $a++){
				$query = "INSERT INTO related_pattern values('".$relatedPatterns[$a]['pattern']."','".$relatedPatterns[$a]["relatedPattern"]."','".
				$relatedPatterns[$a]["relationType"]."','".$relatedPatterns[$a]["relationShip"]."')";
				if(!$db->execQuery($query)){
					$flag = false;
				}
			}
		}

		if (!$flag){
			return false;
		}else{
			return true;
		}
	}


	/*
	 * gets all the actors
	 */
	static public function getAllActors(){
		$db = self::getDb();
		$query = "select * from actors";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$dpActors[$i]['id'] = $row["actors_id"];
			$dpActors[$i]['actor'] = $row["actors_type"];
			$i++;
		}

		return $dpActors;


	}

	/*
	 * gets all the systems
	 */
	static public function getAllSystems(){
		$db = self::getDb();
		$query = "select * from system_type";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$dpSystems[$i]['id'] = $row["system_type_id"];
			$dpSystems[$i]['system'] = $row["system_type"];
			$i++;
		}
		return $dpSystems;
	}
	/*
	 * gets all the categories
	 */
	static public function getAllCategories(){
		$db = self::getDb();
		$query = "select * from category";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$dpCategory[$i]['id'] = $row["category_id"];
			$dpCategory[$i]['category'] = $row["category_name"];
			$i++;
		}

		return $dpCategory;


	}

	/*
	 * gets all the situations
	 */
	static public function getAllSituations(){
		$db = self::getDb();
		$query = "select * from situation_type";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$dpSituations[$i]['id'] = $row["situation_type_id"];
			$dpSituations[$i]['situation'] = $row["situation_type"];
			$i++;
		}

		return $dpSituations;


	}
	/*
	 * gets all the TrackingFocus
	 */
	static public function getAllTrackingFocus(){
		$db = self::getDb();
		$query = "select * from problem_tracking_focus";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$dpTrackingFocus[$i]['id'] = $row["problem_tracking_focus_id"];
			$dpTrackingFocus[$i]['focus'] = $row["problem_tracking_focus_name"];
			$i++;
		}

		return $dpTrackingFocus;


	}
	/*
	 * gets all the patterns
	 */
	static public function getAllPattern(){
		$db = self::getDb();
		$query = "select * from pattern";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$pattern[$i]['id'] = $row["pattern_id"];
			$pattern[$i]['pattern'] = $row["pattern_name"];
			$i++;
		}

		return $pattern;


	}


	/*
	 * gets all the objectives
	 */
	/*
	 *
	 */
	static public function getAllObjectives(){
		$db = self::getDb();
		$query = "select * from solution_objective";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$objective[$i]['id'] = $row["solution_objective_id"];
			$objective[$i]['objective'] = $row["solution_objective_name"];
			$i++;
		}

		return $objective;


	}

	/*
	 * gets all the relationShip
	 */
	static public function getAllRelationShip(){
		$db = self::getDb();
		$query = "select * from pattern_relationShip";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$relationShip[$i]['id'] = $row["pattern_relationShip_id"];
			$relationShip[$i]['relation'] = $row["pattern_relationShip_name"];
			$i++;
		}

		return $relationShip;


	}


	/*
	 * gets all the autors
	 */
	static public function getAllAutors(){
		$db = self::getDb();
		$query = "select * from autors";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($row = $db->nextLine($resultSet)){
			$autors[$i]['id'] = $row["autors_id"];
			$autors[$i]['autor'] = $row["autors_name"];
			$i++;
		}

		return $autors;
	}

	/**
	 *
	 * @param $keyword
	 * @return  a list of dp
	 *This function makes a FullText research of Dp

	 */
	static public function searchDpByFullText($keyword)
	{
		$keyword;
		$db = self::getDb();
		$query= "select * from pattern p where (p.pattern_name like '%".$keyword."%' or p.pattern_abstract like '%".$keyword."%' or p.pattern_desc like '%".$keyword."%')" ;
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0)
		{
			$dp = null;
		}
		else
		{
			$i=0;
			while ($row = $db->nextLine($resultSet))
			{
				$dp[$i]['pattern_num'] = $i+1;
				$dp[$i]['pattern_id'] = $row["pattern_id"];
				$dp[$i]['pattern_name'] = $row["pattern_name"];
				$dp[$i]['pattern_abstract'] = $row["pattern_abstract"];
				$dp[$i]['pattern_problem_statement'] = $row["pattern_problem_statement"];
				$dp[$i]['pattern_problem_analysis'] = $row["pattern_problem_analysis"];
				$dp[$i]['pattern_solution_name'] = $row["pattern_solution_name"];
				$dp[$i]['pattern_solution_desc'] = $row["pattern_solution_desc"];
				$dp[$i]['pattern_solution_discussion'] = $row["pattern_solution_discussion"];
				$dp[$i]['pattern_indicators'] = $row["pattern_solution_indicators"];
				$dp[$i]['pattern_methods'] = $row["pattern_solution_methods"];
				$dp[$i]['pattern_creationDate'] = date("d/m/Y",$row["pattern_creationDate"]);
				$dp[$i]['pattern_desc'] = $row["pattern_desc"];
				$dp[$i]['pattern_biblio'] = $row["pattern_biblio"];
				$dp[$i]['pattern_creator'] = $row["pattern_creator"];
				$dp[$i]['pattern_link'] = "javascrpit: window.location.href = '?menu=viewDp&dpId=".$row["pattern_id"]."'";
					
				//RECUPERE LES CATEGORIES DE CHAQUE DP
				$queryCategory= "select category_name from category c, pattern_category pc where c.category_id = pc.pattern_category_id and pc.pattern_id = '".$row["pattern_id"]."'" ;
				$resultCategory = $db->execQuery($queryCategory);
				$numRowsCategory = $db->resultSetNumRows($resultCategory);
				if ($numRowsCategory == 0)
				{
					$dp[$i]['categories'] = "";
				}
				else
				{
					$j = 1;
					while ($rowCategory = $db->nextLine($resultCategory))
					{
						if ($numRowsCategory != $j)
						{
							$dp[$i]['categories'] = $dp[$i]['categories'].$rowCategory["category_name"]."; ";
						}
						elseif ($numRowsCategory == $j)
						{
							$dp[$i]['categories'] = $dp[$i]['categories'].$rowCategory["category_name"];
						}
						$j++;
					}
				}

				//RECUPERE LES SYSTEMES DE CHAQUE DP
				$querySystem= "select system_type from system_type s, pattern_system ps where s.system_type_id = ps.pattern_system_id and ps.pattern_id = '".$row["pattern_id"]."'" ;
				$resultSystem =  $db->execQuery($querySystem);
				$numRowsSystem = $db->resultSetNumRows($resultSystem);
				if ($numRowsSystem == 0)
				{
					$dp[$i]['system_type'] = "";
				}
				else
				{
					$j = 1;
					while ($rowSystem = $db->nextLine($resultSystem))
					{
						if ($numRowsSystem != $j)
						{
							$dp[$i]['system_type'] = $dp[$i]['system_type'].$rowSystem["system_type"]."; ";
						}
						elseif ($numRowsSystem == $j)
						{
							$dp[$i]['system_type'] = $dp[$i]['system_type'].$rowSystem["system_type"];
						}
						$j++;
					}
				}

				//RECUPERE LES OBJECTIVES DE CHAQUE DP
				$queryObjective= "select solution_objective_name from solution_objective so, pattern_solution_objective pso where so.solution_objective_id = pso.solution_objective and pso.pattern = '".$row["pattern_id"]."'" ;
				$resultObjective = $db->execQuery($queryObjective);
				$numRowsObjective = $db->resultSetNumRows($resultObjective);
				if ($numRowsObjective == 0)
				{
					$dp[$i]['category_name'] = "";
				}
				else
				{
					$j = 1;
					while ($rowObjective = $db->nextLine($resultObjective))
					{
						if ($numRowsObjective != $j)
						{
							$dp[$i]['objectives'] = $dp[$i]['objectives'].$rowObjective["solution_objective_name"]."; ";
						}
						elseif ($numRowsObjective == $j)
						{
							$dp[$i]['objectives'] = $dp[$i]['objectives'].$rowObjective["solution_objective_name"];
						}
						$j++;
					}
				}
					
				//RECUPERE LES SITUATIONS DE CHAQUE DP
				$querySituation= "select situation_type from situation_type s, pattern_situation ps where s.situation_type_id = ps.pattern_situation_id and ps.pattern_id = '".$row["pattern_id"]."'" ;
				$resultSituation =  $db->execQuery($querySituation);
				$numRowsSituation = $db->resultSetNumRows($resultSituation);
				if ($numRowsSituation == 0)
				{
					$dp[$i]['situation_type'] = "";
				}
				else
				{
					$j = 1;
					while ($rowSituation = $db->nextLine($resultSituation))
					{
						if ($numRowsSituation != $j)
						{
							$dp[$i]['situation_type'] = $dp[$i]['situation_type'].$rowSituation["situation_type"]."; ";
						}
						elseif ($numRowsSituation == $j)
						{
							$dp[$i]['situation_type'] = $dp[$i]['situation_type'].$rowSituation["situation_type"];
						}
						$j++;
					}
				}

				//RECUPERE LES Tracking focus(es) DE PROBLEM DE CHAQUE DP
				$queryTrackFocus= "select problem_tracking_focus_name from problem_tracking_focus p, pattern_tracking_focus pp where p.problem_tracking_focus_id = pp.tracking_focus and pp.pattern = '".$row["pattern_id"]."'" ;
				$resultTrackFocus =  $db->execQuery($queryTrackFocus);
				$numRowsTrackFocus = $db->resultSetNumRows($resultTrackFocus);
				if ($numRowsTrackFocus == 0)
				{
					$dp[$i]['problem_trackfocus'] = "";
				}
				else
				{
					$j = 1;
					while ($rowTrackFocus = $db->nextLine($resultTrackFocus))
					{
						if ($numRowsTrackFocus != $j)
						{
							$dp[$i]['problem_trackfocus'] = $dp[$i]['problem_trackfocus'].$rowTrackFocus["problem_tracking_focus_name"]."; ";
						}
						elseif ($numRowsTrackFocus == $j)
						{
							$dp[$i]['problem_trackfocus'] = $dp[$i]['problem_trackfocus'].$rowTrackFocus["problem_tracking_focus_name"];
						}
						$j++;
					}
				}


				//RECUPERE LES ACTEURS DE CHAQUE DP
				$queryActor= "select actors_type from actors a, pattern_actors pa where a.actors_id = pa.pattern_actors_id and pa.pattern_id = '".$row["pattern_id"]."'" ;
				$resultActor =  $db->execQuery($queryActor);
				$numRowsActor = $db->resultSetNumRows($resultActor);
				if ($numRowsActor == 0)
				{
					$dp[$i]['actors_type'] = "";
				}
				else
				{
					$j = 1;
					while ($rowActor = $db->nextLine($resultActor))
					{
						if ($numRowsActor != $j)
						{
							$dp[$i]['actors_type'] = $dp[$i]['actors_type'].$rowActor["actors_type"]."; ";
						}
						elseif ($numRowsActor == $j)
						{
							$dp[$i]['actors_type'] = $dp[$i]['actors_type'].$rowActor["actors_type"];
						}
						$j++;
					}
				}

				//RECUPERE LES AUTEURS DE CHAQUE DP
				$queryAutor= "select autors_name from autors a, pattern_autors pa where a.autors_id = pa.pattern_autors_id and pa.pattern_id = '".$row["pattern_id"]."'" ;
				$resultAutor =  $db->execQuery($queryAutor);
				$numRowsAutor = $db->resultSetNumRows($resultAutor);
				if ($numRowsAutor == 0)
				{
					$dp[$i]['autors_name'] = "";
				}
				else
				{
					$j = 1;
					while ($rowAutor = $db->nextLine($resultAutor))
					{
						if ($numRowsAutor != $j)
						{
							$dp[$i]['autors_name'] = $dp[$i]['autors_name'].$rowAutor["autors_name"]."; ";
						}
						elseif ($numRowsAutor == $j)
						{
							$dp[$i]['autors_name'] = $dp[$i]['autors_name'].$rowAutor["autors_name"];
						}
						$j++;
					}
				}

				//GET RELATED PATTERNS
				$queryRelatedPattern = "select pr.pattern_relationShip_name,rp.related_pattern_id from pattern p, pattern_relationShip pr, related_pattern rp where p.pattern_id = rp.pattern_id and pr.pattern_relationShip_id = rp.pattern_relationShip and p.pattern_id= '".$row["pattern_id"]."'" ;
				$resultSetRelatedPattern =  $db->execQuery($queryRelatedPattern);
				$numRowsRelatedPattern = $db->resultSetNumRows($resultSetRelatedPattern);
				if ($numRowsRelatedPattern == 0)
				{
					$dp[$i]['relatedPatterns'] = "";
				}
				else
				{
					$j = 0;
					while ($rowRelatedPattern = $db->nextLine($resultSetRelatedPattern))
					{
						$idPatternRelated = $rowRelatedPattern["related_pattern_id"];
						$queryPatternName = "select pattern_name from pattern where pattern_id ='".$idPatternRelated."'";
						$resultSetPatternName = $db->execQuery($queryPatternName);
						$rowPatternName = $db->nextline($resultSetPatternName);
						$dp[$i]['relatedPatterns'][$j]['relatedPattern'] = $rowRelatedPattern["related_pattern_id"];
						$dp[$i]['relatedPatterns'][$j]['relatedPatternName'] = $rowPatternName['pattern_name'];
						$dp[$i]['relatedPatterns'][$j]['relatedType'] = $rowRelatedPattern["related_pattern_name"];
						$dp[$i]['relatedPatterns'][$j]['relationShip'] = $rowRelatedPattern["pattern_relationShip_name"];
						$j++;
					}
				}

				$i++;
			}

		}

		return $dp;
	}

	//Fonction qui renvoie tous les Dps avec l'ensemble des informations les concernants
	static public function getAllDp()
	{
		$db = self::getDb();
		$query= "select * from pattern" ;
		$resultSet = $db->execQuery($query);
		$_SESSION['size'] = $numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0)
		{
			$dp = null;
		}
		else
		{
			$i=0;
			while ($row = $db->nextLine($resultSet))
			{
				$dp[$i]['pattern_num'] = $i+1;
				$dp[$i]['pattern_id'] = $row["pattern_id"];
				$dp[$i]['pattern_name'] = $row["pattern_name"];
				$dp[$i]['pattern_abstract'] = $row["pattern_abstract"];
				$dp[$i]['pattern_problem_statement'] = $row["pattern_problem_statement"];
				$dp[$i]['pattern_problem_analysis'] = $row["pattern_problem_analysis"];
				$dp[$i]['pattern_solution_name'] = $row["pattern_solution_name"];
				$dp[$i]['pattern_solution_desc'] = $row["pattern_solution_desc"];
				$dp[$i]['pattern_solution_discussion'] = $row["pattern_solution_discussion"];
				$dp[$i]['pattern_indicators'] = $row["pattern_solution_indicators"];
				$dp[$i]['pattern_methods'] = $row["pattern_solution_methods"];
				$dp[$i]['pattern_creationDate'] = date("d/m/Y",$row["pattern_creationDate"]);
				$dp[$i]['pattern_desc'] = $row["pattern_desc"];
				$dp[$i]['pattern_biblio'] = $row["pattern_biblio"];
				$dp[$i]['pattern_creator'] = $row["pattern_creator"];

				//RECUPERE LES CATEGORIES DE CHAQUE DP
				$queryCategory= "select category_name from category c, pattern_category pc where c.category_id = pc.pattern_category_id and pc.pattern_id = '".$row["pattern_id"]."'" ;
				$resultCategory = $db->execQuery($queryCategory);
				$numRowsCategory = $db->resultSetNumRows($resultCategory);

				$dp[$i]['categories'] = "";
				if ($numRowsCategory == 0)
				{
					$j = 1;
					while ($rowCategory = $db->nextLine($resultCategory))
					{
						if ($numRowsCategory != $j)
						{
							$dp[$i]['categories'] = $dp[$i]['categories'].$rowCategory["category_name"]."; ";
						}
						elseif ($numRowsCategory == $j)
						{
							$dp[$i]['categories'] = $dp[$i]['categories'].$rowCategory["category_name"];
						}
						$j++;
					}
				}

				//RECUPERE LES SYSTEMES DE CHAQUE DP
				$querySystem= "select system_type from system_type s, pattern_system ps where s.system_type_id = ps.pattern_system_id and ps.pattern_id = '".$row["pattern_id"]."'" ;
				$resultSystem =  $db->execQuery($querySystem);
				$numRowsSystem = $db->resultSetNumRows($resultSystem);

				$dp[$i]['system_type'] = "";
				if ($numRowsSystem > 0)
				{
					$j = 1;
					while ($rowSystem = $db->nextLine($resultSystem))
					{
						//print_r($dp[$i]);die('hh');
						if ($numRowsSystem != $j)
						{
							$dp[$i]['system_type'] = $dp[$i]['system_type'].$rowSystem["system_type"]."; ";
						}
						elseif ($numRowsSystem == $j)
						{
							$dp[$i]['system_type'] = $dp[$i]['system_type'].$rowSystem["system_type"];
						}
						$j++;
					}
				}

				//RECUPERE LES OBJECTIVES DE CHAQUE DP
				$queryObjective= "select solution_objective_name from solution_objective so, pattern_solution_objective pso where so.solution_objective_id = pso.solution_objective and pso.pattern = '".$row["pattern_id"]."'" ;
				$resultObjective = $db->execQuery($queryObjective);
				$numRowsObjective = $db->resultSetNumRows($resultObjective);

				$dp[$i]['objectives'] = "";
				if ($numRowsObjective > 0)
				{
					$j = 1;
					while ($rowObjective = $db->nextLine($resultObjective))
					{
						if ($numRowsObjective != $j)
						{
							$dp[$i]['objectives'] = $dp[$i]['objectives'].$rowObjective["solution_objective_name"]."; ";
						}
						elseif ($numRowsObjective == $j)
						{
							$dp[$i]['objectives'] = $dp[$i]['objectives'].$rowObjective["solution_objective_name"];
						}
						$j++;
					}
				}
					
				//RECUPERE LES SITUATIONS DE CHAQUE DP
				$querySituation= "select situation_type from situation_type s, pattern_situation ps where s.situation_type_id = ps.pattern_situation_id and ps.pattern_id = '".$row["pattern_id"]."'" ;
				$resultSituation =  $db->execQuery($querySituation);
				$numRowsSituation = $db->resultSetNumRows($resultSituation);

				$dp[$i]['situation_type'] = "";
				if ($numRowsSituation > 0)
				{
					$j = 1;
					while ($rowSituation = $db->nextLine($resultSituation))
					{
						if ($numRowsSituation != $j)
						{
							$dp[$i]['situation_type'] = $dp[$i]['situation_type'].$rowSituation["situation_type"]."; ";
						}
						elseif ($numRowsSituation == $j)
						{
							$dp[$i]['situation_type'] = $dp[$i]['situation_type'].$rowSituation["situation_type"];
						}
						$j++;
					}
				}

				//RECUPERE LES Tracking focus(es) DE PROBLEM DE CHAQUE DP
				$queryTrackFocus= "select problem_tracking_focus_name from problem_tracking_focus p, pattern_tracking_focus pp where p.problem_tracking_focus_id = pp.tracking_focus and pp.pattern = '".$row["pattern_id"]."'" ;
				$resultTrackFocus =  $db->execQuery($queryTrackFocus);
				$numRowsTrackFocus = $db->resultSetNumRows($resultTrackFocus);

				$dp[$i]['problem_trackfocus'] = "";
				if ($numRowsTrackFocus > 0)				
				{
					$j = 1;
					while ($rowTrackFocus = $db->nextLine($resultTrackFocus))
					{
						if ($numRowsTrackFocus != $j)
						{
							$dp[$i]['problem_trackfocus'] = $dp[$i]['problem_trackfocus'].$rowTrackFocus["problem_tracking_focus_name"]."; ";
						}
						elseif ($numRowsTrackFocus == $j)
						{
							$dp[$i]['problem_trackfocus'] = $dp[$i]['problem_trackfocus'].$rowTrackFocus["problem_tracking_focus_name"];
						}
						$j++;
					}
				}


				//RECUPERE LES ACTEURS DE CHAQUE DP
				$queryActor= "select actors_type from actors a, pattern_actors pa where a.actors_id = pa.pattern_actors_id and pa.pattern_id = '".$row["pattern_id"]."'" ;
				$resultActor =  $db->execQuery($queryActor);
				$numRowsActor = $db->resultSetNumRows($resultActor);

				$dp[$i]['actors_type'] = "";
				if ($numRowsActor > 0)
				{
					$j = 1;
					while ($rowActor = $db->nextLine($resultActor))
					{
						if ($numRowsActor != $j)
						{
							$dp[$i]['actors_type'] = $dp[$i]['actors_type'].$rowActor["actors_type"]."; ";
						}
						elseif ($numRowsActor == $j)
						{
							$dp[$i]['actors_type'] = $dp[$i]['actors_type'].$rowActor["actors_type"];
						}
						$j++;
					}
				}

				//RECUPERE LES AUTEURS DE CHAQUE DP
				$queryAutor= "select autors_name from autors a, pattern_autors pa where a.autors_id = pa.pattern_autors_id and pa.pattern_id = '".$row["pattern_id"]."'" ;
				$resultAutor =  $db->execQuery($queryAutor);
				$numRowsAutor = $db->resultSetNumRows($resultAutor);

				$dp[$i]['autors_name'] = "";
				if ($numRowsAutor > 0)
				{
					$j = 1;
					while ($rowAutor = $db->nextLine($resultAutor))
					{
						if ($numRowsAutor != $j)
						{
							$dp[$i]['autors_name'] = $dp[$i]['autors_name'].$rowAutor["autors_name"]."; ";
						}
						elseif ($numRowsAutor == $j)
						{
							$dp[$i]['autors_name'] = $dp[$i]['autors_name'].$rowAutor["autors_name"];
						}
						$j++;
					}
				}

				//GET RELATED PATTERNS
				$queryRelatedPattern = "select pr.pattern_relationShip_name,rp.related_pattern_id,rp.related_pattern_name from pattern p, pattern_relationShip pr, related_pattern rp where p.pattern_id = rp.pattern_id and pr.pattern_relationShip_id = rp.pattern_relationShip and p.pattern_id= '".$row["pattern_id"]."'" ;
				$resultSetRelatedPattern =  $db->execQuery($queryRelatedPattern);
				$numRowsRelatedPattern = $db->resultSetNumRows($resultSetRelatedPattern);
				if ($numRowsRelatedPattern == 0)
				{
					$dp[$i]['relatedPatterns'] = "";
				}
				else
				{
					$j = 0;
					while ($rowRelatedPattern = $db->nextLine($resultSetRelatedPattern))
					{
						$idPatternRelated = $rowRelatedPattern["related_pattern_id"];
						$queryPatternName = "select pattern_name from pattern where pattern_id ='".$idPatternRelated."'";
						$resultSetPatternName = $db->execQuery($queryPatternName);
						$rowPatternName = $db->nextline($resultSetPatternName);

						$dp[$i]['relatedPatterns'][$j]['relatedPattern'] = $rowRelatedPattern["related_pattern_id"];
						$dp[$i]['relatedPatterns'][$j]['relatedPatternName'] = $rowPatternName['pattern_name'];
						$dp[$i]['relatedPatterns'][$j]['relatedType'] = $rowRelatedPattern["related_pattern_name"];
						$dp[$i]['relatedPatterns'][$j]['relationShip'] = $rowRelatedPattern["pattern_relationShip_name"];
						$j++;
					}
				}

				$i++;
			}

		}
		return $dp;
	}

	//Fonction qui permet de visualiser un DP a partir de son id
	static public function viewDp($dpId,$dpList)
	{
		$total = count($dpList);
		for($nb =0; $nb <= $total; $nb++)
		{
			if ($dpList[$nb]['pattern_id'] == $dpId)
			{
				$dp['general_id'] = $dpList[$nb]['pattern_id'];
				$dp['general_name'] = $dpList[$nb]['pattern_name'];
				$dp['general_abstract'] = $dpList[$nb]['pattern_abstract'];
				$dp['general_category'] = $dpList[$nb]['categories'];
				$dp['general_system'] = $dpList[$nb]['system_type'];
				$dp['general_situation'] = $dpList[$nb]['situation_type'];
				$dp['general_actor'] = $dpList[$nb]['actors_type'];
				$dp['general_description'] = $dpList[$nb]['pattern_desc'];

				$dp['problem_statement'] = $dpList[$nb]['pattern_problem_statement'];
				$dp['problem_focus'] = $dpList[$nb]['problem_trackfocus'];
				$dp['problem_analysis'] = $dpList[$nb]['pattern_problem_analysis'];

				$dp['solution_name'] = $dpList[$nb]['pattern_solution_name'];
				$dp['solution_objective'] = $dpList[$nb]['objectives'];
				$dp['solution_indicator'] = $dpList[$nb]['pattern_indicators'];
				$dp['solution_method'] = $dpList[$nb]['pattern_methods'];
				$dp['solution_description'] = $dpList[$nb]['pattern_solution_desc'];
				$dp['solution_discussion'] = $dpList[$nb]['pattern_solution_discussion'];
				//$dp['solution_learning'] = $dpList[$nb]['pattern_solution_learning'];

				$dp['related_pattern'] = $dpList[$nb]['relatedPatterns'];

				$dp['identification_author'] = $dpList[$nb]['autors_name'];
				$dp['identification_date'] = $dpList[$nb]['pattern_creationDate'];
				$dp['identification_version_number'] = $dpList[$nb]['pattern_id'];
				$dp['identification_version_changes'] = $dpList[$nb]['pattern_id'];
				$dp['identification_bibliographic'] = $dpList[$nb]['pattern_biblio'];

				return $dp;
				exit;
			}
		}
	}

	//fonction qui affiche les liens premier | précédent | suivant | dernier
	static public function navigatePageToPage($nb,$page,$total,$limite)
	{
		if ($total > $nb)
		{
			$debut = $limite+1;
			$fin = $limite+$nb;
			if ($fin >= $total)
			{
				$fin = $total;
			}
			$premier=0;
			if (($total%$nb) == 0)
			{
				$dernier = $total-$nb;
			}
			else
			{
				$valeur = floor($total/$nb);
				$dernier = $nb*$valeur;
			}
			$suivant = $limite+$nb;
			$precedent = $limite-$nb;

			if (($precedent < 0) && ($suivant < $total))
			{
				echo ''.$debut.'-'.$fin.' sur '.$total.'&nbsp;&nbsp;&nbsp;Premier&nbsp;|&nbsp;Pr�c�dent&nbsp;|&nbsp;<a href="'.$page.'&limite='.$suivant.'&click=lien">Suivant</a>&nbsp;|&nbsp;<a href="'.$page.'&limite='.$dernier.'&click=lien">Dernier</a>&nbsp;';
			}
			elseif (($precedent >= 0) && ($suivant >= $total))
			{
				echo ''.$debut.'-'.$fin.' sur '.$total.'&nbsp;&nbsp;&nbsp;<a href="'.$page.'&limite='.$premier.'&click=lien">Premier</a>&nbsp;|&nbsp;<a href="'.$page.'&limite='.$precedent.'&click=lien">Pr�c�dent</a>&nbsp;|&nbsp;Suivant&nbsp;|&nbsp;Dernier&nbsp;';
			}
			elseif (($precedent < 0) && ($suivant >= $total))
			{
				echo ''.$debut.'-'.$fin.' sur '.$total.'&nbsp;&nbsp;&nbsp;Premier&nbsp;|&nbsp;Pr�c�dent&nbsp;|&nbsp;Suivant&nbsp;|&nbsp;Dernier&nbsp;';
			}
			elseif (($precedent >= 0) && ($suivant < $total))
			{
				echo ''.$debut.'-'.$fin.' sur '.$total.'&nbsp;&nbsp;&nbsp;<a href="'.$page.'&limite='.$premier.'&click=lien">Premier</a>&nbsp;|&nbsp;<a href="'.$page.'&limite='.$precedent.'&click=lien">Pr�c�dent</a>&nbsp;|&nbsp;<a href="'.$page.'&limite='.$suivant.'&click=lien">Suivant</a>&nbsp;|&nbsp;<a href="'.$page.'&limite='.$dernier.'&click=lien">Dernier</a>&nbsp;';
			}
		}
		else
		{
			$debut = $limite+1;
			$fin = $limite+$nb;
			if ($fin >= $total)
			{
				$fin = $total;
			}
			echo ''.$debut.'-'.$fin.' sur '.$total.'&nbsp;';
		}
	}//fin affiche pages

	/**
	 * @param dpIp
	 * gets dp by ID
	 */
	static public function getDpById($id){
		$db = self::getDb();
		$query = "SELECT * FROM  pattern WHERE pattern_id ='".$id."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dp = null;
			return $dp;
		}else{
			$row = $db->nextLine($resultSet);
			$dp['pattern_id'] = $row["pattern_id"];
			$dp['pattern_name'] = $row["pattern_name"];
			$dp['pattern_abstract'] = $row["pattern_abstract"];
			$dp['pattern_problem_statement'] = $row["pattern_problem_statement"];
			$dp['pattern_problem_analysis'] = $row["pattern_problem_analysis"];
			$dp['pattern_solution_name'] = $row["pattern_solution_name"];
			$dp['pattern_solution_desc'] = $row["pattern_solution_desc"];
			$dp['pattern_solution_discussion'] = $row["pattern_solution_discussion"];
			$dp['pattern_indicators'] = $row["pattern_solution_indicators"];
			$dp['pattern_methods'] = $row["pattern_solution_methods"];
			$dp['pattern_creationDate'] = $row["pattern_creationDate"];
			$dp['pattern_desc'] = $row["pattern_desc"];
			$dp['pattern_biblio'] = $row["pattern_bibio"];
			$dp['pattern_creator'] = $row["pattern_creator"];
			//RECUPERE LES CATEGORIES DE CHAQUE DP
			$queryCategory= "select category_name from category c, pattern_category pc where c.category_id = pc.pattern_category_id and pc.pattern_id = '".$id."'" ;
			$resultCategory = $db->execQuery($queryCategory);
			$numRowsCategory = $db->resultSetNumRows($resultCategory);
			if ($numRowsCategory == 0){
				$dp['categories'] = "";
			}else{
				$j = 0;
				while ($rowCategory = $db->nextLine($resultCategory)){
					$dp['categories'][$j] = $rowCategory['category_name'];
					$j++;
				}
			}

			//RECUPERE LES SYSTEMES DE CHAQUE DP
			$querySystem= "select system_type from system_type s, pattern_system ps where s.system_type_id = ps.pattern_system_id and ps.pattern_id = '".$id."'" ;
			$resultSystem =  $db->execQuery($querySystem);
			$numRowsSystem = $db->resultSetNumRows($resultSystem);
			if ($numRowsSystem == 0){
				$dp['system_type'] = "";
			}else{
				$j = 0;
				while ($rowSystem = $db->nextLine($resultSystem)){
					$dp['system_type'][$j] = $rowSystem["system_type"];
					$j++;
				}
			}


			//RECUPERE LES SITUATIONS DE CHAQUE DP
			$querySituation= "select situation_type from situation_type s, pattern_situation ps where s.situation_type_id = ps.pattern_situation_id and ps.pattern_id = '".$id."'" ;
			$resultSituation =  $db->execQuery($querySituation);
			$numRowsSituation = $db->resultSetNumRows($resultSituation);
			if ($numRowsSituation == 0){
				$dp['situation_type'] = "";}
				else{
					$j = 0;
					while ($rowSituation = $db->nextLine($resultSituation)){

						$dp['situation_type'][$j] = $rowSituation["situation_type"];
						$j++;
					}
				}
				//GET OBJECTIVES OF DP
				$queryObjective= "select solution_objective_name from solution_objective S, pattern_solution_objective PS where S.solution_objective_id = PS.solution_objective and PS.pattern = '".$id."'" ;
				$resultObjective =  $db->execQuery($queryObjective);
				$numRowsObjective = $db->resultSetNumRows($resultObjective);
				if ($numRowsObjective == 0){
					$dp['objectives'] = "";}
					else{
						$j = 0;
						while ($rowObjective = $db->nextLine($resultObjective)){

							$dp['objectives'][$j] = $rowObjective["solution_objective_name"];
							$j++;
						}
					}
					//GET TRACKING FOCUS OF EACH DP
					$queryTrackFocus= "select problem_tracking_focus_name from problem_tracking_focus p, pattern_tracking_focus pp where p.problem_tracking_focus_id = pp.tracking_focus and pp.pattern = '".$id."'" ;
					$resultTrackFocus =  $db->execQuery($queryTrackFocus);
					$numRowsTrackFocus = $db->resultSetNumRows($resultTrackFocus);
					if ($numRowsTrackFocus == 0){
						$dp['problem_tracking_focus'] = "";
					}else{
						$j = 0;
						while ($rowTrackFocus = $db->nextLine($resultTrackFocus)){
							$dp['problem_tracking_focus'][$j] = $rowTrackFocus["problem_tracking_focus_name"];
							$j++;
						}
					}


					//RECUPERE LES ACTEURS DE CHAQUE DP
					$queryActor= "select actors_type from actors a, pattern_actors pa where a.actors_id = pa.pattern_actors_id and pa.pattern_id = '".$id."'" ;
					$resultActor =  $db->execQuery($queryActor);
					$numRowsActor = $db->resultSetNumRows($resultActor);
					if ($numRowsActor == 0){
						$dp['actors_type'] = "";
					}else{
						$j = 0;
						while ($rowActor = $db->nextLine($resultActor)){
							$dp['actors_type'][$j] = $rowActor["actors_type"];
							$j++;
						}
					}

					//RECUPERE LES AUTEURS DE CHAQUE DP
					$queryAutor= "select autors_name from autors a, pattern_autors pa where a.autors_id = pa.pattern_autors_id and pa.pattern_id = '".$id."'" ;
					$resultAutor =  $db->execQuery($queryAutor);
					$numRowsAutor = $db->resultSetNumRows($resultAutor);
					if ($numRowsAutor == 0){
						$dp[$i]['autors_name'] = "";
					}else{
						$j = 0;
						while ($rowAutor = $db->nextLine($resultAutor)){
							$dp['autors_name'][$j] = $rowAutor["autors_name"];
							$j++;
						}
					}


					//GET RELATED PATTERNS
					$queryRelatedPattern = "SELECT PR.pattern_relationShip_name,RP.related_pattern_id FROM pattern P, pattern_relationShip PR, related_pattern RP WHERE P.pattern_id = RP.pattern_id AND PR.pattern_relationShip_id = RP.pattern_relationShip AND P.pattern_id= '".$id."'" ;
					$resultSetRelatedPattern =  $db->execQuery($queryRelatedPattern);
					$numRowsRelatedPattern = $db->resultSetNumRows($resultSetRelatedPattern);
					if ($numRowsRelatedPattern == 0){
						$dp['relatedPatterns'] = "";
					}else{
						$j = 0;
						while ($rowRelatedPattern = $db->nextLine($resultSetRelatedPattern)){
							$idPatternRelated = $rowRelatedPattern["related_pattern_id"];
							$queryPatternName = "select pattern_name from pattern where pattern_id ='".$idPatternRelated."'";
							$resultSetPatternName = $db->execQuery($queryPatternName);
							$rowPatternName = $db->nextline($resultSetPatternName);
							$dp['relatedPatterns'][$j]['relatedPattern'] = $rowRelatedPattern["related_pattern_id"];
							$dp['relatedPatterns'][$j]['relatedPatternName'] = $rowPatternName['pattern_name'];
							$dp['relatedPatterns'][$j]['relatedType'] = $rowRelatedPattern["related_pattern_name"];
							$dp['relatedPatterns'][$j]['relationShip'] = $rowRelatedPattern["pattern_relationShip_name"];
							$j++;

						}
					}
		}
		return $dp;
	}

	static public function getDpByCategory($categoryId){
		$db = self::getDb();
		$query = "SELECT P.pattern_id ,P.pattern_name ,P.pattern_abstract FROM  pattern P, pattern_category PC, category C WHERE P.pattern_id = PC.pattern_id AND PC.pattern_category_id = C.category_id AND  C.category_name = '".$categoryId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$listOfDp = null;
		}else{
			$i = 0;
			while($row = $db->nextLine($resultSet)){
				$listOfDp[$i]['patternId'] = $row["pattern_id"];
				$listOfDp[$i]['patternName'] = $row["pattern_name"];
				$listOfDp[$i]['patternAbstract'] = $row["pattern_abstract"];
				$i++;
			}
		}
		return $listOfDp;
	}
	/**
	 *
	 * @param $patternId
	 * @param $relationShipId
	 * @return Array
	 *
	 */
	static public function getDpByRelationShip($patternId,$relationShipId){
		$db = self::getDb();
		$query = "SELECT P.pattern_id,P.pattern_name ,RP.related_pattern_id,PR.pattern_relationShip_name  FROM  pattern P, related_pattern RP,pattern_relationShip PR WHERE P.pattern_id = RP.pattern_id AND RP.pattern_relationShip = PR.pattern_relationShip_id AND  RP.pattern_relationShip = '".$relationShipId."'"."AND  RP.pattern_id ='".$patternId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dp = null;
		}else{
			$i = 0;
			while($rowRelatedPattern = $db->nextLine($resultSet)){
			$idPatternRelated = $rowRelatedPattern["related_pattern_id"];
			$queryPatternName = "select pattern_name from pattern where pattern_id ='".$idPatternRelated."'";
			$resultSetPatternName = $db->execQuery($queryPatternName);
			$rowPatternName = $db->nextline($resultSetPatternName);
			$dp[$i]['patternId'] = $rowRelatedPattern["pattern_id"];
			$dp[$i]['patternName'] = $rowRelatedPattern["pattern_name"];
			$dp[$i]['relatedPatternId'] = $rowRelatedPattern["related_pattern_id"];
			$dp[$i]['relatedPatternName'] = $rowPatternName['pattern_name'];
			$dp[$i]['relationShip'] = $rowRelatedPattern["pattern_relationShip_name"];
			$i++;
			}
		}
		return $dp;
	}


	/**
	 *
	 * @param $categoryId
	 * @return Array of Dp
	 */


	static public function getDpByCategoryId($categoryId){

		$db = self::getDb();
		$query = "SELECT P.pattern_id,C.category_id FROM pattern P, pattern_category PC, category C WHERE P.pattern_id=PC.pattern_id AND PC.pattern_category_id = C.category_id AND  PC.pattern_category_id='".$categoryId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dpList = null;
		}else{
			$i=0;
			while ($row = $db->nextLine($resultSet)){
				$dpList[$i] = $row['pattern_id'];
			}
		}

		return $dpList;
	}
	/**
	 *
	 * @param $systemId
	 * @return unknown_type
	 */
	static public function getDpBySystemId($systemId){

		$db = self::getDb();

		$query = "SELECT P.pattern_id,S.system_type_id FROM pattern P, pattern_system PS, system_type S WHERE P.pattern_id=PS.pattern_id AND PS.pattern_system_id = S.system_type_id AND PS.pattern_system_id='".$systemId."'";
		//var_dump($query);
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dpList = null;
		}else{
			$i=0;
			while ($row = $db->nextLine($resultSet)){
				$dpList[$i] = $row['pattern_id'];
			}
		}

		return $dpList;
	}
	/**
	 *
	 * @param $situationId
	 * @return unknown_type
	 */
	static public function getDpBySituationId($situationId){
		$db = self::getDb();
		$query = "SELECT P.pattern_id,S.situation_type_id FROM pattern P, pattern_situation PS, situation_type S WHERE P.pattern_id=PS.pattern_id AND PS.pattern_situation_id = S.situation_type_id AND PS.pattern_situation_id='".$situationId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dpList = null;
		}else{
			$i=0;
			while ($row = $db->nextLine($resultSet)){
				$dpList[$i] = $row['pattern_id'];
			}
		}

		return $dpList;
	}

	static public function getDpBySolutionObjectiveId($objectiveId){
		$db = self::getDb();
		$query = "SELECT P.pattern_id,S.solution_objective_id FROM pattern P, pattern_solution_objective PS, solution_objective S WHERE P.pattern_id=PS.pattern AND PS.solution_objective = S.solution_objective_id AND PS.solution_objective='".$objectiveId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dpList = null;
		}else{
			$i=0;
			while ($row = $db->nextLine($resultSet)){
				$dpList[$i] = $row['pattern_id'];
			}
		}

		return $dpList;
	}
	/**
	 *
	 * @param $autorId
	 * @return unknown_type
	 */
	static public function getDpByAutorsId($autorId){

		$db = self::getDb();
		$query = "SELECT P.pattern_id,A.autors_id FROM pattern P, pattern_autors PA, autors A WHERE P.pattern_id=PA.pattern_id AND PA.pattern_autors_id = A.autors_id AND PA.pattern_autors_id='".$autorId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dpList = null;
		}else{
			$i=0;
			while ($row = $db->nextLine($resultSet)){
				$dpList[$i] = $row['pattern_id'];
			}
		}

		return $dpList;
	}
	/**
	 *
	 * @param $autorId
	 * @return unknown_type
	 */

	static public function getDpByActorsId($actorId){

		$db = self::getDb();
		$query = "SELECT P.pattern_id,A.actors_id FROM pattern P, pattern_actors PA, actors A WHERE P.pattern_id=PA.pattern_id AND PA.pattern_actors_id = A.actors_id AND PA.pattern_actors_id='".$actorId."'";
		$resultSet = $db->execQuery($query);
		$numRows = $db->resultSetNumRows($resultSet);
		if($numRows == 0){
			$dpList = null;
		}else{
			$i=0;
			while ($row = $db->nextLine($resultSet)){
				$dpList[$i] = $row['pattern_id'];
			}
		}

		return $dpList;
	}



	/**
	 *
	 * @param $keyword
	 * @param $paramaters
	 * @return unknown_type
	 */
	static public function dpListId($keyword,$searchParamaters){
		$dpObjective = array();
		$dpFullText = self::searchDpByFullText($keyword);
		for($a=0;$a<count($dpFullText);$a++){
			$dpByFullText[$a] = $dpFullText[$a]['pattern_id'];
		}
		$dpCategory = array();
		$category = $searchParamaters['category'];
		for($a=0;$a<count($category);$a++){
			$dpCategory[$a] = self::getDpByCategoryId($category[$a]);

		}
		$dpSystem = array();
		$system = $searchParamaters['system'];
		for($a=0;$a<count($system);$a++){
			$dpSystem[$a] = self::getDpBySystemId($system[$a]);

		}

		$dpSituation = array();
		$situation = $searchParamaters['situation'];
		for($a=0;$a<count($situation);$a++){
			$dpSituation[$a] = self::getDpBySituationId($situation[$a]);

		}
		$dpAutors = array();
		$autors = $searchParamaters['autors'];
		for($a=0;$a<count($autors);$a++){
			$dpAutors[$a] = self::getDpByActorsId($autors[$a]);

		}

		$dpActors = array();
		$actors= $searchParamaters['actors'];

		for($a=0;$a<count($actors);$a++){
			$dpActors[$a] = self::getDpByAutorsId($actors[$a]);

		}
		$dpObjective = array();
		$objective = $searchParamaters['objective'];

		for($a=0;$a<count($objective);$a++){
			$dpObjective[$a] = self::getDpBySolutionObjectiveId($objective[$a]);

		}

		$dp = array_merge_recursive($dpCategory,$dpSystem,$dpSituation,$dpAutors,$dpActors,$dpObjective);

		$allDp = array();
		for($a=0;$a<count($dp);$a++){
			if($dp[$a]==NULL){
				$dp[$a] = array();
			}
			$allDp = array_merge_recursive($allDp,$dp[$a]);
		}
		$dp = array_merge_recursive($dpByFullText,$allDp);
		$dp = array_unique($dp);
		return $dp;
	}
	/**
	 *
	 * @param $keywords
	 * @param $paramaters
	 * @return unknown_type
	 */
	static function searchAllDpByCriterias($keywords,$searchParamaters){
		$db = self::getDb();
		$dpListId = self::dpListId($keywords,$searchParamaters);
		for($a=0;$a<count($dpListId);$a++){
			$dpTmp= self::getDpById($dpListId[$a]);
			if($dpTmp!=NULL){
				$dp[$a] = $dpTmp;
			}

		}
		return	$dp;
	}
	static public function getAllRelatedPatterns(){
		$db = self::getDb();
		$query = "SELECT P.pattern_id,P.pattern_name,RP.related_pattern_id,PR.pattern_relationShip_name FROM related_pattern RP,pattern P,pattern_relationShip PR WHERE RP.pattern_id=P.pattern_id AND RP.pattern_relationShip=PR.pattern_relationShip_id";
		$resultSet = $db->execQuery($query);
		$i=0;
		while ($rowRelatedPattern = $db->nextLine($resultSet)){
			$idPatternRelated = $rowRelatedPattern["related_pattern_id"];
			$queryPatternName = "select pattern_name from pattern where pattern_id ='".$idPatternRelated."'";
			$resultSetPatternName = $db->execQuery($queryPatternName);
			$rowPatternName = $db->nextline($resultSetPatternName);
			$dp[$i]['patternId'] = $rowRelatedPattern["pattern_id"];
			$dp[$i]['patternName'] = $rowRelatedPattern["pattern_name"];
			$dp[$i]['relatedPatternId'] = $rowRelatedPattern["related_pattern_id"];
			$dp[$i]['relatedPatternName'] = $rowPatternName['pattern_name'];
			$dp[$i]['relationShip'] = $rowRelatedPattern["pattern_relationShip_name"];
			$i++;
		}
		return $dp;
	}

	static public function drawDpGraph($pattern){
		$path = IMAGE_PATH;
		$type = "gif";
		$file = "dpGraph";
		if($fp = fopen($file.'.dot', "w")) {
			fputs($fp,"digraph G {");
			fputs($fp,"charset = Latin-1;");
			fputs($fp,"\t node [color = lightblue2,style=filled,fontname=\"Verdana\",fontsize=\"9\"];\n");
			fputs($fp,"\t edge [color=\"0.650 0.700 0.700\",fontname=\"Verdana\",fontsize=\"9\"];\n");

			for($a=0;$a<count($pattern);$a++) {
				fputs($fp,"P" . $pattern[$a]['patternId'] . " -> R" . $pattern[$a]['relatedPatternId'] . " [label=\"".$pattern[$a]['relationShip']."\"];\n");
				fputs($fp,"P" . $pattern[$a]['patternId']. " [label=\"".$pattern[$a]['patternName']."\"];\n");
				fputs($fp,"R" . $pattern[$a]['relatedPatternId']. " [label=\"".$pattern[$a]['relatedPatternName']."\"];\n");
			}
		}
		fputs($fp,"}");
		fclose($fp);
		exec("circo -T$type -o$path/$file.$type $file.dot");
		$files[0] = $file.".".$type;

return $files;

	}

}
?>