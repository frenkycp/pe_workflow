<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiStatus;

/**
* WiStatusSearch represents the model behind the search form about `app\models\WiStatus`.
*/
class WiStatusSearch extends WiStatus
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['status_id', 'flag'], 'integer'],
            [['status_name'], 'safe'],
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
$query = WiStatus::find();

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
            'status_id' => $this->status_id,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'status_name', $this->status_name]);

return $dataProvider;
}
}