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

<?php echo link_to('Back to normal edition', 'dp/edit?id='. $dp->getId());?> 