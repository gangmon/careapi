<?php

namespace callmez\wechat\modules\admin\models;

use callmez\wechat\models\Fans;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use callmez\wechat\models\MessageHistory;

/**
 * MessageHistorySearch represents the model behind the search form about `callmez\wechat\models\MessageHistory`.
 */
class MessageHistorySearch extends MessageHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wid', 'rid', 'kid'], 'integer'],
            [['open_id', 'module', 'message', 'type'], 'safe'],
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
        $query = MessageHistory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'wid' => $this->wid,
            'rid' => $this->rid,
            'kid' => $this->kid,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'open_id', $this->open_id])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }

    public function searchByFans(Fans $fans)
    {
        
    }
}
