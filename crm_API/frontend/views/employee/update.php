<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdminEmployee */
/* @var $form ActiveForm */
?>
<div class="employee-update">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($admemp, 'emp_name') ?>
        <?= $form->field($admemp, 'emp_email') ?>
        <?= $form->field($admemp, 'emp_phone') ?>
        <?= $form->field($admemp, 'emp_pass') ?>
        <?= $form->field($admemp, 'created_at') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- employee-update -->
