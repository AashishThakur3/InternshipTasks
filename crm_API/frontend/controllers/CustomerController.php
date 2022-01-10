<?php

namespace frontend\controllers;

use frontend\models\Customer;
use frontend\models\CustomerSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\rest\ActiveController;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\lead;
use app\models\CustomerFilter;


class CustomerController extends ActiveController
{

    public $modelClass = 'app\models\CustomerSearch';
  
    public function actions()
      {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['delete']);
        unset($actions['update']);
        // return $actions;  
      }
      // public function actionIndex()
      // {
      //     $query = Article::find();
      //     $countQuery = clone $query;
      //     $pages = new Pagination(['totalCount' => $countQuery->count()]);
      //     $models = $query->offset($pages->offset)
      //         ->limit($pages->limit)
      //         ->all();
      
      //     return $this->render('index', [
      //          'models' => $models,
      //          'pages' => $pages,
      //     ]);
      // }
      
    public function actionIndex(){
        
      $searchModel = new CustomerSearch();
      $dataProvider = $searchModel->search($this->request->queryParams);
      return $dataProvider;
    }
    public function actionCreate() {
    
        $customer = new Customer();
        if ($customer->load(Yii::$app->getRequest()->getBodyParams(), '')){
         
        //  if ($customer->validate()) {
          if($customer->cust_name ==''){
            echo " Customer name missing";
          }
          elseif($customer->lead_id ==''){
            echo " lead ID missing";
          }
          elseif($customer->plan_id ==''){
            echo " Plan ID missing";
          }      else{
              echo "Customer Added successfully ";
              $customer->save();
            }
         //}
        }
    }
    
         public function actionUpdate($id) {
    
            $customer = Customer::findOne($id);
            if ($customer->load(Yii::$app->getRequest()->getBodyParams(), '')){
              if($customer->cust_name ==''){
                echo " Customer name missing";
              }
              elseif($customer->lead_id ==''){
                echo " lead ID missing";
              }
              elseif($customer->plan_id ==''){
                echo " Plan ID missing";
              }      else{
                  echo "Customer Added successfully ";
                  $customer->save();
                }
            
             }}


             public function actionDelete($id) {
    
                $customer = Customer::findOne($id);
                if($customer->cust_id ==''){
                  echo " Customer ID missing";
                }
               else{
                    echo "Customer Deleted successfully ";
                    $customer->delete()==true;
                  }
            
            }
  
    }