<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\PccMedication;

/**
 * PccMedicationSearch represents the model behind the search form about `app\modules\doctorworkbench\models\PccMedication`.
 */
class PccMedicationSearch extends PccMedication
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vn', 'hn', 'an', 'icode', 'druguse', 'provider_code', 'provider_name', 'date_service', 'time_service', 'data_json', 'unit', 'tmt24_code', 'usage_line1', 'usage_line2', 'usage_line3', 'drug_name'], 'safe'],
            [['qty', 'unitprice', 'costprice', 'totalprice'], 'number'],
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
        $query = PccMedication::find();

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
            'qty' => $this->qty,
            'unitprice' => $this->unitprice,
            'costprice' => $this->costprice,
            'totalprice' => $this->totalprice,
            'date_service' => $this->date_service,
            'time_service' => $this->time_service,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'an', $this->an])
            ->andFilterWhere(['like', 'icode', $this->icode])
            ->andFilterWhere(['like', 'druguse', $this->druguse])
            ->andFilterWhere(['like', 'provider_code', $this->provider_code])
            ->andFilterWhere(['like', 'provider_name', $this->provider_name])
            ->andFilterWhere(['like', 'data_json', $this->data_json])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'tmt24_code', $this->tmt24_code])
            ->andFilterWhere(['like', 'usage_line1', $this->usage_line1])
            ->andFilterWhere(['like', 'usage_line2', $this->usage_line2])
            ->andFilterWhere(['like', 'usage_line3', $this->usage_line3])
            ->andFilterWhere(['like', 'drug_name', $this->drug_name]);

        return $dataProvider;
    }
}
