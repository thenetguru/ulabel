<?php

Yii::import("application.models._base.BaseBranchType");

class BranchType extends BaseBranchType
{
  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  public static function label($n = 1)
  {
    return Yii::t("app", "Branch Type|Branch Types", $n);
  }

  public function behaviors()
  {
    return array(
      "priority" => array(
        "class" => "ext.netlync.models.behaviors.NPriorityBehavior",
      )
    );
  }

  public function relations()
  {
    return array_merge(parent::relations(), array(
      "branches" => array(self::MANY_MANY, "Branch", "{{BranchBranchType}}(branchTypeID, branchID)"),
      "branchesTypes" => array(self::HAS_MANY, "BranchBranchType", "branchTypeID"),
      "branchBranchType" => array(self::HAS_ONE, "BranchBranchType", "branchTypeID"),
      "deliveryAddress" => array(self::HAS_ONE, "Address", array( "deliveryAddressID" => "id"), "through" => "branchesTypes", "joinType"=>"INNER JOIN"),
      "invoiceAddress" => array(self::HAS_ONE, "Address", array( "invoiceAddressID" => "id"), "through" => "branchesTypes", "joinType"=>"INNER JOIN"),
      "workflows" => array(self::HAS_MANY, "Workflow", "nextBranchTypeID"),
      "workflowParents" => array(self::HAS_MANY, "Workflow", "branchTypeID"),
    ));
  }

  public function pivotModels() {
    return array(
      "branches" => "Branch"
    );
  }
}