<?php
require_once 'core.php';
if(array_key_exists("log",$_SESSION)){
	if($_SESSION["log"]== true){
		$smarty->assign("login",$_SESSION['user']->getLogin());
		if (!array_key_exists('menu',$_GET)){
			$menu = 'welcome';
		}else{
			$menu = $_GET["menu"];
		}
		switch ($menu){ 
			case 'welcome':
				$smarty->assign("title","Bienvenue sur DP Navigateur !");
				$smarty->assign("menu",$_SESSION['user']->getGroup());
				$smarty->assign("content",$menu);
				break;
		case 'graph':
				$smarty->assign("title","Visualiser le graphe des DPs !");
				$smarty->assign("menu",$_SESSION['user']->getGroup());
				$smarty->assign("content",$menu);
				break;			
		}
		$smarty->display('homePage.tpl');
	}else{
		$errorMessage = "Mot de passe invalide !";
		$smarty->assign("errorMessage",$errorMessage);
		$smarty->display('login.tpl');
	}
}else{
$smarty->display('login.tpl');	
}
?>
