<?php

namespace app\modules\emr\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\emr\models\GatewayEmrVisit;

/**
 * GatewayEmrVisitSearch represents the model behind the search form of `app\modules\emr\models\GatewayEmrVisit`.
 */
class GatewayEmrVisitSearch extends GatewayEmrVisit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname', 'hn', 'vn', 'date_visit', 'time_visit', 'cc', 'pe', 'pi', 'bpd', 'bps', 'temperature', 'pulse', 'rr', 'weight', 'height', 'o2sat', 'department','save_by', 'data_json', 'last_update', 'an'], 'safe'],
            [['cost', 'sele_price', 'sum_price'], 'number'],
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
        $query = GatewayEmrVisit::find()->where(['hn'=>'13165'])->OrderBy(['date_visit'=>SORT_DESC,]);

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
            'cost' => $this->cost,
            'sele_price' => $this->sele_price,
            'sum_price' => $this->sum_price,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'hospcode', $this->hospcode])
            ->andFilterWhere(['ilike', 'hospname', $this->hospname])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'cc', $this->cc])
            ->andFilterWhere(['ilike', 'pe', $this->pe])
            ->andFilterWhere(['ilike', 'pi', $this->pi])
            ->andFilterWhere(['ilike', 'bpd', $this->bpd])
            ->andFilterWhere(['ilike', 'bps', $this->bps])
            ->andFilterWhere(['ilike', 'temperature', $this->temperature])
            ->andFilterWhere(['ilike', 'pulse', $this->pulse])
            ->andFilterWhere(['ilike', 'rr', $this->rr])
            ->andFilterWhere(['ilike', 'weight', $this->weight])
            ->andFilterWhere(['ilike', 'height', $this->height])
            ->andFilterWhere(['ilike', 'o2sat', $this->o2sat])
            ->andFilterWhere(['ilike', 'department', $this->department])
            ->andFilterWhere(['ilike', 'save_by', $this->save_by])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json])
            ->andFilterWhere(['ilike', 'an', $this->an]);

        return $dataProvider;
    }
}
