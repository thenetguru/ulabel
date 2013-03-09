<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public function attributeLabels() {
    return array_merge(parent::attributeLabels(), array(
      "fname" => Yii::t("app","First name"),
      "lname" => Yii::t("app","Last name"),
      "pword" => Yii::t("app","Password"),
      "email" => Yii::t("app","Email Address"),
    ));
  }
}