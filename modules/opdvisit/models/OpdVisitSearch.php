<?php

namespace app\modules\opdvisit\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\opdvisit\models\OpdVisit;

/**
 * OpdVisitSearch represents the model behind the search form of `app\modules\opdvisit\models\OpdVisit`.
 */
class OpdVisitSearch extends OpdVisit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vn', 'hn', 'requester', 'created_at', 'created_by', 'updated_at', 'updated_by', 'service_start_date', 'service_start_time', 'service_end_date', 'service_end_time', 'service_type', 'service_department', 'pcc_vn', 'department', 'doctor_id', 'data_json','visit_date'], 'safe'],
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
        $query = OpdVisit::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'service_start_date' => $this->service_start_date,
            'service_start_time' => $this->service_start_time,
            'service_end_date' => $this->service_end_date,
            'service_end_time' => $this->service_end_time,
            'visit_date' => $this->visit_date,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'requester', $this->requester])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'service_type', $this->service_type])
            ->andFilterWhere(['like', 'service_department', $this->service_department])
            ->andFilterWhere(['like', 'pcc_vn', $this->pcc_vn])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'doctor_id', $this->doctor_id])
            ->andFilterWhere(['like', 'data_json', $this->data_json]);

        return $dataProvider;
    }
}
