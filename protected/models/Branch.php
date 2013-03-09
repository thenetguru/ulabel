<?php

Yii::import("application.models._base.BaseBranch");

class Branch extends BaseBranch
{
  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  public function relations()
  {
    return array(
      "addresses" => array(self::HAS_MANY, "Address", "branchID"),
      "api" => array(self::HAS_ONE, "Api", "branchID"),
      "company" => array(self::BELONGS_TO, "Company", "companyID"),
      "branchBranchTypes" => array(self::HAS_MANY, "BranchBranchType", "branchID"),
      "branchTypes" => array(self::MANY_MANY, "BranchType", "{{BranchBranchType}}(branchID, branchTypeID)"),

      "users" => array(self::MANY_MANY, "User", "{{UserBranch}}(branchID, userID)"),
    );
  }

  public function attributeLabels()
  {
    return array_merge(parent::attributeLabels(), array(
      "branchTypeID" => Yii::t("app", "Branch Type"),
      "deliveryAddressID" => Yii::t("app", "Delivery Address"),
      "invoiceAddressID" => Yii::t("app", "Invoice Address"),
      "branchBranchTypes" => Yii::t("app", "Branch Types"),
    ));
  }

  public function pivotModels() {
    return array(
      "users" => "UserBranch",
      "branchTypes" => "BranchBranchType",
    );
  }

  public function defaultScope() {
    $alias = $this->getTableAlias(false, false);
    return array(
      "order" => "{$alias}.name ASC",
    );
  }
}