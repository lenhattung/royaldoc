<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'password', 'firstName', 'lastName', 'dateOfBirth', 'gender', 'address', 'street', 'city', 'country', 'postCode', 'mobilePhone', 'phoneCountryCode', 'email', 'note', 'authKey', 'accessToken', 'activeCode', 'activeStatus', 'registerTime', 'role', 'old_password', 'new_password', 'repeat_password'], 'safe'],
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
            'dateOfBirth' => $this->dateOfBirth,
            'registerTime' => $this->registerTime,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'postCode', $this->postCode])
            ->andFilterWhere(['like', 'mobilePhone', $this->mobilePhone])
            ->andFilterWhere(['like', 'phoneCountryCode', $this->phoneCountryCode])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'activeCode', $this->activeCode])
            ->andFilterWhere(['like', 'activeStatus', $this->activeStatus])
            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }
}
