<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use frontend\models\AdminEmployee;
use frontend\models\EmployeeSearch;
use yii\rest\ActiveController;
use frontend\models\EmployeeFilter;

class EmployeeController extends ActiveController
{

//   public $modelClass = 'app\models\EmployeeSearch';


//   public function actions()
//  {
//  $actions = parent::actions();
//  unset($actions['index']);
//  return $actions; 
//  }
  
  
//     public function actionCreate()
//     {
//       $admemp = new AdminEmployee();
//       if ($admemp->load(Yii::$app->request->post())) {
//         $admemp->save();
//         return $this->redirect(['index']);
//       }
//         return $this->render('create',['admemp'=>$admemp]);
//     }

//     public function actionDelete($id)
//     {
//       $admemp = AdminEmployee::findOne($id)->delete();
//       if ($admemp) {
//         return $this->redirect(['index']);
//       }
//         return $this->render('delete');
//     }

//     public function actionUpdate($id)
//     {
//       $admemp = AdminEmployee::findOne($id);
//       if ($admemp->load(Yii::$app->request->post()) && $admemp->save()) {
//         return $this->redirect(['index','id'=>$admemp->emp_id]);
//       }
//         return $this->render('update',['admemp'=>$admemp]);
//     }

//     public function actionIndex()
//     {
//       /*
//       $query = AdminEmployee::find()->addOrderBy('emp_id');
//       $dataProvider = new ActiveDataProvider([
//         'query'=>$query,
//       ]);
//         return $this->render('index',[
//           'dataProvider' => $dataProvider,
//         ]);*/

//         $searchModel = new EmployeeSearch();
//         $dataProvider = $searchModel->search($this->request->queryParams);

//         return $this->render('index', [
//             'searchModel' => $searchModel,
//             'dataProvider' => $dataProvider,
//         ]);
//     }

public $modelClass = 'frontend\models\EmployeeSearch';

 public function actions()
 {
 $actions = parent::actions();
 unset($actions['index']);
 unset($actions['create']);
 unset($actions['delete']);
 unset($actions['update']);
// return $actions; 
 }

 public function actionIndex(){

 $searchModel = new EmployeeSearch();
$dataProvider = $searchModel->search($this->request->queryParams);
return $dataProvider;

}

public function actionCreate() {
    
    $employee = new AdminEmployee();
    if($employee->emp_name=""||$emp_email=""||$emp_phone=""||$emp_pass=""){
      echo "Please enter all field details";
    }
    else 
    {
      $employee->load(Yii::$app->getRequest()->getBodyParams(), '');
     $employee->save();
     //return $employee;
    }
      
    
}


public function actionDelete($id) {
    $employee = AdminEmployee::findOne($id);
    
    if ($employee->delete() == true) {
      return "Deleted Successfully";
    }
    else {
        return "Could not delete successfully";
    }
  
}

public function actionUpdate($id) {
  $employee = AdminEmployee::findOne($id);

  if($employee->load(Yii::$app->getRequest()->getBodyParams(),'')) 
  {
      if ($employee->save())
      {
        return "Edited sucessfully";
      }
      
  }
      return "Edition falied.. try again";
}
    
}