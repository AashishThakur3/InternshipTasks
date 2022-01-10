<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Leads;
use frontend\models\Plan;
use yii\data\ActiveDataFilter;
// use app\models\LeadSearch;
use frontend\models\LeadFilter;

class LeadSearch extends Leads
{
    public function rules()
    {
        return [
            [['lead_id'], 'integer'],
            [['lead_name', 'created_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    
    public function search($params)
    {
        // $this->load($params);
        // add conditions that should always apply here
        $filter = new ActiveDataFilter([
            'searchModel' => 'frontend\models\LeadFilter'
         ]);
         
            $filterCondition = null;
         
   
       if ($filter->load(\Yii::$app->request->get())) { 
           $filterCondition = $filter->build();
          if ($filterCondition === false) {
   
        return $filter;
         }
          }
          
         $query = Leads::find();
           // add join query
           $query->joinWith(['plan']);
    //        $query->andFilterWhere([
      
    // 'plan.plan_name' => $this->plan_name,
              
    //        ]);
         
        
          if ($filterCondition !== null) {
       $query->andWhere($filterCondition);
       }
       //  echo $query->createCommand()->rawSql;
       //    die;
       
//      return new ActiveDataProvider([
//      'query' => $query,
//    ]);
           $this->load($params);
           $query = Leads::find();
         
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'lead_id' => $this->lead_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'lead_name', $this->lead_name]);

        return $dataProvider;
    }
}
