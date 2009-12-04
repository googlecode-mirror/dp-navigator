{include file="header.tpl"}

<table id="cadre" align="center">
  <tr>
    <td align="center"><div id="head" align="center" class="banniere"><img src="{$IMAGE_PATH}/header.png" width="965" height="114" border="0" /></div>
        <div id="menuderoulant" align="center">
		<table width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td width="59%" align="left" valign="middle" height="32">&nbsp;</td>
      <td width="35%" align="right" class="deconexion">Bienvenue ! <strong>{$login}</strong> <!--a href="javascript: alert('Profil indisponible !');"> &nbsp;Mon profil</a--> <!--a href="javascript: alert('Aide indisponible !');">Aide</a--> | <a href="home.php?logout">Déconnexion</a>&nbsp;&nbsp;</td>
            <!--td width="6%" align="right" class="deconexion"><img src="{$IMAGE_PATH}/drapeaux/France.png" width="20" height="13"/>&nbsp;&nbsp;<img src="{$IMAGE_PATH}/drapeaux/United_Kingdom.png" width="20" height="13"/>&nbsp;&nbsp;</td-->
            </tr>
  </table>
	  </div>
      <div id="menuicon" align="center">
          <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td width="59%" height="60" align="left">&nbsp;&nbsp;</td>
              <td width="41%" align="right">{include file="$menu.tpl"}</td>
            </tr>
          </table>
      </div>
      <div id="vide" align="center"></div>
      <div id="contenu" align="center">
          <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td width="19%" height="60" align="center" valign="top">
			  <table width="168" border="0" cellspacing="0" cellpadding="0" class="menugauchehaut">
  <tr>
    <td align="left" height="20">&nbsp;&nbsp;&nbsp;Quick search</td>
  </tr>
  <tr>
    <td align="center" valign="middle" height="30">
	<div class="c_hf">
	<input  id="query"name="query" class="c_ml" style="width:112px;" type="text" title="Search for a DP">
	<a id="queryLink" class="glyph"><span><img src="{$IMAGE_PATH}/icons/search_icon.png" title="Search"></span></a>
	</div>
	
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<!--table width="168" border="0" cellspacing="0" cellpadding="0" class="menugauchebas">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><strong>&lt;&nbsp;&nbsp;Avril 2009&nbsp;&nbsp;&gt;</strong></td>
  </tr>
  <tr>
    <td align="center" valign="middle">
	 <table class="Mois">
  <tbody><tr class="S">
    <td class="e0">D</td> 
    <td class="e1">L</td> 
    <td class="e2">M</td> 
    <td class="e3">M</td> 
    <td class="e4">J</td> 
    <td class="e5">V</td> 
    <td class="e6">S</td> 
  </tr>
  <tr class="S1">
    <td class="J0"><a href="http://localhost/CALENDRIER/AffichageSimple.php?NoJour=1&amp;Mois=2&amp;Annee=2009" title="">1</a></td>
    <td class="J1"><a href="http://localhost/CALENDRIER/AffichageSimple.php?NoJour=2&amp;Mois=2&amp;Annee=2009" title="">2</a></td>
    <td class="J2"><a href="http://localhost/CALENDRIER/AffichageSimple.php?NoJour=3&amp;Mois=2&amp;Annee=2009" title="">3</a></td>
    <td class="J3">4</td>
    <td class="J4">5</td>
    <td class="J5">6</td>
    <td class="J6">7</td>
  </tr>
  <tr class="S2">
    <td class="J0">8</td>
    <td class="J1">9</td>
    <td class="J2">10</td>
    <td class="J3">11</td>
    <td class="J4">12</td>
    <td class="J5">13</td>
    <td class="J6">14</td>
  </tr>
  <tr class="S3">
    <td class="J0">15</td>
    <td class="J1">16</td>
    <td class="J2">17</td>
    <td class="J">18</td>
    <td class="J4">19</td>
    <td class="J5">20</td>
    <td class="J6">21</td>
  </tr>
  <tr class="S4">
    <td class="J0">22</td>
    <td class="J1">23</td>
    <td class="J2">24</td>
    <td class="J3">25</td>
    <td class="J4">26</td>
    <td class="J5"><a href="http://localhost/CALENDRIER/AffichageSimple.php?NoJour=27&amp;Mois=2&amp;Annee=2009" title="">27</a></td>
    <td class="J6">28</td>
  </tr>
  <tr class="S6">
    <td class="J0">29</td>
    <td class="J1">30</td>
    <td class="J2">31</td>
    <td class="J3">&nbsp;</td>
    <td class="J4">&nbsp;</td>
    <td class="J5">&nbsp;</td>
    <td class="J6">&nbsp;</td>
  </tr>
</tbody></table>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table-->

			  </td>
              <td width="81%" align="left" valign="top">
			   <div class="titregraybotred">
			   <table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="57%" align="left">{$title}</td>
					<td width="43%" align="right">&nbsp;</td>
				  </tr>
				</table>
			   </div>
			   <div class="graybotred">
			      {include file="$content.tpl"} 
               </div>
			  </td>
            </tr>
          </table>
      </div>
</td>
  </tr>
</table>
{include file="footer.tpl"}
