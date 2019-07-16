<?php

namespace app\modules\appointment\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\appointment\models\PccAppointment;

/**
 * PccAppointmentSearch represents the model behind the search form of `app\modules\appointment\models\PccAppointment`.
 */
class PccAppointmentSearch extends PccAppointment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hn', 'vn', 'hospcode', 'hospname', 'date_service', 'time_service', 'clinic', 'appoint_date', 'appoint_time', 'detail', 'data_json', 'last_update'], 'safe'],
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
        $query = PccAppointment::find();

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
            'appoint_date' => $this->appoint_date,
            'appoint_time' => $this->appoint_time,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'hospcode', $this->hospcode])
            ->andFilterWhere(['ilike', 'hospname', $this->hospname])
            ->andFilterWhere(['ilike', 'clinic', $this->clinic])
            ->andFilterWhere(['ilike', 'detail', $this->detail])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json]);

        return $dataProvider;
    }
}
