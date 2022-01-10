<?php
/*
namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Customer;

/**
 * customer represents the model behind the search form of `frontend\models\Customer`.
 *//*
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     *//*
    public function rules()
    {
        return [
            [['cust_id', 'lead_id', 'plan_id'], 'integer'],
            [['cust_username', 'cust_password', 'acc_details'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     *//*
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
     *//*
    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

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
            'cust_id' => $this->cust_id,
            'lead_id' => $this->lead_id,
            'plan_id' => $this->plan_id,
        ]);

        $query->andFilterWhere(['like', 'cust_username', $this->cust_username])
            ->andFilterWhere(['like', 'cust_password', $this->cust_password])
            ->andFilterWhere(['like', 'acc_details', $this->acc_details]);

        return $dataProvider;
    }
}*/




namespace frontend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $cust_id
 * @property string|null $cust_username
 * @property string|null $cust_password
 * @property string|null $acc_details
 * @property int|null $lead_id
 * @property int|null $plan_id
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
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
    public function attributeLabels()
    {
        return [
            'cust_id' => 'Customer ID',
            'cust_name' => 'Customer Username',
            'lead_id' => 'Lead ID',
            'plan_id' => 'Plan Name',
        ];
    }

    public function getPlan() {
        return $this->hasOne(Plan::className(), ['plan_id' => 'plan_id']);
    }

    public function getLeads() {
        return $this->hasOne(Leads::className(), ['lead_id' => 'lead_id']);
    }
}
