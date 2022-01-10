<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Plan;
use frontend\models\Lead;

/* @var $this yii\web\View */
/* @var $model frontend\models\Leads */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leads-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lead_name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <?= $form->field($model, 'plan_id')->dropDownList(
                                            Plan::find()
                                            ->select(['plan_name','plan_id'])
                                            ->indexBy('plan_id')
                                            ->column(),['prompt' => 'select Plan']
                                            ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
