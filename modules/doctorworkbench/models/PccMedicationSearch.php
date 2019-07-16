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
            [['id', 'vn', 'hn', 'an', 'icode', 'druguse', 'provider_code', 'provider_name', 'date_service', 'time_service', 'data_json', 'unit', 'tmt24_code', 'usage_line1', 'usage_line2', 'usage_line3', 'drug_name', 'hospcode', 'cid', 'pcc_vn'], 'safe'],
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
            'cid' => $this->cid,
            'pcc_vn' => $this->pcc_vn,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'an', $this->an])
            ->andFilterWhere(['ilike', 'icode', $this->icode])
            ->andFilterWhere(['ilike', 'druguse', $this->druguse])
            ->andFilterWhere(['ilike', 'provider_code', $this->provider_code])
            ->andFilterWhere(['ilike', 'provider_name', $this->provider_name])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json])
            ->andFilterWhere(['ilike', 'unit', $this->unit])
            ->andFilterWhere(['ilike', 'tmt24_code', $this->tmt24_code])
            ->andFilterWhere(['ilike', 'usage_line1', $this->usage_line1])
            ->andFilterWhere(['ilike', 'usage_line2', $this->usage_line2])
            ->andFilterWhere(['ilike', 'usage_line3', $this->usage_line3])
            ->andFilterWhere(['ilike', 'drug_name', $this->drug_name])
            ->andFilterWhere(['ilike', 'hospcode', $this->hospcode])
            //->andFilterWhere(['ilike', 'cid', $this->cid])
            //->andFilterWhere(['ilike', 'pcc_vn', $this->pcc_vn])
            ;

        return $dataProvider;
    }
}
