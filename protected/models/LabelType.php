<?php

Yii::import('application.models._base.BaseLabelType');

class LabelType extends BaseLabelType
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
      )
    );
  }

  public static function label($n = 1)
  {
    return Yii::t('app', 'Label Type|Label Types', $n);
  }

  /**
   * Find the parent of a given childTypeID
   * @param $childTypeID
   * @return null|int
   */
  public function findParentType($childTypeID)
  {
    $type = LabelType::model()->cache(3600)->find("id = :1", array(":1" => $childTypeID));
    if ($type) return $type->parentID;

    return null;
  }
}