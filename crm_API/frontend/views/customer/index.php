<?php

use yii\helpers\Html;
use yii\grid\GridView;

//echo '<prev>';
//print_r($dataProvider->getModels()[0]);
//die; 

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\customer */
/* @var $dataProvider yii\data\ActiveDataProvider */

//echo '<prev>';
//print_r($dataProvider->getModels()[0]);
// die; 

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
				// 'layout' => '{sorter}{summary}{items}',
        'columns' => [
            'cust_id',
            'cust_name',
           // 'lead_id',
            //'plan_id', 
            [
                'attribute'=>'plan_name',
                'value'=>'plan.plan_name'
            ],
            [
                'attribute'=>'lead_name',
                'value'=>'leads.lead_name'
            ],
            ['class' => 'yii\grid\ActionColumn'],	  
						
        ],
    ]); ?>

    


</div>
