<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Register;

/**
 * RegisterSearch represents the model behind the search form of `app\models\Register`.
 */
class RegisterSearch extends Register
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dateOfBirth'], 'safe'],//, 'unique'
            [['mobilePhone', 'country', 'password', 'gender', 'dateOfBirth'], 'required'],
            [['password'], 'string',  'min' =>6 , 'max' => 50],
            [['note'], 'string'],
            [['username', 'gender', 'mobilePhone', 'phoneCountryCode'], 'string', 'max' => 50],
            [['address', 'street', 'city', 'country', 'authKey', 'accessToken'], 'string', 'max' => 512],
            [['firstName', 'lastName', 'postCode', 'email'], 'string', 'max' => 255],
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
        $query = Register::find();

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
//            ->andFilterWhere(['like', 'captcha', $this->captcha])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken]);


        return $dataProvider;
    }
}
