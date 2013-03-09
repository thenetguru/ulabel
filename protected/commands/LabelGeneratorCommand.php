<?php

class LabelGeneratorCommand extends CConsoleCommand
{
  public function run($args) {
    $transaction = Yii::app()->db->beginTransaction();
    for($i = 1; $i < 500; $i++) {
      $label = new Label;
      $label->setAttributes(array(
        "number" => $i,
        "labelTypeID" => 3 // Outer Box
      ));
      $label->save();
    }
    /*

    for($i = 1; $i < 201; $i++) {
      $label = new Label;
      $label->setAttributes(array(
        "number" => $i,
        "labelTypeID" => 2, // Inner Box
        "parentID" => rand(1, 200)
      ));
      $label->save();
    }
  */
    $transaction->commit();
  }
}