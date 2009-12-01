<?php
if(isset($_GET['logout'])){
	session_destroy();
	Url::relocate("home.php");
}
if($_SESSION["log"]== true){
	$smarty->assign("login",$_SESSION['user']->getLogin());
}else{
	Url::relocate("home.php");
}

?>