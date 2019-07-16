<?php

namespace app\modules\queuemanage\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\queuemanage\models\PccVisit;

/**
 * PccVisitSearch represents the model behind the search form of `app\modules\queuemanage\models\PccVisit`.
 */
class PccVisitSearch extends PccVisit
{
  public $date1;
  public $date2;
    public function rules()
    {
        return [
            [['date1','date2','pcc_vn', 'jhcis_vn', 'person_cid', 'jhcis_hn', 'hos_hn', 'visit_date_begin', 'visit_time_begin', 'visit_type', 'visit_department', 'visit_queue_code', 'current_station', 'visit_date_end', 'visit_time_end', 'admit_number', 'data_json'], 'safe'],
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
        $query = PccVisit::find();

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
            'visit_date_begin' => $this->visit_date_begin,
            'visit_time_begin' => $this->visit_time_begin,
            'visit_date_end' => $this->visit_date_end,
            'visit_time_end' => $this->visit_time_end,
        ]);

        $query->andFilterWhere(['ilike', 'pcc_vn', $this->pcc_vn])
            ->andFilterWhere(['ilike', 'jhcis_vn', $this->jhcis_vn])
            ->andFilterWhere(['ilike', 'person_cid', $this->person_cid])
            ->andFilterWhere(['ilike', 'jhcis_hn', $this->jhcis_hn])
            ->andFilterWhere(['ilike', 'hos_hn', $this->hos_hn])
            ->andFilterWhere(['ilike', 'visit_type', $this->visit_type])
            ->andFilterWhere(['ilike', 'visit_department', $this->visit_department])
            ->andFilterWhere(['ilike', 'visit_queue_code', $this->visit_queue_code])
            ->andFilterWhere(['ilike', 'current_station', $this->current_station])
            ->andFilterWhere(['ilike', 'admit_number', $this->admit_number])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json]);

        return $dataProvider;
    }
}
