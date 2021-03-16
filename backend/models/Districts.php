<?php

namespace backend\models;

use backend\models\Regions;
use backend\models\Abitur;
use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property int $region_id
 * @property string|null $name_uz
 * @property string|null $name_oz
 * @property string|null $name_ru
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'required'],
            [['region_id'], 'integer'],
            [['name_uz', 'name_oz', 'name_ru'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'name_uz' => Yii::t('app', 'Name Uz'),
            'name_oz' => Yii::t('app', 'Name Oz'),
            'name_ru' => Yii::t('app', 'Name Ru'),
        ];
    }

    public function getRegion(){

        return $this->hasOne(Regions::className(),
        [
            'id' => 'region_id',
        ]);
    }
    public function getAbitur(){

        return $this->hasMany(Abitur::className(),
        [
            'district_id' => 'id',
        ]);
    }
}
