<?php

Yii::import('application.models._base.BaseOrderFlow');

class OrderFlow extends BaseOrderFlow
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}