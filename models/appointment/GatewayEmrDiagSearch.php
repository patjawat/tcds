<?php

namespace app\modules\emr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\emr\models\GatewayEmrDiag;

/**
 * GatewayEmrDiagSearch represents the model behind the search form of `app\modules\emr\models\GatewayEmrDiag`.
 */
class GatewayEmrDiagSearch extends GatewayEmrDiag
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname', 'hn', 'vn', 'an', 'date_visit', 'time_visit', 'icd_code', 'icd_name', 'diag_type', 'data_json', 'last_update', 'cid', 'provider'], 'safe'],
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
        $query = GatewayEmrDiag::find();

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
            'date_visit' => $this->date_visit,
            'time_visit' => $this->time_visit,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'hospcode', $this->hospcode])
            ->andFilterWhere(['ilike', 'hospname', $this->hospname])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'an', $this->an])
            ->andFilterWhere(['ilike', 'icd_code', $this->icd_code])
            ->andFilterWhere(['ilike', 'icd_name', $this->icd_name])
            ->andFilterWhere(['ilike', 'diag_type', $this->diag_type])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json])
            ->andFilterWhere(['ilike', 'cid', $this->cid])
            ->andFilterWhere(['ilike', 'provider', $this->provider]);

        return $dataProvider;
    }
}
