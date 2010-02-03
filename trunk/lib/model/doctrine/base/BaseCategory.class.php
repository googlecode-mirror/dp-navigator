<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Dps
 * @property Doctrine_Collection $DpCategory
 * 
 * @method string              getName()       Returns the current record's "name" value
 * @method Doctrine_Collection getDps()        Returns the current record's "Dps" collection
 * @method Doctrine_Collection getDpCategory() Returns the current record's "DpCategory" collection
 * @method Category            setName()       Sets the current record's "name" value
 * @method Category            setDps()        Sets the current record's "Dps" collection
 * @method Category            setDpCategory() Sets the current record's "DpCategory" collection
 * 
 * @package    dp-navigator
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('name', 'string', 600, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '600',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Dp as Dps', array(
             'refClass' => 'DpCategory',
             'local' => 'category_id',
             'foreign' => 'dp_id'));

        $this->hasMany('DpCategory', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}