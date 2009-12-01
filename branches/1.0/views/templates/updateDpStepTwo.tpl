{include file="thumbIndex.tpl"} 

<form name="newDp" action="?step=Three" method="post">
<p>&nbsp;</p>
<div align="left">
<table width="515" border="0">
  <tr>
    <td width="112" valign="top"><div align="right">Problematique : </div></td>
    <td width="393"><div align="left">
      <textarea  name="dpProlem" rows="4" cols="50">{$dpToUpdate.pattern_problem_statement}</textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Obervation(s) : </div></td>
    <td><div align="left">
      <select name="trackingFocus[]" size="4" multiple>
       {section name=i loop=$trackingFocus}
        <option value="{$trackingFocus[i].id}" {$trackingFocus[i].selected}>{$trackingFocus[i].focus}</option>
        {/section}
      </select>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Analyse : </div></td>
    <td><div align="left">
      <textarea  name="problemAnalysis" rows="4" cols="50">{$dpToUpdate.pattern_problem_analysis}</textarea>
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

