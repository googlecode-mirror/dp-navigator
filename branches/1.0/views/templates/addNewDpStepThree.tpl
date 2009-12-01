{include file="thumbIndex.tpl"} 

<form name="newDp" action="?step=Four" method="post">
<p>&nbsp;</p>
<div align="left">
<table width="515" border="0">
  <tr>
    <td width="112" valign="top"><div align="right">Nom : </div></td>
    <td width="393"><div align="left">
      <input type="text" name="solutionName" size="50" maxlength="50" value="{$dpSolution}">
    </div></td>
  </tr>
  <tr>
    <td width="112" valign="top"><div align="right">Objectifs : </div></td>
    <td width="393"><div align="left">
      <select name="solutionObjective[]" size="4" multiple>
       {section name=i loop=$solutionObjective}
        <option value="{$solutionObjective[i].id}">{$solutionObjective[i].objective}</option>
        {/section}
      </select>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Indicateur(s) : </div></td>
    <td><div align="left">
     <textarea  name="solutionIndicators" rows="4" cols="50">{$solutionIndicators}</textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">M&eacute;thode(s) : </div></td>
    <td><div align="left">
     <textarea  name="solutionMethods" rows="4" cols="50">{$solutionMethods}</textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Description : </div></td>
    <td><div align="left">
      <textarea  name="solutionDesc" rows="4" cols="50">{$solutionDesc}</textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Discussion : </div></td>
    <td><div align="left">
      <textarea  name="solutionDisc" rows="4" cols="50">{$solutionDisc}</textarea>
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
