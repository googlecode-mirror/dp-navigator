<?php
/* Parameters:
  boolean internalLink  = false (default value);     indicates if links must be internal (same page) or external URL
*/
if(!isset($internalLink)) {
	$internalLink = false;
}
?>

<table class="summary">
  <thead>
    <tr>
      <th>Categories</th>
      <th>Patterns</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $category): ?>
    <tr>
      <td><?php echo $category->getName() ?></td>
      <td>
	    <ul>
	  <?php foreach($category->getRootDps() as $dp ):?>
	    <?php include_partial('hierarchicalDp', array('dp' => $dp, 'category' =>$category, 'internalLink' => $internalLink)) ?>
	  <?php endforeach;?>
	    </ul>
	  </td>
    </tr>
    <?php endforeach; ?>
	<?php if(count($dpsWithoutCategories)>0 ):?>
	<tr>
	  <td>Other</td>
	  <td>
	  <?php foreach($dpsWithoutCategories as $dp ):?>
	    <?php if($internalLink):?>
		  <a href="#<?php echo $dp->getId();?>"><?php echo $dp->getName();?></a>
		<?php else:?>
	      <?php echo link_to($dp->getName(), 'dp/view?id='.$dp->getId());?>
		<?php endif;?>
		 - 
	  <?php endforeach;?>
	  </td>
	</tr>
	<?php endif;?>
  </tbody>
</table>