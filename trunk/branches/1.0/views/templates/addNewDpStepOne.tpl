{include file="thumbIndex.tpl"} 
<form name="newDp" action="?step=Two" method="post">
<p>&nbsp;</p>
<div align="left">
<table width="515" border="0">
  <tr>
    <td width="112" valign="top"><div align="right">Nom : </div></td>
    <td width="393"><div align="left">
      <input type="text" name="dpName" size="50" maxlength="50" value="{$dpName}">
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">R&eacute;sum&eacute; : </div></td>
    <td><div align="left">
      <textarea  name="dpAbstract" rows="4" cols="50" >{$dpAbstract}</textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Cat&eacute;gorie : </div></td>
    <td><div align="left">
      <select name="dpCategory[]" size="4" multiple>
       {section name=i loop=$categories}
        <option value="{$categories[i].id}">{$categories[i].category}</option>
       {/section}
      </select>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">&nbsp;</div></td>
    <td><div align="left"></div></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Contexte</strong></div></td>
    <td><div align="left"></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Type de syst&egrave;me : </div></td>
    <td><div align="left">
      <select name="dpSystem[]" size="4" multiple>
        {section name=i loop=$systems}
        <option value="{$systems[i].id}">{$systems[i].system}</option>
        {/section}
      </select>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Type de situation </div></td>
    <td><div align="left">
      <select name="dpSituation[]" size="4" multiple>
        {section name=i loop=$situations}
        <option value="{$situations[i].id}">{$situations[i].situation}</option>
        {/section}
      </select>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Acteurs :</div></td>
    <td><div align="left">
      <select name="dpActors[]" size="4" multiple>
      {section name=i loop=$actors}
        <option value="{$actors[i].id}">{$actors[i].actor}</option>
        {/section}
      </select>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Description : </div></td>
    <td><div align="left">
      <textarea  name= "dpDescription"rows="4" cols="50">{$dpDesc}</textarea>
    </div></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><div align="left"></div></td>
  </tr>
  <tr>
    <td><div align="right">
      <input type="reset" name="dpCancel" value=" Annuler " class="buton"/>
    </div></td>
    <td><div align="left">
      <input type="Submit" name="dpSubmit" value=" Suivant >> " class="buton"/>
    </div></td>
  </tr>
</table>
</div>	
</form>

              