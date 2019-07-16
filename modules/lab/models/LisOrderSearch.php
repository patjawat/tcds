<?php

namespace app\modules\lab\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\LisOrder;

/**
 * LisOrderSearch represents the model behind the search form of `app\modules\lab\models\LisOrder`.
 */
class LisOrderSearch extends LisOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'patient_id'], 'integer'],
            [['message_date', 'patient_name', 'gender', 'birth_date', 'lis_number', 'reference_number', 'accept_time', 'request_div', 'sec_user', 'sec_time', 'sec_ip', 'sec_script'], 'safe'],
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
        $query = LisOrder::find();

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
            'message_date' => $this->message_date,
            'patient_id' => $this->patient_id,
            'birth_date' => $this->birth_date,
            'accept_time' => $this->accept_time,
            'sec_time' => $this->sec_time,
        ]);

        $query->andFilterWhere(['like', 'patient_name', $this->patient_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'lis_number', $this->lis_number])
            ->andFilterWhere(['like', 'reference_number', $this->reference_number])
            ->andFilterWhere(['like', 'request_div', $this->request_div])
            ->andFilterWhere(['like', 'sec_user', $this->sec_user])
            ->andFilterWhere(['like', 'sec_ip', $this->sec_ip])
            ->andFilterWhere(['like', 'sec_script', $this->sec_script]);

        return $dataProvider;
    }
}
