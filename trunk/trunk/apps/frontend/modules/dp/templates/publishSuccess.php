<h1>All Design Patterns</h1>

<?php include_partial('byCategories', array('categories' => $categories, 'dpsWithoutCategories'=> $dpsWithoutCategories)) ?>

<?php foreach($dps as $dp):?>
<?php include_partial('viewDp', array('dp' => $dp)) ?>
<?php endforeach;?>