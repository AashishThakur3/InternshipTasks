<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Leads;
use frontend\models\LeadSearch;
use frontend\models\Plan;

class LeadFilter extends Leads
{
    public $lead_id;
    public $lead_name;
    public $created_at;

    public function rules()
    {
        return [
            [['lead_id'], 'integer'],
            [['lead_name', 'created_at'], 'safe'],
        ];
    }

}