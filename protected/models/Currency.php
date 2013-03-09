<?php

Yii::import('application.models._base.BaseCurrency');

/**
 * Class Currency
 * @property arrat $concatenatedList
 */
class Currency extends BaseCurrency
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  public function getConcatenatedList() {
    $currencies = array();
    foreach(Currency::model()->cache(1200)->findAll() as $n =>$model) {
      $currencies[$model->id] = array("id"=>$model->id, "value"=>"{$model->character} (".strtoupper($model->iso).")");
    }

    return $currencies;
  }
}