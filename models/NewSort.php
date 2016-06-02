<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "new_sort".
 *
 * @property integer $id
 * @property integer $date
 * @property string $comment
 * @property integer $seed_id
 * @property Seed $seed
 */
class NewSort extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'new_sort';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateStr'], 'required'],
            [['date', 'seed_id'], 'integer'],
            [['comment', 'dateStr'], 'string'],
            //[['seed_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seed::className(), 'targetAttribute' => ['seed_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер нового сорта для тестирования',
            'dateStr' => 'Дата выведения нового сорта',
            'comment' => 'Примечания',
            'seed_id' => 'Уникальный номер сорта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeed()
    {
        return $this->hasOne(Seed::className(), ['id' => 'seed_id']);
    }


    public function getDateStr()
    {
        return null === $this->date ? '' : date('d.m.Y', $this->date);
    }

    public function setDateStr($value)
    {
        $date = \DateTime::createFromFormat('d.m.Y', $value);
        $this->date = $date->getTimestamp();
    }


}
