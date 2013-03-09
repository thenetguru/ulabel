<?php

Yii::import('application.models._base.BaseOrderItem');

class OrderItem extends BaseOrderItem
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}