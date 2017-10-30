<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiPartDetail;

/**
* WiPartDetailSearch represents the model behind the search form about `app\models\WiPartDetail`.
*/
class WiPartDetailSearch extends WiPartDetail
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['wi_part_detail_id', 'masterlist_id'], 'integer'],
            [['update_date'], 'safe'],
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
$query = WiPartDetail::find();

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
            'wi_part_detail_id' => $this->wi_part_detail_id,
            'masterlist_id' => $this->masterlist_id,
            'update_date' => $this->update_date,
        ]);

return $dataProvider;
}
}