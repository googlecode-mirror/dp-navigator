<p>Welcome to <?php echo sfConfig::get('app_website_name'); ?>!</p>

<p>This website allows several users to edit Design Patterns (DP) in a Pattern Language and then to browse them. A Pattern Language is "a structured method of describing good design practices within a field of expertise." (<a href="http://en.wikipedia.org/wiki/Pattern_language">from Wikipedia</a>)</p>

<p id="patternLanguagePresentation"><?php echo sfConfig::get('app_pattern_language_presentation'); ?></p>


<ul>
  <?php if ($sf_user->isAuthenticated()): ?>
    <li><?php echo link_to('Browse DPs', 'dp/publish')?></li>
  <?php else: ?>
	<li><?php echo link_to('Sign in', '@sf_guard_signin')?></li>    
  <?php endif; ?>  
</ul>






<?php if ($sf_user->isAuthenticated()): ?>

<?php endif; ?>
