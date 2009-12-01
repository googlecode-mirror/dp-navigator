{include file="thumbIndex.tpl"} 

<form name="newDp" action="?step=Five" method="post">
<p>&nbsp;</p>
<div align="left">
<table width="515" border="0">
  
  <tr>
    <td valign="top"><div align="right">Auteur(s) : </div></td>
    <td><div align="left">
      <select name="dpAutors[]" size="4" multiple>
       {section name=i loop=$dpAutors}
        <option value="{$dpAutors[i].id}" {$dpAutors[i].selected}>{$dpAutors[i].autor}</option>
        {/section}
      </select>
      <textarea  name="dpAutorSup" rows="4" cols="50"></textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Bibliographie : </div></td>
    <td><div align="left">
    
      <textarea  name="dpBibliographic" rows="4" cols="50">{$dpToUpdate.pattern_biblio}</textarea>
    </div></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><div align="left"></div></td>
  </tr>
  <tr>
    <td><div align="right">
      <input type="reset" name="dpCancel" value=" Annuler " class="buton"/>
      <input type="hidden" name="updateDp"/>
      <input type="hidden" name="user" value="{$userId}"/>
    </div></td>
    <td><div align="left">
      <input type="Submit" name="dpSubmit" value=" Suivant >> " class="buton"/>
    </div></td>
  </tr>
</table>
</div>	
</form>
