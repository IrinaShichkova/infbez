<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Part;

/**
 * PartSearch represents the model behind the search form about `app\models\Part`.
 */
class PartSearch extends Part
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'end', 'yes', 'batch_time', 'weight', 'batch_id', 'seed_id'], 'integer'],
            [['number', 'amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Part::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'number' => $this->number,
            'end' => $this->end,
            'yes' => $this->yes,
            'amount' => $this->amount,
            'batch_time' => $this->batch_time,
            'weight' => $this->weight,
            'batch_id' => $this->batch_id,
            'seed_id' => $this->seed_id,
        ]);

        return $dataProvider;
    }
}
