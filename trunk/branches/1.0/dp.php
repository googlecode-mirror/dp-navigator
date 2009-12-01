<?php
require_once 'core.php';
$menu = $_GET["menu"];
if($_SESSION["log"]== true)
{
	$smarty->assign("login",$_SESSION['user']->getLogin());
		
	switch ($menu)
	{
		case 'dpList':
		$smarty->assign("title","Gestionnaire des Design Patterns");
		$smarty->assign("menu",$_SESSION['user']->getGroup()); 
		$smarty->assign("content","dpList"); 
		$smarty->assign("dpList",$_SESSION['dpList']);
		$smarty->assign("size",$_SESSION['size']);
		break;
		
		case 'dpDelete':
		$dpId = $_GET["id"];
		Dp::deleteDP($dpId);
		$smarty->assign("title","Gestionnaire des Design Patterns");
		$smarty->assign("menu",$_SESSION['user']->getGroup()); 
		$smarty->assign("content","dpList"); 
		$smarty->assign("dpList",Dp::getAllDp());
		$smarty->assign("size",$_SESSION['size']);
		break;	
	}
	
  	$smarty->display('homePage.tpl');	
}
else{
	Url::relocate('home.php');
}

?>