DP :
<select name="pattern[]" style="width:200px;font-size:11px"> 
 {section name=i loop=$pattern}
  <option value="{$pattern[i].id}">{$pattern[i].pattern}</option>
 {/section}     
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
Relation : 
<select name="relationShip[]" style="width:150px;font-size:11px"> 
 {section name=i loop=$relationShip}
  <option value="{$relationShip[i].id}">{$relationShip[i].relation}</option>
 {/section}     
</select>
&nbsp;&nbsp;&nbsp;&nbsp;
<input name="search" value="Lancer la recherche" class="buton" type="submit">
<br>&nbsp;
<div class="scroll"><img src="{$graph}" alt="graphe des DPs"/></div>