<?php

Yii::import('application.models._base.BaseReport');

class Report extends BaseReport
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}