
$(document).ready(function() {

if($('#addRelation')){
		$("#addRelation").click(function() {
			var ajaxData = "";
			var data = getAjaxData('getPatternInfos', ajaxData, callBackFunction);
			
		 });
	}

if($('#saveRelation')){
	$("#saveRelation").click(function() {
		var pattern = new Array;
		pattern = getRelatedPattern();
		getAjaxData('saveRelatedPatterns', pattern, callBackFunctionOfSaveRelation);
		
	 });
}
if($('#saveComment')){
	$("#saveComment").click(function() {
		var comment = new Array;
		comment = getDpComment();
		getAjaxData('saveComment',comment,callBackFunctionOfSaveComment);
		
	 });
}
if($('#queryLink')){
	$("#queryLink").click(function() {
	var location = document.getElementById("queryLink");
	var query = document.getElementById("query").value;
	location.href = "searchDp.php?keyword="+query+"&menu=resultToSearch";	
	location.target  = "_blank";
	 });
}







});	


callBackFunction = function(returnOfAjax){
	var data = decode64(returnOfAjax);
	data = unserialize(data);
	newRelation(data);
}

callBackFunctionOfSaveRelation = function(returnOfAjax){
	var data = decode64(returnOfAjax);
	data = unserialize(data);
	if(data){
		alert("Enregistrement bien effectué");
	}else{
		alert("Enregistrement bien effectué");
	}
}
callBackFunctionOfSaveComment = function(returnOfAjax){
	var data = decode64(returnOfAjax);
	data = unserialize(data);
	if(data){
		alert("Votre commentaire a été pris en compte");
	}else{
		alert("Echec lors de l'enregistrement");
	}
}

function newRelation(data){

var relation = document.getElementById("relation");
var trRelation = document.getElementById("trId");
var trElement = document.createElement("TR");
var tdElement1 = document.createElement("TD");
var divElement1 = document.createElement("DIV");

var divElement1Style = document.createAttribute('align');
divElement1Style.nodeValue = "left";
divElement1.setAttributeNode(divElement1Style);


var selectElement1 = document.createElement("SELECT");
var a;
var pattern = new Array;
pattern = data['pattern'];
for(a=0;a<pattern.length;a++){
var selectOption1 = document.createElement("OPTION");
selectOption1.value = pattern[a]['id'];
selectOption1.text = pattern[a]['pattern'];
selectElement1.appendChild(selectOption1);
}	
divElement1.appendChild(selectElement1);
tdElement1.appendChild(divElement1);



var tdElement2 = document.createElement("TD");
var divElement2 = document.createElement("DIV");
/*var divElement2Style = document.createAttribute('align');
divElement2Style.nodeValue = "left";
divElement2.setAttributeNode(divElement2Style);
*/
var selectElement2 = document.createElement("SELECT");
var b;
var relationShip = new Array;
relationShip = data['relationShip'];
for(b=0;b<relationShip.length;b++){
var selectOption2 = document.createElement("OPTION");
selectOption2.value = relationShip[b]['id'];
selectOption2.text = relationShip[b]['relation'];
selectElement2.appendChild(selectOption2);
}
divElement2.appendChild(selectElement2);
tdElement2.appendChild(divElement2);


var tdElement3 = document.createElement("TD");
var divElement3 = document.createElement("DIV");
var divElement3Style = document.createAttribute('align');
divElement3Style.nodeValue = "left";
divElement3.setAttributeNode(divElement3Style);

var selectElement3 = document.createElement("SELECT");
var selectOption31 = document.createElement("OPTION");
var selectOption32 = document.createElement("OPTION");
selectOption31.value = "Interne";
selectOption31.text = "Interne";
selectOption32.value = "Externe";
selectOption32.text = "Externe";
selectElement3.appendChild(selectOption31);
selectElement3.appendChild(selectOption32);
divElement3.appendChild(selectElement3);
tdElement3.appendChild(divElement3);



var tdElement4 = document.createElement("TD");
var divElement4 = document.createElement("DIV");
var divElement4Style = document.createAttribute('align');
divElement4Style.nodeValue = "center";
divElement4.setAttributeNode(divElement4Style);

tdElement4.appendChild(divElement4);
trElement.appendChild(tdElement1);
trElement.appendChild(tdElement2);
trElement.appendChild(tdElement3);
trElement.appendChild(tdElement4);
relation.appendChild(trElement);

}

function getRelatedPattern(){	
var Pattern = new Array();
var SELECT = document.getElementsByTagName("select");
var dpId = document.getElementById("dpId").value;
var selectNum = SELECT.length;
var OPTIONS = new Array();
var index;
var val;
for(var i=0;i<selectNum;i++){
OPTIONS = SELECT[i].options;
index = OPTIONS.selectedIndex;
val = OPTIONS[index].value;
Pattern[i] = val;
}
Pattern[selectNum] = dpId;
return Pattern;
}

function getDpComment(){
var dp = document.getElementById("idDp").value;
var commentText = document.getElementById("comment").value;
var autor = document.getElementById("autor").value;
var comment = new Array;
comment['dp'] = dp;
comment['comment'] = commentText;
comment['autor'] = autor;
return comment ;
	
}



//Debbuger

function var_dump(v){
	var ret = ''
	for(var prop in v){
		ret += "obj." + prop + " = " + v[prop] + "\n";
 	}
 	alert(ret);
}

