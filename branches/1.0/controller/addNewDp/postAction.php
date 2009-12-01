<?php
if(isset($_GET['logout'])){
	session_destroy();
	Url::relocate("home.php");
}
if($_SESSION["log"]== true){
	$smarty->assign("login",$_SESSION['user']->getLogin());
}else{
	Url::relocate("home.php");
}

//if(!is_object($_SESSION["dp"])){
if(!isset($_SESSION["dp"])){
	$_SESSION["dp"] = new Dp();
	$dp = &$_SESSION["dp"];
}else{
	$dp = &$_SESSION["dp"];
}
if(array_key_exists('dpName',$_POST)){
	if (!empty($_POST['dpName'])){
		$dpName = $_POST['dpName'];
		$dp->setName($dpName);
		$dpAbstract = $_POST['dpAbstract'];
		$dp->setAbstract($dpAbstract);
		$dpCategory = $_POST['dpCategory'];
		$dp->setCategory($dpCategory);
		$dpSystem = $_POST['dpSystem'];
		$dp->setSystem($dpSystem);
		$dpSituation = $_POST['dpSituation'];
		$dp->setSituation($dpSituation);
		$dpActors = $_POST['dpActors'];
		$dp->setActors($dpActors);
		$dpDescription = $_POST['dpDescription'];
		$dp->setDescription($dpDescription);
	}

}
if(array_key_exists('dpProlem',$_POST)){
	if (!empty($_POST['dpProlem'])){
		$dpProblem = $_POST['dpProlem'];
		$dp->setProblem($dpProblem);
		$dpAnalysis = $_POST['problemAnalysis'];
		$dp->setAnalysis($dpAnalysis);
		$dpFocus = $_POST['trackingFocus'];
		$dp->setFocusTracking($dpFocus);
	}
}



if(array_key_exists('solutionName',$_POST)){
	if (!empty($_POST['solutionName'])){
		$dpSolutionName = $_POST['solutionName'];
		$dp->setSolution($dpSolutionName);
		$solutionObjective = $_POST['solutionObjective'];
		$dp->setSolutionObjective($solutionObjective);
		$solutionDesc = $_POST['solutionDesc'];
		$dp->setSolutionDesc($solutionDesc);
		$solutionDisc = $_POST['solutionDisc'];
		$dp->setSolutionDisc($solutionDisc);
		$solutionIndicators = $_POST['solutionIndicators'];
		$dp->setSolutionIndicators($solutionIndicators);
		$solutionMethods = $_POST['solutionMethods'];
		$dp->setSolutionMethods($solutionMethods);
	}
}


if(array_key_exists('pattern',$_POST)){
	if (!empty($_POST['pattern'])){
		$dpRelated = $_POST['pattern'];
		$relatedPatterns[0]['relatedPattern'] = $dpRelated;
		$dpRelationType = $_POST['relationType'];
		$relatedPatterns[0]['relationType'] = $dpRelationType;
		$dpRelationShip = $_POST['dpRelationShip'];
		$relatedPatterns[0]['relationShip'] = $dpRelationShip;
		$dp->setRelatedPatterns($relatedPatterns);
	}
}


if(array_key_exists('dpAutors',$_POST)){
if (!empty($_POST['dpAutors'])){
$dpAutors = $_POST['dpAutors'];
$dp->setAutors($dpAutors);
$dpBibiographic = $_POST['dpBibliographic'];
$dp->setBibliographic($dpBibiographic);
$dpCreator = $_POST['user'];
$dp->setCreator($dpCreator);
$date = time();
$dp->setCreationDate($date);
}
}

if(isset($_POST['saveDp'])){
	$dpId = $dp->saveDp();	
	$dp->setId($dpId);
}


?>