<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\GatewayCDruguage;

/**
 * GatewayCDruguageSearch represents the model behind the search form of `app\modules\doctorworkbench\models\GatewayCDruguage`.
 */
class GatewayCDruguageSearch extends GatewayCDruguage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'drugusage', 'code', 'name1', 'name2', 'name3', 'shortlist', 'status', 'ename1', 'ename2', 'ename3'], 'safe'],
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
        $query = GatewayCDruguage::find();

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
        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'drugusage', $this->drugusage])
            ->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'name1', $this->name1])
            ->andFilterWhere(['ilike', 'name2', $this->name2])
            ->andFilterWhere(['ilike', 'name3', $this->name3])
            ->andFilterWhere(['ilike', 'shortlist', $this->shortlist])
            ->andFilterWhere(['ilike', 'status', $this->status])
            ->andFilterWhere(['ilike', 'ename1', $this->ename1])
            ->andFilterWhere(['ilike', 'ename2', $this->ename2])
            ->andFilterWhere(['ilike', 'ename3', $this->ename3]);

        return $dataProvider;
    }
}
