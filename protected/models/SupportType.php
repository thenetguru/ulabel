<?php

Yii::import("application.models._base.BaseSupportType");

class SupportType extends BaseSupportType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public static function label($n = 1) {
    return Yii::t("app", "Support Type|Support Types", $n);
  }

  public function behaviors()
  {
    return array(
      "priority" => array(
        "class" => "ext.netlync.models.behaviors.NPriorityBehavior",
      )
    );
  }

  public function relations() {
    return array(
      "tickets" => array(self::HAS_MANY, "Support", "supportTypeID"),
      "parent" => array(self::BELONGS_TO, "SupportType", "parentID"),
      "children" => array(self::HAS_MANY, "SupportType", "parentID"),
    );
  }

  public function attributeLabels() {
    return array(
      "parent" => "Support Category",
      "children" => "Support Types",
    );
  }
}