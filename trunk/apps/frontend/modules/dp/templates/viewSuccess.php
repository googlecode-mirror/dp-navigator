<?php
  $menu = '';
  if ($sf_user->isAuthenticated()) {
	$menu.= link_to('Edit', 'dp/edit?id='. $dp->getId()) . ' - '; 
	$menu.= link_to('Edit relations with other DP', 'dp/editRelations?id='. $dp->getId()) . ' - ';
  }
  $menu.= link_to('In Graph', 'dp/graph?id='.$dp->getId());
?>

<div class="dp-menu">
 <?php echo $menu; ?>
</div>

<?php include_partial('viewDp', array('dp' => $dp)) ?>

<div class="dp-menu">
 <?php echo $menu; ?>
</div>