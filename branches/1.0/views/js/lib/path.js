/**
+ ---------------------------------------------------------------------------+
|    soliland
|
|     http://www.soliland.fr
|     cyril.janssens@free.fr
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|	$Header: /soliland/V2/html/default/js/lib/path.js,v 1.4 2008-09-09 10:40:24 william Exp $
|   $Source: /soliland/V2/html/default/js/lib/path.js,v $
|   $Revision: 1.4 $
|   $Date: 2008-09-09 10:40:24 $
|   $Author: william $
|	$State: Exp $
+----------------------------------------------------------------------------+
 */
function getPath(){
	var path = new Array;							 
	path.image = $("#IMAGE_PATH").val();
	path.abs = $("#ABS_PATH").val();
	path.css = $("#CSS_PATH").val();
	path.js = $("#JS_PATH").val();
	path.language = $("#LANGUAGE_PATH").val();
	path.other = $("#OTHER_PATH").val();
	path.servername = $("#SERVER_NAME").val();
	path.script = $("#SCRIPT_NAME").val();
	return path;
}



