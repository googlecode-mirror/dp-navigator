<?php
/**
 * extend smarty
 */
class DpSmarty extends Smarty{
	
	function __construct(){
		$this->Smarty ();
		$this->template_dir = $this->_basedir . 'templates/';
		$this->compile_dir = $this->_basedir . 'compiled/';
	//	$this->config_dir = $this->_basedir . 'configs/';
		$this->cache_dir = $this->_basedir . 'cache/';
		$this->caching = 0;
		$this->compile_check = true;
		$this->force_compile = true;
		$this->debugging = FALSE;
		
		
	}				
	
	
	
	
}
?>