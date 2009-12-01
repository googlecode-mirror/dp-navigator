<table class="margebas" width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="186" align="left">
					<form id="formNewSituation" name="formNewSituation" method="post" action="parameters.php?menu=situation&action=New">
					&nbsp;&nbsp;<input id="btnNewSituation" name="btnNewSituation" type="submit" value=" Nouveau " class="buton2"/>
					</form>
					</td>
					<td width="1" align="right"></td>
					<td width="125" align="right" valign="middle" class="stylestandard">&nbsp;&nbsp;1 - {$size} sur {$size}&nbsp;</td>
				  </tr>
			  </table>
				
				<table width="100%" cellpadding="0" cellspacing="0" class="adminlist">
				<tbody>
				<tr>
				 <th width="60" align="right">#</th>
				 <th width="60" align="center"><input name="checkall" type="checkbox"></th>
				 <th width="1000" align="left">Intitul&eacute;</th>
				 <th width="109" align="left">Action</th>
				</tr>
				{section name=i loop=$situationList}
				<tr class="row2">
				 <td height="26" align="right" valign="middle">{$situationList[i].num}</td>
				 <td align="center" valign="middle"><input name="checkone" type="checkbox"></td>
				 <td align="left" valign="middle">{$situationList[i].name}</td>
				 <td align="left" valign="middle"><a href="parameters.php?menu=situation&action=Update&id={$situationList[i].id}"><img src="{$IMAGE_PATH}/icons/icon/write.png" title="Modifier" width="16" height="16" border="0"/></a>&nbsp;&nbsp;<a href="javascript: alert('Suppression indisponible !');"><img src="{$IMAGE_PATH}/icons/icon/delete.png" title="Supprimer" width="16" height="16" border="0"/></a></td>
				</tr>
				{/section}
				<tr>
				<th colspan="4" align="center"></th>
				</tr>
				</tbody>
			  </table>
