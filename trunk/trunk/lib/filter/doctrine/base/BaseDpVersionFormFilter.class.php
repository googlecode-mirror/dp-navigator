<?php

/**
 * DpVersion filter form base class.
 *
 * @package    dp-navigator
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDpVersionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'confidence'       => new sfWidgetFormChoice(array('choices' => array('' => '', 0 => 0, 1 => 1, 2 => 2))),
      'alias'            => new sfWidgetFormFilterInput(),
      'category_id'      => new sfWidgetFormFilterInput(),
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
    ));

    $this->setValidators(array(
      'name'             => new sfValidatorPass(array('required' => false)),
      'confidence'       => new sfValidatorChoice(array('required' => false, 'choices' => array(0 => 0, 1 => 1, 2 => 2))),
      'alias'            => new sfValidatorPass(array('required' => false)),
      'category_id'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
    ));

    $this->widgetSchema->setNameFormat('dp_version_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DpVersion';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name'             => 'Text',
      'confidence'       => 'Enum',
      'alias'            => 'Text',
      'category_id'      => 'Number',
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
    );
  }
}
