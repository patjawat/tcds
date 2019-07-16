<?php

namespace app\modules\document\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\document\models\DocumentQrType;

/**
 * DocumentQrTypeSearch represents the model behind the search form about `app\modules\document\models\DocumentQrType`.
 */
class DocumentQrTypeSearch extends DocumentQrType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'other_type'], 'safe'],
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
        $query = DocumentQrType::find();

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
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'other_type', $this->other_type]);

        return $dataProvider;
    }
}
