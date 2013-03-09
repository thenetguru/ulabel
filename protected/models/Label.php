<?php

Yii::import("application.models._base.BaseLabel");
/**
 * @property array $parentHistory
 * @property int $parentTypeID;
 * @property string $formattedNumber
 * @property boolean $parentCanAccommodate
 */
class Label extends BaseLabel
{
  /**
   * @var int $parentLabel
   * @soap
   */
  public $parentLabel;
  /**
   * @var bool
   */
  public $createParent;
  /**
   * @var array
   */
  public $range = array(
    array("start" => null, "end" => null)
  );

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  public function relations()
  {
    return array(
      "labelType" => array(self::BELONGS_TO, "LabelType", "labelTypeID"),
      "parent" => array(self::BELONGS_TO, "Label", "parentID"),
      "labels" => array(self::HAS_MANY, "Label", "parentID"),
      "currentAddress" => array(self::BELONGS_TO, "Address", "currentAddressID"),
      "destinationAddress" => array(self::BELONGS_TO, "Address", "destinationAddressID"),
      "orderItems" => array(self::HAS_MANY, "OrderItem", "labelID"),
    );
  }

  public function rules()
  {
    return array_merge(parent::rules(), array(
      array("number", "parentCanAccommodate")
    ));
  }

  public function attributeLabels()
  {
    return array(
      "id" => Yii::t("app", "ID"),
      "labelTypeID" => null,
      "parentID" => "Parent Label",
      "number" => Yii::t("app", "Number"),
      "start" => Yii::t("app", "Start"),
      "end" => Yii::t("app", "End"),
      "history" => Yii::t("app", "History"),
      "currentAddressID" => Yii::t("app", "Current Address"),
      "destinationAddressID" => Yii::t("app", "Delivery Address"),
      "requiredDate" => Yii::t("app", "Required Date"),
      "dispatchDate" => Yii::t("app", "Dispatch Date"),
      "arrivalDate" => Yii::t("app", "Arrival Date"),
      "labelType" => null,
      "parent" => null,
      "labels" => null,
      "currentAddress" => null,
      "destinationAddress" => null,
      "orderItems" => null,
      "createParent" => Yii::t("yii", "Create parent")
    );
  }

  public function scopes()
  {
    $alias = $this->getTableAlias(false, false);

    return array(
      "labels" => array(
        "condition" => "{$alias}.labelTypeID = 41"
      ),
      "bags" => array(
        "condition" => "{$alias}.labelTypeID = 3"
      ),
      "innerBoxes" => array(
        "condition" => "{$alias}.labelTypeID = 2"
      ),
      "outerBoxes" => array(
        "condition" => "{$alias}.labelTypeID = 1"
      ),
    );
  }

  public function parentCanAccommodate($attribute, $params)
  {
    if (isset($this->parentLabel)) {
      $criteria = new CDbCriteria;
      $criteria->compare("id", $this->$attribute->parentID);

      $parent = Label::model()->find($criteria);
    }
    $myChildrenCount = Yii::app()->cache->get("child_count_{$this->parent}");

  }

  public function getFormattedNumber()
  {
    return sprintf("%0{$this->labelType->length}d", $this->number);
  }

  /**
   * Create a new label and it's ranges
   */
  public function create()
  {
    $transaction = $this->dbConnection->beginTransaction();
    $command = $this->dbConnection->createCommand("INSERT INTO {{Label}} SET labelTypeID=:labelTypeID, number=:number");
    $command->bindValue(":labelTypeID", $this->labelTypeID, PDO::PARAM_INT);

    try {
      if (!isset($this->parentLabel)) {
        foreach ($this->range as $element) {
          if (isset($element["start"]) && isset($element["end"])) {
            if ($element["start"] > $element["end"]) {
              for ($i = $element["start"]; $i <= $element["end"]; $i++) {
                $command->bindValue(":number", $i, PDO::PARAM_INT);
                if (!$command->execute()){
                  $transaction->rollback();
                  return false;
                }
              }
            } else {
              for ($i = $element["start"]; $i >= $element["end"]; $i--) {
                $command->bindValue(":number", $i, PDO::PARAM_INT);
                if (!$command->execute()){
                  $transaction->rollback();
                  return false;
                }
              }
            }
          } else {
            if (isset($element["start"])) {
              $command->bindValue(":number", $element["start"], PDO::PARAM_INT);
              if (!$command->execute()){
                $transaction->rollback();
                return false;
              }
            }
          }
        }
        $transaction->commit();
      } else {
        if (isset($this->parentLabel)) {
          $criteria = new CDbCriteria;
          $criteria->compare("number", $this->parentLabel);
          $criteria->compare("labelTypeID", LabelType::model()->findParentType($this->labelTypeID));

          if (Label::model()->exists($criteria)) {
            $this->parentID = Label::model()->find($criteria)->id;
          }
        }
      }
    } catch (Exception $e) {
      $transaction->rollback();
      return false;
    }

    return true;
  }

  /**
   * Dispatch a ULabel item to a given addressID
   */
  public function dispatch($addressID)
  {

  }

  /**
   * Arrive a ULabel item
   */
  public function arrive($addressID)
  {
    // If a label has not history whatsoever, we should capture the parent history and
    // use this to form the beginning of the travel history of a given label
    if (!isset($this->history)) {
      $this->history = $this->parentHistory;
    }
  }

  /**
   * beforeSave event
   */
  protected function beforeSave()
  {

  }

  /**
   * afterSave event
   */
  protected function afterSave()
  {
    if (isset($this->parentID)) {
      $count = Label::model()->count("parentID = :1", array(":1" => $this->parentID));
      $this->refresh();
      $this->parent->childCount = $count;
      $this->parent->save();
    }

    return parent::afterSave();
  }


  /**
   * Search the ULabel system for a specific label
   * @param int $label Label number you want to search for
   * @param null $type
   * @return array
   * @soap
   */
  public function getSearch($label = 1, $type = null)
  {
    return array(
      "Hello",
      "World"
    );
  }

  public function saveForCreation()
  {

  }

  public function saveForDeletion()
  {

  }

  public function getParentTypeID()
  {
    $parent = LabelType::model()->findParentType($this->labelTypeID);
  }

  public function getParentHistory()
  {
    if (isset($this->parent))
      if (isset($this->parent->history))
        return unserialize($this->parent->history);
      else return $this->parent->parentHistory;
    else return array();
  }
}