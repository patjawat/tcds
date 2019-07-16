<?php

namespace app\modules\emr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\emr\models\PccService;

/**
 * PccServiceSearch represents the model behind the search form of `app\modules\emr\models\PccService`.
 */
class PccServiceSearch extends PccService
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hn', 'vn', 'provider_code', 'provider_name', 'date_service', 'time_service', 'cc', 'pe', 'bpd', 'bps', 'temperature', 'pulse', 'rr', 'data_json', 'last_update', 'department', 'o2sat'], 'safe'],
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
        $query = PccService::find()->where(['hn'=>'13165'])->OrderBy(['date_service'=>SORT_DESC,]);

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

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'provider_code', $this->provider_code])
            ->andFilterWhere(['ilike', 'provider_name', $this->provider_name])
            ->andFilterWhere(['ilike', 'cc', $this->cc])
            ->andFilterWhere(['ilike', 'pe', $this->pe])
            ->andFilterWhere(['ilike', 'bpd', $this->bpd])
            ->andFilterWhere(['ilike', 'bps', $this->bps])
            ->andFilterWhere(['ilike', 'temperature', $this->temperature])
            ->andFilterWhere(['ilike', 'pulse', $this->pulse])
            ->andFilterWhere(['ilike', 'rr', $this->rr])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json])
            ->andFilterWhere(['ilike', 'department', $this->department])
            ->andFilterWhere(['ilike', 'o2sat', $this->o2sat]);

        return $dataProvider;
    }
}
