<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $company
 * @property string $address
 * @property string $phone
 * @property Sales[] $sales
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'address', 'phone'], 'required'],
            [['company'], 'string', 'max' => 25],
            [['address'], 'string', 'max' => 60],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер оптового покупателя',
            'company' => 'Название фирмы-покупателя',
            'address' => 'Адрес фирмы-покупателя',
            'phone' => 'Телефон покупателя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['client_id' => 'id']);
    }
}
