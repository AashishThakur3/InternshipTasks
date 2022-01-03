<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Products;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex() {
        $query = Products::find()->addOrderBy('id');

        $dataProvider = new ActiveDataProvider([
            'pagination' => ['pageSize'=>5],
            'query' => $query,
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id) {
        $prooducts = Products::find()
                   ->where(['id' => $id ])
                   ->one();
   
           return $this->render('view', ['products' => $products] );
       }

    public function actionCreate() {
        $products = new Products();
        if ($products->load(Yii::$app->request->post())) {
            if ($products->validate()) {
                $products->save();

                yii::$app->getSession()->setFlash('success','Product added successfully');
                return $this->redirect('index.php?r=products');
            }
        }
        return $this->render('create', ['products' => $products]);
    }

    public function actionUpdate($id) {
        $products = Products::findOne($id);
        if($products->load(Yii::$app->request->post()) && $products->save()) {
          
            yii::$app->getSession()->setFlash('success','Product Updated successfully');
            return $this->redirect(['index', 'id' => $products->id]);
        }
        return $this->render('update',['products'=>$products]);
    }

    public function actionDelete($id){
        $products = Products::findOne($id)->delete();
        if($products) {
        yii::$app->getSession()->setFlash('success','Product Deleted successfully');
          return $this->redirect(['index']);
        }
    }

}
