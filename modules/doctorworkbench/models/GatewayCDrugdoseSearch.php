<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\doctorworkbench\models\GatewayCDrugdose;

/**
 * GatewayCDrugdoseSearch represents the model behind the search form about `app\modules\doctorworkbench\models\GatewayCDrugdose`.
 */
class GatewayCDrugdoseSearch extends GatewayCDrugdose
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'drugcode', 'doseno', 'dosedescription', 'doseprefix'], 'safe'],
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
        $query = GatewayCDrugdose::find();

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
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'drugcode', $this->drugcode])
            ->andFilterWhere(['like', 'doseno', $this->doseno])
            ->andFilterWhere(['like', 'dosedescription', $this->dosedescription])
            ->andFilterWhere(['like', 'doseprefix', $this->doseprefix]);

        return $dataProvider;
    }
}
