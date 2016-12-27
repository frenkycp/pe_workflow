<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiPart;

/**
* WiPartSearch represents the model behind the search form about `app\models\WiPart`.
*/
class WiPartSearch extends WiPart
{
/**
* @inheritdoc
*/
public function rules()
{
return [
		[['wi_part_id', 'masterlist_id', 'sap_item_id', 'flag'], 'integer'],
		[['partNo', 'partName', 'documentNo'], 'safe']
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
$query = WiPart::find()->joinWith('sapItem')->joinWith('masterlist')->where(['wi_part.flag' => 1]);

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
            'wi_part_id' => $this->wi_part_id,
            'masterlist_id' => $this->masterlist_id,
            'sap_item_id' => $this->sap_item_id,
            'flag' => $this->flag,
        ]);

$query->andFilterWhere([
		'like', 'sap_item.sap_partno', $this->partNo,
]);

$query->andFilterWhere([
		'like', 'sap_item.description', $this->partName
]);

$query->andFilterWhere([
		'like', 'wi_masterlist.doc_no', $this->documentNo,
]);

return $dataProvider;
}
}