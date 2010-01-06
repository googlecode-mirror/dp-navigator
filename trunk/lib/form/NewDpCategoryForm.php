<?php
class NewDpCategoryForm extends sfForm
{


  public function configure()
  {
    $this->setWidgets(array(
      'category'   =>  new sfWidgetFormDoctrineChoice(array('model' => 'Category')),
	  'id' => new sfWidgetFormInputHidden(),  // id of dp to which relations are added
    ));
  }
}

?>