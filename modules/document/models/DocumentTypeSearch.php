<?php

namespace app\modules\document\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\document\models\DocumentType;

/**
 * DocumentTypeSearch represents the model behind the search form about `app\modules\document\models\DocumentType`.
 */
class DocumentTypeSearch extends DocumentType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'safe'],
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
        $query = DocumentType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
