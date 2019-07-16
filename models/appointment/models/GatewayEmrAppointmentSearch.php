<?php

namespace app\modules\appointment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\appointment\models\GatewayEmrAppointment;

/**
 * GatewayEmrAppointmentSearch represents the model behind the search form of `app\modules\appointment\models\GatewayEmrAppointment`.
 */
class GatewayEmrAppointmentSearch extends GatewayEmrAppointment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provider_code', 'provider_name', 'hn', 'vn', 'an', 'date_visit', 'time_visit', 'clinic', 'appoint_date', 'appoint_time', 'appoint_detail', 'data_json', 'last_update'], 'safe'],
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
        $query = GatewayEmrAppointment::find();

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
            'appoint_date' => $this->appoint_date,
            'appoint_time' => $this->appoint_time,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'provider_code', $this->provider_code])
            ->andFilterWhere(['ilike', 'provider_name', $this->provider_name])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'an', $this->an])
            ->andFilterWhere(['ilike', 'clinic', $this->clinic])
            ->andFilterWhere(['ilike', 'appoint_detail', $this->appoint_detail])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json]);

        return $dataProvider;
    }
}
