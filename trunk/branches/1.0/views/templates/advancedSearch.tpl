
<p>La recherche avanc&eacute;e vous permet d'effectuer une recherche plus affin&eacute;e en selection des champs de recherche.<br>
Si vous d&eacute;sirez effectuer une recherche simple, nous vous invitons &agrave; utiliser la <a href="searchDp.php?menu=simpleSearch"><strong>recherche simple</strong></a>.</p>
<br/>
<form id="formSearch" name="formSearch" method="post"  action="searchDp.php?menu=resultToSearch" onSubmit="return verifyValueSearch()">
<table border="0" cellpadding="0" cellspacing="2" class="stylestandard">
<tbody>
<tr>
<td>&nbsp;</td>
<td align="left"  valign="bottom">Mots cl&eacute;s </td>
<td align="right">&nbsp;</td>
<td valign="bottom">&nbsp;</td>
</tr>
<tr>
<td align="right" width="10" height="25"></td>
<td>
<span id="valueSearch1st"><input id="keywords" name="keywords" size="50" type="text" class="searchdp"  style="width:278px"></span></td>
<td align="right" width="20" height="25">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left"  valign="bottom">Cat&eacute;gories :</td>
<td align="right" height="25">&nbsp;</td>
<td valign="bottom">Objectives  :</td>
</tr>
<tr>
<td align="right" valign="top" height="25">&nbsp;</td>
<td valign="top">
 <select name="dpCategory[]" size="4" multiple="multiple" style="width:290px;font-size:11px">
  {section name=i loop=$categories}
   <option value="{$categories[i].id}">{$categories[i].category}</option>
  {/section}
 </select></td>
<td align="right" height="25">&nbsp;</td>
<td valign="top"><select name="solutionObjective[]" size="4" multiple="multiple" style="width:290px;font-size:11px">
  
       {section name=i loop=$solutionObjective}
        
  <option value="{$solutionObjective[i].id}">{$solutionObjective[i].objective}</option>
  
        {/section}
      
</select></td>
</tr>
<tr></tr>
<tr>
<td>&nbsp;</td>
<td align="left"  valign="bottom">Type de syst&egrave;mes :</td>
<td align="right" height="25">&nbsp;</td>
<td valign="bottom">Type de situations  :</td>
</tr>
<tr>
<td align="right" valign="top" height="25">&nbsp;</td>
<td valign="top">
	  <select name="dpSystem[]" size="4" multiple="multiple" style="width:290px;font-size:11px">
        {section name=i loop=$systems}
        <option value="{$systems[i].id}">{$systems[i].system}</option>
        {/section}
      </select></td>
<td align="right" height="25">&nbsp;</td>
<td valign="top">
	 <select name="dpSituation[]" size="4" multiple="multiple" style="width:290px;font-size:11px">
        {section name=i loop=$situations}
        <option value="{$situations[i].id}">{$situations[i].situation}</option>
        {/section}
      </select>
</td>
</tr>
<tr></tr>
<tr>
<td>&nbsp;</td>
<td align="left"  valign="bottom">Acteurs :</td>
<td align="right" height="25">&nbsp;</td>
<td valign="bottom">Auteurs  :</td>
</tr>
<tr>
<td align="right" valign="top" height="25">&nbsp;</td>
<td valign="top">
	 <select name="dpActors[]" size="4" multiple="multiple" style="width:290px;font-size:11px">
       {section name=i loop=$actors}
        <option value="{$actors[i].id}">{$actors[i].actor}</option>
       {/section}
      </select></td>
<td align="right" height="25">&nbsp;</td>
<td valign="top">
	   <select name="dpAutors[]" size="4" multiple="multiple" style="width:290px;font-size:11px">
        {section name=i loop=$dpAutors}
         <option value="{$dpAutors[i].id}">{$dpAutors[i].autor}</option>
        {/section}
      </select></td>
</tr>
<tr>
<td height="25">&nbsp;</td>
<td align="left">&nbsp;</td>
<td align="right" height="25">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td height="25">&nbsp;</td>
<td align="left">
<input name="reset" value="Effacer" class="buton2" type="reset">
<input name="search" value="Lancer la recherche" class="buton2" type="submit"></td>
<input name="advancedSearch"  type="hidden">
<td align="right" height="25">&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody></table>

</form>
</br>&nbsp;
<p><span class="fontorange">Conseil : </span>utilisez l'ast&eacute;risque (*) pour rechercher tous les mots ayant une
m&ecirc;me racine : 'physi*' retrouve physics, physique, physik, physical,
physicists, physiciens, mais aussi physiologie etc.</p>
