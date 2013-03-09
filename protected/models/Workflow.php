<?php

Yii::import('application.models._base.BaseWorkflow');

class Workflow extends BaseWorkflow
{
  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  public function behaviors()
  {
    return array(
      "priority" => array(
        "class" => "ext.netlync.models.behaviors.NPriorityBehavior",
        "conditionalColumn" => "branchTypeID"
      )
    );
  }

  public function rules()
  {
    return array(
      array("branchTypeID", "required"),
      array("nextBranchTypeID", "required"),
      array("branchTypeID, nextBranchTypeID", "numerical", "integerOnly" => true),
      array("priority, active", "default", "setOnEmpty" => true, "value" => null),
      array("branchTypeID", "uniqueWorkflow", "message" => Yii::t("app", ":sources can already purchase from :dests")),
      array("id, branchTypeID, nextBranchTypeID, priority, active", "safe", "on" => "search"),
    );
  }

  public function uniqueWorkflow($attribute, $params)
  {
    $result = Yii::app()->db->createCommand()
      ->select("COUNT(*)")
      ->from("{{Workflow}}")
      ->where("branchTypeID = :1 AND nextBranchTypeID = :2", array(":1" => $this->branchTypeID, ":2" => $this->nextBranchTypeID))
      ->queryRow(false);

    if ($result[0] > 0)
      $this->addError($this->$attribute, Yii::t("app", $params["message"], array(":source" => $this->branchType, ":dest" => $this->nextBranchType)));
  }

  public function attributeLabels()
  {
    return array(
      "branchTypeID" => "Initiating branch",
      "nextBranchTypeID" => "Can purchase from"
    );
  }

  protected function afterFind()
  {
    return parent::beforeFind();
  }

  protected function beforeSave()
  {
    return parent::beforeSave();
  }

  protected function afterDelete()
  {
    return parent::afterDelete();
  }
}