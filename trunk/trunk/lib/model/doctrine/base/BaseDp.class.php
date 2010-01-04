<?php

/**
 * BaseDp
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property enum $confidence
 * @property string $alias
 * @property integer $category_id
 * @property string $synopsis
 * @property string $context
 * @property string $problem
 * @property string $problem_details
 * @property string $solution
 * @property string $solution_details
 * @property string $literature
 * @property string $notes
 * @property Category $Category
 * @property Doctrine_Collection $RelationsOut
 * 
 * @method string              getName()             Returns the current record's "name" value
 * @method enum                getConfidence()       Returns the current record's "confidence" value
 * @method string              getAlias()            Returns the current record's "alias" value
 * @method integer             getCategoryId()       Returns the current record's "category_id" value
 * @method string              getSynopsis()         Returns the current record's "synopsis" value
 * @method string              getContext()          Returns the current record's "context" value
 * @method string              getProblem()          Returns the current record's "problem" value
 * @method string              getProblemDetails()   Returns the current record's "problem_details" value
 * @method string              getSolution()         Returns the current record's "solution" value
 * @method string              getSolutionDetails()  Returns the current record's "solution_details" value
 * @method string              getLiterature()       Returns the current record's "literature" value
 * @method string              getNotes()            Returns the current record's "notes" value
 * @method Category            getCategory()         Returns the current record's "Category" value
 * @method Doctrine_Collection getRelationsOut()     Returns the current record's "RelationsOut" collection
 * @method Dp                  setName()             Sets the current record's "name" value
 * @method Dp                  setConfidence()       Sets the current record's "confidence" value
 * @method Dp                  setAlias()            Sets the current record's "alias" value
 * @method Dp                  setCategoryId()       Sets the current record's "category_id" value
 * @method Dp                  setSynopsis()         Sets the current record's "synopsis" value
 * @method Dp                  setContext()          Sets the current record's "context" value
 * @method Dp                  setProblem()          Sets the current record's "problem" value
 * @method Dp                  setProblemDetails()   Sets the current record's "problem_details" value
 * @method Dp                  setSolution()         Sets the current record's "solution" value
 * @method Dp                  setSolutionDetails()  Sets the current record's "solution_details" value
 * @method Dp                  setLiterature()       Sets the current record's "literature" value
 * @method Dp                  setNotes()            Sets the current record's "notes" value
 * @method Dp                  setCategory()         Sets the current record's "Category" value
 * @method Dp                  setRelationsOut()     Sets the current record's "RelationsOut" collection
 * 
 * @package    dp-navigator
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
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
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
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
        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasMany('DpRelation as RelationsOut', array(
             'local' => 'id',
             'foreign' => 'source_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $versionable0 = new Doctrine_Template_Versionable();
        $this->actAs($timestampable0);
        $this->actAs($versionable0);
    }
}