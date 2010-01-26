<?php

/**
 * BaseDp
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property enum $confidence
 * @property string $alias
 * @property string $picture
 * @property string $synopsis
 * @property string $context
 * @property string $problem
 * @property string $problem_details
 * @property string $solution
 * @property string $solution_details
 * @property string $literature
 * @property string $notes
 * @property Doctrine_Collection $Categories
 * @property Doctrine_Collection $RelationsOut
 * @property Doctrine_Collection $DpCategory
 * 
 * @method string              getName()             Returns the current record's "name" value
 * @method enum                getConfidence()       Returns the current record's "confidence" value
 * @method string              getAlias()            Returns the current record's "alias" value
 * @method string              getPicture()          Returns the current record's "picture" value
 * @method string              getSynopsis()         Returns the current record's "synopsis" value
 * @method string              getContext()          Returns the current record's "context" value
 * @method string              getProblem()          Returns the current record's "problem" value
 * @method string              getProblemDetails()   Returns the current record's "problem_details" value
 * @method string              getSolution()         Returns the current record's "solution" value
 * @method string              getSolutionDetails()  Returns the current record's "solution_details" value
 * @method string              getLiterature()       Returns the current record's "literature" value
 * @method string              getNotes()            Returns the current record's "notes" value
 * @method Doctrine_Collection getCategories()       Returns the current record's "Categories" collection
 * @method Doctrine_Collection getRelationsOut()     Returns the current record's "RelationsOut" collection
 * @method Doctrine_Collection getDpCategory()       Returns the current record's "DpCategory" collection
 * @method Dp                  setName()             Sets the current record's "name" value
 * @method Dp                  setConfidence()       Sets the current record's "confidence" value
 * @method Dp                  setAlias()            Sets the current record's "alias" value
 * @method Dp                  setPicture()          Sets the current record's "picture" value
 * @method Dp                  setSynopsis()         Sets the current record's "synopsis" value
 * @method Dp                  setContext()          Sets the current record's "context" value
 * @method Dp                  setProblem()          Sets the current record's "problem" value
 * @method Dp                  setProblemDetails()   Sets the current record's "problem_details" value
 * @method Dp                  setSolution()         Sets the current record's "solution" value
 * @method Dp                  setSolutionDetails()  Sets the current record's "solution_details" value
 * @method Dp                  setLiterature()       Sets the current record's "literature" value
 * @method Dp                  setNotes()            Sets the current record's "notes" value
 * @method Dp                  setCategories()       Sets the current record's "Categories" collection
 * @method Dp                  setRelationsOut()     Sets the current record's "RelationsOut" collection
 * @method Dp                  setDpCategory()       Sets the current record's "DpCategory" collection
 * 
 * @package    dp-navigator
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7021 2010-01-12 20:39:49Z lsmith $
 */
abstract class BaseDp extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dp');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '255',
             ));
        $this->hasColumn('confidence', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 0,
              1 => 1,
              2 => 2,
             ),
             ));
        $this->hasColumn('alias', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('picture', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('synopsis', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('context', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('problem', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('problem_details', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('solution', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('solution_details', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('literature', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
        $this->hasColumn('notes', 'string', null, array(
             'type' => 'string',
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Category as Categories', array(
             'refClass' => 'DpCategory',
             'local' => 'dp_id',
             'foreign' => 'category_id'));

        $this->hasMany('DpRelation as RelationsOut', array(
             'local' => 'id',
             'foreign' => 'source_id'));

        $this->hasMany('DpCategory', array(
             'local' => 'id',
             'foreign' => 'dp_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $versionable0 = new Doctrine_Template_Versionable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($versionable0);
        $this->actAs($sluggable0);
    }
}