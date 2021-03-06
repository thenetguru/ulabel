<?php

/**
 * This is the model base class for the table "{{Currency}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Currency".
 *
 * Columns in table "{{Currency}}" available as properties of the model,
 * followed by relations of table "{{Currency}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $character
 * @property string $iso
 *
 * @property Country[] $countries
 */
abstract class BaseCurrency extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{Currency}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Currency|Currencies', $n);
	}

	public static function representingColumn() {
		return 'character';
	}

	public function rules() {
		return array(
			array('character, iso', 'length', 'max'=>3),
			array('character, iso', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, character, iso', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'countries' => array(self::HAS_MANY, 'Country', 'currencyID'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'character' => Yii::t('app', 'Character'),
			'iso' => Yii::t('app', 'Iso'),
			'countries' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('character', $this->character, true);
		$criteria->compare('iso', $this->iso, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}