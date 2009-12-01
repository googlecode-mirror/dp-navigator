<?php
require_once '../core.php';
if(array_key_exists('service', $_POST)){
	$requestedService = $_POST['service'];
	$_tmp = glob(dirname(__FILE__) . '/services/*.php');
	for ($a = 0 ; $a < count($_tmp) ; $a++) {
		$services[basename($_tmp[$a], '.php')] = $_tmp[$a] ;
	}
	if(!array_key_exists($requestedService, $services)){
		echo 'Service unavailable';
		exit(0);
	}
	require_once $services[$requestedService];
	$data = unserialize(base64_decode($_POST['DATA']));
	$_return = $requestedService($data);
	$data  = base64_encode(serialize($_return));
	echo $data ;
}
else{
	echo 'Service is missing';
}

?>