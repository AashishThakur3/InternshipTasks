<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use frontend\models\Admin;
use frontend\models\TaskSearch;
use frontend\models\TaskFilter;
use frontend\models\Task;

use yii\rest\ActiveController;

class AdminController extends ActiveController
{ 
  public $modelClass = 'frontend\models\TaskSearch';
  
  public function actions()
    {
      $actions = parent::actions();
      unset($actions['index']);
      unset($actions['create']);
      unset($actions['delete']);
      unset($actions['update']);
     
  
      //return $actions;  
    }

  public function actionIndex(){
    $activeData = new ActiveDataProvider([
      'query'=>Task::find(),
      'pagination' => [
        'defaultPageSize' => 2,
      ],
    ]);
    
 
    $searchModel = new TaskSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);

    return $activeData;

  }

  public function actionCreate() {
    
    $task = new Task();
    if ($task->load(Yii::$app->getRequest()->getBodyParams(), '')){
     // echo $task->emp_id;
    if ($task->task_name==" ") {
      echo "Please enter task name";
    }
      $task->save();
      echo "working";
    }
  }
  
public function actionDelete($id) {
    
  //$task = $this->findModel($id);
  $task = Task::findOne($id);
 
  if ($task->delete() == true) {
    echo "Deleted Successfully";
  }
  else {
    echo "Could not delete successfully";
  }
}

  public function actionUpdate($id) {
    $task = Task::findOne($id);

    if($task->load(Yii::$app->getRequest()->getBodyParams(),'')) 
    {
        $task->save();
     
      echo $task->emp_id;
        return "Edited sucessfully";
    }
        return "Edition falied.. try again";
}


public function serializePagination($pagination)
    {
        return [
            $this->linksEnvelope => Link::serialize($pagination->getLinks(true)),
            $this->metaEnvelope => [
                'totalCount' => $pagination->totalCount,
                'pageCount' => $pagination->getPageCount(),
                'currentPage' => $pagination->getPage() + 1,
                'perPage' => $pagination->getPageSize(),
            ],
        ];
    }


  
  /*
    public function actionIndex()
    {
      /*
      $query = Task::find()->addOrderBy('task_id');
      $dataProvider = new ActiveDataProvider([
        'query' => $query,
      ]);
        return $this->render('index',[
          'dataProvider' => $dataProvider,
        ]);

        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    

    public function actionCreate(){
      $task = new Task();
      if ($task->load(Yii::$app->request->post())) {
        $task->save();
        return $this->redirect(['index']);
      }
      return $this->render('create',['task'=>$task]);
    }

    public function actionUpdate($id)
    {
      $task = Task::findOne($id);
      if ($task->load(Yii::$app->request->post()) && $task->save()) {
        return $this->redirect(['index','id'=>$task->task_id]);
      }
      return $this->render('update',['task'=>$task]);
    }

    public function actionDelete($id)
    {
      $task = Task::findOne($id)->delete();
      if ($task) {
        return $this->redirect(['index']);
      }
    }

   

    /*public function getEmployeeName() {
      return $this -> admin_employee -> emp_name;
       }*/

    //    public function relations() {
    //     return array(
    //         'employee' => array(self::BELONGS_TO, 'Employee Name', 'emp_name'),
    //     );
    // }*/


}
