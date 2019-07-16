<?php

namespace app\modules\doctorworkbench\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\CIcd10tm;

/**
 * CIcd10tmSearch represents the model behind the search form of `app\modules\doctorworkbench\models\CIcd10tm`.
 */
class CIcd10tmSearch extends CIcd10tm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagcode', 'diagename', 'diagtname'], 'safe'],
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
        $query = CIcd10tm::find();

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
        $query->andFilterWhere(['like', 'diagcode', $this->diagcode])
            ->andFilterWhere(['like', 'diagename', $this->diagename])
            ->andFilterWhere(['like', 'diagtname', $this->diagtname]);

        return $dataProvider;
    }
}
