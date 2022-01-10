<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $plan_id
 * @property string|null $plan_name
 * @property string|null $validity
 * @property string|null $plan_data
 * @property string|null $price
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['plan_name', 'validity', 'plan_data'], 'string', 'max' => 30],
            // [['price'], 'string', 'max' => 15],
            [['plan_id','plan_name', 'validity', 'plan_data','price'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'plan_name' => 'Plan Name',
            'validity' => 'Validity',
            'plan_data' => 'Plan Data',
            'price' => 'Price',
        ];
    }

}
