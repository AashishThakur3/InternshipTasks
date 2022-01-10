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
class CustomerSearch extends Customer
{
    /**
     * {@inheritdoc}
     */
    public $plan_name;
    public $lead_name;
    public function rules()
    {
        return [
            [['cust_name','lead_id', 'plan_id'], 'required'],
            [['lead_id', 'plan_id'], 'integer'],
            [['cust_name'], 'string', 'max' => 30],
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
         'searchModel' => 'frontend\models\CustomerFilter'
      ]);
      
         $filterCondition = null;
      

    if ($filter->load(\Yii::$app->request->get())) { 
        $filterCondition = $filter->build();
       if ($filterCondition === false) {

     return $filter;
      }
       }
       
      $query = Customer::find();
        // add join query
        $query->joinWith(['plan', 'leads']);
        $query->andFilterWhere([
            'plan.plan_name' => $this->plan_name,
            'lead.lead_name' => $this->lead_name, 
        ]);
      
     
       if ($filterCondition !== null) {
    $query->andWhere($filterCondition);
    }
    //  echo $query->createCommand()->rawSql;
    //    die;
    
  return new ActiveDataProvider([
  'query' => $query,
]);
        $this->load($params);
        $query = Customer::find();
      

        // $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        // ]);

        $dataProvider->setSort([
            'attributes' => [
                'cust_id',
                'cust_name',
                'plan_name' => [
                    'asc' => ['plan_name' => SORT_ASC],
                    'desc' => ['plan_name' => SORT_DESC],
                    'label' => 'Plan Name',
                    'default' => SORT_ASC
                ],
                'lead_name' => [
                    'asc' => ['lead_name' => SORT_ASC],
                    'desc' => ['lead_name' => SORT_DESC],
                    'label' => 'Lead Name',
                    'default' => SORT_ASC
                ]],
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cust_id' => $this->cust_id,
           
        ]);

        $query->andFilterWhere(['like', 'cust_name', $this->cust_name]);

        return $dataProvider;
    }

    public function getPlan() {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }

    public function getLeads() {
        return $this->hasOne(Leads::className(), ['lead_id' => 'lead_id']);
    }
    
}
