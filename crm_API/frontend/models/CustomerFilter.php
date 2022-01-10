<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Customer;
use frontend\models\Plan;
use frontend\models\Leads;
use frontend\models\CustomerSearch;

/**
 * LeadSearch represents the model behind the search form of `frontend\models\Leads`.
 */
class CustomerFilter extends Customer
{

    public $plan_name;
    public $lead_name;
    public $cust_name;
    public $cust_id;
    public $lead_id;
    public function rules()
    {
        return [
            [['cust_id','cust_name','lead_id', 'plan_id'], 'required'],
            [['lead_id', 'plan_id'], 'integer'],
            [['cust_name'], 'string', 'max' => 30],
        ];
    }

   
}
