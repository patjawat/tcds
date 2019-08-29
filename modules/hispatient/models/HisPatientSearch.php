<?php

namespace app\modules\hispatient\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\hispatient\models\HisPatient;

/**
 * HisPatientSearch represents the model behind the search form of `app\modules\hispatient\models\HisPatient`.
 */
class HisPatientSearch extends HisPatient
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn'], 'integer'],
            [['prefix', 'fname', 'lname', 'sex', 'birthday_date', 'idcard', 'UPDATE_TIME', 'doctor_id', 'doctor_history'], 'safe'],
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
        $query = HisPatient::find();

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
            'hn' => $this->hn,
            'birthday_date' => $this->birthday_date,
            'UPDATE_TIME' => $this->UPDATE_TIME,
        ]);

        $query->andFilterWhere(['like', 'prefix', $this->prefix])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'idcard', $this->idcard])
            ->andFilterWhere(['like', 'doctor_id', $this->doctor_id])
            ->andFilterWhere(['like', 'doctor_history', $this->doctor_history]);

        return $dataProvider;
    }
}
