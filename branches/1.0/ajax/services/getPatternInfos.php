<?php
function getPatternInfos(){

	$pattern = Dp::getAllPattern();
	$relationShip = Dp::getAllRelationShip();
	$data['pattern'] = $pattern;
	$data['relationShip'] = $relationShip;
	return $data;	
}
?>