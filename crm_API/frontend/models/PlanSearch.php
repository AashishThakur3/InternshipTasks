<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Plan;
use frontend\models\PlanFilter;

/**
 * PlanSearch represents the model behind the search form of `frontend\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id'], 'integer'],
            [['plan_name', 'validity', 'plan_data', 'price'], 'safe'],
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


    public function search($params)
    {
        $filter = new ActiveDataFilter([
            'searchModel' => 'frontend\models\PlanFilter'
        ]);
        
        $filterCondition = null;
        
        // You may load filters from any source. For example,
        // if you prefer JSON in request body,
        // use Yii::$app->request->getBodyParams() below:
        if ($filter->load(\Yii::$app->request->get())) { 
            $filterCondition = $filter->build();
            if ($filterCondition === false) {
                // Serializer would get errors out of it
                return $filter;
            }
        }

        $dataProvider= new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        $dataProvider->setSort([
            'attributes' => [
                'plan_id',
                'plan_name',
                'validity',
                'plan_data',
                'price'],
        ]);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        // grid filtering conditions
        $query->andFilterWhere([
            'plan_id' => $this->plan_id,
        ]);

        $query->andFilterWhere(['like', 'plan_name', $this->plan_name])
            ->andFilterWhere(['like', 'validity', $this->validity])
            ->andFilterWhere(['like', 'plan_data', $this->plan_data])
            ->andFilterWhere(['like', 'price', $this->price]);

        return $dataProvider;
    }
}
