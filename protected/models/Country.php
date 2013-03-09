<?php

Yii::import('application.models._base.BaseCountry');

class Country extends BaseCountry
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public function behaviors()
  {
    return array(
      "priority" => array(
        "class" => "ext.netlync.models.behaviors.NPriorityBehavior",
      ),
      "sticky" => array(
        "class" => "ext.netlync.models.behaviors.NStickyBehavior",
      ),
    );
  }

  public function defaultScope() {
    $alias = $this->getTableAlias(false, false);
    return array(
      "order" => "{$alias}.name ASC",
    );
  }
}