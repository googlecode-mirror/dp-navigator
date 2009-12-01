<?php
class DpConfig{
	/**
	 * Return script name from $uri without extension
	 *
	 * @param str $uri
	 * @return $scriptName
	 */
	public static function getScriptName($uri){
		$scriptName = array();
		$res = preg_match('#/([^/]+)\.php$#i', $uri, $scriptName);
		if($res){
			$scriptName = $scriptName[1];
			return $scriptName;
		}else{
			return false;
		}
	}
	
	
}

?>