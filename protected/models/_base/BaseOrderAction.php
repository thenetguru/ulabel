<?php

/**
 * This is the model base class for the table "{{OrderAction}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "OrderAction".
 *
 * Columns in table "{{OrderAction}}" available as properties of the model,
 * followed by relations of table "{{OrderAction}}" available as properties of the model.
 *
 * @property integer $id
 * @property integer $orderStatusID
 * @property string $action
 * @property integer $priority
 *
 * @property OrderStatus $orderStatus
 */
abstract class BaseOrderAction extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{OrderAction}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'OrderAction|OrderActions', $n);
	}

	public static function representingColumn() {
		return 'action';
	}

	public function rules() {
		return array(
			array('orderStatusID, priority', 'numerical', 'integerOnly'=>true),
			array('action', 'length', 'max'=>40),
			array('orderStatusID, action, priority', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, orderStatusID, action, priority', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'orderStatus' => array(self::BELONGS_TO, 'OrderStatus', 'orderStatusID'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'orderStatusID' => null,
			'action' => Yii::t('app', 'Action'),
			'priority' => Yii::t('app', 'Priority'),
			'orderStatus' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('orderStatusID', $this->orderStatusID);
		$criteria->compare('action', $this->action, true);
		$criteria->compare('priority', $this->priority);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}