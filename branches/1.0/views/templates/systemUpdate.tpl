<div style="margin:8px; text-align:justify">
<form id="formUpdateSystem" name="formUpdateSystem" method="post"  action="parameters.php?menu=system&action=Save" onSubmit="return verifUpdateSystem()">
  Libell&eacute;
  <div><input name="nameUpdateSystem" value="{$system.name}" size="40" type="text">
  &nbsp;</div>
  <br/><br/>
<table class="margebas" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="85%" align="left"><input name="btnSave" type="submit" id="btnSave" value=" Enregistrer " class="buton2"/>&nbsp;&nbsp;
      <input name="resetSave" type="reset" id="resetSave" value=" Annuler " class="buton2"/></td>
    <td width="7%" align="right">&nbsp;</td>
    <td width="8%" align="right">&nbsp;</td>
  </tr>
</table>	
</form>
</div>