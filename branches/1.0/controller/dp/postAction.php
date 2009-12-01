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
		$_SESSION['email'] = $emailUpdateUser = $_POST['emailUpdateUser'];
		$verifEmail = User::verifiEmail($emailUpdateUser);
		
		if($verifEmail == False)
		{
			$_SESSION["verifEmailUpdateUser"] = false;
		}
		else
		{		
			$_SESSION['verifEmailUpdateUser'] = true ;
			$verifEmail = User::existEmail($emailUpdateUser);
			if ($verifEmail == false)
			{
				$_SESSION["existEmailUpdateUser"] = false;
				$user = new User();
				$_SESSION['pseudo'] = $pseudoUpdateUser = $_POST['pseudoUpdateUser'];
				$user->setLogin($pseudoUpdateUser);
				$user->setEmail($emailUpdateUser);
				$_SESSION['group'] = $groupUpdateUser = $_POST['groupUpdateUser'];;
				$user->setGroup($groupUpdateUser);
				$id = $_SESSION["id"];
				$user->updateUser($id);
			}
			else
			{
				$_SESSION["existEmailUpdateUser"] = true;
			}

		}
	}
    
    $dpList = Dp::getAllDp();
	if($dpList == null)
	{
		$_SESSION["msgToAllDp"] = "Auncun Design Patterns !";
	}
	else
	{				
		$_SESSION['dpList'] = $dpList;
		$_SESSION['msgToAllDp'] = "" ;
	}
    	
?>