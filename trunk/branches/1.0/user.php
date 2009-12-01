<?php
require_once 'core.php';
$menu = $_GET["menu"];
if($_SESSION["log"]== true)
{
	$smarty->assign("login",$_SESSION['user']->getLogin());
		
	switch ($menu)
	{
		case 'userList':
		$smarty->assign("title","Gestion des utilisateurs");
		$smarty->assign("menu",$_SESSION['user']->getGroup()); 
		$smarty->assign("content",$menu); 
		$smarty->assign("userList",$_SESSION['userList']);
		$smarty->assign("size",$_SESSION['size']);
		break;
		
		case 'userNew':
		$errorMessage = "";
		$smarty->assign("errorMessage",$errorMessage);	
		$smarty->assign("title","Nouveau utilisateur");
		$smarty->assign("menu",$_SESSION['user']->getGroup()); 
		$smarty->assign("content",$menu); 
		break;	
 		
		case 'userSave':
		if(isset($_SESSION["verifEmailNewUser"]))
		{
			if($_SESSION["verifEmailNewUser"]== true)
			{
				if($_SESSION["existEmailNewUser"]== false)
				{				
					$smarty->assign("title","Utilisateur enregistré ");
					$smarty->assign("pseudo",$_SESSION['pseudo']);
					$smarty->assign("email",$_SESSION['email']);
					$smarty->assign("group",$_SESSION['group']);
					$smarty->assign("menu",$_SESSION['user']->getGroup()); 
					$smarty->assign("content",$menu); 	
				}
				else
				{
					$errorMessage = "E.mail existant déjà !";
					$smarty->assign("errorMessage",$errorMessage);
					$smarty->assign("title","Nouveau utilisateur");
					$smarty->assign("menu",$_SESSION['user']->getGroup()); 
					$smarty->assign("content","userNew"); 
				} 	
			}
			else
			{
				$errorMessage = "E.mail incorrect !";
				$smarty->assign("errorMessage",$errorMessage);
				$smarty->assign("title","Nouveau utilisateur");
				$smarty->assign("menu",$_SESSION['user']->getGroup()); 
				$smarty->assign("content","userNew"); 
			}
		}
		break;
		
		case 'userUpdate':
		$errorMessage = "";
		$smarty->assign("errorMessage",$errorMessage);
		$userId = $_SESSION["userId"] = $_GET["id"];
		$user = User::getOneUser($userId);
		$smarty->assign("user",$user);
		$smarty->assign("title","Modifier l'utilisateur");
		if ($user['user_group'] == "administrator")
		{
			$smarty->assign("selectedadmin","selected");
			$smarty->assign("selectedmanager","");
			$smarty->assign("selecteduser","");
		}
		elseif($user['user_group'] == "manager")
		{
			$smarty->assign("selectedadmin","");
			$smarty->assign("selectedmanager","selected");
			$smarty->assign("selecteduser","");
		}
		elseif($user['user_group'] == "user")
		{
			$smarty->assign("selectedadmin","");
			$smarty->assign("selectedmanager","");
			$smarty->assign("selecteduser","selected");
		}
		$smarty->assign("menu",$_SESSION['user']->getGroup()); 
		$smarty->assign("content",$menu); 
		break;				
			
		case 'userSaveUpdate':
			$smarty->assign("title","Modification enregistrée ");
			$smarty->assign("pseudo",$_SESSION['pseudo']);
			$smarty->assign("email",$_SESSION['email']);
			$smarty->assign("group",$_SESSION['group']);
			$smarty->assign("menu",$_SESSION['user']->getGroup()); 
			$smarty->assign("content","userSave"); 	
			break;
			
		case 'userDelete':
		$userId = $_GET["id"];
		User::deleteUser($userId);
		$_SESSION['userList'] = User::getAllUser();
		$smarty->assign("title","Gestion des utilisateurs");
		$smarty->assign("menu",$_SESSION['user']->getGroup()); 
		$smarty->assign("content","userList"); 
		$smarty->assign("userList",$_SESSION['userList']);
		$smarty->assign("size",$_SESSION['size']);
		break;										
	}
	
  	$smarty->display('homePage.tpl');	
}
else
{
	Url::relocate('home.php');
}

?>