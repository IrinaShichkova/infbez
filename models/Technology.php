<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "technology".
 *
 * @property integer $id
 * @property string $description
 * @property Seed[] $seeds
 */
class Technology extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technology';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Способ посадки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeeds()
    {
        return $this->hasMany(Seed::className(), ['technology_id' => 'id']);
    }
}
