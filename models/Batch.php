<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "batch".
 *
 * @property integer $id
 * @property string $name
 * @property Part[] $parts
 */
class Batch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Вид упаковки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParts()
    {
        return $this->hasMany(Part::className(), ['batch_id' => 'id']);
    }
}
