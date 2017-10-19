<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `frontend\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ticket_type_id', 'department_id', 'room_room_no', 'user_idCreated', 'user_id1Assigned', 'user_id2closed'], 'integer'],
            [['tick_closed_date', 'tick_status', 'tick_priority', 'tick_startDate', 'tick_description', 'tick_timelimit'], 'safe'],
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
        $query = Ticket::find();

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
            'tick_closed_date' => $this->tick_closed_date,
            'tick_startDate' => $this->tick_startDate,
            'tick_timelimit' => $this->tick_timelimit,
            'ticket_type_id' => $this->ticket_type_id,
            'department_id' => $this->department_id,
            'room_room_no' => $this->room_room_no,
            'user_idCreated' => $this->user_idCreated,
            'user_id1Assigned' => $this->user_id1Assigned,
            'user_id2closed' => $this->user_id2closed,
        ]);

        $query->andFilterWhere(['like', 'tick_status', $this->tick_status])
            ->andFilterWhere(['like', 'tick_priority', $this->tick_priority])
            ->andFilterWhere(['like', 'tick_description', $this->tick_description]);

        return $dataProvider;
    }
}
