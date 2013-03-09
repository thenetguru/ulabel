<?php

class NPriorityBehavior extends CActiveRecordBehavior
{
  /**
   * @var null
   */
  public $conditionalColumn = null;
  /**
   * @var string
   */
  public $priorityColumn = "priority";

  public function beforeFind($event) {
    $owner = $this->getOwner();
    $alias = $owner->getTableAlias(false, false);

    $this->owner->getDbCriteria()->mergeWith(array(
      "order" => "{$alias}.{$this->priorityColumn} ASC"
    ));

    return parent::beforeFind($event);
  }

  /**
   * Before saving this record we need to assign a the priority column which should be the greatest value incremented
   * by one
   */
  public function beforeSave($event)
  {
    $owner = $this->getOwner();
    $alias = $owner->tableName();
    $this->owner->{$this->priorityColumn} = 0;

    if ($owner->isNewRecord) {
      $command = Yii::app()->db->createCommand()
        ->select("MAX({$this->priorityColumn})")
        ->from($alias);

      if (isset($this->conditionalColumn))
        $command->where("{$this->conditionalColumn} = :1", array(":1" => $this->owner->{$this->conditionalColumn}));

      $result = $command->queryRow(false);

      if (isset($result[0])) $this->owner->{$this->priorityColumn} = ($result[0] + 1);
    }

    return parent::beforeSave($event);
  }

  /**
   * After deleting the parent row we need to resort the priority column
   */
  public function afterDelete($event)
  {
    $owner = $this->getOwner();
    $alias = $owner->tableName();
    $command = Yii::app()->db->createCommand()->select("id")->from($alias)->order("{$this->priorityColumn} ASC");

    if (isset($this->conditionalColumn))
      $command->where("{$this->conditionalColumn} = :1", array(":1" => $this->owner->{$this->conditionalColumn}));

    $result = $command->query();

    $priority = 0;
    while (($row = $result->read()) !== false)
      Yii::app()->db->createCommand()->update($alias, array($this->priorityColumn => $priority++), "id=:1", array(":1" => $row["id"]));

    return parent::afterDelete($event);
  }
}