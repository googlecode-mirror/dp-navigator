<div class="dp-menu">
<?php echo link_to('Edit', 'dp/edit?id='. $dp->getId())?> - 
<?php echo link_to('In Graph', 'dp/graph?id='.$dp->getId())?>
</div>

<?php include_partial('viewDp', array('dp' => $dp)) ?>

<div class="dp-menu">
<?php echo link_to('Edit', 'dp/edit?id='. $dp->getId())?> - 
<?php echo link_to('In Graph', 'dp/graph?id='.$dp->getId())?>
</div>