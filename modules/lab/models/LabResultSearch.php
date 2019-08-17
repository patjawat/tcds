<?php

namespace app\modules\lab\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\LabResult;

/**
 * LisResultSearch represents the model behind the search form of `app\modules\lab\models\LisResult`.
 */
class LabResultSearch extends LisResult {

    public $checkin_date;
    public $limit;
    public $patient_id;

    public function rules() {
        return [
            [['lis_number', 'patient_id', 'checkin_time', 'eat_time', 'accept_time', 'request_div', 'lis_code', 'test', 'lab_code', 'result_code', 'result', 'unit', 'normal_range', 'result_date', 'user_id', 'checkin_date', 'checkin_time', 'eat_date', 'eat_time', 'accept_time', 'result_date', 'limit'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = LabResult::find();

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
            'patient_id' => $this->patient_id,
            'checkin_date' => $this->checkin_date,
            'test' => $this->test,
            'lab_code' => $this->lab_code,
        ]);
        return $dataProvider;
    }

}
