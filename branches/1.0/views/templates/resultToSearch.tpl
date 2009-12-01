{if ($dpList)}
<table class="adminlist" cellpadding="0" cellspacing="0">
<tbody>
<tr>
 <th width="21" align="right">N&deg;</th>
 <th width="58" align="center">&nbsp;</th>
 <th width="466" align="left">Description</th>
 <th width="203" align="left">Cat&eacute;gorie</th>
 </tr>
{section name=i loop=$dpList}
<tr class="row1" onclick="{$dpList[i].pattern_link}">
 <td height="26" align="right" valign="top">{$dpList[i].pattern_num}</td>
 <td align="center" valign="top"><img src="{$IMAGE_PATH}/icons/header/icon-48-article-add.png" width="48" height="48" border="0" /></td>
 <td align="left" valign="top"><strong>{$dpList[i].pattern_name}</strong><br/>
   {$dpList[i].pattern_abstract}</td>
 <td align="left" valign="top">{$dpList[i].categories}</td>
 
</tr>
{/section}
<tr>
<th colspan="4" align="center"></th>
</tr>
</tbody>
</table>
{else}  
 <div align="left">Les termes de recherche spécifiés - <strong>{$valueSearch}</strong> – ne correspondent à aucun document.</div>
{/if}  