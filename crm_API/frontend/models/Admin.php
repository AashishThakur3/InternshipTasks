<?php

namespace frontend\models;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $admin_id
 * @property string $username
 * @property string $password
 * @property string|null $email
 */
class Admin extends \yii\db\ActiveRecord { 
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }
}
