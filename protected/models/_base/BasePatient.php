<?php

/**
 * This is the model base class for the table "tbl_patient".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Patient".
 *
 * Columns in table "tbl_patient" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $patient_id
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property string $last_updated
 * @property string $relationshipWithUser
 * @property string $bloodType
 *
 */
abstract class BasePatient extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tbl_patient';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Patient|Patients', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, dob, gender', 'length', 'max'=>255),
			array('last_updated', 'length', 'max'=>200),
			array('relationshipWithUser, bloodType', 'safe'),
			array('name, dob, gender, last_updated, relationshipWithUser, bloodType', 'default', 'setOnEmpty' => true, 'value' => null),
			array('patient_id, name, dob, gender, last_updated, relationshipWithUser, bloodType', 'safe', 'on'=>'search'),
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
			'patient_id' => Yii::t('app', 'Patient'),
			'name' => Yii::t('app', 'Name'),
			'dob' => Yii::t('app', 'Dob'),
			'gender' => Yii::t('app', 'Gender'),
			'last_updated' => Yii::t('app', 'Last Updated'),
			'relationshipWithUser' => Yii::t('app', 'Relationship With User'),
			'bloodType' => Yii::t('app', 'Blood Type'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('patient_id', $this->patient_id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('dob', $this->dob, true);
		$criteria->compare('gender', $this->gender, true);
		$criteria->compare('last_updated', $this->last_updated, true);
		$criteria->compare('relationshipWithUser', $this->relationshipWithUser, true);
		$criteria->compare('bloodType', $this->bloodType, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}