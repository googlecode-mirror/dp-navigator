<div style="margin:8px; text-align:justify">
<form id="formUpdateObjective" name="formUpdateOjective" method="post"  action="parameters.php?menu=objective&action=Save" onSubmit="return verifUpdateObjective()">
  Libell&eacute;
  <div><input name="nameUpdateObjective" value="{$objective.name}" size="40" type="text">&nbsp;</div>
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