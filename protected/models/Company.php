<?php

Yii::import('application.models._base.BaseCompany');

class Company extends BaseCompany
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public function attributeLabels() {
    return array_merge(parent::attributeLabels(), array(
      "name" => Yii::t("app","Company name")
    ));
  }

  public function defaultScope() {
    $alias = $this->getTableAlias(false, false);
    return array(
      "order" => "{$alias}.name ASC",
    );
  }
}