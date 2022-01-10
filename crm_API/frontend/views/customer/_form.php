<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cust_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cust_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acc_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lead_id')->textInput() ?>

    <?= $form->field($model, 'plan_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
