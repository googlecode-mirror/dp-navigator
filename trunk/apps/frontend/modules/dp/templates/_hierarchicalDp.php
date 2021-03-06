<?php
/* Parameters:
  DP dp 
  Category category
  boolean internalLink  = false (default value);     indicates if links must be internal (same page) or external URL
*/
if(!isset($internalLink)) {
	$internalLink = false;
}
?>

<li>
<?php if($internalLink):?>
  <a href="#<?php echo $dp->getId();?>"><?php echo $dp->getName();?></a>
<?php else:?>
  <?php echo link_to($dp->getName(), 'dp/view?id='.$dp->getId());?>
<?php endif;?>
</li>

<?php $childrenDps = $dp->getChildren($category) ?>
<?php if(count($childrenDps)>0):?>
<li>
<ul>
<?php foreach($childrenDps as $childDp): ?>
  <?php include_partial('hierarchicalDp', array('dp' => $childDp, 'category' =>$category, 'internalLink' => $internalLink)) ?>
<?php endforeach;?>
</ul>
</li>
<?php endif;?>