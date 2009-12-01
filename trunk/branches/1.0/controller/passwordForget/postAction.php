<?php
	if(isset($_GET['logout']))
	{
		session_destroy();	
		header("Location:home.php");
	}

	if(isset($_POST["forgetUserEmail"]))
	{
		$forgetUserEmail = $_SESSION["forgetUserEmail"] = $_POST['forgetUserEmail'];
		$verifEmail = User::verifiEmail($forgetUserEmail);
		
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
			}
			else
			{
				$_SESSION["existEmailForget"] = true;
			}

		}
	}
?>