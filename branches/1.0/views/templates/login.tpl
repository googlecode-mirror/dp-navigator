{include file="header.tpl"} 
<table id="cadre" align="center">
<tr>
<td>
<div id="head" align="center"><img class="banniere" src="{$IMAGE_PATH}/header.png" width="965" height="114" border="0" /></div>
<br clear="all" />
<table align="center" cellpadding="2" width="701">
  <tbody><tr><td valign="top" align="center" width="404">
	<div id="mainboxConexion">	
		<div><img src="{$IMAGE_PATH}/security.jpg" style="float: left; padding-top:1.0em;" align="left" border="0"></div>
		 <div id="maincontent">
			<center>
			<div id="connexion" align="left">
			 <p class="style1" style="text-align: left; font-size: 12pt;"><b>Connexion &agrave; <a href=""> DP Navigateur </a></b></p>
			 <div id="reponse"><strong>{$errorMessage}</strong><br/>
			   &nbsp;</div>
			 <form id="authentify" name="authentify" method="post" action="" onSubmit="return verifConnection()">
   		      <div align="left" class="style2" style="text-align: left; font-size: 9pt;">
			   E.mail<br/><input id="userEmail" name="userEmail" type="text"/><br/>&nbsp;			  </div>
			  <div align="left" class="style2" style="text-align: left; font-size: 9pt;">Mot de passe <br/>
			   <input id="userPassword" name="userPassword" type="password"/><br/>&nbsp;			  </div>
			  <div align="left"><input value=" Connexion " type="submit" class="button"></div>
			 </form>          
			 <div class="barre"></div><br/>
             <p align="left"><a href="passwordForget.php">Compte ou mot de passe oubli&eacute; ?</a> <!--| <a href="javascript: alert('Aide indisponible !');">Aide</a--></p>
			 <p class="style1" style="text-align: left; font-size: 12pt;"><a href="inscription.php"><strong>Créer un nouveau compte ! </strong></a></p>
  		    </div>
</td>
<td valign="top" align="center" width="281">
	<!--div id="rightBoxConexion">
		<div><center>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		</center>
		  </div>
	</div--></td>
</tr>
    <tr>
      <td valign="top" align="center">&nbsp;</td>
      <td valign="top" align="center">&nbsp;</td>
    </tr>
</tbody>
</table>
<center>
  <br clear="all" />
</center></td>
</tr>
</table>
<p align="center">&nbsp;</p>
{include file="footer.tpl"}