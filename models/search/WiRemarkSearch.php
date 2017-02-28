<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiRemark;

/**
* WiRemarkSearch represents the model behind the search form about `app\models\WiRemark`.
*/
class WiRemarkSearch extends WiRemark
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'user_id', 'history_id', 'status', 'flag'], 'integer'],
		[['remark', 'remark_date', 'feedback', 'feedback_date'], 'safe'],
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
$query = WiRemark::find();

if($params['status'] == 'open')
{
	$query = WiRemark::find()->where(['status' => 0]);
}

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
            'user_id' => $this->user_id,
            'history_id' => $this->history_id,
			'remark_date' => $this->remark_date,
			'feedback_date' => $this->feedback_date,
            'status' => $this->status,
            'flag' => $this->flag,
        ]);

$query->andFilterWhere(['like', 'remark', $this->remark])
->andFilterWhere(['like', 'feedback', $this->feedback]);

return $dataProvider;
}
}