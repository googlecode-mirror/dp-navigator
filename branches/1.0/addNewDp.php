<?php
require_once "core.php";

if (array_key_exists('step',$_GET)){
	$step = $_GET['step'];
} else {	
	$step = "One";		
}




$activeMenu = "active";
switch($step){
	case "One":	
		$dpSituations = Dp::getAllSituations();
		$dpActors =  Dp::getAllActors();
		$dpCategories = Dp::getAllCategories();
		$dpSystems = Dp::getAllSystems();

		$smarty->assign('dpName',$_SESSION['dp']->getName());
		$smarty->assign('dpAbstract',$_SESSION['dp']->getAbstract());
		$smarty->assign('dpDesc',$_SESSION['dp']->getDescription());
		
		$smarty->assign('situations',$dpSituations);
		$smarty->assign('actors',$dpActors);
		$smarty->assign('categories',$dpCategories);
		$smarty->assign('systems',$dpSystems);

		$smarty->assign('one',$activeMenu);
		
		break;
	case "Two":
		$trackingFocus =  Dp::getAllTrackingFocus();
		$smarty->assign('dpProblem',$_SESSION['dp']->getProblem());
		$smarty->assign('dpAnalysis',$_SESSION['dp']->getAnalysis());
		$smarty->assign('trackingFocus',$trackingFocus);
		$smarty->assign('two',$activeMenu);
		break;
	case "Three":
		$solutionObjective =  Dp::getAllObjectives();
		$smarty->assign('dpSolution',$_SESSION['dp']->getSolution());
		$smarty->assign('solutionIndicators',$_SESSION['dp']->getSolutionIndicators());
		$smarty->assign('solutionMethods',$_SESSION['dp']->getSolutionMethods());
		$smarty->assign('solutionDesc',$_SESSION['dp']->getSolutionDesc());
		$smarty->assign('solutionDisc',$_SESSION['dp']->getSolutionDisc());
		$smarty->assign('dpDesc',$_SESSION['dp']->getDescription());
		$smarty->assign('three',$activeMenu);
		$smarty->assign('solutionObjective',$solutionObjective);
		break;
		
	case "Four":
		$userId = $_SESSION['user']->getId();
		$autors =  Dp::getAllAutors();
		$smarty->assign('dpBiblio',$_SESSION['dp']->getBibliographic());
		$smarty->assign('dpAutors',$autors);
		$smarty->assign('userId',$userId);
		$smarty->assign('four',$activeMenu);
		break;	
	case "Five":
		$dpId = $_SESSION['dp']->getId();
		$pattern =  Dp::getAllPattern();
		$relationShip = Dp::getAllRelationShip();
		$smarty->assign('dpId',$dpId);
		$smarty->assign('pattern',$pattern);
		$smarty->assign('dpRelationShip',$relationShip);
		$smarty->assign('patternSaved',$_SESSION['dp']->getName());
		$smarty->assign('five',$activeMenu);
		unset($_SESSION['dp']);
		break;
		
			
}
$smarty->assign("menu",$_SESSION['user']->getGroup()); 
$smarty->assign('content',SCRIPTNAME.'Step'.$step);
$smarty->display('homePage.tpl');

?>