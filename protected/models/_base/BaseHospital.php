<?php

/**
 * This is the model base class for the table "tbl_hospital".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Hospital".
 *
 * Columns in table "tbl_hospital" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property integer $province
 * @property string $address
 * @property string $contact
 * @property string $laititude
 * @property string $longtitude
 * @property string $contact_num
 *
 */
abstract class BaseHospital extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_hospital';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Hospital|Hospitals', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('province', 'numerical', 'integerOnly'=>true),
			array('name, contact, contact_num', 'length', 'max'=>255),
			array('laititude, longtitude', 'length', 'max'=>200),
			array('address', 'safe'),
			array('name, province, address, contact, laititude, longtitude, contact_num', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, province, address, contact, laititude, longtitude, contact_num', 'safe', 'on'=>'search'),
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
			'province' => Yii::t('app', 'Province'),
			'address' => Yii::t('app', 'Address'),
			'contact' => Yii::t('app', 'Contact'),
			'laititude' => Yii::t('app', 'Laititude'),
			'longtitude' => Yii::t('app', 'Longtitude'),
			'contact_num' => Yii::t('app', 'Contact Num'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('province', $this->province);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('contact', $this->contact, true);
		$criteria->compare('laititude', $this->laititude, true);
		$criteria->compare('longtitude', $this->longtitude, true);
		$criteria->compare('contact_num', $this->contact_num, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}