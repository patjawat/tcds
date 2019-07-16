<?php

namespace app\modules_share\newpatient\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules_share\newpatient\models\mPatient;

/**
 * mPatientSearch represents the model behind the search form of `app\modules_share\newpatient\models\mPatient`.
 */
class mPatientSearch extends mPatient {

    /**
     * {@inheritdoc}
     */
   
    public function rules() {
        return [
            [['hn', 'created_at', 'created_by', 'updated_at', 'updated_by', 'requester', 'data_json', 'pid', 'prename', 'fname', 'mname', 'lname', 'sex', 'birth'], 'safe'],
            [['agey', 'agem', 'aged'], 'integer'],
            
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
        $query = mPatient::find();
        $query->joinWith(['c_prename','c_sex']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'defaultOrder' => ['hn' => SORT_DESC],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'birth' => $this->birth,
            'agey' => $this->agey,
            'agem' => $this->agem,
            'aged' => $this->aged,           
            
            
        ]);

        $query->andFilterWhere(['ilike', 'hn', $this->hn])
                ->andFilterWhere(['ilike', 'created_by', $this->created_by])
                ->andFilterWhere(['ilike', 'updated_by', $this->updated_by])
                ->andFilterWhere(['ilike', 'requester', $this->requester])
                ->andFilterWhere(['ilike', 'data_json', $this->data_json])
                ->andFilterWhere(['ilike', 'pid', $this->pid])
                ->andFilterWhere(['ilike', 'c_prename.title_th', $this->prename])
                ->andFilterWhere(['ilike', 'fname', $this->fname])
                ->andFilterWhere(['ilike', 'mname', $this->mname])
                ->andFilterWhere(['ilike', 'lname', $this->lname])
                ->andFilterWhere(['ilike', 'c_sex.title', $this->sex]);

        return $dataProvider;
    }

}
