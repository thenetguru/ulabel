<?php

Yii::import('application.models._base.BaseUserBranch');

class UserBranch extends BaseUserBranch
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}