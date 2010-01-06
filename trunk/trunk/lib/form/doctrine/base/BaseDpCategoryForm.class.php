<?php

/**
 * DpCategory form base class.
 *
 * @method DpCategory getObject() Returns the current form's model object
 *
 * @package    dp-navigator
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDpCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dp_id'       => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'dp_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'dp_id', 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'category_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dp_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DpCategory';
  }

}
