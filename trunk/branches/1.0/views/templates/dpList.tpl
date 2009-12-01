{if ($dpList)}
<table class="margebas" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="448" align="left">
	<form id="formNewUser" name="formNewUser" method="post" action="addNewDp.php">
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
 <th width="21" align="right">N&deg;</th>
 <th width="58" align="center">&nbsp;</th>
 <th width="566" align="left">Description</th>
 <th width="103" align="left">Action</th>
 </tr>
{section name=i loop=$dpList}
<tr class="row2">
 <td height="26" align="right" valign="top">{$dpList[i].pattern_num}</td>
 <td align="center" valign="top"><a href="searchDp.php?menu=viewDp&dpId={$dpList[i].pattern_id}"><img src="{$IMAGE_PATH}/icons/header/icon-48-article-add.png" width="48" height="48" border="0" /></a></td>
 <td align="left" valign="top">
   <strong>Nom: <a href="searchDp.php?menu=viewDp&dpId={$dpList[i].pattern_id}">{$dpList[i].pattern_name}</a></strong><br/>
   <u>R&eacute;sum&eacute;</u>: {$dpList[i].pattern_abstract}<br/>
   <u>Cat&eacute;gorie(s)</u>: {$dpList[i].categories} </td>
 <td align="left" valign="middle"><a href="searchDp.php?menu=viewDp&dpId={$dpList[i].pattern_id}"><img src="{$IMAGE_PATH}/icons/icon/document.png" title="Visualiser" width="16" height="16" border="0"/></a>&nbsp;&nbsp;<a href="updateDp.php?dpId={$dpList[i].pattern_id}"><img src="{$IMAGE_PATH}/icons/icon/write.png" title="Modifier" width="16" height="16" border="0"/></a>&nbsp;&nbsp;<a href="javascript: alert('Suppression indisponible !');"><img src="{$IMAGE_PATH}/icons/icon/delete.png" title="Supprimer" width="16" height="16" border="0"/></a>&nbsp;&nbsp;<!--a href="javascript: alert('Generation de pdf indisponible !');"><img src="{$IMAGE_PATH}/icons/icon/pdf.png" title="Envoyer un mail" width="16" height="16" border="0"/></a--></td>
</tr>
{/section}
<tr>
<th colspan="4" align="center"></th>
</tr>
</tbody>
</table>
{else}  
 <div align="left">Aucun Design Pattern dans la base. Pour ajouter votre premier DP <a href="addNewDp.php"><strong>cliquez ici</strong> !</a></div>
{/if} 