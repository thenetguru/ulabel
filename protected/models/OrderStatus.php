<?php

Yii::import('application.models._base.BaseOrderStatus');

class OrderStatus extends BaseOrderStatus
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public function behaviors()
  {
    return array(
      "priority" => array(
        "class" => "ext.netlync.models.behaviors.NPriorityBehavior",
      )
    );
  }

}