<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
$this->title = 'Plans';

?>

<h1 class ="page-header">Plans </h1>


<a class ="btn btn-primary float-right" href="Yii_php/crm1/frontend/web/index.php"> Cancel </a> </h1> <br>  </h1> <br>

<?php 
$msg = yii::$app->getSession() -> getFlash('success');
if(null !==$msg) :?>
<div class="alert alert-success"> <?= $msg; ?></div>
<?php endif; ?>



<div class="row" >

<?=Html::beginForm(['transjournal/bulk'],'post');?>

<?=GridView::widget([
   'dataProvider' => $dataProvider,
    'columns' => [
  
    'plan_id',
    'plan_name',
    'validity',
    'plan_data',
    'price',
    ],
  ]);
?>

<?= Html::endForm();?> 


</div>







