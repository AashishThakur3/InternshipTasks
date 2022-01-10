<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Customer;
use frontend\models\Plan;
use frontend\models\Leads;
use frontend\models\CustomerFilter;
use yii\data\ActiveDataFilter;
/**
 * LeadSearch represents the model behind the search form of `frontend\models\Leads`.
 */
class OpportunitySearch extends Opportunity
{
    /**
     * {@inheritdoc}
     */
    public $lead_name;
    public function rules()
    {
        return [
            [['opportunity_id', 'lead_id', 'plan_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        
       $filter = new ActiveDataFilter([
         'searchModel' => 'app\models\OpportunityFilter'
      ]);
      
         $filterCondition = null;
      

    if ($filter->load(\Yii::$app->request->get())) { 
        $filterCondition = $filter->build();
       if ($filterCondition === false) {

     return $filter;
      }
       }
       
      $query = Opportunity::find();
        // add join query
        $query->joinWith(['leads']);
        $query->andFilterWhere([
            'lead.lead_name' => $this->lead_name, 
        ]);
      
     
       if ($filterCondition !== null) {
    $query->andWhere($filterCondition);
    }

    
  return new ActiveDataProvider([
  'query' => $query,
]);
        $this->load($params);
        $query = Opportunity::find();
      

        $dataProvider->setSort([
            'attributes' => [
                'opportunity_id',
                'lead_name' => [
                    'asc' => ['lead_name' => SORT_ASC],
                    'desc' => ['lead_name' => SORT_DESC],
                    'label' => 'Lead Name',
                    'default' => SORT_ASC
                ]],
        ]);


        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'opportunity_id' => $this->opportunity_id,
           
        ]);

        // $query->andFilterWhere(['like', 'cust_name', $this->cust_name]);

        // return $dataProvider;
    }


    public function getLeads() {
        return $this->hasOne(Leads::className(), ['lead_id' => 'lead_id']);
    }
    
}
