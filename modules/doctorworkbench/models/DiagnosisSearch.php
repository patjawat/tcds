<?php

namespace app\modules\doctorworkbench\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\Diagnosis;

/**
 * DiagnosisSearch represents the model behind the search form of `app\modules\doctorworkbench\models\Diagnosis`.
 */
class DiagnosisSearch extends Diagnosis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hn', 'vn', 'provider_code', 'provider_name', 'date_service', 'time_service', 'icd_code', 'icd_name', 'diag_type', 'data_json', 'last_update', 'hospcode', 'cid', 'pcc_vn', 'diag_text'], 'safe'],
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
        $query = Diagnosis::find();

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
            'date_service' => $this->date_service,
            'time_service' => $this->time_service,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'provider_code', $this->provider_code])
            ->andFilterWhere(['like', 'provider_name', $this->provider_name])
            ->andFilterWhere(['like', 'icd_code', $this->icd_code])
            ->andFilterWhere(['like', 'icd_name', $this->icd_name])
            ->andFilterWhere(['like', 'diag_type', $this->diag_type])
            ->andFilterWhere(['like', 'data_json', $this->data_json])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'pcc_vn', $this->pcc_vn])
            ->andFilterWhere(['like', 'diag_text', $this->diag_text]);

        return $dataProvider;
    }
}
