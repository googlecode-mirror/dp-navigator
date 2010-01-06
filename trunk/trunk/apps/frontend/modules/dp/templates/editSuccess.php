<h1>Edit Dp</h1>

<?php include_partial('form', array('form' => $form)) ?>

<?php echo link_to('Edit categories', 'dp/editCategories?id='.$vDpId)?> <br />
<?php echo link_to('Edit relations with other DP', 'dp/editRelations?id='.$vDpId)?> <br />
<?php echo link_to('View DP', 'dp/view?id='.$vDpId);?>