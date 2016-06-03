<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seed".
 *
 * @property integer $id
 * @property string $name
 * @property string $year
 * @property integer $adaptation
 * @property integer $frost
 * @property integer $technology_id
 * @property integer $period_id
 * @property string $description
 * @property NewSort[] $newSorts
 * @property Part[] $parts
 * @property Period $period
 * @property Technology $technology
 */
class Seed extends \yii\db\ActiveRecord
{

    public $imageFile;


    public function upload()
    {
        if ($this->validate()) {
            //$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile->saveAs('uploads/' . $this->id . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'year', 'technology_id', 'period_id'], 'required'],
            [['year'], 'number'],
            [['adaptation', 'frost', 'technology_id', 'period_id'], 'integer'],
            [['name'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 200],
            [['period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::className(), 'targetAttribute' => ['period_id' => 'id']],
            [['technology_id'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['technology_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер сорта',
            'name' => 'Название сорта',
            'year' => 'Год выведения сорта',
            'adaptation' => 'Адаптация к местным условиям',
            'frost' => 'Морозоустойчивость',
            'technology_id' => 'Способ посадки',
            'period_id' => 'Срок созревания',
            'description' => 'Описание характеристик сорта',
            'imageFile'=> 'Фото'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewSorts()
    {
        return $this->hasMany(NewSort::className(), ['seed_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParts()
    {
        return $this->hasMany(Part::className(), ['seed_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(Period::className(), ['id' => 'period_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnology()
    {
        return $this->hasOne(Technology::className(), ['id' => 'technology_id']);
    }


    public function getImageUrl()
    {
        $img = '/uploads/' . $this->id . '.';
        $imgPath = \Yii::getAlias('@webroot') . $img;

        if(file_exists($imgPath . 'jpg'))
            return $img . 'jpg';

        if(file_exists($imgPath . 'gif'))
            return $img . 'gif';

        if(file_exists($imgPath . 'png'))
            return $img . 'png';

        return false;
    }

}
