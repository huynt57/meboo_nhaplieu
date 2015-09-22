<?php

Yii::import('application.models._base.BaseBooks');

class Books extends BaseBooks {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getBooksForWeb()
    {
        $criteria = new CDbCriteria;
        $criteria->select = "*";
        $criteria->order = "id ASC";        
        $data = Books::model()->findAll($criteria);
        return $data;
    }

    public function listBookWithLimitOffset($limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->order = 'id DESC';
        $result = Books::model()->findAll($criteria);
        return $result;
    }

    public function addBook($book_name, $book_author, $book_year, $book_publisher, $book_image, $book_description) {
        $model = new Books;
        $model->book_name = $book_name;
        $model->book_author = $book_author;
        $model->book_year = $book_year;
        $model->book_publisher = $book_publisher;
        $model->book_image = $book_image;
        $model->created_at = time();
        $model->updated_at = time();
        $model->status = 1;
        $model->book_description = $book_description;
        if ($model->save(FALSE)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateBook($book_id, $book_name, $book_author, $book_year, $book_publisher, $book_image, $book_description) {
        $model = Books::model()->findByAttributes(array('id' => $book_id));
        if ($model) {
            if (!empty($book_name)) {
                $model->book_name = $book_name;
            }
            if (!empty($book_author)) {
                $model->book_author = $book_author;
            }
            if (!empty($book_year)) {
                $model->book_year = $book_year;
            }
            if (!empty($book_publisher)) {
                $model->book_publisher = $book_publisher;
            }
            if (!empty($book_image)) {
                $model->book_image = $book_image;
            }
            if (!empty($book_description)) {
                $model->book_description = $book_description;
            }
            $model->updated_at = time();
            if ($model->save()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function searchBooks($query, $limit, $offset) {
        $result_by_name = $this->searchByName($query, $limit, $offset);
        $result_by_author = $this->searchByAuthor($query, $limit, $offset);
        $result_by_pub = $this->searchByPublisher($query, $limit, $offset);
        $result_by_des = $this->searchByDescription($query, $limit, $offset);
        $result_by_year = $this->searchByYear($query, $limit, $offset);
        return array('result_by_name' => $result_by_name, 'result_by_author' => $result_by_author, 'result_by_pub' => $result_by_pub, 'result_by_des' => $result_by_des, 'result_by_year' => $result_by_year);
    }

    public function searchByName($query, $limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->addSearchCondition('book_name', $query);
        $result = Books::model()->findAll($criteria);
        return $result;
    }

    public function searchByAuthor($query, $limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->addSearchCondition('book_author', $query);
        $result = Books::model()->findAll($criteria);
        return $result;
    }

    public function searchByPublisher($query, $limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->addSearchCondition('book_publisher', $query);
        $result = Books::model()->findAll($criteria);
        return $result;
    }

    public function searchByDescription($query, $limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->addSearchCondition('book_description', $query);
        $result = Books::model()->findAll($criteria);
        return $result;
    }

    public function searchByYear($query, $limit, $offset) {
        $criteria = new CDbCriteria;
        $criteria->limit = $limit;
        $criteria->offset = $offset;
        $criteria->addSearchCondition('book_year', $query);
        $result = Books::model()->findAll($criteria);
        return $result;
    }
    
    public function detailBook($book_id)
    {
        $data = Books::model()->findByAttributes(array('id' => $book_id));
        return $data;
    }

}
