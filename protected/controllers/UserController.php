<?php

class UserController extends Controller {

//    public function beforeAction() {
//        //$this->checkLogin();
//    }

    public function actionIndex() {
        $this->render('index');
    }

    public function checkLogin() {
        if (empty(Yii::app()->session['user_id'])) {

            $this->redirect(Yii::app()->createUrl('user/login'));
        }
    }

    public function actionLogin() {
        $this->layout = "empty";
        $this->render('login');
    }

    public function actionLoginWithFacebook() {
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $facebook_id = StringHelper::filterString($request->getPost('facebook_id'));
                $gender = StringHelper::filterString($request->getPost('gender'));
                $facebook_access_token = StringHelper::filterString($request->getPost('facebook_access_token'));
                $photo = $request->getPost('photo');
                $name = StringHelper::filterString($request->getPost('name'));
                $email = StringHelper::filterString($request->getPost('email'));

                User::model()->loginWithFacebook($facebook_id, $gender, $facebook_access_token, $photo, $name, $email);
            } catch (exception $e) {
                var_dump($e->getMessage());
            }
            Yii::app()->end();
        }
    }

    public function actionAddDoctor() {
        $attr = StringHelper::filterArrayString($_POST);
        $model = new Doctors();
        $model->setAttributes($attr);
        $model->created_at = time();
        $model->updated_at = time();
        if ($model->save(FALSE)) {
            ResponseHelper::JsonReturnSuccess("", "Success");
        } else {
            ResponseHelper::JsonReturnError("", "Server Error");
        }
    }

    public function actionInput() {
        $this->checkLogin();
        $ward = Ward::model()->findAll();
        $district = District::model()->findAll();
        $province = Province::model()->findAll();
        $this->render('input', array('ward' => $ward, 'district' => $district, 'province' => $province));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
