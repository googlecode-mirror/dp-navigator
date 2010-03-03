<?php
  $menu = '';
  if ($sf_user->isAuthenticated()) {
	$menu.= link_to('Edit', 'dp/edit?id='. $dp->getId()) . ' - '; 
	$menu.= link_to('Edit relations with other DP', 'dp/editRelations?id='. $dp->getId()) . ' - ';
  }
  $menu.= link_to('In Graph', 'dp/graph?id='.$dp->getId());
?>


<div class="sidebar">
  <h3>Design Patterns Menu</h3>
  <?php foreach ($allCategories as $category): ?>
  <ul>
  <li><b><?php echo $category->getName() ?></b></li>
  
  <li>
  <ul>
	<?php foreach($category->getRootDps() as $tmpDp ):?>
	  <?php include_partial('hierarchicalDp', array('dp' => $tmpDp, 'category' =>$category, 'internalLink' => $internalLink)) ?>
	<?php endforeach;?>
  </ul>
  </li>
  
  </ul>
  <?php endforeach; ?>
  
  <?php if(count($dpsWithoutCategories)>0 ):?>
  <ul>
  <li>Other</li>
  
  <li>
  <ul>
  <?php foreach($dpsWithoutCategories as $tmpDp ):?>
    <li>
    <?php if($internalLink):?>
	  <a href="#<?php echo $tmpDp->getId();?>"><?php echo $tmpDp->getName();?></a>
	<?php else:?>
	  <?php echo link_to($tmpDp->getName(), 'dp/view?id='.$tmpDp->getId());?>
	<?php endif;?> 
	</li>
  <?php endforeach;?>
  </ul>
  </li>
  <?php endif;?>
</div>



<div class="dp-menu">
 <?php echo $menu; ?>
</div>

<?php include_partial('viewDp', array('dp' => $dp)) ?>

<div class="dp-menu">
 <?php echo $menu; ?>
</div>