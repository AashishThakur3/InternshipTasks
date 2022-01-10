<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form ActiveForm */
?>
<div class="admin-Update">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($task, 'start_date') ?>
        <?= $form->field($task, 'task_name') ?>
        <?= $form->field($task, 'task_desc') ?>
        <?= $form->field($task, 'emp_id') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- admin-Update -->
