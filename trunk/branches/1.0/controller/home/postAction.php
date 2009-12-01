<?php
if(isset($_GET['logout'])){
	session_destroy();
	Url::relocate('home.php');
}
if(isset($_POST["userEmail"])){
	$userEmail = $_POST['userEmail'];
	$userPassword = $_POST['userPassword'];
	$user = new User();
	$user = $user->userAuthentify($userEmail,$userPassword);
	if($user == null){
		$_SESSION["log"] = false;
	}else{
		$_SESSION['log'] = true ;
		$_SESSION['user'] = $user ;
	}
}

?>