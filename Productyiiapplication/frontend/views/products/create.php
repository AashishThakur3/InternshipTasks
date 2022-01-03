<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
        <div class="page-header">
            <h2 class="page-title">Add Product</h2>
        </div>
        <div class="container">
        <?php $form = ActiveForm::begin() ?>

            <div class="form-group">
                    <?= $form->field($products,'name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?= $form->field($products,'description'); ?>
        </div>
        </div>

        <div class="form-group">
            <?= $form->field($products,'price'); ?>
        </div>
        </div>

        <div class="form-group">
            <?= $form->field($products,'quantity'); ?>
        </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Add',['class'=>'btn btn-primary']); ?>
        </div>
        </div>

        <?php ActiveForm::end() ?>
        </div>
    </div>
