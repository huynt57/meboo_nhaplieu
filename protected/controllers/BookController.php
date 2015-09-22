<?php

class BookController extends Controller {

    public function actionIndex() {
        $data = Books::model()->getBooksForWeb();
        $this->render('index', array('books' => $data));
    }

    /**
     * @api {post} book/add Add A Book
     * @apiName Add Book
     * @apiGroup Book
     *
     * @apiParam {String} book_name Book Name.
     * @apiParam {String} book_author Book Author.
     * @apiParam {Number} book_year Book Year.
     * @apiParam {String} book_publisher Book Publisher.
     * @apiParam {String} book_description Book Description.
     * @apiParam {String} book_image Book Image.
     *
     * @apiSuccess {String} status Status of request. 1 if success and 0 for not.
     * @apiSuccess {String} data  Response data of request.
     * @apiSuccess {String} message  Message.
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": 1,
     *       "data": [],
     *       "message":Success
     *     }
     *
     * 
     */
    public function actionAdd() {
        $request = Yii::app()->request;
        try {
            $book_name = StringHelper::filterString($request->getPost('book_name'));
            $book_author = StringHelper::filterString($request->getPost('book_author'));
            $book_year = StringHelper::filterString($request->getPost('book_year'));
            $book_publisher = StringHelper::filterString($request->getPost('book_publisher'));
            $book_description = StringHelper::filterString($request->getPost('book_description'));
            $book_image = NULL;
            if (isset($_FILES['book_image'])) {
                $book_image = UploadHelper::getUrlUpload($_FILES['book_image']);
            }
            if (Books::model()->addBook($book_name, $book_author, $book_year, $book_publisher, $book_image, $book_description)) {
                ResponseHelper::JsonReturnSuccess("", "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionAddForWeb() {
        $request = Yii::app()->request;
        try {
            $book_name = StringHelper::filterString($request->getPost('book_name'));
            $book_author = StringHelper::filterString($request->getPost('book_author'));
            $book_year = StringHelper::filterString($request->getPost('book_year'));
            $book_publisher = StringHelper::filterString($request->getPost('book_publisher'));
            $book_description = StringHelper::filterString($request->getPost('book_description'));
            $book_image = NULL;
            if (isset($_FILES['book_image'])) {
                $book_image = UploadHelper::getUrlUpload($_FILES['book_image']);
            }
            if (Books::model()->addBook($book_name, $book_author, $book_year, $book_publisher, $book_image, $book_description)) {
                Yii::app()->user->setFlash('message_ss', "Added !!!");
                $this->redirect(Yii::app()->createUrl('book/index'));
            } else {
                Yii::app()->user->setFlash('message_err', "Server Error :(");
                $this->redirect(Yii::app()->createUrl('book/index'));
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionDetailBook() {
        $request = Yii::app()->request;
        try {
            $book_id = StringHelper::filterString($request->getPost('book_id'));
            $data = Books::model()->detailBook($book_id);
            ResponseHelper::JsonReturnSuccess($data, "Success");
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionUpdate() {
        $request = Yii::app()->request;
        try {
            $book_id = StringHelper::filterString($request->getPut('book_id'));
            $book_name = StringHelper::filterString($request->getPut('book_name'));
            $book_author = StringHelper::filterString($request->getPut('book_author'));
            $book_year = StringHelper::filterString($request->getPut('book_year'));
            $book_publisher = StringHelper::filterString($request->getPut('book_publisher'));
            $book_description = StringHelper::filterString($request->getPut('book_description'));
            $book_image = NULL;
            if (isset($_FILES['book_image'])) {
                $book_image = UploadHelper::getUrlUpload($_FILES['book_image']);
            }
            if (Books::model()->updateBook($book_id, $book_name, $book_author, $book_year, $book_publisher, $book_image, $book_description)) {
                ResponseHelper::JsonReturnSuccess("", "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionEdit() {
        $request = Yii::app()->request;
        try {
            $book_id = StringHelper::filterString($request->getPost('book_id'));
            $book_name = StringHelper::filterString($request->getPost('book_name'));
            $book_author = StringHelper::filterString($request->getPost('book_author'));
            $book_year = StringHelper::filterString($request->getPost('book_year'));
            $book_publisher = StringHelper::filterString($request->getPost('book_publisher'));
            $book_description = StringHelper::filterString($request->getPost('book_description'));
            $book_image = NULL;
            if (isset($_FILES['book_image'])) {
                $book_image = UploadHelper::getUrlUpload($_FILES['book_image']);
            }
            if (Books::model()->updateBook($book_id, $book_name, $book_author, $book_year, $book_publisher, $book_image, $book_description)) {
                Yii::app()->user->setFlash('message_ss', "Update Success");
                $this->redirect(Yii::app()->createUrl('book/index'));
            } else {
                Yii::app()->user->setFlash('message_err', "Server Error :(");
                $this->redirect(Yii::app()->createUrl('book/index'));
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionDelete() {
        $request = Yii::app()->request;
        try {
            $book_id = $request->getDelete('book_id');
            $model = Books::model()->findByAttributes(array('id' => $book_id));
            if ($model->delete()) {
                ResponseHelper::JsonReturnSuccess("", "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }
    
    public function actionDelete2() {
        $request = Yii::app()->request;
        try {
            $book_id = $request->getDelete('book_id');
            $model = Books::model()->findByAttributes(array('id' => $book_id));
            if ($model->delete()) {
                ResponseHelper::JsonReturnSuccess("", "Success");
            } else {
                ResponseHelper::JsonReturnError("", "Server Error");
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionDeleteForWeb() {
        $request = Yii::app()->request;
        try {
            $book_id = $request->getQuery('book_id');
            $model = Books::model()->findByAttributes(array('id' => $book_id));
            if ($model->delete()) {
                Yii::app()->user->setFlash('message_ss', "Delete success !!");
                $this->redirect(Yii::app()->createUrl('book/index'));
            } else {
                Yii::app()->user->setFlash('message_err', "Server Error :(");
                $this->redirect(Yii::app()->createUrl('book/index'));
            }
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionList() {
        $request = Yii::app()->request;
        try {
            $limit = $request->getQuery('limit');
            $offset = $request->getQuery('offset');
            $data = Books::model()->listBookWithLimitOffset($limit, $offset);
            ResponseHelper::JsonReturnSuccess($data, "Success");
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }

    public function actionSearch() {
        $request = Yii::app()->request;
        try {
            $query = $request->getQuery('query');
            $limit = $request->getQuery('limit');
            $offset = $request->getQuery('offset');
            $data = Books::model()->searchBooks($query, $limit, $offset);
            ResponseHelper::JsonReturnSuccess($data, "Success");
            
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
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
