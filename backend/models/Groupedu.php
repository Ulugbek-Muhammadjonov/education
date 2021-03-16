<?php

namespace backend\models;

use backend\models\Abitur;
use Yii;

/**
 * This is the model class for table "groupedu".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $teacher_id
 * @property int $status
 * @property int $level_id
 * @property string|null $pay_summ
 * @property int|null $people_number
 */
class Groupedu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groupedu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'teacher_id', 'status', 'level_id'], 'required'],
            [['created_at', 'teacher_id', 'status', 'level_id', 'people_number'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['pay_summ'], 'string', 'max' => 20],
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
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'status' => Yii::t('app', 'Status'),
            'level_id' => Yii::t('app', 'Level ID'),
            'pay_summ' => Yii::t('app', 'Pay Summ'),
            'people_number' => Yii::t('app', 'People Number'),
        ];
    }
}
