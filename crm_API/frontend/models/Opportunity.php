<?php




namespace frontend\models;

use Yii;

class Opportunity extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'opportunity';
    }

 
    public function rules()
    {
        return [
            [['lead_id',], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'opportunity_id' => 'Opportunity ID',
            'lead_id' => 'Lead ID',
        ];
    }

    public function getLeads() {
        return $this->hasOne(Leads::className(), ['lead_id' => 'lead_id']);
    }
}
