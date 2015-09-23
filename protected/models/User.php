<?php

Yii::import('application.models._base.BaseUser');

class User extends BaseUser {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function loginWithFacebook($facebook_id, $gender, $facebook_access_token, $photo, $name, $email) {
        $user_exist_facebook = User::model()->findByAttributes(array('facebook_id' => $facebook_id));

        if ($user_exist_facebook && $user_exist_facebook->facebook_id != NULL && $facebook_id != NULL) {
            $user_exist_facebook->last_updated = time();
            if ($user_exist_facebook->save(FALSE)) {
                Yii::app()->session['user_id'] = $user_exist_facebook->user_id;
                ResponseHelper::JsonReturnSuccess($user_exist_facebook, "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        } else {
            $model = new User();
            $model->facebook_access_token = $facebook_access_token;
            $model->facebook_id = $facebook_id;
            if ($gender == 'male') {
                $model->gender = 0;
            } else {
                $model->gender = 1;
            }
            $model->photo = $photo;
            $model->email = $email;
            $model->name = $name;
            $model->last_updated = time();
            if ($model->save(FALSE)) {
                Yii::app()->session['user_id'] = $model->user_id;
                ResponseHelper::JsonReturnSuccess($model, "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        }
    }

}
