<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Room;

/**
 * RoomSearch represents the model behind the search form about `backend\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_no'], 'integer'],
            [['room_location'], 'safe'],
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
        $query = Room::find();

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
            'room_no' => $this->room_no,
        ]);

        $query->andFilterWhere(['like', 'room_location', $this->room_location]);

        return $dataProvider;
    }
}
