<?php
require_once 'core.php';
$menu = $_GET["menu"];
if($_SESSION["log"]== true)
{
	$smarty->assign("login",$_SESSION['user']->getLogin());
		
	switch ($menu)
	{
		case 'simpleSearch':$smarty->assign("title","Recherche simple d'un DP !");
							$smarty->assign("menu",$_SESSION['user']->getGroup()); 
							$smarty->assign("content",$menu); 
							break;
		case 'advancedSearch':
				$dpActors =  Dp::getAllActors();
				$dpCategories = Dp::getAllCategories();
				$dpSystems = Dp::getAllSystems();
				$dpSituations = Dp::getAllSituations();
				$solutionObjective =  Dp::getAllObjectives();
				$autors =  Dp::getAllAutors();
		
				$smarty->assign('situations',$dpSituations);
				$smarty->assign('actors',$dpActors);
				$smarty->assign('categories',$dpCategories);
				$smarty->assign('systems',$dpSystems);
				$smarty->assign('solutionObjective',$solutionObjective);
				$smarty->assign('dpAutors',$autors);
				
				$smarty->assign("title","Recherche avancée d'un DP !");
				$smarty->assign("menu",$_SESSION['user']->getGroup());
				$smarty->assign("content",$menu);
				break;	
							
		case 'resultToSearch':$smarty->assign("title","Résultats de la recherche !");
							$smarty->assign("menu",$_SESSION['user']->getGroup()); 
							$smarty->assign("valueSearch",$_SESSION['valueSearch']);
							$smarty->assign("dpList",$_SESSION['dpList']);
							$smarty->assign("content",$menu);
							break;	
 		case 'viewDp':$smarty->assign("title","DP global view ");


							$dpList = $_SESSION['dpList'];
							$dpId = $_GET["dpId"];
							$dp = Dp::getDpById($dpId);
							$dp['pattern_creationDate'] = date('d/m/y', $dp['pattern_creationDate']);

							//print_r($dp);

							//$_SESSION['dp'] = Dp::viewDp($dpId,$dpList);
							$_SESSION['dp'] = Dp::viewDpById($dpId);											

 							$smarty->assign("menu",$_SESSION['user']->getGroup()); 
							$smarty->assign("userId",$_SESSION['user']->getId());
							$smarty->assign("content",$menu); 
							//$smarty->assign("dp",$_SESSION['dp']);
							$smarty->assign("dp",$dp);
							break;															
	}
	
  	$smarty->display('homePage.tpl');	
}
else
{
Url::relocate('home.php');		
}

?>