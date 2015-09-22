<?php

/**
 * This is the model base class for the table "tbl_doctor".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Doctor".
 *
 * Columns in table "tbl_doctor" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $description
 * @property integer $province
 * @property string $laititude
 * @property string $longitude
 * @property integer $contact_num
 *
 */
abstract class BaseDoctor extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_doctor';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Doctor|Doctors', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('province, contact_num', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('laititude, longitude', 'length', 'max'=>200),
			array('address, description', 'safe'),
			array('name, address, description, province, laititude, longitude, contact_num', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, address, description, province, laititude, longitude, contact_num', 'safe', 'on'=>'search'),
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
			'address' => Yii::t('app', 'Address'),
			'description' => Yii::t('app', 'Description'),
			'province' => Yii::t('app', 'Province'),
			'laititude' => Yii::t('app', 'Laititude'),
			'longitude' => Yii::t('app', 'Longitude'),
			'contact_num' => Yii::t('app', 'Contact Num'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('province', $this->province);
		$criteria->compare('laititude', $this->laititude, true);
		$criteria->compare('longitude', $this->longitude, true);
		$criteria->compare('contact_num', $this->contact_num);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}