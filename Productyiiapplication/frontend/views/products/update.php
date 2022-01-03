<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
        <div class="row justify-content-center">
            <div class="card">
              <div class="card-header card bg-primary text-white">Edit Product</div>
                <div class ="body-content">
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="form-group">
                    <?= $form->field($products,'name'); ?> 
            </div>
        </div>

        <div class="row">
        <div class="form-group">
            
            <?= $form->field($products,'description'); ?>
            
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            
            <?= $form->field($products,'price'); ?>
            
        </div>
        </div>

        <div class="row">
        <div class="form-group">
    
            <?= $form->field($products,'quantity'); ?>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <?= Html::submitButton('Update',['class'=>'btn btn-success']); ?>
            <?= Html::a('Cancel', ['index'], ['class'=>'btn btn-danger']) ?>
        </div>
        </div>

        <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
</div>
</div>