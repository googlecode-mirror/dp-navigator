<?php
	if(isset($_GET['logout']))
	{
	 	session_destroy();	
	 	Url::relocate("home.php");
	}
   
    if(isset($_POST["pseudoNewUser"]))
	{
		$_SESSION['email'] = $emailNewUser = $_POST['emailNewUser'];
		$verifEmail = User::verifiEmail($emailNewUser);
		
		if($verifEmail == False)
		{
			$_SESSION["verifEmailNewUser"] = false;
		}
		else
		{		
			$_SESSION['verifEmailNewUser'] = true ;
			$verifEmail = User::existEmail($emailNewUser);
			if ($verifEmail == false)
			{
				$_SESSION["existEmailNewUser"] = false;
				$user = new User();
				$_SESSION['pseudo'] = $pseudoNewUser = $_POST['pseudoNewUser'];
				$user->setLogin($pseudoNewUser);
				$user->setEmail($emailNewUser);
				$passwordNewUser = User::passwordGenerate();
				$user->setPassword($passwordNewUser);
				$_SESSION['group'] = $groupNewUser = $_POST['groupNewUser'];;
				$user->setGroup($groupNewUser);
				$user->newUser();
			}
			else
			{
				$_SESSION["existEmailNewUser"] = true;
			}

		}
	}
    elseif(isset($_POST["pseudoUpdateUser"]))
	{
		$user = new User();
		$_SESSION['pseudo'] = $pseudoUpdateUser = $_POST['pseudoUpdateUser'];
		$user->setLogin($pseudoUpdateUser);
		$_SESSION['group'] = $groupUpdateUser = $_POST['groupUpdateUser'];;
		$user->setGroup($groupUpdateUser);
		$id = $_SESSION["userId"];
		$user->updateUser($id);
	}
    
    $userList = User::getAllUser();
	if($userList == null)
	{
		$_SESSION["msgToAllUser"] = "Auncun utilisateur !";
		$_SESSION['userList'] = $userList;
	}
	else
	{				
		$_SESSION['userList'] = $userList;
		$_SESSION['msgToAllUser'] = "" ;
	}
    	
?>