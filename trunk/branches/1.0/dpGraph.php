<?php
require_once 'core.php';
$pattern = Dp::getAllRelatedPatterns();

$type = "gif";
$file = "dpGraph";
if($fp = fopen($file.'.dot', "w")) {
	fputs($fp,"digraph G {");
	fputs($fp,"\t node [color = lightblue2,style=filled,fontname=\"Verdana\",fontsize=\"9\"];\n");
	fputs($fp,"\t edge [color=\"0.650 0.700 0.700\",fontname=\"Verdana\",fontsize=\"9\"];\n");

	for($a=0;$a<count($pattern);$a++) {
		fputs($fp,"P" . $pattern[$a]['patternId'] . " -> R" . $pattern[$a]['relatedPatternId'] . " [label=\"".$pattern[$a]['relationShip']."\"];\n");
		fputs($fp,"P" . $pattern[$a]['patternId']. " [label=\"".$pattern[$a]['patternName']."\"];\n");
		fputs($fp,"R" . $pattern[$a]['relatedPatternId']. " [label=\"".$pattern[$a]['relatedPatternName']."\"];\n");
	}
}
fputs($fp,"}");
fclose($fp);

$output = array();
exec("dot -T$type -o$file.$type $file.dot", $ouput);  //execute  "dot -Tgif -odpGraph.gif dpGraph.dot"
echo $output;

$relationShip =  Dp::getAllRelationShip();
$smarty->assign('relationShip',$relationShip);
$pattern =  Dp::getAllPattern();
$smarty->assign('pattern',$pattern);
$smarty->assign("title","Visualisation du graphe des DPs");
$smarty->assign("menu",$_SESSION['user']->getGroup());
$smarty->assign("content","dpGraph");
$smarty->assign("graph",$file.".".$type);
$smarty->display('homePage.tpl');
?>
