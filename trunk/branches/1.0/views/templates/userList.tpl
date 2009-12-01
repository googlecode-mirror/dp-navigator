{if ($userList)}
<table class="margebas" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="448" align="left">
	<form id="formNewUser" name="formNewUser" method="post" action="user.php?menu=userNew">
		<input id="btnNewUser" name="btnNewUser" type="submit" value=" Nouveau " class="buton2"/>
	</form>
    </td>
    <td width="10" align="right"></td>
    <td width="292" align="right" valign="middle" class="stylestandard">&nbsp;&nbsp;1 - {$size} sur {$size}</td>
  </tr>
</table>

<table class="adminlist" cellpadding="0" cellspacing="0">
<tbody>
<tr>
 <th width="30" align="right">#</th>
 <!--th width="30" align="center"><input name="checkallreunion" onClick="cocheTousreunion('checkreunion', this.checked);" type="checkbox"></th-->
 <th width="306" align="left">Pseudo</th>
 <th width="335" align="left">Email</th>
 <th width="170" align="left">Groupe</th>
 <th width="140" align="left">Action</th>
</tr>
{section name=i loop=$userList}
<tr class="row2">
 <td height="26" align="right" valign="middle">{$userList[i].num}</td>
 <!--td align="center" valign="middle"><input name="checkallreunion2" onClick="cocheTousreunion('checkreunion', this.checked);" type="checkbox"></td-->
 <td align="left" valign="middle"><a href="user.php?menu=userUpdate&id={$userList[i].id}">{$userList[i].login}</a></td>
 <td align="left" valign="middle">{$userList[i].email}</td>
 <td align="left" valign="middle">{$userList[i].group}</td> 
 <td align="left" valign="middle"><!--a href="javascript: alert('Visualisation indisponible !');"><img src="{$IMAGE_PATH}/icons/icon/document.png" title="Visualiser" width="16" height="16" border="0"/></a-->&nbsp;&nbsp;<a href="user.php?menu=userUpdate&id={$userList[i].id}"><img src="{$IMAGE_PATH}/icons/icon/write.png" title="Modifier" width="16" height="16" border="0"/></a>&nbsp;&nbsp;<a href="javascript: confirmDelete('user.php?menu=userDelete&id={$userList[i].id}');"><img src="{$IMAGE_PATH}/icons/icon/delete.png" title="Supprimer" width="16" height="16" border="0"/></a>&nbsp;&nbsp;<!--a href="javascript: alert('Envoi de mail indisponible !');"><img src="{$IMAGE_PATH}/icons/icon/mail.png" title="Envoyer un mail" width="16" height="16" border="0"/></a--></td>
</tr>
{/section}
<tr>
<th colspan="6" align="center"></th>
</tr>
</tbody>
</table>
{else}  
 <div align="left">Aucun utilisateur dans la base.</div>
{/if} 