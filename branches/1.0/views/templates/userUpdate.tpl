			  <form id="formUpdateUser" name="formUpdateUser" method="post"  action="user.php?menu=userSaveUpdate" onSubmit="return verifUpdateUser()">
			  Pseudo 
			  <div><input name="pseudoUpdateUser" value="{$user.user_login}" size="40" maxlength="50" type="text"></div><br/>
			  E.mail	
			  <div><input name="emailUpdateUser" value="{$user.user_email}" size="40" maxlength="50" type="text" disabled="disabled">&nbsp;<span class="fontorange">{$errorMessage}</span></div><br/>
              Groupe
			  <div>
			    <select name="groupUpdateUser" size="3">
                  <!--option value="0">-Choisissez un groupe-</option-->
                  <option value="administrator" {$selectedadmin}>Administrateur</option>
                  <option value="manager" {$selectedmanager}>Gestionnaire</option>
                  <option value="user" {$selecteduser}>Visiteur</option>
                </select>
			  </div>

  				<br/>
				<br/>	
<table class="margebas" width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="448" align="left"><input name="btnSaveUser" type="submit" id="btnSaveUser" value=" Enregistrer " class="buton2"/>&nbsp;&nbsp;
      <input name="resetSaveUser" type="reset" id="resetSaveUser" value=" Annuler " class="buton2" onclick="javascript:history.go(-1)"/></td>
    <td width="10" align="right">&nbsp;</td>
    <td width="292" align="right">&nbsp;</td>
  </tr>
</table>	
</form>