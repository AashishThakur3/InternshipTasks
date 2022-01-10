<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\AdminEmployee;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form ActiveForm */
?>
<div class="admin-Create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($task, 'task_name') ?>
        <?= $form->field($task, 'task_desc') ?>
        <?= $form->field($task, 'start_date') ?>
        <?= $form->field($task, 'emp_id')->dropDownList(
                                            AdminEmployee::find()
                                            ->select(['emp_name','emp_id'])
                                            ->indexBy('emp_id')
                                            ->column(),['prompt' => 'select Employee']
                                            ); ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- admin-Create -->
