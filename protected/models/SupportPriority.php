<?php

Yii::import('application.models._base.BaseSupportPriority');

class SupportPriority extends BaseSupportPriority
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

  public static function label($n = 1) {
    return Yii::t('app', 'Support Priority|Support Priorities', $n);
  }
}