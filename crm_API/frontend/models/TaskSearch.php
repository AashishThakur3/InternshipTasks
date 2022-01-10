<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ActiveDataFilter;
use frontend\models\Admin;
use frontend\models\Task;
use frontend\models\TaskFilter;
use frontend\models\AdminEmployee;

class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public $emp_name;
    public function rules()
    {
        return [
            [['task_id', 'emp_id'], 'integer'],
            [['emp_id','task_name', 'task_desc', 'start_date', 'emp_name'], 'safe'],
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
            'searchModel' => 'frontend\models\TaskFilter'
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
        $this->load($params);
        $query = Task::find();
    // add join query
        $query->joinWith(['adminEmployee']);
        $query->andFilterWhere([
            'admin_employee.emp_name' => $this->emp_name,
            
        ]);
       
    
        if ($filterCondition !== null) {
            $query->andWhere($filterCondition);
        }
        /*
       echo  $query->createCommand()->rawSql;
        die;*/
        
        $dataProvider= new ActiveDataProvider([
            'query' => $query,
        ]);

        /*
        $this->load($params);
        $query = Task::find();
        
       $query->joinWith(['adminEmployee']);
    
       $query->andFilterWhere([
        'admin_employee.emp_name' => $this->emp_name,
        
    ]);
      

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);*/

        $dataProvider->setSort([
            'attributes' => [
                'task_id',
                'task_name',
                'task_desc',
                'start_date',
                'emp_id',
                'emp_name' => [
                    'asc' => ['emp_name' => SORT_ASC],
                    'desc' => ['emp_name' => SORT_DESC],
                    'label' => 'Employee Name',
                    'default' => SORT_ASC
                ]],
        ]);

        //$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'task_id' => $this->task_id,
            'start_date' => $this->start_date,
        ]);

        $query->andFilterWhere(['like', 'task_name', $this->task_name]);

        return $dataProvider;
    }

    public function getAdminEmployee() {
        return $this->hasOne(AdminEmployee::className(), ['emp_id' => 'emp_id']);
    }
}
