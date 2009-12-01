			  <form id="formNewUser" name="formNewUser" method="post"  action="user.php?menu=userSave" onSubmit="return verifNewUser()">
			  Pseudo 
			  <div><input name="pseudoNewUser" value="" size="40" maxlength="50" type="text"></div><br/>
			  E.mail	
			  <div><input name="emailNewUser" value="" size="40" maxlength="50" type="text">&nbsp;<span class="fontorange">{$errorMessage}</span></div><br/>
              Groupe
			  <div>
			    <select name="groupNewUser" size="3">
                  <option value="administrator">Administrateur</option>
                  <option value="manager">Gestionnaire</option>
                  <option value="user" selected>Visiteur</option>
                </select>
			  </div>
  				 <br/>

<div class="fontorange">*Le mot de passe est généré automatiquement</div>
<br/>
<br/>	
<table class="margebas" width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="448" align="left"><input name="btnSaveUser" type="submit" id="btnSaveUser" value=" Enregistrer " class="buton2"/>&nbsp;&nbsp;
      <input name="resetSaveUser" type="reset" id="resetSaveUser" value=" Annuler " class="buton2"/></td>
    <td width="10" align="right">&nbsp;</td>
    <td width="292" align="right">&nbsp;</td>
  </tr>
</table>	
</form>