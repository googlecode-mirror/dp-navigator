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
	    <?php echo link_to('Category', '@category') ?>
	    - <?php echo link_to('Relation Types', 'relation_type') ?>
        - <?php echo link_to('Users', '@sf_guard_user') ?> (<?php echo link_to('Groups', '@sf_guard_group') ?>) 
		- <a href="<?php echo public_path('')?>">Exit Admin Panel</a>
	</div>
    <?php echo $sf_content ?>
  </body>
</html>
