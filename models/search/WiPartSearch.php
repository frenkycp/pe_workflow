<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ViewPartWiDocno;

/**
* WiPartSearch represents the model behind the search form about `app\models\WiPart`.
*/
class WiPartSearch extends ViewPartWiDocno
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['wi_part_id', 'masterlist_id', 'flag'], 'integer'],
            [['sap_partno', 'documentNo', 'sap_partname', 'update_by_id', 'update_by_name', 'update_datetime', 'wi_model'], 'safe'],
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
$query = ViewPartWiDocno::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
'sort' => [
                'defaultOrder' => [
                    //'cust_desc' => SORT_ASC,
                    'update_datetime' => SORT_DESC,
                ]
            ],
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$arr_partno = NULL;
//$partno = str_replace(' ', '', $this->sap_partno);
$partno = $this->sap_partno;
if(!empty($partno))
{
	//$arr_partno = explode(",", $partno);
	$arr_partno = explode(" ", $partno);
}

$query->andFilterWhere([
            'wi_part_id' => $this->wi_part_id,
            'masterlist_id' => $this->masterlist_id,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['sap_partno' => $arr_partno])
        ->andFilterWhere(['like', 'wi_docno', $this->documentNo])
        ->andFilterWhere(['like', 'wi_model', $this->wi_model])
        ->andFilterWhere(['like', 'update_by_id', $this->update_by_id])
        ->andFilterWhere(['like', 'update_by_name', $this->update_by_name])
        ->andFilterWhere(['like', 'update_datetime', $this->update_datetime])
        ->andFilterWhere(['like', 'sap_partname', $this->sap_partname]);

return $dataProvider;
}
}