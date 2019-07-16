<?php

namespace app\modules\usermanager\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\usermanager\models\User;

/**
 * UserSearch represents the model behind the search form of `app\modules\usermanager\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags', 'last_login_at', 'status', 'dep_id', 'occ_id', 'pos_id'], 'integer'],
            [['username', 'email', 'password_hash', 'auth_key', 'unconfirmed_email', 'registration_ip', 'password_reset_token', 'pname', 'fullname', 'occ_no', 'pos_no', 'role'], 'safe'],
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
        $query = User::find();

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
            'confirmed_at' => $this->confirmed_at,
            'blocked_at' => $this->blocked_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'flags' => $this->flags,
            'last_login_at' => $this->last_login_at,
            'status' => $this->status,
            'dep_id' => $this->dep_id,
            'occ_id' => $this->occ_id,
            'pos_id' => $this->pos_id,
        ]);

        $query->andFilterWhere(['ilike', 'username', $this->username])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'password_hash', $this->password_hash])
            ->andFilterWhere(['ilike', 'auth_key', $this->auth_key])
            ->andFilterWhere(['ilike', 'unconfirmed_email', $this->unconfirmed_email])
            ->andFilterWhere(['ilike', 'registration_ip', $this->registration_ip])
            ->andFilterWhere(['ilike', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['ilike', 'pname', $this->pname])
            ->andFilterWhere(['ilike', 'fullname', $this->fullname])
            ->andFilterWhere(['ilike', 'occ_no', $this->occ_no])
            ->andFilterWhere(['ilike', 'pos_no', $this->pos_no])
            ->andFilterWhere(['ilike', 'role', $this->role]);

        return $dataProvider;
    }
}
