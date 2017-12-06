<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dcn;

/**
* DcnSearch represents the model behind the search form about `app\models\Dcn`.
*/
class DcnSearch extends Dcn
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['dcn_id'], 'integer'],
            [['dcn_dl', 'dcn_nowf', 'dcn_type', 'dcn_partno', 'dcn_partname', 'dcn_supplier', 'dcn_no', 'dcn_title', 'dcn_spec', 'dcn_effect', 'dcn_rev', 'dcn_model', 'dcn_section', 'dcn_issue', 'dcn_approvalstat', 'dcn_stat', 'wi_stat', 'pur_stat', 'iqa_stat', 'pc_stat'], 'safe'],
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
$query = Dcn::find();

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
            'dcn_id' => $this->dcn_id,
            'dcn_dl' => $this->dcn_dl,
        ]);

        $query->andFilterWhere(['like', 'dcn_nowf', $this->dcn_nowf])
            ->andFilterWhere(['like', 'dcn_type', $this->dcn_type])
            ->andFilterWhere(['like', 'dcn_partno', $this->dcn_partno])
            ->andFilterWhere(['like', 'dcn_partname', $this->dcn_partname])
            ->andFilterWhere(['like', 'dcn_supplier', $this->dcn_supplier])
            ->andFilterWhere(['like', 'dcn_no', $this->dcn_no])
            ->andFilterWhere(['like', 'dcn_title', $this->dcn_title])
            ->andFilterWhere(['like', 'dcn_spec', $this->dcn_spec])
            ->andFilterWhere(['like', 'dcn_effect', $this->dcn_effect])
            ->andFilterWhere(['like', 'dcn_rev', $this->dcn_rev])
            ->andFilterWhere(['like', 'dcn_model', $this->dcn_model])
            ->andFilterWhere(['like', 'dcn_section', $this->dcn_section])
            ->andFilterWhere(['like', 'dcn_issue', $this->dcn_issue])
            ->andFilterWhere(['like', 'dcn_approvalstat', $this->dcn_approvalstat])
            ->andFilterWhere(['like', 'dcn_stat', $this->dcn_stat])
            ->andFilterWhere(['like', 'wi_stat', $this->wi_stat])
            ->andFilterWhere(['like', 'pur_stat', $this->pur_stat])
            ->andFilterWhere(['like', 'iqa_stat', $this->iqa_stat])
            ->andFilterWhere(['like', 'pc_stat', $this->pc_stat]);

return $dataProvider;
}
}