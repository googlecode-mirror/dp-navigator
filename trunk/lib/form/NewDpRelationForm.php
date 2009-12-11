<?php
class NewDpRelationForm extends sfForm
{


  public function configure()
  {
    $this->setWidgets(array(
      'relation_type'    => new sfWidgetFormDoctrineChoice(array('model' => 'RelationType')),
      'related_dp'   =>  new sfWidgetFormDoctrineChoice(array('model' => 'Dp')),
	  'id' => new sfWidgetFormInputHidden(),  // id of dp to which relations are added
    ));
  }
}

?>