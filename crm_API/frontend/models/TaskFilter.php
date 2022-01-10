<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Admin;
use frontend\models\Task;
use frontend\models\TaskFilter;
use frontend\models\AdminEmployee;

class TaskFilter extends Task
{
    /**
     * {@inheritdoc}
     */
    public $emp_name;
    public $task_id;
    public $task_name;
    public $task_desc;
    public $start_date;

    public function rules()
    {
        return [
            [['task_id', 'emp_id'], 'integer'],
            [['emp_id','task_name', 'task_desc', 'start_date', 'emp_name'], 'safe'],
        ];
    }

}
