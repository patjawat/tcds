<?php

namespace app\modules\queuemanage\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\queuemanage\models\CDoctorRoom;

/**
 * CDoctorRoomSearch represents the model behind the search form of `app\modules\queuemanage\models\CDoctorRoom`.
 */
class CDoctorRoomSearch extends CDoctorRoom
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['room_title', 'doctor_id'], 'safe'],
            [['is_active'], 'boolean'],
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
        $query = CDoctorRoom::find();

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
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['ilike', 'room_title', $this->room_title])
            ->andFilterWhere(['ilike', 'doctor_id', $this->doctor_id]);

        return $dataProvider;
    }
}
