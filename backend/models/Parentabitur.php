<?php

namespace backend\models;

use backend\models\Abitur;
use Yii;

/**
 * This is the model class for table "parentabitur".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $abitur_id
 * @property int $created_at
 * @property int $status
 * @property string $token
 * @property string $fcm_token
 */
class Parentabitur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parentabitur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'abitur_id', 'created_at', 'status', 'token', 'fcm_token'], 'required'],
            [['created_at', 'status'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 20],
            [['abitur_id'], 'string', 'max' => 11],
            [['token', 'fcm_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'abitur_id' => Yii::t('app', 'Abitur ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
            'token' => Yii::t('app', 'Token'),
            'fcm_token' => Yii::t('app', 'Fcm Token'),
        
        ];
    }

    public function getAbitur(){

        return $this->hasMany(Abitur::className(),
        [
            'abitur_id' => 'id'
        ]);
    }
}
