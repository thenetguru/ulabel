<?php

/**
 * Class NStickyBehavior
 * @property boolean $isSticky
 */
class NStickyBehavior extends CActiveRecordBehavior
{
  /**
   * @var string
   */
  public $stickyColumn = "sticky";

  public function beforeFind($event)
  {
    $owner = $this->getOwner();
    $alias = $owner->getTableAlias(false, false);

    $this->owner->getDbCriteria()->mergeWith(array(
      "order" => "{$alias}.{$this->stickyColumn} DESC"
    ));

    return parent::beforeFind($event);
  }

  public function stick()
  {
    if(!$this->isSticky) {
      $owner = $this->getOwner();
      $alias = $owner->getTableAlias(false, false);

      $command = Yii::app()->db->createCommand()
        ->select("MAX({$this->stickyColumn})")
        ->from($alias);

      $result = $command->query(false);

      if($result[0] == 0)  $stickyValue = 1;
      else $stickyValue = $result[0] + 1;

      Yii::app()->db->createCommand()
        ->update($alias, array($this->stickyColumn => $stickyValue),
          "{$owner->tableSchema->primaryKey} = :1",
          array(
            ":1" => $owner->primaryKey
          )
        );
    }
  }

  public function unstick()
  {
    if ($this->isSticky) {
      $owner = $this->getOwner();
      $alias = $owner->getTableAlias(false, false);

      Yii::app()->db->createCommand()
        ->update($alias, array($this->stickyColumn => 0),
          "{$this->owner->tableSchema->primaryKey} = :1",
          array(
            ":1" => $this->owner->primaryKey
          )
        );
    }
  }

  /**
   * Determines if a child item is sticky or not
   */
  public function getIsSticky()
  {
    if ($this->owner->{$this->stickyColumn} > 0) return true;
    else return false;
  }
}