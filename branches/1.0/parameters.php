<?php
require_once 'core.php';
$menu = $_GET["menu"];
$action = $_GET["action"];
if($_SESSION["log"]== true)
{
	$smarty->assign("login",$_SESSION['user']->getLogin());
		
	switch ($menu)
		{
			case 'parameters':		
			$smarty->assign("title","Gestionnaire des paramètres");
			$smarty->assign("paramtitle","&nbsp;");
			$smarty->assign("menu",$_SESSION['user']->getGroup());
			$smarty->assign("content",$menu);
			$smarty->assign("paramcontent","info".$menu);
			$smarty->assign("categoryList",$_SESSION['categoryList']);
			break;
			
			case 'category':			
				switch ($action)
				{
					case 'List': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					$smarty->assign("size",$_SESSION['categorysize']);
					break;

					case 'New': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Ajouter une catégorie");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;

					case 'Save': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent","categoryList");
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					$smarty->assign("size",$_SESSION['categorysize']);
					break;
					
					case 'Update': 
					$categoryId = $_SESSION["categoryId"] = $_GET["id"];
					$category = Category::getOneCategory($categoryId);
					$smarty->assign("category",$category);
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Modification d'une catégorie");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;		
					
					case 'Delete': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Gestionnaire des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					break;		
				}	
			break;
			
			case 'objective':						
				switch ($action)
				{
					case 'List': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des objectifs");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					$smarty->assign("objectiveList",$_SESSION['objectiveList']);
					$smarty->assign("size",$_SESSION['objectivesize']);
					break;
					
					case 'New': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Ajouter un objectif");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;
					
					case 'Save': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des objectifs");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent","objectiveList");
					$smarty->assign("objectiveList",$_SESSION['objectiveList']);
					$smarty->assign("size",$_SESSION['objectivesize']);
					break;
					
					case 'Update': 
					$objectiveId = $_SESSION["objectiveId"] = $_GET["id"];
					$objective = Objective::getOneObjective($objectiveId);
					$smarty->assign("objective",$objective);
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Modification d'un objectif");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;		
					
					case 'Delete': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Gestionnaire des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					break;		
				}	
			break;
			
			case 'situation':			
				switch ($action)
				{
					case 'List': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des situations");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					$smarty->assign("situationList",$_SESSION['situationList']);
					$smarty->assign("size",$_SESSION['situationsize']);
					break;
					
					case 'New': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Ajouter une situation");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;
					
					case 'Save': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des situations");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent","situationList");
					$smarty->assign("situationList",$_SESSION['situationList']);
					$smarty->assign("size",$_SESSION['situationsize']);
					break;
					
					case 'Update': 
					$situationId = $_SESSION["situationId"] = $_GET["id"];
					$situation = Situation::getOneSituation($situationId);
					$smarty->assign("situation",$situation);
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Modification d'une situation");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;		
	
					case 'Delete': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Gestionnaire des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					break;		
				}	
			break;			
			
			case 'system':			
				switch ($action)
				{
					case 'List': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des systèmes");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					$smarty->assign("systemList",$_SESSION['systemList']);
					$smarty->assign("size",$_SESSION['systemsize']);
					break;
					
					case 'New': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Ajouter un système");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;
					
					case 'Save': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des systèmes");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent","systemList");
					$smarty->assign("systemList",$_SESSION['systemList']);
					$smarty->assign("size",$_SESSION['systemsize']);
					break;
					
					case 'Update': 
					$systemId = $_SESSION["systemId"] = $_GET["id"];
					$system = System::getOneSystem($systemId);
					$smarty->assign("system",$system);
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Modification d'un système");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;		
					
					case 'Delete': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Gestionnaire des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					break;		
				}	
			break;		
				
			case 'actor':			
				switch ($action)
				{
					case 'List': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des acteurs");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					$smarty->assign("actorList",$_SESSION['actorList']);
					$smarty->assign("size",$_SESSION['actorsize']);
					break;
					
					case 'New': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Ajouter un acteur");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;
					
					case 'Save': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des acteurs");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent","actorList");
					$smarty->assign("actorList",$_SESSION['actorList']);
					$smarty->assign("size",$_SESSION['actorsize']);
					break;

					case 'Update': 
					$actorId = $_SESSION["actorId"] = $_GET["id"];
					$actor = Actor::getOneActor($actorId);
					$smarty->assign("actor",$actor);
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Modification d'un acteur");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;		
					
					case 'Delete': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Gestionnaire des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					break;		
				}	
			break;
			
			case 'autor':			
				switch ($action)
				{
					case 'List': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des auteurs");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					$smarty->assign("autorList",$_SESSION['autorList']);
					$smarty->assign("size",$_SESSION['autorsize']);
					break;
					
					case 'New': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Ajouter un auteur");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;
					
					case 'Save': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Liste des auteurs");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent","autorList");
					$smarty->assign("autorList",$_SESSION['autorList']);
					$smarty->assign("size",$_SESSION['autorsize']);
					break;
					
					case 'Update': 
					$autorId = $_SESSION["autorId"] = $_GET["id"];
					$autor = Autor::getOneAutor($autorId);
					$smarty->assign("autor",$autor);
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Modification d'un auteur");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu.$action);
					break;			
					
					case 'Delete': 
					$smarty->assign("title","Gestionnaire des paramètres");
					$smarty->assign("paramtitle","Gestionnaire des catégories");
					$smarty->assign("menu",$_SESSION['user']->getGroup());
					$smarty->assign("content","parameters");
					$smarty->assign("paramcontent",$menu);
					$smarty->assign("categoryList",$_SESSION['categoryList']);
					break;		
				}	
			break;

		}
		$smarty->display('homePage.tpl');

}
else
{
	Url::relocate('home.php');
}
?>