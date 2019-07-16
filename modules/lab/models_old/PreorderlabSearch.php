<?php

namespace app\modules\lab\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\Preorderlab;

/**
 * PreorderlabSearch represents the model behind the search form about `app\modules\lab\models\Preorderlab`.
 */
class PreorderlabSearch extends Preorderlab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pcc_vn', 'data_json', 'pcc_start_service_datetime', 'pcc_end_service_datetime', 'data1', 'data2', 'hospcode', 'lab_code', 'lab_name', 'lab_request_date', 'lab_result_date', 'lab_result', 'standard_result', 'lab_code_moph', 'last_update'], 'safe'],
            [['lab_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Preorderlab::find()->where(['pcc_vn' => '1']);//tester

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'pcc_start_service_datetime' => $this->pcc_start_service_datetime,
            'pcc_end_service_datetime' => $this->pcc_end_service_datetime,
            'lab_request_date' => $this->lab_request_date,
            'lab_result_date' => $this->lab_result_date,
            'lab_price' => $this->lab_price,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'pcc_vn', $this->pcc_vn])
            ->andFilterWhere(['like', 'data_json', $this->data_json])
            ->andFilterWhere(['like', 'data1', $this->data1])
            ->andFilterWhere(['like', 'data2', $this->data2])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'lab_code', $this->lab_code])
            ->andFilterWhere(['like', 'lab_name', $this->lab_name])
            ->andFilterWhere(['like', 'lab_result', $this->lab_result])
            ->andFilterWhere(['like', 'standard_result', $this->standard_result])
            ->andFilterWhere(['like', 'lab_code_moph', $this->lab_code_moph]);

        return $dataProvider;
    }
}
