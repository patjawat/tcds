<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\DfItems;

/**
 * DfItemsSearch represents the model behind the search form about `app\modules\doctorworkbench\models\DfItems`.
 */
class DfItemsSearch extends DfItems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'charge_id', 'receipt_id', 'df_charge_id', 'df_receipt_id'], 'safe'],
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
        $query = DfItems::find();

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
            ->andFilterWhere(['like', 'charge_id', $this->charge_id])
            ->andFilterWhere(['like', 'receipt_id', $this->receipt_id])
            ->andFilterWhere(['like', 'df_charge_id', $this->df_charge_id])
            ->andFilterWhere(['like', 'df_receipt_id', $this->df_receipt_id]);

        return $dataProvider;
    }
}
