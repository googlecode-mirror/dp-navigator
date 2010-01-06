<h1>Edit Categories for Dp: <?php echo $dp->getName() ?></h1>


<?php if(count($categories)>0):?>
<table>
  <?php foreach($categories as $cat): ?>
  <tr>
	<td><?php echo $cat->getName();?></td>
    <td><?php echo link_to('Delete', 'dp/deleteCategory?id='.$dp->getId().'-'.$cat->getId(), 'confirm=Are you sure?')?></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php endif; ?>



<form action="<?php echo url_for('dp/createCategory') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Add this category"/>
      </td>
    </tr>
  </table>
</form>

<?php echo link_to('Back to normal edition', 'dp/edit?id='. $dp->getId());?> 