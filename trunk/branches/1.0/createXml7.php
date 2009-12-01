<?php
require_once"core.php";
$resultQuery = Dp::getDpById($PatternID);

$anXMLString='<?xml version="1.0" encoding="UTF-8"?>
<Patern>
<GENERAL>
</GENERAL>
<PROBLEM>
</PROBLEM>
<SET_OF_SOLUTIONS>
</SET_OF_SOLUTIONS>
<SET_OF_RELATED_PATTERNS>
</SET_OF_RELATED_PATTERNS>
<PATTERN_IDENTIFICATION>
</PATTERN_IDENTIFICATION>
</Patern>';

$doc = new  domDocument();
$doc->loadXML($anXMLString);

$key		=	key($resultQuery);
$val		=	current($resultQuery);
$nbrValues	=	count($resultQuery);

while(list($key, $val )	=	each($resultQuery)){
	if(!is_array($val)){
		
		switch($key){
			case ($key	==	'pattern_name'):
				$newnode = $doc->createElement($key, $val);

				$doc->appendChild($newnode);
				$add = $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
		
			case ($key	==	'pattern_abstract'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
		
				
			case ($key	==	'pattern_desc'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
						
			case ($key	==	'pattern_desc'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
		
	//********************************  PROBLEM *********************************************	
		
			case ($key	==	'pattern_problem_statement'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PROBLEM')->item(0);
				$add->appendChild($newnode);
				break;
		
											
			case ($key	==	'pattern_problem_analysis'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PROBLEM')->item(0);
				$add->appendChild($newnode);
				break;
				
	//********************************** SET_OF_SOLUTIONS *************************************
	
			case ($key	==	'pattern_solution_name'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'objectives'): 
				$newnode = $doc->createElement($key);
				$noeud = $doc->createTextNode($val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'pattern_indicators'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'pattern_methods'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'pattern_solution_desc'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'pattern_solution_discussion'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
			//***************************** SET OF RELATED PATTERNS *****************************************
		
			case ($key	==	'relatedPatterns'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_RELATED_PATTERNS')->item(0);
				$add->appendChild($newnode);
				break;
		
			//**************************************** PATTERN IDENTIFICATION ********************************************************	
			case ($key	==	'autors'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PATTERN_IDENTIFICATION')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'autors'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PATTERN_IDENTIFICATION')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'pattern_creationDate'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PATTERN_IDENTIFICATION')->item(0);
				$add->appendChild($newnode);
				break;
				
			case ($key	==	'pattern_biblio'):
				$newnode = $doc->createElement($key, $val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PATTERN_IDENTIFICATION')->item(0);
				$add->appendChild($newnode);
				break;

		
}
	}else{
		
						
			$newval	=	$val;
			$key2	=	key($newval);
			$val2	=	current($newval);
				
			switch($key){
						
			case ($key	==	'categories'):
					$newnode = $doc->createElement($key,$val2);
					$noeud = $doc->createTextNode($val);
					$doc->appendChild($newnode);
					$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
					$add->appendChild($newnode);
		
				break;
						
			case ($key	==	'system_type'):
					$newnode = $doc->createElement($key,$val2);
					$doc->appendChild($newnode);
					$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
					$add->appendChild($newnode);
				break;
				
								
			case ($key	==	'situation'):
				$newnode = $doc->createElement($key,$val2);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
				
						
			case ($key	==	'actors'):
				$newnode = $doc->createElement($key, $val2);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
				
								
			case ($key	==	'contents/tasks'):
				$value = 'context';
				$newnode = $doc->createElement($value);
				$noeud = $doc->createTextNode($val);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('GENERAL')->item(0);
				$add->appendChild($newnode);
				break;
				
			//**************** problrm *****************************************
									
			case ($key	==	'problem_tracking_focus'):
				$newnode = $doc->createElement($key, $val2);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PROBLEM')->item(0);
				$add->appendChild($newnode);
				break;
				
			//******************************* SET_OF_SOLUTIONS ************************************
										
			case ($key	==	'objectives'):
				$newnode = $doc->createElement($key, $val2);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('SET_OF_SOLUTIONS')->item(0);
				$add->appendChild($newnode);
				break;
				
				//********************************************************************************
				
			case ($key	==	'relatedPatterns'):
				while(list($key2, $val2)	=	each($newval)){
					$newnode = $doc->createElement($key, $val2);
					$doc->appendChild($newnode);
					$add 	= $doc->getElementsByTagName('SET_OF_RELATED_PATTERNS')->item(0);
					$add->appendChild($newnode);
				
				}
				break;
				//**********************patern Identification******************
											
			case ($key	==	'autors'):
				$newnode = $doc->createElement($key, $val2);
				$doc->appendChild($newnode);
				$add 	= $doc->getElementsByTagName('PATTERN_IDENTIFICATION')->item(0);
				$add->appendChild($newnode);
				break;	
		
			}
	}
	
}

$doc->save(XML_PATH.'myxml.xml');
$res = $doc->saveXML();
print($res);
echo "file created";
?>