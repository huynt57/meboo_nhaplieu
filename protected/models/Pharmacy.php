<?php

Yii::import('application.models._base.BasePharmacy');

class Pharmacy extends BasePharmacy {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function addPharmacy($attr) {
        $model = new Pharmacy;
        $model->setAttributes($attr);
        if ($model->save(FALSE)) {
            return TRUE;
        }
        return FALSE;
    }

}
