<?php

/**
 * DpRelation filter form base class.
 *
 * @package    dp-navigator
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseDpRelationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'type_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Type'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('dp_relation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DpRelation';
  }

  public function getFields()
  {
    return array(
      'source_id' => 'Number',
      'target_id' => 'Number',
      'type_id'   => 'ForeignKey',
    );
  }
}
