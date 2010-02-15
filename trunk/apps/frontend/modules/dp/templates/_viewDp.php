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
        <td colspan="2">
          <a name="<?php echo $dp->getId() ?>" class="anchor"><span class="dp-name"><?php echo $dp->getName() ?></span></a>
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
		<td><img class="dp-picture" src="<?php echo public_path('uploads/'.$dp->getPicture(), true);?>" style="max-height:400px" alt="Dp's illustration"/></td>
	  </tr>
	  <?php endif; ?>

      <?php
      $categories = $dp->getCategories()->getData();
      if(count($categories)>0):?>
      <!--tr>
		<th></th>
		<td>		  
		  <?php foreach($categories as $cat): ?>
		    <?php echo $cat->getName()?> 
	      <?php endforeach; ?>
		</td>		
      </tr-->
      <?php endif; ?>

      <tr>
        <th><?php //echo $form['synopsis']->renderLabel() ?></th>
        <td>
          <span class="dp-synopsis"><?php echo DP::pretty($dp->getSynopsis(), $internalLink) ?></span>
        </td>
      </tr>
	  <?php if($dp->getContext()): ?>
      <tr>
        <th>Context: </th>
        <td>
          <span class="dp-context"><?php echo DP::pretty($dp->getContext(), $internalLink) ?></span>
        </td>
      </tr>
	  <?php endif;?>
	  <tr>
	    <td colspan="2"></td>
	  </tr>
	  <?php if($dp->getContext()): ?>
	  <tr>
	    <td colspan="2" align="center">°°°</td>
	  </tr>
	  <?php endif;?>
	  <tr>
	    <td colspan="2"></td>
	  </tr>
	  <?php if($dp->getProblem()): ?>
      <tr>
        <th>Problem: </th>
        <td>
          <span class="dp-problem"><?php echo DP::pretty($dp->getProblem(), $internalLink) ?></span>
        </td>
      </tr>
	  <?php endif;?>
      <tr>
        <th><?php //echo $form['problem_details']->renderLabel() ?></th>
        <td>
          <span class="dp-problemDetails"><?php echo DP::pretty($dp->getProblemDetails(), $internalLink) ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan="2"></td>
	  </tr>
	  <tr>
	    <td colspan="2"></td>
	  </tr>
	  <?php if($dp->getSolution()): ?>
      <tr>
        <th>Solution: </th>
        <td>
          <span class="dp-solution"><?php echo DP::pretty($dp->getSolution(), $internalLink) ?></span>
        </td>
      </tr>
	  <?php endif;?>
      <tr>
        <th><?php //echo $form['solution_details']->renderLabel() ?></th>
        <td>
          <span class="dp-solutionDetails"><?php echo DP::pretty($dp->getSolutionDetails(), $internalLink) ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan="2" align="center">°°°</td>
	  </tr>
	  <?php if($dp->getLiterature()): ?>
      <tr>
        <th>References: </th>
        <td>
          <span class="dp-literature"><?php echo DP::pretty($dp->getLiterature(), $internalLink) ?></span>
        </td>
      </tr>
	  <?php endif;?>
	  <?php if($dp->getNotes()): ?>
      <tr>
        <th>Notes: </th>
        <td>
          <span class="dp-notes"><?php echo DP::pretty($dp->getNotes(), $internalLink) ?></span>
        </td>
      </tr>
	  <?php endif;?>
      <?php
	  $relationsOut = $dp->getRelationsOut()->getData();
	  if(count($relationsOut)>0):?>
		<tr>
		  <th>Relations: </th>
		  <td>
		    <ul>
	        <?php foreach($relationsOut as $rel): ?>
		      <li>
			    <?php echo $rel->getType()?>
		        <?php if($internalLink): ?>
		          <a href="#<?php echo $rel->getTarget()->getName()?>"><?php echo $rel->getTarget();?></a>
		        <?php else:?>
		          <?php echo link_to($rel->getTarget(), 'dp/view?id='. $rel->getTarget()->getId());?>
		        <?php endif;?>
			  </li>
	  	    <?php endforeach; ?>
		    </ul>
		  </td>		
		</tr>
	  <?php endif; ?>

	  <tr>
	    <td class="dp-citation" colspan="2">To cite this pattern: <?php echo link_to(public_path('', true).'pattern/'.$dp->getSlug(), public_path('', true).'pattern/'.$dp->getSlug());?></td>
	  </tr>
      </tbody>
  </table>
</div>