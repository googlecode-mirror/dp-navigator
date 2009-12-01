<?php
	if(isset($_GET['logout']))
	{
		session_destroy();
		Url::relocate("home.php");
	}
	if(!is_object($_SESSION["user"]))
	{
		$_SESSION["user"] = new User();
		$user = &$_SESSION["user"];
	}
	else
	{
		$user = &$_SESSION["user"];
	}
	if(isset($_POST["userNewEmail"]))
	{
		$userNewEmail = $_POST['userNewEmail'];
		$verifEmail = User::verifiEmail($userNewEmail);
		
		if($verifEmail == False)
		{
			$_SESSION["verifEmailForget"] = false;
		}
		else
		{		
			$_SESSION['verifEmailForget'] = true ;
			$verifEmail = User::existEmail($forgetUserEmail);
			if ($verifEmail == false)
			{
				$_SESSION["existEmailForget"] = false;
				$userNewLogin = $_POST['userNewLogin'];
				$user->setLogin($userNewLogin);
				$user->setEmail($userNewEmail);
				$userNewPassword = $_POST['userNewPassword'];
				$user->setPassword($userNewPassword);
				$userNewGroup = "user";
				$user->setGroup($userNewGroup);
				$user->newUser();
			}
			else
			{
				$_SESSION["existEmailForget"] = true;
			}

		}
	}
?>