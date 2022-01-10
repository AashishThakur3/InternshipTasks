<?php

namespace frontend\controllers;
use Yii;
use yii\rest\ActiveController;
use frontend\models\Leads;
use frontend\models\Customer;
use frontend\models\LeadSearch;
// use app\models\LeadSearch;
use frontend\models\Plan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\LeadFilter;
use yii\data\ActiveDataProvider;

class LeadController extends ActiveController{
 
  public $modelClass = 'frontend\models\LeadSearch';
    
  public function actions()
    {
      $actions = parent::actions();
      unset($actions['index']);
      unset($actions['create']);
  
      return $actions;  
    }

  public function actionIndex(){
      
    $searchModel = new LeadSearch();
    $dataProvider = $searchModel->search($this->request->queryParams);
  
    return $dataProvider;
    
  }
 
    public function actionCreate() {
    
        $leads = new Leads();
        if ($leads->load(Yii::$app->getRequest()->getBodyParams(), '')){
         
            if ($leads->validate()) {
                $leads->save();
                echo "working";
              }
            }
        }
        public function actionUpdate($id) {
    
        
            $leads = Leads::findOne($id);
            if ($leads->load(Yii::$app->getRequest()->getBodyParams(), '')){
              $leads->save();
              echo "Lead Updated Successfully";
            }
          
            else {
              echo "Update unsuccessful";
            }
          }

          public function actionDelete($id) {
    
            $leads = Leads::findOne($id);
            
            if ($leads->delete() == true) {
              return "Lead Deleted Successfully";
            }
            else {
                return "Lead not deleted";
            }
          
        
        }

    }

