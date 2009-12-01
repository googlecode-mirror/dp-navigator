{include file="header.tpl"} 
<table id="cadre" align="center">
<tr>
<td>
<div id="head" align="center"><img class="banniere" src="{$IMAGE_PATH}/header.png" width="965" height="114" border="0" /></div>
<br clear="all" />
<table align="center" cellpadding="2" width="701">
  <tbody><tr><td valign="top" align="center" width="404">
	<div id="mainboxPasswordForget">	
		<div><img src="{$IMAGE_PATH}/security.jpg" style="float: left; padding-top:1.0em;" align="left" border="0"></div>
		 <div id="maincontent">
			<center>
			<div id="passforget">
			 <p class="style1" style="text-align: left; font-size: 12pt;"><b>Connexion &agrave; <a href=""> DP Navigateur </a></b></p>
			 <div id="reponse"><strong></strong><br/>
			   &nbsp;</div>			
			 <form id="passwordforget" name="passwordforget" method="post" action="" onSubmit="return verifPasswordForget()">
			 <p style="text-align:justify">Votre compte a &eacute;t&eacute; cr&eacute;e avec succ&egrave;s.
			   Vous pouvez maintenant vous connectez &agrave; DPWEB.<br>Bonne navigation! </p>
	          <div align="left"></div>
			 </form>
			 <div class="barre"></div><br/>
             <p align="left"><a href="home.php">Connectez-vous &agrave; DPWEB </a> | <a href="javascript: alert('Aide indisponible !');">Aide</a></p>
			 <p class="style1" style="text-align: left; font-size: 12pt;"><a href="inscription.php"><strong>Nouveau compte ! </strong></a></p>
		    </div>
		</div>	
	</div>
</td>
<td valign="top" align="center" width="281"><div id="rightBoxPasswordForget">
		<div><center>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		</center>
		  </div>
	</div></td>
</tr>
    <tr>
      <td valign="top" align="center">&nbsp;</td>
      <td valign="top" align="center">&nbsp;</td>
    </tr>
</tbody>
</table>
</td>
</tr>
</table>
<p align="center">&nbsp;</p>
{include file="footer.tpl"}