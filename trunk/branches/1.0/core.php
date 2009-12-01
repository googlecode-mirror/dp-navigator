<?php
session_start();

require_once("config/config.php");


// Debug mode in config file
if(DEBUG_MODE == true) {
	error_reporting(E_ALL);
} else {
	error_reporting(0);
}

/**
 * auto require lib file
 *
 * @param int $class_name
 */

function __autoload($class_name) {
	if($class_name == 'Smarty'){
		require_once TEMPLATE_LIBS_PATH.'Smarty.class.php';
	}
	else{
		require_once 'libs/'.$class_name.'.class.php';
	
}
}
//Connexion to database

/*try{
$db = new Exist();
$db->connect() or die(file_get_contents('Maintenance.html'));
$dbA = new ExistAdmin();
$dbA->connect() or die(file_get_contents('Maintenance.html')); 
}catch(Exception $e){
die($e);

}*/
//connexion to mysql Database

$dbm = new DbConnexion(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/*
 * PATH VARS
 */
define('LANGUAGE_PATH',		"./views/language");						//Define Path constant							
define('CSS_PATH'	 ,		"./views/css");
define('IMAGE_PATH'	 ,		"./views/image");
define('JS_PATH'	 ,		"./views/js");
define('OTHER_PATH'	 ,		"./views/other");
define('TEMPLATES_DIR'	 ,		"./views/templates");
define('COMPILED_DIR'	 ,		"./views/templates_c");
define('CACHE_DIR'	 ,		"./views/cache");
define('GET_QUERY',			$_SERVER['QUERY_STRING']);
define('CONTROLLER_PATH',		"./controller/");
/*
 * SMARTY CONFIGS
 */
$smarty = new Smarty();
$smarty->template_dir = TEMPLATES_DIR;
$smarty->compile_dir = COMPILED_DIR;
$smarty->cache_dir = CACHE_DIR;
//$smarty->debugging = TRUE;
$smarty->assign('LANGUAGE_PATH', 	LANGUAGE_PATH );
$smarty->assign('CSS_PATH', 		CSS_PATH );
$smarty->assign('IMAGE_PATH',		IMAGE_PATH );
$smarty->assign('JS_PATH', 		JS_PATH );
$smarty->assign('OTHER_PATH', 	OTHER_PATH);
//$smarty->assign('ABS_PATH', 		ABS_PATH);
//$smarty->assign('SERVER_NAME', 	SERVER_NAME);

$scriptName = DpConfig::getScriptName($_SERVER['SCRIPT_NAME']);
define('SCRIPTNAME',$scriptName);

/*
 * Post Action
 */
if(is_readable(CONTROLLER_PATH.SCRIPTNAME.'/postAction.php')){
	//ob_start();
	require(CONTROLLER_PATH.SCRIPTNAME.'/postAction.php');
	//ob_clean();
}

?>
