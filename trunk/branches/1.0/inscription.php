<?php
require_once 'core.php';

if(isset($_SESSION["verifEmailForget"]))
{
	if($_SESSION["verifEmailForget"]== true)
	{
		if($_SESSION["existEmailForget"]== false)
		{				
			$smarty->display('inscriptionAnswer.tpl');
		}
		else
		{
			$errorMessage = "Compte existant déjà !";
			$smarty->assign("errorMessage",$errorMessage);
			$smarty->display(SCRIPTNAME.'.tpl');
		} 	
	}
	else
	{
		$errorMessage = "Email incorrect !";
		$smarty->assign("errorMessage",$errorMessage);
		$smarty->display(SCRIPTNAME.'.tpl');
	}
}
else
{
	$errorMessage = "";
	$smarty->assign("errorMessage",$errorMessage);
	$smarty->display(SCRIPTNAME.'.tpl');
}

session_destroy();
?>