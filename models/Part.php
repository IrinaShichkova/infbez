<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "part".
 *
 * @property integer $id
 * @property string $number
 * @property integer $end
 * @property integer $yes
 * @property string $amount
 * @property integer $batch_time
 * @property integer $weight
 * @property integer $batch_id
 * @property integer $seed_id
 * @property Batch $batch
 * @property Seed $seed
 * @property Sales[] $sales
 */
class Part extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'end', 'amount', 'batch_time', 'weight', 'batch_id', 'seed_id'], 'required'],
            [['number', 'amount'], 'number'],
            [['end', 'yes', 'weight', 'batch_id', 'seed_id'], 'integer'],
            [['batch_time'], 'string'],
            [['batch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Batch::className(), 'targetAttribute' => ['batch_id' => 'id']],
            [['seed_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seed::className(), 'targetAttribute' => ['seed_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер партии',
            'end' => 'Годен до',
            'yes' => 'Одобрен инспекцией',
            'amount' => 'Количество семян в упаковке',
            'batch_time' => 'Дата расфасовки',
            'weight' => 'Вес семян в упаковке',
            'batch_id' => 'Вид упаковки',
            'seed_id' => 'Номер сорта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatch()
    {
        return $this->hasOne(Batch::className(), ['id' => 'batch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeed()
    {
        return $this->hasOne(Seed::className(), ['id' => 'seed_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['part_id' => 'id']);
    }

    public function getDateStr()
    {
        return null === $this->batch_time ? '' : date('d.m.Y', $this->batch_time);
    }

    public function setDateStr($value)
    {
        $date = \DateTime::createFromFormat('d.m.Y', $value);
        $this->batch_time = $date->getTimestamp();
    }

}
