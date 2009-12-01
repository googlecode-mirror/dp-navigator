
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
|	$Header: /soliland/V2/html/default/js/lib/formValidator.js,v 1.5 2008-09-05 15:29:03 cyril Exp $
|   $Source: /soliland/V2/html/default/js/lib/formValidator.js,v $
|   $Revision: 1.5 $
|   $Date: 2008-09-05 15:29:03 $
|   $Author: cyril $
|	$State: Exp $
+----------------------------------------------------------------------------+
 */
/**
* CLASS
*/
var redirector;
var validator = function(me){
	ajaxDisplayLoadingMessage();
	this.submitButton = me;
	this.setFormElement();
	this.fillDataElement();
	this.sendForm();
	ajaxHideLoadingMessage();
}

validator.prototype.submitButton;
validator.prototype.formElement;
validator.prototype.dataElement;

validator.prototype.setFormElement = function(){

	var _tmp = this.submitButton.parentNode;
	while(_tmp){
		if(_tmp.tagName == 'FORM'){
			this.formElement = _tmp;
			redirector = this.formElement.action;
			break;
		}
		_tmp = _tmp.parentNode;
	}
}

validator.prototype.fillDataElement = function(){
	var formId = this.formElement.id;
	this.dataElement = $("#" + formId).serialize();
}

validator.prototype.sendForm = function(){	
	$.ajax({
		async: false,
		type: "POST",
		url: this.formElement.action,
		data: this.dataElement,
		success: function(e){
			document.location.href=redirector;
		}
	});
}

/**
*	DEFAULT EVENT
**/
$(document).ready(function() {
		$(".submitButton").click(function() {
			new validator(this);
		});
 });
