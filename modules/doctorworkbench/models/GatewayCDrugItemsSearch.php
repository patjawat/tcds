<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\GatewayCDrugItems;

/**
 * GatewayCDrugItemsSearch represents the model behind the search form about `app\modules\doctorworkbench\models\GatewayCDrugItems`.
 */
class GatewayCDrugItemsSearch extends GatewayCDrugItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname', 'icode', 'drug_name', 'qty', 'unit', 'usage_line1', 'usage_line2', 'usage_line3', 'tmt24_code', 'drugtype'], 'safe'],
            [['costprice', 'unitprice'], 'number'],
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
        $query = GatewayCDrugItems::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'costprice' => $this->costprice,
            'unitprice' => $this->unitprice,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'hospname', $this->hospname])
            ->andFilterWhere(['like', 'icode', $this->icode])
            ->andFilterWhere(['like', 'drug_name', $this->drug_name])
            ->andFilterWhere(['like', 'qty', $this->qty])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'usage_line1', $this->usage_line1])
            ->andFilterWhere(['like', 'usage_line2', $this->usage_line2])
            ->andFilterWhere(['like', 'usage_line3', $this->usage_line3])
            ->andFilterWhere(['like', 'tmt24_code', $this->tmt24_code])
            ->andFilterWhere(['like', 'drugtype', $this->drugtype]);

        return $dataProvider;
    }
}
