<?php

namespace app\modules\document\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\document\models\Documentqr;

/**
 * DocumentqrSearch represents the model behind the search form of `app\modules\document\models\Documentqr`.
 */
class DocumentqrSearch extends Documentqr
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id'], 'safe'],
            [['hn'], 'integer'],
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
        $query = Documentqr::find();

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
            'hn' => $this->hn,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'type_id', $this->type_id]);

        return $dataProvider;
    }
}
