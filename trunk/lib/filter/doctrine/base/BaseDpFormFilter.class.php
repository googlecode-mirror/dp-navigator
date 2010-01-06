<?php

/**
 * Dp filter form base class.
 *
 * @package    dp-navigator
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDpFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'confidence'       => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1, 2 => 2))),
      'alias'            => new sfWidgetFormFilterInput(),
      'synopsis'         => new sfWidgetFormFilterInput(),
      'context'          => new sfWidgetFormFilterInput(),
      'problem'          => new sfWidgetFormFilterInput(),
      'problem_details'  => new sfWidgetFormFilterInput(),
      'solution'         => new sfWidgetFormFilterInput(),
      'solution_details' => new sfWidgetFormFilterInput(),
      'literature'       => new sfWidgetFormFilterInput(),
      'notes'            => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'version'          => new sfWidgetFormFilterInput(),
      'categories_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'confidence'       => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1, 2 => 2))),
      'alias'            => new sfValidatorPass(array('required' => false)),
      'synopsis'         => new sfValidatorPass(array('required' => false)),
      'context'          => new sfValidatorPass(array('required' => false)),
      'problem'          => new sfValidatorPass(array('required' => false)),
      'problem_details'  => new sfValidatorPass(array('required' => false)),
      'solution'         => new sfValidatorPass(array('required' => false)),
      'solution_details' => new sfValidatorPass(array('required' => false)),
      'literature'       => new sfValidatorPass(array('required' => false)),
      'notes'            => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'version'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categories_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addCategoriesListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.DpCategory DpCategory')
          ->andWhereIn('DpCategory.category_id', $values);
  }

  public function getModelName()
  {
    return 'Dp';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'confidence'       => 'Enum',
      'alias'            => 'Text',
      'synopsis'         => 'Text',
      'context'          => 'Text',
      'problem'          => 'Text',
      'problem_details'  => 'Text',
      'solution'         => 'Text',
      'solution_details' => 'Text',
      'literature'       => 'Text',
      'notes'            => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'version'          => 'Number',
      'categories_list'  => 'ManyKey',
    );
  }
}
