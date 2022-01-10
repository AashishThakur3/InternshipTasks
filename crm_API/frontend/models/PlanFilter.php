<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Plan;


class PlanFilter extends Plan
{
    public $plan_id;
    public $plan_name;
    public $validity;
    public $plan_data;
    public $price;

    public function rules()
    {
        return [
            [['plan_id'], 'integer'],
            [['plan_name', 'validity', 'plan_data', 'price'], 'safe'],
        ];
    }

}