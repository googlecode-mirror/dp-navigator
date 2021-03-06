<div class="dp-menu">
This page is <a href="javascript:window.print()">print-ready</a>.
</div>

<h1>All Design Patterns in One Page</h1>

<a name="top"></a>

<?php include_partial('byCategories', array('categories' => $categories, 'dpsWithoutCategories'=> $dpsWithoutCategories, 'internalLink' => true)) ?>

<br />
<br />
<?php foreach($categories as $cat):?>

<div class="category">
<div class="category-name"><?php echo $cat->getName();?></div>
<?php foreach($cat->getDps() as $dp):?>
<?php include_partial('viewDp', array('dp' => $dp, 'internalLink' => true)) ?>
<div class="dp-end">
<a href="#top">Back to the top of the page</a>
</div>
<?php endforeach;?>
</div>

<?php endforeach;?>

<?php if(count($dpsWithoutCategories)>0 ):?>
<div class="category">
<div class="category-name">Other</div>
<?php foreach($dpsWithoutCategories as $dp ):?>
<?php include_partial('viewDp', array('dp' => $dp, 'internalLink' => true)) ?>
<?php endforeach;?>
</div>
<?php endif;?>

