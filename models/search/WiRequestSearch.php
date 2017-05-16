<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiRequest;

/**
* WiRequestSearch represents the model behind the search form about `app\models\WiRequest`.
*/
class WiRequestSearch extends WiRequest
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'wi_id', 'request_type', 'requestor_id', 'status', 'flag'], 'integer'],
            [['request_from', 'request_date', 'required_date', 'page_no', 'change_item', 'reason', 'wi_docno', 'wi_title'], 'safe'],
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
$query = WiRequest::find()->joinWith('wi')->where(['wi_request.flag' => 1])->orderBy('wi_request.status ASC, wi_request.id DESC');

$dataProvider = new ActiveDataProvider([
'query' => $query,
		'sort' => ['attributes' => ['wi_docno', 'request_date']]
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'wi_id' => $this->wi_id,
            'request_type' => $this->request_type,
            'request_date' => $this->request_date,
            'required_date' => $this->required_date,
            'requestor_id' => $this->requestor_id,
            'status' => $this->status,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'request_from', $this->request_from])
            ->andFilterWhere(['like', 'page_no', $this->page_no])
            ->andFilterWhere(['like', 'change_item', $this->change_item])
            ->andFilterWhere(['like', 'wi.wi_title', $this->wi_title])
            ->andFilterWhere(['like', 'reason', $this->reason]);

return $dataProvider;
}
}