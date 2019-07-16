<?php

namespace app\modules\lab\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\LisResult;

/**
 * LisResultSearch represents the model behind the search form of `app\modules\lab\models\LisResult`.
 */
class LisResultSearch extends LisResult
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['lis_number', 'lis_code', 'test', 'lab_code', 'result_code', 'result', 'unit', 'normal_range', 'technical_time', 'medical_time', 'result_date', 'user_id', 'remark', 'sec_user', 'sec_time', 'sec_ip', 'sec_script'], 'safe'],
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
        $query = LisResult::find();

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
            'id' => $this->id,
            'technical_time' => $this->technical_time,
            'medical_time' => $this->medical_time,
            'result_date' => $this->result_date,
            'sec_time' => $this->sec_time,
        ]);

        $query->andFilterWhere(['like', 'lis_number', $this->lis_number])
            ->andFilterWhere(['like', 'lis_code', $this->lis_code])
            ->andFilterWhere(['like', 'test', $this->test])
            ->andFilterWhere(['like', 'lab_code', $this->lab_code])
            ->andFilterWhere(['like', 'result_code', $this->result_code])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'normal_range', $this->normal_range])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'sec_user', $this->sec_user])
            ->andFilterWhere(['like', 'sec_ip', $this->sec_ip])
            ->andFilterWhere(['like', 'sec_script', $this->sec_script]);

        return $dataProvider;
    }
}
