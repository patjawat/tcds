<?php

namespace app\modules\lab\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\LabGroup;

/**
 * LabGroupSearch represents the model behind the search form of `app\modules\lab\models\LabGroup`.
 */
class LabGroupSearch extends LabGroup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['lab_name', 'lab_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LabGroup::find();

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
        ]);

        $query->andFilterWhere(['like', 'lab_name', $this->lab_name])
            ->andFilterWhere(['like', 'lab_id', $this->lab_id]);

        return $dataProvider;
    }
}
