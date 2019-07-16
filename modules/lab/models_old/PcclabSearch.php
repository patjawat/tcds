<?php

namespace app\modules\lab\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\lab\models\Pcclab;

/**
 * PcclabSearch represents the model behind the search form of `app\modules\lab\models\Pcclab`.
 */
class PcclabSearch extends Pcclab
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname', 'hn', 'vn', 'an', 'date_visit', 'time_visit', 'lab_code', 'lab_name', 'lab_result', 'standard_result', 'lab_request_date', 'lab_result_date', 'data_json', 'last_update', 'cid', 'provider'], 'safe'],
            [['lab_price'], 'number'],
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
        $query = Pcclab::find();

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
            'lab_request_date' => $this->lab_request_date,
            'lab_result_date' => $this->lab_result_date,
            'lab_price' => $this->lab_price,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'hospcode', $this->hospcode])
            ->andFilterWhere(['ilike', 'hospname', $this->hospname])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'an', $this->an])
            ->andFilterWhere(['ilike', 'lab_code', $this->lab_code])
            ->andFilterWhere(['ilike', 'lab_name', $this->lab_name])
            ->andFilterWhere(['ilike', 'lab_result', $this->lab_result])
            ->andFilterWhere(['ilike', 'standard_result', $this->standard_result])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json])
            ->andFilterWhere(['ilike', 'cid', $this->cid])
            ->andFilterWhere(['ilike', 'provider', $this->provider]);

        return $dataProvider;
    }
}
