<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property integer $buy_data
 * @property string $sum
 * @property integer $cash
 * @property integer $seller_id
 * @property integer $client_id
 * @property integer $part_id
 * @property Client $client
 * @property Part $part
 * @property Seller $seller
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateStr', 'sum', 'seller_id', 'client_id', 'part_id'], 'required'],
            [['buy_data', 'cash', 'seller_id', 'client_id', 'part_id'], 'integer'],
            [['sum'], 'number'],
            [['dateStr'], 'string'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['part_id'], 'exist', 'skipOnError' => true, 'targetClass' => Part::className(), 'targetAttribute' => ['part_id' => 'id']],
            [['seller_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seller::className(), 'targetAttribute' => ['seller_id' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buy_data' => 'Дата покупки',
            'sum' => 'Цена покупки',
            'cash' => 'Оплата наличными',
            'seller_id' => 'Фамилия продавца',
            'client_id' => 'Номер оптового покупателя',
            'part_id' => 'Номер партии',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPart()
    {
        return $this->hasOne(Part::className(), ['id' => 'part_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(Seller::className(), ['id' => 'seller_id']);
    }


    public function getDateStr()
    {
        return null === $this->buy_data ? '' : date('d.m.Y', $this->buy_data);
    }

    public function setDateStr($value)
    {
        $date = \DateTime::createFromFormat('d.m.Y', $value);
        $this->buy_data= $date->getTimestamp();
    }

}
