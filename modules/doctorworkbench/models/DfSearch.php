<?php

namespace app\modules\doctorworkbench\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\Df;

/**
 * DfSearch represents the model behind the search form of `app\modules\doctorworkbench\models\Df`.
 */
class DfSearch extends Df
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['df_code', 'hn', 'vn', 'pcc_vn'], 'safe'],
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
        $query = Df::find();

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

        $query->andFilterWhere(['like', 'df_code', $this->df_code])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'pcc_vn', $this->pcc_vn]);

        return $dataProvider;
    }
}
