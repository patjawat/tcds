<?php

namespace app\modules\doctorworkbench\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\EyeExamToday;

/**
 * EyeExamTodaySearch represents the model behind the search form of `app\modules\doctorworkbench\models\EyeExamToday`.
 */
class EyeExamTodaySearch extends EyeExamToday
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hn', 'vn', 'last_update', 'pcc_vn', 'created_at', 'updated_at', 'created_by', 'updated_by', 'data_json', 'form_service'], 'safe'],
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
        $query = EyeExamToday::find();

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
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'vn', $this->vn])
            ->andFilterWhere(['like', 'pcc_vn', $this->pcc_vn])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'data_json', $this->data_json])
            ->andFilterWhere(['like', 'form_service', $this->form_service]);

        return $dataProvider;
    }
}
