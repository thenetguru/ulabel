<?php

Yii::import('application.models._base.BaseUserBranchType');

class UserBranchType extends BaseUserBranchType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}