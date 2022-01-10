<?php

    namespace frontend\controllers;
    use Yii;
    use yii\rest\ActiveController;

    use frontend\models\OpportunitySearch;
    use frontend\models\Opportunity;
    use frontend\models\Customer;




    class OpportunityController extends ActiveController
    {
        public $modelClass = 'frontend\models\OpportunitySearch';
        
        public function actions()
        {
            $actions = parent::actions();
            unset($actions['index']);
            unset($actions['create']);   
            unset($actions['delete']);
            unset($actions['update']);
        }

        public function actionConvert($id)
        {
            try {
                $customer = new Customer();
                $customer->load(Yii::$app->getRequest()->getBodyParams(),'');
                $customer->opportunity_id = $id;
                $customer->save();
            } catch (\yii\db\Exception $e) {
                return "already exists!";
            }
        }

        public function actionIndex()
        {
    
            $searchModel = new OpportunitySearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
  
            return $dataProvider;

        }

        public function actionCreate() {
    
            $opportunity = new Opportunity();
            if ($opportunity->load(Yii::$app->getRequest()->getBodyParams(), '')){
             
             if ($opportunity->validate()) {
                $opportunity->save();
                echo "Customer Added successfully ";}
                  else{
                    echo " Not Added";
             }
            }
        }
 
        public function actionDelete($id)
        {
        $opportunity = Opportunity::findOne($id)->delete();
            if($opportunity) 
            {
                return "deleted successfully";
            }
            return "can not delete.. try later";
        }
        public function actionUpdate($id)
        {
          
            $opportunity = Opportunity::findOne($id);

            if($opportunity->load(Yii::$app->getRequest()->getBodyParams(),'')) 
            {
                $lead->save();
                return "Edited sucessfully";
            }
                return "Edition falied.. try again";
        }
    }   
?>