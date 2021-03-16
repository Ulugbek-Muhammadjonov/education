<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "socials".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $x_id
 * @property int $type_id
 * @property string $url
 */
class Socials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'socials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'x_id', 'type_id', 'url'], 'required'],
            [['created_at', 'x_id', 'type_id'], 'integer'],
            [['name', 'url'], 'string', 'max' => 50],
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
            'created_at' => Yii::t('app', 'Created At'),
            'x_id' => Yii::t('app', 'X ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'url' => Yii::t('app', 'Url'),
        ];
    }
}
