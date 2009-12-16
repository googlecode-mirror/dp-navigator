<table>
  <thead>
    <tr>
      <th>Category</th>
      <th>Patterns</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $category): ?>
    <tr>
      <td><?php echo $category->getName() ?></td>
      <td>
	  <?php foreach($category->getDps() as $dp ):?>
	  <?php echo link_to($dp->getName(), 'dp/view?id='.$dp->getId());?> - 
	  <?php endforeach;?>
	  </td>
    </tr>
    <?php endforeach; ?>
	<?php if(count($dpsWithoutCategories)>0 ):?>
	<tr>
	  <td>Other</td>
	  <td>
	  <?php foreach($dpsWithoutCategories as $dp ):?>
	  <?php echo link_to($dp->getName(), 'dp/view?id='.$dp->getId());?> - 
	  <?php endforeach;?>
	  </td>
	</tr>
	<?php endif;?>
  </tbody>
</table>