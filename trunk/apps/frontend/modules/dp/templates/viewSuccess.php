<?php include_partial('viewDp', array('dp' => $dp)) ?>

<?php echo link_to('Edit', 'dp/edit?id='. $dp->getId());?> - 
<?php echo link_to('In Graph', 'dp/graph?id='.$dp->getId()) ?>