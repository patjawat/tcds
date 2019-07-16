<?php

namespace app\modules\lab\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\LabResult;

/**
 * LisResultSearch represents the model behind the search form of `app\modules\lab\models\LisResult`.
 */
class LabResultSearch extends LisResult
{
public $checkin_date;
public $limit;
public $patient_id;
    public function rules()
    {
        return [
            // [['id'], 'integer'],
            [['lis_number','patient_id', 'checkin_time', 'eat_time', 'accept_time', 'request_div', 'lis_code', 'test', 'lab_code', 'result_code', 'result', 'unit', 'normal_range', 'result_date', 'user_id','checkin_date', 'checkin_time', 'eat_date', 'eat_time','accept_time', 'result_date','limit'], 'safe'],
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
        //   'lis_number' => $this->lis_number,
        //   // 'reference_number' => $this->reference_number,
          'patient_id' => $this->patient_id,
          'checkin_date' => $this->checkin_date,
        //   'checkin_time' => $this->checkin_time,
        //   'eat_date' => $this->eat_date,
        //   'eat_time' => $this->eat_time,
        //   'accept_time' => $this->accept_time,
        //   'request_div' => $this->request_div,
          // 'lis_code' => $this->lis_code,
          'test' => $this->test,
          'lab_code' => $this->lab_code,
        //   'result_code' => $this->result_code,
        //   'result' => $this->result,
        //   'unit' => $this->unit,
        //   'normal_range' => $this->normal_range,
        //   'remark' => $this->remark,
        //   'result_date' => $this->result_date,
        //   'user_id' => $this->user_id,
        ]);

        // $query->andFilterWhere(['like', 'test', $this->test]);
        //     ->andFilterWhere(['like', 'lis_code', $this->lis_code])
        //     ->andFilterWhere(['like', 'test', $this->test])
        //     ->andFilterWhere(['like', 'lab_code', $this->lab_code])
        //     ->andFilterWhere(['like', 'result_code', $this->result_code])
        //     ->andFilterWhere(['like', 'result', $this->result])
        //     ->andFilterWhere(['like', 'unit', $this->unit])
        //     ->andFilterWhere(['like', 'normal_range', $this->normal_range])
        //     ->andFilterWhere(['like', 'user_id', $this->user_id])
        //     ->andFilterWhere(['like', 'remark', $this->remark])
        //     ->andFilterWhere(['like', 'sec_user', $this->sec_user])
        //     ->andFilterWhere(['like', 'sec_ip', $this->sec_ip])
        //     ->andFilterWhere(['like', 'sec_script', $this->sec_script]);

        return $dataProvider;
    }
}
