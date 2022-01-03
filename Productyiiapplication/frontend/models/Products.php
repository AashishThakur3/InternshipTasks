<?php 

    namespace app\models;

    use Yii;

    class Products extends \yii\db\ActiveRecord {

      
        public function rules() {
            return [
                [['name', 'description', 'price', 'quantity'],'required'],
                [['name', 'description', 'price', 'quantity'],'string','max' => 255]
            ];
        }

        public function attributeLabels(){
            return[
                'id' => 'ID',
                'name' => 'Name',
                'description' => 'Description',
                'price' => 'Price',
                'quantity' => 'Quantity',
                'created_at'=>'Created Date',
            ];
        }   
    }

?>