<?php
/**************************************************
 FILENAME: calendar_vars.php
 PURPOSE: Contain non default variables and functions
 AUTHOR: Matthew Malenski
 DATE CREATED: Thu Jun 30 09:39:25 2005
**************************************************/

//--- SMARTY STUFF
//ini_set("include_path",".:/usr/lib/php:/usr/local/lib/php:/home/malenski/public_html/smarty/libs/");
//require_once 'Smarty.class.php';

//--- w3c validator compliant

ini_set("arg_separator.output", "&amp;");

//--- CREATE an array of month names to use
for($i=1; $i<=12; $i++){
    $GLOBALS['cal_months'][] = array('id'=>$i,'name'=>date('F',mktime(0,0,0,$i,1,2005)));  ;
}
//--- Create an array of years to use (start at 2005 and go 10 years past current year)
for($i=2004; $i<(date('Y')+10); $i++){
    $GLOBALS['cal_years'][] = $i;
}

//--- Misc Functions
function html_get($name,$default=''){
    $value = ($_GET[$name])?$_GET[$name]:$_POST[$name];
    return ($value)?trim($value):trim($default);
}
function week_of_year($timestamp){
    $year           = date('Y',$timestamp);
    $day_of_year    = date('z',$timestamp)+1;
    $offset         = date('w',mktime(0,0,0,1,1,$year));
    $week           = ceil(($day_of_year+$offset)/7);
    return $week;
}



?>
