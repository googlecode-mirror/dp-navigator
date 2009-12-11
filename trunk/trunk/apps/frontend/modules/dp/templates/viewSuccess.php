  <table>
    <tbody>
      <tr>
        <th><?php //echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getName() ?> 
		  <?php for($i = 0; $i<(int)$dp->getConfidence(); $i++):?>*<?php endfor; ?>
        </td>
      </tr>
	  <?php if(strlen($dp->getAlias()>0)):?>
      <tr>
        <th><?php //echo $form['alias']->renderLabel() ?></th>
        <td>
          As known as: <?php echo $dp->getAlias() ?>
        </td>
      </tr>
	  <?php endif;?>
      <tr>
        <th><?php //echo $form['synopsis']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getSynopsis() ?>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['context']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getContext() ?>
        </td>
      </tr>
	  <tr>
	    <td colspan=2>°°°</td>
	  </tr>
      <tr>
        <th><?php //echo $form['problem']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getProblem() ?>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['problem_details']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getProblemDetails() ?>
        </td>
      </tr>
	  <tr>
	    <td colspan=2>Therefore:</td>
	  </tr>
      <tr>
        <th><?php //echo $form['solution']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getSolution() ?>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['solution_details']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getSolutionDetails() ?>
        </td>
      </tr>
	  <tr>
	    <td colspan=2>°°°</td>
	  </tr>
      <tr>
        <th><?php //echo $form['literature']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getLiterature() ?>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['notes']->renderLabel() ?></th>
        <td>
          <?php echo $dp->getNotes() ?>
        </td>
      </tr>
    </tbody>
  </table>

  <?php if(count($relationsOut)>0):?>
  <table>
    <?php foreach($relationsOut as $rel): ?>
	<tr>
		<td></td>
		<td><?php echo $rel->getType()?> <?php echo $rel->getTarget();?></td>		
	</tr>
	<?php endforeach; ?>
  </table>
  <?php endif; ?>

