			  <form id="formNewUser" name="formNewUser" method="post"  action="user.php?menu=userSave" onSubmit="return verifNewUser()">
			  Pseudo 
   			  <div><strong>{$pseudo}</strong></div>
			  <br/>
			  E.mail	
  			  <div><strong>{$email}</strong></div>
			  <br/>
              Groupe
			  <div><strong>{$group}</strong></div>
  				 <br/>

<div class="fontorange">Le compte a été enregistr&eacute; avec succès. Un mail automatique est envoyé à l'utilisateur.</div>
<div>
<a href="user.php?menu=userList">Retour à la liste des utilisateurs</a>
</div>
<br/>
<br/>
</form>