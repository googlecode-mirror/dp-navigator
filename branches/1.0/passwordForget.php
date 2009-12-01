<?php
require_once 'core.php';

if(isset($_SESSION["verifEmailForget"]))
{
	if($_SESSION["verifEmailForget"]== true)
	{
		if($_SESSION["existEmailForget"]== true)
		{				
			$forgetUserEmail = $_SESSION["forgetUserEmail"];
			$smarty->assign("forgetUserEmail",$forgetUserEmail);
			$smarty->display('passwordForgetAnswer.tpl');
		}
		else
		{
			$errorMessage = "Email inexistant !";
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