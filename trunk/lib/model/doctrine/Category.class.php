<?php

/**
 * Category
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    dp-navigator
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Category extends BaseCategory
{
  public function getRootDps() {
	
	/* Select DPs in cat
	which have (NOT IN) no father in this same cat. */
	$q = Doctrine_Query::create()
	->select('d.*')
    ->from('Dp d, DpCategory dc')
    ->where('d.id=dc.dp_id AND dc.category_id='. $this->getId() .' AND d.id NOT IN (
SELECT d2.id FROM Dp d2, DpRelation dr2, DpCategory dc2 WHERE d2.id=dr2.target_id AND dr2.type_id=1 AND dr2.source_id=dc2.dp_id AND dc2.category_id='. $this->getId() .')');

	  return $q->execute();
  }
}