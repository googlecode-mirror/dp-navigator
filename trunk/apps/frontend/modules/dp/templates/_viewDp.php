<?php
/* Parameters:
  boolean internalLink  = false (default value);     indicates if links must be internal (same page) or external URL
*/
if(!isset($internalLink)) {
	$internalLink = false;
}
?>

<div class="dp">
  <table>
    <tbody>
      <tr>
        <th><?php //echo $form['name']->renderLabel() ?></th>
        <td>
          <a name="<?php echo $dp->getName() ?>"><span class="dp-name"><?php echo $dp->getName() ?></span></a>
		  <span class="dp-confidence"><?php for($i = 0; $i<(int)$dp->getConfidence(); $i++):?>*<?php endfor; ?></span>
        </td>
      </tr>
	  <?php if(strlen($dp->getAlias()>0)):?>
      <tr>
        <th><?php //echo $form['alias']->renderLabel() ?></th>
        <td>
          <span class="dp-alias">As known as: <?php echo $dp->getAlias() ?></span>
        </td>
      </tr>
	  <?php endif;?>

	  <?php if($dp->getPicture()): ?>
	  <tr>
	    <th></th>
		<td><img src="<?php echo public_path('uploads/'.$dp->getPicture(), true);?>" style="max-height:400px"/></td>
	  </tr>
	  <?php endif; ?>

      <?php
      $categories = $dp->getCategories()->getData();
      if(count($categories)>0):?>
      <tr>
		<th> </th>
		<td>Categories:		  
		  <?php foreach($categories as $cat): ?>
		    <?php echo $cat->getName()?> 
	      <?php endforeach; ?>
		</td>		
      </tr>
      <?php endif; ?>

      <tr>
        <th><?php //echo $form['synopsis']->renderLabel() ?></th>
        <td>
          <span class="dp-synopsis"><?php echo DP::pretty($dp->getSynopsis()) ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['context']->renderLabel() ?></th>
        <td>
          <span class="dp-context"><?php echo DP::pretty($dp->getContext()) ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan=2></td>
	  </tr>
	  <tr>
	    <td colspan=2 align=center>°°°</td>
	  </tr>
	  <tr>
	    <td colspan=2></td>
	  </tr>
      <tr>
        <th><?php //echo $form['problem']->renderLabel() ?></th>
        <td>
          <span class="dp-problem"><?php echo DP::pretty($dp->getProblem()) ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['problem_details']->renderLabel() ?></th>
        <td>
          <span class="dp-problemDetails"><?php echo DP::pretty($dp->getProblemDetails()) ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan=2></td>
	  </tr>
	  <tr>
	    <td colspan=2>Therefore:</td>
	  </tr>
	  <tr>
	    <td colspan=2></td>
	  </tr>
      <tr>
        <th><?php //echo $form['solution']->renderLabel() ?></th>
        <td>
          <span class="dp-solution"><?php echo DP::pretty($dp->getSolution()) ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['solution_details']->renderLabel() ?></th>
        <td>
          <span class="dp-solutionDetails"><?php echo DP::pretty($dp->getSolutionDetails()) ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan=2 align=center>°°°</td>
	  </tr>
      <tr>
        <th><?php //echo $form['literature']->renderLabel() ?></th>
        <td>
          <span class="dp-literature"><?php echo DP::pretty($dp->getLiterature()) ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['notes']->renderLabel() ?></th>
        <td>
          <span class="dp-notes"><?php echo DP::pretty($dp->getNotes()) ?></span>
        </td>
      </tr>
    </tbody>
  </table>

  <?php
  $relationsOut = $dp->getRelationsOut()->getData();
  if(count($relationsOut)>0):?>
  <table>
    <?php foreach($relationsOut as $rel): ?>
	<tr>
		<td>Relations: </td>
		<td>
		  <?php echo $rel->getType()?>
		  <?php if($internalLink): ?>
		    <a href="#<?php echo $rel->getTarget()->getName()?>"><?php echo $rel->getTarget();?></a>
		  <?php else:?>
		    <?php echo link_to($rel->getTarget(), 'dp/view?id='. $rel->getTarget()->getId());?>
		  <?php endif;?>
		</td>		
	</tr>
	<?php endforeach; ?>
  </table>
  <?php endif; ?>
</div>