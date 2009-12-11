<?php

/**
 * DpRelation form base class.
 *
 * @method DpRelation getObject() Returns the current form's model object
 *
 * @package    dp-navigator
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDpRelationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'source_id' => new sfWidgetFormInputHidden(),
      'target_id' => new sfWidgetFormInputHidden(),
      'type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'source_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'source_id', 'required' => false)),
      'target_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'target_id', 'required' => false)),
      'type_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dp_relation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DpRelation';
  }

}
