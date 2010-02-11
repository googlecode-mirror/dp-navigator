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
    <div id="wrapheader" class="wrapper">
	  <div id="header">
	    <div class="logo">
	      <h1>
		    <?php echo link_to('DP-Navigator', 'dp/home'); ?>
		  </h1>
		  <h2>
		    A collaborative tool to write and browse Design Patterns
		  </h2>
		</div>
	  </div>
	</div>
	<div id="wrapcontent" class="wrapper">
	  <div id="content">
	    <div id="menu">
	      <?php echo link_to('Home', 'dp/home');?>
  	        - Browse [<?php echo link_to('By Categories', 'dp/byCategories');?>, <?php echo link_to('Graph', 'dp/graph');?>, <?php echo link_to('In One Page', 'dp/publish');?>]
			<?php if ($sf_user->isAuthenticated()): ?>
		      - Edit [<?php echo link_to('Summary', 'dp/index');?>, <?php echo link_to('New', 'dp/new');?>]	    	       
		      <?php if ($sf_user->hasCredential('admins')): ?>
	            - <a href="<?php echo public_path('backend.php')?>">Go to Admin Panel</a>
		      <?php endif; ?>
              &nbsp;&nbsp;&nbsp;&#9758; <?php echo link_to('Logout', '@sf_guard_signout') ?>
	        <?php else: ?>
			  &nbsp;&nbsp;&nbsp;&#9758; <?php echo link_to('Signin', '@sf_guard_signin') ?>
			<?php endif; ?>
	    </div>
	    <div id="container">
          <?php echo $sf_content ?>
        </div>
      </div>
	</div>

    <div id="wrapfooter" class="wrapper">
	<div id="footer">
	  Propulsed by <a href="http://code.google.com/p/dp-navigator/">DpNavigator</a> designed by MOCAH team (LIP6 Lab)<br/>
	  Theme inspired by <a href="http://code.google.com/p/wp-constructor/">Constructor</a> for Wordpress
	</div>
	</div>
  </body>
</html>
