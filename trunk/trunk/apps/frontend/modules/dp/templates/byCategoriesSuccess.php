<h1>Design Patterns sorted by Categories</h1>

<p id="patternLanguagePresentation"><?php echo sfConfig::get('app_pattern_language_presentation'); ?></p>

<?php include_partial('byCategories', array('categories' => $categories, 'dpsWithoutCategories'=> $dpsWithoutCategories)) ?>