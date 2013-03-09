<?php

Yii::import('application.models._base.BaseBranchBranchType');

class BranchBranchType extends BaseBranchBranchType
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

  /**
   * Overloaded relations
   */
  public function relations() {
    return array(
      'invoiceAddress' => array(self::BELONGS_TO, 'Address', 'invoiceAddressID'),
      'branch' => array(self::BELONGS_TO, 'Branch', 'branchID'),
      'branchType' => array(self::BELONGS_TO, 'BranchType', 'branchTypeID'),
      'deliveryAddress' => array(self::BELONGS_TO, 'Address', 'deliveryAddressID'),
      'users' => array(self::MANY_MANY, 'User', '{{UserBranchType}}(branchBranchTypeID, userID)'),
    );
  }

  /**
   * Overloaded pivotModels
   */
  public function pivotModels() {
    return array(
      'users' => 'UserBranchType',
    );
  }
}