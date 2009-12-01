<?php
class Exist
{ 
  protected $_wsdl = "";
  protected $_user = "admin";
  protected $_password = "admin";
  
  protected $_soapClient = null;
  protected $_session = null;
  protected $_error = "";
 
  protected $_debug = false;
  protected $_highlight = false;
  
  public function __construct($user="admin", $password="admin", $wsdl="http://localhost:8080/exist/services/Query?wsdl")
  {
	  $this->_user = $user;
	  $this->_password = $password;
	  $this->_wsdl = $wsdl;

	  $this->_soapClient = new SoapClient ($this->_wsdl);
  }
  
  public function __destruct() {
  }
  
  public function disconnect()
  {
	  if ( $this->getError() )
	  	return false;
	  try
	  {
		  //$this->_soapClient->disconnect($this->_session);
		  $parameters = array('sessionId' => $this->_session);
		  $this->_session = $this->soapCall('disconnect', $parameters);
	  }
	  catch( SoapFault $e )
	  {
		  $this->setError($e->faultstring);
	  }
  }
  
  public function connect()
  {
	  if ( $this->getError() )
	  	return false;
	  try
	  {
		  $parameters = array('userId' => $this->_user, 'password' => $this->_password );
		  $this->_session = $this->soapCall('connect', $parameters);
	  }
	  catch( SoapFault $e )
	  {
		  $this->setError($e->faultstring);
		  return false;
	  }
	  return true;
  }

  public function getError()
  {
	if ( $this->_error != "" )
	  	return $this->_error;
	return false;
  }
  
  public function xquery($query)
  {
	  if ( $this->getError() )
	  	return false;
	  if ( empty($query) )
	  {
		  $this->_error = "ERROR: Query is empty!";
		  return false;
	  }
	  try
	  {
		  // encode only to base64 if php version lesser than 5.1
		  // patch by Bastian Gorke bg/at\ipunkt/dot\biz
		  if (!version_compare(PHP_VERSION, '5.1.0', 'ge')) {
			$query = base64_encode($query);
		  }
		  //$queryResponse = $this->_soapClient->xquery($this->_session, $queryBase64); 
		  $parameters = array('sessionId' => $this->_session , 'xquery' => $query );
		  $queryResponse = $this->soapCall('xquery', $parameters);
	  }
	  catch( SoapFault $e )
	  {
		  $this->setError($e->faultstring);
		  return false;
	  }
	  
	  if ( $this->_debug && is_object($queryResponse) )
	  {
	      // xquery call Result
	      print "===========================================================================";
	      print "<p><b>Result of the <i>xquery</i> SOAP call (in PHP array format)</b></p>";
	      print "===========================================================================";
	      print "<p>\$queryResponse:<p><pre>";
	      print_r($queryResponse);
	      print "</pre>";
	      print "===========================================================================";
	  }

	  if ( is_object($queryResponse) && $queryResponse->hits > 0)
	  {
		  //$xml = $this->_soapClient->retrieve($this->_session, 1, $queryResponse->hits, true, true, "both");
		  /*
		  <element name="sessionId" type="xsd:string"/>
		  <element name="start" type="xsd:int"/>
		  <element name="howmany" type="xsd:int"/>
		  <element name="indent" type="xsd:boolean"/>
		  <element name="xinclude" type="xsd:boolean"/>
		  <element name="highlight" type="xsd:string"/>
		  */
		  $parameters = array('sessionId' => $this->_session , 
		  		'start' => 1, 
				'howmany' => $queryResponse->hits, 
				'indent' => TRUE, 
				'xinclude' => TRUE, 
				'highlight' => $this->_highlight
				);
		  $xml = $this->soapCall('retrieve', $parameters);
	  }
	  else
	  {
		  $this->_error = "ERROR: No data found!";
		  return false;
	  }

	  if ( $this->_debug && $xml != "" )
	  {
	      // xquery call Result
	      print "======================================================";
	      print "<p><b>Result of the <i>xquery</i> (in XML)</b></p>";
	      print "======================================================";
	      print "<pre>";
	      print "<pre>";
		  if ( !empty($result["XML"]) )
		  	foreach ( $result["XML"] as $xml)
		  		print htmlspecialchars($xml) . "<br />";
	      print "</pre>";
	      print "======================================================";
	  }
    
	  $result = array(
	      "HITS" => $queryResponse->hits,
	      "COLLECTIONS" => $queryResponse->collections,
	      "QUERY_TIME" => $queryResponse->queryTime,
	      "XML" => $xml
	    );

	 return $result;
  }

  protected function soapCall($function, $params)
  {
	  $return = $this->_soapClient->__soapCall($function, array('parameters'=>$params));
	  $output = $function . "Return";
	  return $return->$output ? $return->$output : 0;
  }
  
  
  
  
  
    public function getResource($path='/db/users.xml')
  {
	  if ( $this->getError() )
	  	return false;
	  if ( empty($path) )
	  {
		  $this->_error = "ERROR: path  is empty!";
		  return false;
	  }
	  try
	  {
		  $parameters = array('sessionId' => $this->_session , 'path' => $path ,'indent'=>true,'xinclude'=>true);

		  $queryResponse = $this->soapCall('getResource', $parameters);
	  }
	  catch( SoapFault $e )
	  {
		  $this->setError($e->faultstring);
		  return false;
	  }

 	  return $queryResponse;
  }
  
  
  public function setHighlight($highlight)
  {
	  $this->_highlight = $highlight ? 'both' : FALSE;
  }
  
  public function setDebug($debug=true)
  {
    $this->_debug = $debug;
  }
  
  public function setUser($user)
  {
    $this->_user = $user;
  } 
  
  public function setPassword($passwd)
  {
    $this->_password = $passwd;
  }
  
  public function setWSDL($wsdl)
  {
    $this->_wsdl = $wsdl;
  }
  
  protected function setError($error)
  {
    $this->_error = $error;
  }
}



?>