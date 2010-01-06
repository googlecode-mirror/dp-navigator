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
      'version'          => new sfWidgetFormInputText(),
      'categories_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Category')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'             => new sfValidatorString(array('max_length' => 255)),
      'confidence'       => new sfValidatorChoice(array('choices' => array(0 => 0, 1 => 1, 2 => 2), 'required' => false)),
      'alias'            => new sfValidatorString(array('required' => false)),
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
      'version'          => new sfValidatorInteger(array('required' => false)),
      'categories_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Category', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['categories_list']))
    {
      $this->setDefault('categories_list', $this->object->Categories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveCategoriesList($con);

    parent::doSave($con);
  }

  public function saveCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Categories->getPrimaryKeys();
    $values = $this->getValue('categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Categories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Categories', array_values($link));
    }
  }

}
