<form name="viewDp" action = "updateDp.php?dpId={$dp.general_id}" method = "post">
<table border="0" class="viewdp" cellspacing="6">
  <tr>
    <td colspan="2" align="right"><a href="updateDp.php?dpId={$dp.pattern_id}"><img src="{$IMAGE_PATH}/icons/edit_f2.png" width="32" height="32" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><strong>GENERAL</strong> </td>
  </tr>
  <tr>
    <td width="181" valign="top"><div align="right">Name: </div></td>
    <td width="542" valign="top" style="text-align:justify"><strong>{$dp.pattern_name}</strong></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Abstract:</div></td>
    <td valign="top" style="text-align:justify">{$dp.pattern_abstract}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Category(ies):</div></td>
    <td valign="top" style="text-align:justify">
       <ul>
       {section name=i loop=$dp.categories}
       <li>{$dp.categories[i]}</li>
       {/section}
       </ul>
    </td>
  </tr>
  <!--tr>
    <td valign="top"><div align="right"><u>Context</u></div></td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Type(s) of system:</div></td>
    <td valign="top" style="text-align:justify">{$dp.general_system}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Type(s) of situation:</div></td>
    <td valign="top" style="text-align:justify">{$dp.general_situation}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Actor(s):</div></td>
    <td valign="top" style="text-align:justify">{$dp.general_actor}</td>
  </tr-->
  <tr>
    <td valign="top"><div align="right">Context:</div></td>
    <td valign="top" style="text-align:justify">{$dp.pattern_desc}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Creation date:</div></td>
    <td valign="top" style="text-align:justify">{$dp.pattern_creationDate}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="left"><strong>PROBLEM</strong></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Forces:</div></td>
    <td valign="top">{$dp.pattern_problem_statement}</td>
  </tr>
  <!--tr>
    <td valign="top"><div align="right">Tracking focus(es):</div></td>
    <td valign="top">{$dp.problem_focus}</td>
  </tr-->
  <tr>
    <td valign="top"><div align="right">Problem details:</div></td>
    <td valign="top"><div align="justify">{$dp.pattern_problem_analysis}</div></td>
  </tr>
  <tr>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" colspan="2"><div align="left"><strong>SOLUTION</strong></div></td>
  </tr>
  <!--tr>
    <td valign="top"><div align="right">Solution Name : </div></td>
    <td valign="top" style="text-align:justify">{$dp.solution_name}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Objectives:</div></td>
    <td valign="top" style="text-align:justify">{$dp.solution_objective}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><u>Requisite</u></div></td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Indicator(s):</div></td>
    <td valign="top" style="text-align:justify">{$dp.solution_indicator}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Method(s):</div></td>
    <td valign="top" style="text-align:justify">{$dp.solution_method}</td>
  </tr-->
  <tr>
    <td valign="top"><div align="right">Solution:</div></td>
    <td valign="top" style="text-align:justify">{$dp.pattern_solution_desc}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Discussion:</div></td>
    <td valign="top" style="text-align:justify">{$dp.pattern_solution_discussion}</td>
  </tr>
  <!--tr>
    <td valign="top" style="text-align:justify"><div align="right">Learning system example:</div></td>
    <td valign="top">{$dp.solution_learning}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right"></div></td>
    <td valign="top" style="text-align:justify">&nbsp;</td>
  </tr-->
  <tr>
    <td valign="top"><div align="right"></div></td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" colspan="2"><div align="left"><strong>BIBLIOGRAPHY</strong></div></td>
  </tr>
  <!--tr>
    <td valign="top"><div align="right">Author(s):</div></td>
    <td valign="top" style="text-align:justify">{$dp.identification_author}</td>
  </tr-->
  <!--tr>
    <td valign="top"><div align="right"><u>Set Of Versions</u></div></td>
    <td valign="top">&nbsp;</td>
  </tr-->
    <!--<tr>
    <td valign="top"><div align="right">Version Number:</div></td>
    <td valign="top" style="text-align:justify">{$dp.identification_version_number}</td>
  </tr>
    <tr>
    <td valign="top"><div align="right">Changes:</div></td>
    <td valign="top" style="text-align:justify">{$dp.identification_version_changes}</td>
  </tr>
  -->
  <tr>
    <td valign="top"><div align="right">Bibliography:</div></td>
    <td valign="top" style="text-align:justify">{$dp.pattern_biblio}</td>
  </tr>
  <tr>
    <td valign="top" colspan="2"><div align="left"><strong>RELATED PATTERNS</strong></div></td>
  </tr>

  <tr>
    <td valign="top"><div align="right">Relations:</div></td>
    <td valign="top" style="text-align:justify">
    <ul>
    {section name=i loop=$dp.relatedPatterns}
	<li>{$dp.relatedPatterns[i].relatedPatternName} - {$dp.relatedPatterns[i].relationShip} ({$dp.relatedPatterns[i].relatedType})</li>
    {/section}
    </ul>	
    </td>
  </tr>
  <!--
  <tr>
    <td valign="top"><div align="right">Source:</div></td>
    <td valign="top" style="text-align:justify">{$dp.related_source}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Relations:</div></td>
    <td valign="top" style="text-align:justify">{$dp.relatedPatterns[i].relationShip}</td>
  </tr>
  <tr>
    <td valign="top"><div align="right">Relation Type:</div></td>
    <td valign="top" style="text-align:justify">{$dp.relatedPatterns[i].relatedType}</td>
  </tr>
  -->
</table>

<table border="0" class="viewdp" cellspacing="6">
  <tr>
    <!--td width="50" valign="middle" align="center"><a href="updateDp.php?dpId={$dp.pattern_id}"><img src="{$IMAGE_PATH}/icons/edit_f2.png" width="32" height="32" /></a></td-->
    <!--td width="50" valign="middle" align="center"><a href="javascript: alert('Generation de pdf indisponible !');"><img src="{$IMAGE_PATH}/icons/pdf.png" width="32" height="32" border="0" /></a></td-->
    <!--td width="50" valign="middle" align="center"><a href="javascript: alert('Generation en xml indisponible !');"><img src="{$IMAGE_PATH}/icons/xml.png" width="32" height="32" border="0" /></a></td-->
    <td width="549" valign="top">&nbsp;</td>
  </tr>
</table>
<br/>&nbsp;
<table id="cadrecommentaire" border="0">
  <tr>
    <td width="1032" align="left"><strong>Commentaire</strong><br/>
    <textarea  name="comment" id="comment" rows="4" cols="50"></textarea></td>
  </tr>
  <tr>
    <td align="left" valign="top"><input type="button" name="saveComment" value=" Enregistrer " id="saveComment"/></td>
    <input type="hidden" name="idDp" value="{$dp.general_id}" id="idDp"/>
    <input type="hidden" name="autor" value ="{$userId}"  id="autor"/>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="justify" valign="top"><span class="fontorange">Nicolas</span><br/>
      Cette procédure de dépistage est basée sur des données quantitatives et qualitatives et il peut fournir au professeur privé/enseignant des informations utiles à être utilisé pour contrôler des buts.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="justify" valign="top"><span class="fontorange">Barack</span><br/>
      Un système est réussi(fructueux) si le numéro(nombre) total de publications d'étudiant actives, collaboratif ou individuel, est au moins égal au numéro(nombre) d'inscriptions dans des cours.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

