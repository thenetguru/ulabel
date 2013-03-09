<?php

Yii::import('application.models._base.BaseApi');

class Api extends BaseApi
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}