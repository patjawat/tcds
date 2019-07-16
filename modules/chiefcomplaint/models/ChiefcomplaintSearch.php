<?php

namespace app\modules\chiefcomplaint\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

/**
 * ChiefcomplaintSearch represents the model behind the search form of `app\modules\chiefcomplaint\models\Chiefcomplaint`.
 */
class ChiefcomplaintSearch extends Chiefcomplaint
{

    public function rules()
    {
        return [
            [['id', 'pcc_vn', 'data_json', 'date_service', 'time_service', 'data1', 'data2', 'hospcode', 'pi_text', 'cid', 'vn', 'hn', 'created_at', 'updated_at', 'created_by', 'updated_by', 'requester', 'position', 'arm', 'pr_rhythm', 'bp'], 'safe'],
            [['sbp', 'dbp', 'temp', 'pp', 'pr', 'o2sat', 'height', 'weight', 'bt', 'rr', 'bw', 'ht', 'ibw', 'bmi', 'wc', 'ic', 'ec', 'hc'], 'number'],
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
        $query = Chiefcomplaint::find();

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
            'date_service' => $this->date_service,
            'time_service' => $this->time_service,
            'sbp' => $this->sbp,
            'dbp' => $this->dbp,
            'temp' => $this->temp,
            'pp' => $this->pp,
            'pr' => $this->pr,
            'o2sat' => $this->o2sat,
            'height' => $this->height,
            'weight' => $this->weight,
            'updated_at' => $this->updated_at,
            'bt' => $this->bt,
            'rr' => $this->rr,
            'bw' => $this->bw,
            'ht' => $this->ht,
            'ibw' => $this->ibw,
            'bmi' => $this->bmi,
            'wc' => $this->wc,
            'ic' => $this->ic,
            'ec' => $this->ec,
            'hc' => $this->hc,
        ]);

        $query->andFilterWhere(['ilike', 'id', $this->id])
            ->andFilterWhere(['ilike', 'pcc_vn', $this->pcc_vn])
            ->andFilterWhere(['ilike', 'data_json', $this->data_json])
            ->andFilterWhere(['ilike', 'data1', $this->data1])
            ->andFilterWhere(['ilike', 'data2', $this->data2])
            ->andFilterWhere(['ilike', 'hospcode', $this->hospcode])
            ->andFilterWhere(['ilike', 'pi_text', $this->pi_text])
            ->andFilterWhere(['ilike', 'cid', $this->cid])
            ->andFilterWhere(['ilike', 'vn', $this->vn])
            ->andFilterWhere(['ilike', 'hn', $this->hn])
            ->andFilterWhere(['ilike', 'created_at', $this->created_at])
            ->andFilterWhere(['ilike', 'created_by', $this->created_by])
            ->andFilterWhere(['ilike', 'updated_by', $this->updated_by])
            ->andFilterWhere(['ilike', 'requester', $this->requester])
            ->andFilterWhere(['ilike', 'position', $this->position])
            ->andFilterWhere(['ilike', 'arm', $this->arm])
            ->andFilterWhere(['ilike', 'pr_rhythm', $this->pr_rhythm])
            ->andFilterWhere(['ilike', 'bp', $this->bp]);

        return $dataProvider;
    }
}
