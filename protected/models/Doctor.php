<?php

Yii::import('application.models._base.BaseDoctor');

class Doctor extends BaseDoctor
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}