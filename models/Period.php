<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "period".
 *
 * @property integer $id
 * @property string $time
 * @property Seed[] $seeds
 */
class Period extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'period';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'required'],
            [['time'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Срок созревания',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeeds()
    {
        return $this->hasMany(Seed::className(), ['period_id' => 'id']);
    }
}
