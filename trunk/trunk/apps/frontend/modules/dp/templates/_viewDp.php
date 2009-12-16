<div class="dp">
  <table>
    <tbody>
      <tr>
        <th><?php //echo $form['name']->renderLabel() ?></th>
        <td>
          <span class="dp-name"><?php echo $dp->getName() ?></span>
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
	  <?php if($dp->getCategory()):?>
      <tr>
        <th><?php //echo $form['alias']->renderLabel() ?></th>
        <td>
          <span class="dp-category">(Category: <?php echo $dp->getCategory() ?>)</span>
        </td>
      </tr>
	  <?php endif;?>
      <tr>
        <th><?php //echo $form['synopsis']->renderLabel() ?></th>
        <td>
          <span class="dp-synopsis"><?php echo $dp->getSynopsis() ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['context']->renderLabel() ?></th>
        <td>
          <span class="dp-context"><?php echo $dp->getContext() ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan=2>°°°</td>
	  </tr>
      <tr>
        <th><?php //echo $form['problem']->renderLabel() ?></th>
        <td>
          <span class="dp-problem"><?php echo $dp->getProblem() ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['problem_details']->renderLabel() ?></th>
        <td>
          <span class="dp-problemDetails"><?php echo $dp->getProblemDetails() ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan=2>Therefore:</td>
	  </tr>
      <tr>
        <th><?php //echo $form['solution']->renderLabel() ?></th>
        <td>
          <span class="dp-solution"><?php echo $dp->getSolution() ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['solution_details']->renderLabel() ?></th>
        <td>
          <span class="dp-solutionDetails"><?php echo $dp->getSolutionDetails() ?></span>
        </td>
      </tr>
	  <tr>
	    <td colspan=2>°°°</td>
	  </tr>
      <tr>
        <th><?php //echo $form['literature']->renderLabel() ?></th>
        <td>
          <span class="dp-literature"><?php echo $dp->getLiterature() ?></span>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['notes']->renderLabel() ?></th>
        <td>
          <span class="dp-notes"><?php echo $dp->getNotes() ?></span>
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
		<td></td>
		<td><?php echo $rel->getType()?> <?php echo link_to($rel->getTarget(), 'dp/view?id='. $rel->getTarget()->getId());?></td>		
	</tr>
	<?php endforeach; ?>
  </table>
  <?php endif; ?>
</div>