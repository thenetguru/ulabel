<?php

Yii::import('application.models._base.BaseSupportMessage');

class SupportMessage extends BaseSupportMessage
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}