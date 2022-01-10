<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Plan;
use frontend\models\PlanSearch;
use yii\rest\ActiveController;
use yii\data\Pagination;

class PlanController extends ActiveController
{
  public $modelClass = Plan::class;
  public function actions()
  {
    $actions = parent::actions();
    $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
    unset($actions['index'],$actions['view'],$actions['update'],$actions['create'],$actions['delete']);

    return $actions;
  }

  public function actionIndex(){
    return Plan::find()->all();
    $activeData = new ActiveDataProvider([
     'query'=>Plan::find(),
     'pagination' => [
       'defaultPageSize' => 1,
     ],
   ]);
   
   $searchModel = new PlanSearch();
   $dataProvider = $searchModel->search($this->request->queryParams);

   return $activeData;
 }

  public function actionView($id){
    echo "working..";
    return Plan::findOne($id);
  }

  public function actionCreate(){
    $plan = new Plan();
    if ($plan->plan_name=""||$plan_data=""||$validity=""||$price="") {
      echo "Please Input all the fields";
    }else{
      $plan->load(Yii::$app->getRequest()->getBodyParams(),'');
      // if ($plan->load(Yii::$app->request->post()->getBodyParams(),'')) {
        $plan->save();
      // }
      return $plan;
      // echo $plan->plan_name;
    }
  }

  public function actionUpdate($id){
    $plan = Plan::findOne($id);
    if ($plan->plan_name=""||$plan_data=""||$validity=""||$price="") {
      echo "Please Input all the fields";
    }else{
      $plan->load(Yii::$app->getRequest()->getBodyParams(),'');
      $plan->save();
      return $plan;
    }

  }

  public function actionDelete($id){
    return Plan::findOne($id)->delete();
  }


}
