<div class="dp-menu">
<?php echo link_to('Edit', 'dp/edit?id='. $dp->getId())?> - 
<?php echo link_to('Edit relations with other DP', 'dp/editRelations?id='. $dp->getId())?> - 
<?php echo link_to('In Graph', 'dp/graph?id='.$dp->getId())?>
</div>

<?php include_partial('viewDp', array('dp' => $dp)) ?>


<?php //same menu as above ?>
<div class="dp-menu">
<?php echo link_to('Edit', 'dp/edit?id='. $dp->getId())?> - 
<?php echo link_to('Edit relations with other DP', 'dp/editRelations?id='. $dp->getId())?> - 
<?php echo link_to('In Graph', 'dp/graph?id='.$dp->getId())?>
</div>