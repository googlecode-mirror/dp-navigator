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
if(!is_object($_SESSION["dp"])){
	$_SESSION["dp"] = new Dp();
	$dp = &$_SESSION["dp"];
}else{
	$dp = &$_SESSION["dp"];
}
if(array_key_exists('dpName',$_POST)){
	if (!empty($_POST['dpName'])){
		$dpId = $_POST['dpId'];
		$dp->setId($_POST['dpId']);
		$dpName = $_POST['dpName'];
		$dp->setName($dpName);
		$dpAbstract = $_POST['dpAbstract'];
		$dp->setAbstract($dpAbstract);
		
		$dpCategory = (!empty($_POST['dpCategory'])?$_POST['dpCategory']:array());
		$dp->setCategory(array_diff($_SESSION['dpToUpdate']['categories'],$dpCategory));
		
		$dpSystem = (!empty($_POST['dpSystem'])?$_POST['dpSystem']:array());
		$dp->setSystem(array_diff($_SESSION['dpToUpdate']['system_type'],$dpSystem));
		$dpSituation = (!empty($_POST['dpSituation'])?$_POST['dpSituation']:array());
		$dp->setSituation(array_diff($_SESSION['dpToUpdate']['situation_type'],$dpSituation));
		$dpActors = (!empty($_POST['dpActors'])?$_POST['dpActors']:array());
		$dp->setActors(array_diff($_SESSION['dpToUpdate']['actors_type'],$dpActors));
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
		$dpFocus = (!empty($_POST['dpFocus'])?$_POST['dpFocus']:array());
		$dp->setFocusTracking(array_diff($_SESSION['dpToUpdate']['problem_tracking_focus'],$dpFocus));
		
	}
}
if(array_key_exists('solutionName',$_POST)){
	if (!empty($_POST['solutionName'])){
		$dpSolutionName = $_POST['solutionName'];
		$dp->setSolution($dpSolutionName);
		$solutionObjective = (!empty($_POST['solutionObjective'])?$_POST['solutionObjective']:array());
		$dp->setSolutionObjective(array_diff($_SESSION['dpToUpdate']['objectives'],$solutionObjective));
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

if(array_key_exists('dpAutors',$_POST)){
	if (!empty($_POST['dpAutors'])){
		$dpAutors = (!empty($_POST['dpAutors'])?$_POST['dpAutors']:array());
		$dp->setAutors(array_diff($_SESSION['dpToUpdate']['autors_name'],$dpAutors));
		$dpBibliographic = $_POST['dpBibliographic'];
		$dp->setBibliographic($dpBibliographic);
		}
}

if(isset($_POST['updateDp'])){
	$dp->updateDp();
}
?>