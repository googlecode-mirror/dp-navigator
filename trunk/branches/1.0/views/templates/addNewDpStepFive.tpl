{include file="thumbIndex.tpl"} 
<form name="newDp" id="formRelation" action="" method="post">
<p>&nbsp;</p>
<div align="left">
<table width="530" border="0" id="relation">
<tr>
    <td >DP en cours d'enregistrement:{$patternSaved}</td>
    </tr>
  
  <tr>
    <td width="144" align="left">DP en relation :</td>
    <td width="157" align="left">Relation : </td>
    <td width="179" align="left">Type :</td>
    <td width="32" align="left">&nbsp;</td>
  </tr>
  
  <tr id="trId">
    <td><div align="left">
      <select name="pattern">
        {section name=i loop=$pattern}
        <option value="{$pattern[i].id}">{$pattern[i].pattern}</option>
        {/section}
      </select>
    </div></td>
    <td><div align="left">
	    <select name="dpRelationShip">
       {section name=i loop=$dpRelationShip}
        <option value="{$dpRelationShip[i].id}">{$dpRelationShip[i].relation}</option>
        {/section}
	     </div></td>
    <td><div align="left">
      <select name="relationType">
        <option value="Internal">Interne</option>
        <option value="External">Externe</option>
      </select>
    </div></td>
	    <td width="32" valign="middle"><div  align="center"><img  id="addRelation" src="{$IMAGE_PATH}/icons/add.png" width="32" height="32" title="Ajouter une nouvelle relation" /></div></td>
  </tr>
  <tr>

  </tr>
  </table>
  <br>
  <table width="530" border="0" >
  <tr>
    <td><div align="right">
      <input type="reset" name="dpCancel" value=" Annuler " class="buton"/>
    </div></td>
    <td><div align="left">
    <input type="hidden" name="dp" value="{$dpId}" id="dpId"/>
      <input type="Submit" name="dpSubmit" value=" Enregistrer " class="buton" id="saveRelation"/>
    </div></td>
    <td width="179"><div align="left"></div></td>
    <td width="32"><div align="left">&nbsp;</div></td>	
  </tr>
  
  </table>
</div>	
</form>

