<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="menu">
	  <?php echo link_to('Manage DP', 'dp/index');?> [<?php echo link_to('New', 'dp/new');?>, <?php echo link_to('By Categories', 'dp/byCategories');?>, <?php echo link_to('Graph', 'dp/graph');?>]
	  - <?php echo link_to('Manage Relation Types', 'relationtype/index');?>
	  - <?php echo link_to('Manage Categories', 'category/index');?>
	</div>
    <?php echo $sf_content ?>
  </body>
</html>
