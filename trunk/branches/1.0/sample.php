<?php
require_once "core.php";
/*var_dump($_SESSION);
var_dump($_SERVER);*/
$host="localhost";
 $user="root";
 $password="lapalapa";
 $db = "dp";
 $link;
$date = time();
echo $date;
/*$link = mysql_connect( $host, $user, $password) or die('Could not connect to mysql server.' );
 mysql_select_db($db, $link) or die('Could not select database.');
 $query = "select * from user where user_password = 'gilbert'";
 $resulSet = mysql_query($query,$link);
 $num = mysql_num_rows($resulSet);
 echo $num;
*/   
//$dp = Dp::getDpById(10);
//$allDp = Dp::searchDpByFullText('MVC');
//$smarty->display(SCRIPTNAME.".tpl");
$user = new User();
$pwd = $user->passwordEncode('dpweb','gilbert');

var_dump($pwd);
?>
