<?php
function saveRelatedPatterns($data){
$size = count($data);	
$a = 0; 
$i =0;
while($a<count($data)){
$pattern[$i]['pattern']	= $data[$size-1];
$pattern[$i]['relatedPattern'] = $data[$a];
$pattern[$i]['relationShip'] = $data[$a+1];
$pattern[$i]['relationType'] = $data[$a+2];
$a = $a+3;
$i++;	
}
$flag = Dp::saveRelatedPatterns($pattern);	

return $flag;
}
?>