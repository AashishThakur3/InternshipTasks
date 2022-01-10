<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AdminEmployee;
use yii\data\ActiveDataFilter;

/**
 * EmployeeSearch represents the model behind the search form of `frontend\models\AdminEmployee`.
 */
class EmployeeSearch extends AdminEmployee
{
    /**
     * {@inheritdoc}
     */
    
    public function rules()
    {
        return [
            [['emp_id'], 'integer'],
            [['emp_name', 'emp_email', 'emp_email', 'emp_phone', 'created_at'], 'safe'],
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
           'searchModel' => 'frontend\models\EmployeeFilter'
              ]);
           
           $filterCondition = null;
           
           if ($filter->load(\Yii::$app->request->get())) { 
            $filterCondition = $filter->build();
             if ($filterCondition === false) {
           
           return $filter;
            }
            }
           
            $query = AdminEmployee::find();
            // add join query
        //    $query->joinWith(['genre']);
           
          if ($filterCondition !== null) {
           $query->andWhere($filterCondition);
           }
            // echo $query->createCommand()->rawSql;
            // die;
             
            return new ActiveDataProvider([
             'query' => $query,
           ]);





        // $query = AdminEmployee::find();

        // // add conditions that should always apply here

        // $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        // ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'emp_id' => $this->emp_id,
            'emp_email' => $this->emp_email,
            'emp_phone' => $this->emp_phone,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'emp_name', $this->emp_name]);

        return $dataProvider;
    }
}
