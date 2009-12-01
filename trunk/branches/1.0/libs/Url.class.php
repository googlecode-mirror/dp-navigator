<?php
/**
 * @package url
 * 
 * url checking and redirector
 */


class url {

	
	
	/**
	 * relocate currentConnexion to $path using http header
	 *
	 * @param str $path
	 * @param bool $directRelocate
	 * @return str $location
	 */
	public static function relocate($path, $directRelocate = true){
		
		$currentRelativeURI = $_SERVER["PHP_SELF"];
		$currentServerHost = $_SERVER["SERVER_NAME"];
		//If $path contain abslolute URI, we don't calculate the location 
		if(preg_match("#^(http[s]?|ftp[s]?)://#i", $path)){
			$location = $path;
		}else{
			if(!preg_match("#^/#i",$path)){
				$path = '/'.$path;
			}
			$location = 'http://' . str_replace('//','/', $currentServerHost . dirname($currentRelativeURI) . $path);
		}
		if($directRelocate){
			header('Location: ' . $location);
		}
		return $location;
	}
}


?>