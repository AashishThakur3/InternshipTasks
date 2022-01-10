<?php

namespace frontend\models;
// use app\models\LeadSearch;

use Yii;

class Leads extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'leads';
    }

    public function rules()
    {
        return [
            [['plan_id'], 'required'],
            [['plan_id'], 'integer'],
            [['created_at'], 'safe'],
            [['lead_name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'lead_id' => 'Lead ID',
            'lead_name' => 'Customer Name',
            'plan_id' => 'Plan ID',
            'created_at' => 'Created At',
        ];
    }

    public function getPlan(){
        return $this->hasOne(Plan::className(),['id'=>'plan_id']);
      }
}
