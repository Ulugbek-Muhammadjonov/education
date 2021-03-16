<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "abitur".
 *
 * @property int $id
 * @property string $fullname
 * @property string $parentname
 * @property string|null $phoneself
 * @property string $phoneparent
 * @property string|null $socials
 * @property int $region_id
 * @property int $district_id
 * @property int $quarter_id
 * @property string $bitrhfull
 * @property string|null $image
 * @property int $created_at
 * @property string $gender
 * @property string $group_id
 */
class Abitur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abitur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'parentname', 'phoneparent', 'region_id', 'district_id', 'quarter_id', 'bitrhfull', 'created_at', 'gender', 'group_id'], 'required'],
            [['region_id', 'district_id', 'quarter_id', 'created_at'], 'integer'],
            [['fullname'], 'string', 'max' => 50],
            [['parentname'], 'string', 'max' => 30],
            [['phoneself', 'phoneparent'], 'string', 'max' => 14],
            [['socials'], 'string', 'max' => 20],
            [['bitrhfull', 'gender'], 'string', 'max' => 10],
            [['image'], 'string', 'max' => 70],
            [['group_id'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Fullname'),
            'parentname' => Yii::t('app', 'Parentname'),
            'phoneself' => Yii::t('app', 'Phoneself'),
            'phoneparent' => Yii::t('app', 'Phoneparent'),
            'socials' => Yii::t('app', 'Socials'),
            'region_id' => Yii::t('app', 'Region ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'quarter_id' => Yii::t('app', 'Quarter ID'),
            'bitrhfull' => Yii::t('app', 'Bitrhfull'),
            'image' => Yii::t('app', 'Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'gender' => Yii::t('app', 'Gender'),
            'group_id' => Yii::t('app', 'Group ID'),
        ];
    }
    public function getParent(){

        return $this->hasOne(Parentabitur::className(),
        [
            'id' => 'abitur_id'
        ]);
    }
    public function getRegion(){

        return $this->hasOne(Regions::className(),
        [
            'id' => 'region_id',
        ]);
    }
    public function getDistrict(){

        return $this->hasOne(Districts::className(),
        [
            'id' => 'district_id',
        ]);
    }
    public function getQuarter(){

        return $this->hasOne(Quarters::className(),
        [
            'id' => 'quarter_id',
        ]);
    }

}
