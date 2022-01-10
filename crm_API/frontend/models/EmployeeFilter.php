<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AdminEmployee;

/**
 * EmployeeSearch represents the model behind the search form of `frontend\models\AdminEmployee`.
 */
class EmployeeFilter extends AdminEmployee
{
    
    public $emp_id;
    public $emp_name;
    public $emp_email;
    public $emp_phone;
    public $created_at;

    public function rules()
    {
        return [
            [['emp_id'], 'integer'],
            [['emp_name', 'emp_email', 'emp_email', 'emp_phone', 'created_at'], 'safe'],
        ];
    }

}
