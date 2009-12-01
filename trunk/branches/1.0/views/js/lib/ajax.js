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
|	$Header: /soliland/V2/html/default/js/lib/ajax.js,v 1.6 2008-09-05 18:28:51 cyril Exp $
|   $Source: /soliland/V2/html/default/js/lib/ajax.js,v $
|   $Revision: 1.6 $
|   $Date: 2008-09-05 18:28:51 $
|   $Author: cyril $
|	$State: Exp $
+----------------------------------------------------------------------------+
 */
function getAjaxData(service, serviceData, callback){
	
	$.ajaxSetup({async : false});
	
	var ServiceData = serialize(serviceData);
	
	convertedServiceData = encode64(ServiceData);
	
	//var path = getPath();
	//ajaxDisplayLoadingMessage();
	$.post("ajax/ajax.php", { 'service': service, 'DATA': convertedServiceData },callback);
	//ajaxHideLoadingMessage();
}

function getAsyncronousAjaxData(service, serviceData, callback){
	$.ajaxSetup({async : true});
	var ServiceData = serialize(serviceData);
	convertedServiceData = encode64(ServiceData);
	//var path = getPath();
	$.post("ajax/ajax.php", { 'service': service, 'DATA': convertedServiceData },callback);
}

function decodeAjax(data){
	return unserialize(decode64(data));
}

function ajaxDisplayLoadingMessage(){
	var path = getPath();
	var DIV = document.createElement('div');
	DIV.id = 'ajaxLoadingMessage';
	var strongDIV = document.createElement('strong');
	var divText = document.createTextNode('Chargement ...');
	var brDIV = document.createElement('br');
	
	strongDIV.appendChild(divText);
	DIV.appendChild(strongDIV);
	DIV.appendChild(brDIV);
	var img = new Image;
	img.src = path.image + 'ajax-loader.gif';
	img.className = 'noBorder';
	var divstyle = document.createAttribute('style');
	divstyle.nodeValue = 'z-index:1000; border: solid 1px #000000;background-color:#FFFFFF;'
	+'position:absolute; top: 40%; left: 50%';
	//; margin-left:auto; margin-right:auto; margin-top: auto; margin-bottom: auto;
	DIV.setAttributeNode(divstyle);
	DIV.appendChild(img);
	document.getElementsByTagName('body')[0].appendChild(DIV);
}


function ajaxHideLoadingMessage(){
	$("#ajaxLoadingMessage").remove();
}