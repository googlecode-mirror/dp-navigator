<h1>Edit Relations for Dp: <?php echo $dp->getName() ?></h1>


<?php if(count($relationsOut)>0):?>
<table>
  <?php foreach($relationsOut as $rel): ?>
  <tr>
	<td><?php echo $rel->getType()?></td>
	<td><?php echo $rel->getTarget();?></td>
    <td><?php echo link_to('Delete', 'dp/deleteRelation?id='.$rel->getId(), 'confirm=Are you sure?')?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>



<form action="<?php echo url_for('dp/createRelation') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Add this relation"/>
      </td>
    </tr>
  </table>
</form>

<div class="dp-menu">
<?php echo link_to('Edit DP', 'dp/edit?id='. $dp->getId());?>  -
<?php echo link_to('View DP', 'dp/view?id='. $dp->getId());?>
</div>