<?php
if(isset($_GET['logout']))
{
	session_destroy();
	Url::relocate("home.php");
}
//SIMPLE RESEARCH
if(isset($_POST["valueSearch"])||isset($_GET['keyword']))
{
	$valueSearch = $_POST['valueSearch'].$_GET['keyword'];
	$valueSearch = trim($valueSearch);
	$dpList = Dp::searchDpByFullText($valueSearch);
	if($dpList == null)
	{
		$_SESSION['valueSearch'] = $valueSearch;
		$_SESSION['dpList'] = $dpList;
	}
	else
	{
		$_SESSION['dpList'] = $dpList;
	}
}
//ADVANCED RESEARCH
if(array_key_exists('advancedSearch',$_POST)){
	$keywords = $_POST['keywords'];
	$searchParam['objective'] = $_POST['solutionObjective'];
	$searchParam['autors'] = $_POST['dpAutors'];
	$searchParam['category'] = $_POST['dpCategory'];
	$searchParam['system'] = $_POST['dpSystem'];
	$searchParam['situation'] = $_POST['dpSituation'];
	$searchParam['actors'] = $_POST['dpActors'];
	$dpList = Dp::searchAllDpByCriterias($keywords,$searchParam);
	for($a=0;$a<count($dpList);$a++){
		while(list($key, $val )	= each($dpList[$a])){
			if(is_array($val)){
				$dpList[$a][$key] = "";
				for($b=0;$b<count($val);$b++){
					$dpList[$a][$key] = $dpList[$a][$key].$val[$b];
				}
			}
		}
	$dpList[$a]['pattern_link'] = "javascrpit: window.location.href = '?menu=viewDp&dpId=".$dpList[$a]['pattern_id']."'";
	$dpList[$a]['pattern_creationDate'] = date("d/m/Y",$dpList[$a]["pattern_creationDate"]);					
	}
	$_SESSION['dpList'] = $dpList;

}

?>