<?php

Yii::import('application.models._base.BaseOrderAction');

class OrderAction extends BaseOrderAction
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public function behaviors()
  {
    return array(
      "priority" => array(
        "class" => "ext.netlync.models.behaviors.NPriorityBehavior",
        "conditionalColumn" => "branchTypeID"
      )
    );
  }
}