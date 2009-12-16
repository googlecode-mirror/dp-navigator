<?php

/**
 * Dp form base class.
 *
 * @method Dp getObject() Returns the current form's model object
 *
 * @package    dp-navigator
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDpForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name'             => new sfWidgetFormInputText(),
      'confidence'       => new sfWidgetFormChoice(array('choices' => array(0 => 0, 1 => 1, 2 => 2))),
      'alias'            => new sfWidgetFormTextarea(),
      'category_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'synopsis'         => new sfWidgetFormTextarea(),
      'context'          => new sfWidgetFormTextarea(),
      'problem'          => new sfWidgetFormTextarea(),
      'problem_details'  => new sfWidgetFormTextarea(),
      'solution'         => new sfWidgetFormTextarea(),
      'solution_details' => new sfWidgetFormTextarea(),
      'literature'       => new sfWidgetFormTextarea(),
      'notes'            => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'confidence'       => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1, 2 => 2), 'required' => false)),
      'alias'            => new sfValidatorString(array('required' => false)),
      'category_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false)),
      'synopsis'         => new sfValidatorString(array('required' => false)),
      'context'          => new sfValidatorString(array('required' => false)),
      'problem'          => new sfValidatorString(array('required' => false)),
      'problem_details'  => new sfValidatorString(array('required' => false)),
      'solution'         => new sfValidatorString(array('required' => false)),
      'solution_details' => new sfValidatorString(array('required' => false)),
      'literature'       => new sfValidatorString(array('required' => false)),
      'notes'            => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Dp', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('dp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dp';
  }

}
