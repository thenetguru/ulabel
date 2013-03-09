<?php

/**
 * This is the model base class for the table "{{Report}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Report".
 *
 * Columns in table "{{Report}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property integer $branchID
 *
 */
abstract class BaseReport extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{Report}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Report|Reports', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('branchID', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('name, branchID', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, branchID', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'branchID' => Yii::t('app', 'Branch'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('branchID', $this->branchID);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}