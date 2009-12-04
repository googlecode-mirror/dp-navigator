<?php
require_once 'core.php';
if(array_key_exists('dpId',$_GET)){
	$dpId = $_GET['dpId'];
	$dp = Dp::getDpById($dpId);
	$smarty->assign('dpId',$dpId);

	
	//$_SESSION['dp'] = $dp ;
}
if(array_key_exists('step',$_GET)){
	$step = $_GET['step'];

}else{
	$step = "One";
}


print_r($dp);

switch($step){
	case "One":
		$dpId = $_SESSION['dp']['pattern_id'];
		/*$dpActors =  Dp::getAllActors();
		$dpActorsToUpdate = $_SESSION['dp']['actors_type'];
		for($a=0;$a<count($dpActors);$a++){
			for($b=0;$b<count($dpActorsToUpdate);$b++){
				if (strcmp($dpActors[$a]['actor'],$dpActorsToUpdate[$b])==0){
					$dpActors[$a]['selected'] = "selected";			
				}
			}
		}*/
		$dpCategoriesToUpdate = $_SESSION['dp']['categories'];
		$dpCategories = Dp::getAllCategories();
		for($a=0;$a<count($dpCategories);$a++){
			for($b=0;$b<count($dpCategoriesToUpdate);$b++){
			if (strcmp($dpCategories[$a]['category'],$dpCategoriesToUpdate[$b])==0){
			$dpCategories[$a]['selected'] = "selected";	
		
			}
		}
		}
		
		/*$dpSystems = Dp::getAllSystems();
		$dpSystemsToUpdate = $_SESSION['dp']['system_type'];
		for($a=0;$a<count($dpSystems);$a++){
			for($b=0;$b<count($dpSystemsToUpdate);$b++){
			if (strcmp($dpSystems[$a]['system'],$dpSystemsToUpdate[$b])==0){
			$dpSystems[$a]['selected'] = "selected";	
		
			}
		}
		}
		
		$dpSituationToUpdate = $_SESSION['dp']['situation_type'];
		$dpSituations = Dp::getAllSituations();
		for($a=0;$a<count($dpSituations);$a++){
			for($b=0;$b<count($dpSituationToUpdate);$b++){
			if (strcmp($dpSituations[$a]['situation'],$dpSituationToUpdate[$b])==0){
			$dpSituations[$a]['selected'] = "selected";	
		
			}
		}
		}*/
				
		$smarty->assign('dp',$dp);
		//$smarty->assign('dpName',$_SESSION['dp']['pattern_name']);
		//$smarty->assign('situations',$dpSituations);
		//$smarty->assign('actors',$dpActors);
		$smarty->assign('categories',$dpCategories);
		//$smarty->assign('systems',$dpSystems);

		

		break;
	case "Two":
		/*$trackingFocus =  Dp::getAllTrackingFocus();
		$trackingFocusToUpdate = $_SESSION['dp']['problem_tracking_focus'];
			for($a=0;$a<count($trackingFocus);$a++){
				for($b=0;$b<count($trackingFocusToUpdate);$b++){
					if (strcmp($trackingFocus[$a]['focus'],$trackingFocusToUpdate[$b])==0){
						$trackingFocus[$a]['selected'] = "selected";	
					}
				}
			}
		
		
		$smarty->assign('trackingFocus',$trackingFocus);*/
		$smarty->assign('dp',$dp);
		break;
	case "Three":
		/*$solutionObjective =  Dp::getAllObjectives();
		$solutionObjectiveToUpdate = $_SESSION['dp']['objectives'];
		for($a=0;$a<count($solutionObjective);$a++){
			for($b=0;$b<count($solutionObjectiveToUpdate);$b++){
			if (strcmp($solutionObjective[$a]['objective'],$solutionObjectiveToUpdate[$b])==0){
			$solutionObjective[$a]['selected'] = "selected";	
		
			}
		}
		}
		
		$smarty->assign('solutionObjective',$solutionObjective);*/
		break;

	case "Four":
		/*$userId = $_SESSION['user']->getId();
		$autors =  Dp::getAllAutors();
		$autorsToUpdate = $_SESSION['dp']['autors_name'];
		for($a=0;$a<count($autors);$a++){
			for($b=0;$b<count($autorsToUpdate);$b++){
			if (strcmp($autors[$a]['autor'],$autorsToUpdate[$b])==0){
			$autors[$a]['selected'] = "selected";	
		
			}
		}
		}
		
		$smarty->assign('dpAutors',$autors);
		$smarty->assign('userId',$userId);*/
		break;
	case "Five":
		//$dpId = $_SESSION["dp"]->getId();
		$dpId = $_GET['dpId'];
		$pattern =  Dp::getAllPattern();
		$relationShip = Dp::getAllRelationShip();

		$smarty->assign('dpId',$dpId);
		$smarty->assign('pattern',$pattern);
		$smarty->assign('relationShip',$relationShip);
		//unset($_SESSION['dp']);
		break;

	case "End":
		/*$dpId = $_SESSION['dp']->getId();
		unset($_SESSION['dp']);*/
		echo "<br/><br/>";
		print_r($_POST);die();
		Url::relocate("searchDp.php?menu=viewDp&dpId=".$dpId);
					
}
$smarty->assign('dp',$_SESSION['dp']);
$smarty->assign("menu",$_SESSION['user']->getGroup());
$smarty->assign('content',SCRIPTNAME.'Step'.$step);
$smarty->display('homePage.tpl');

?>