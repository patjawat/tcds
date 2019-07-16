<?php

namespace app\modules\emr\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\emr\models\MDocument;

/**
 * MDocumentSearch represents the model behind the search form of `app\modules\emr\models\MDocument`.
 */
class MDocumentSearch extends MDocument
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['hn', 'dir_path', 'filename'], 'safe'],
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
        $query = MDocument::find();

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
        ]);

        $query->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'dir_path', $this->dir_path])
            ->andFilterWhere(['ilike', 'filename', $this->filename]);

        return $dataProvider;
    }
}
