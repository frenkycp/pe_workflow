<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiHistory;

/**
* WiHistorySearch represents the model behind the search form about `app\models\WiHistory`.
*/
class WiHistorySearch extends WiHistory
{
/**
* @inheritdoc
*/
public function rules()
{
return [
		[['id', 'wi_id', 'wi_maker_id', 'rejector_id', 'flag'], 'integer'],
		[['wi_stagestat', 'revised_date', 'check1_date', 'check2_date', 'check3_date', 'approved_date', 'release_date', 'wi_rev', 'wi_filename', 'wi_file', 'purpose', 'reject_date'], 'safe'],
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
$query = WiHistory::find()->joinWith('wi');

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
            'wi_history.id' => $this->id,
            //'wi_id' => $this->wi_id,
            'revised_date' => $this->revised_date,
            'check1_date' => $this->check1_date,
            'check2_date' => $this->check2_date,
            'check3_date' => $this->check3_date,
            'approved_date' => $this->approved_date,
            'release_date' => $this->release_date,
            'wi_maker_id' => $this->wi_maker_id,
			'reject_date' => $this->reject_date,
			'rejector_id' => $this->rejector_id,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'wi_stagestat', $this->wi_stagestat])
            ->andFilterWhere(['like', 'wi_history.wi_rev', $this->wi_rev])
            ->andFilterWhere(['like', 'wi_history.wi_filename', $this->wi_filename])
            ->andFilterWhere(['like', 'wi_history.wi_file', $this->wi_file])
            ->andFilterWhere(['like', 'wi_history.purpose', $this->purpose])
            ->andFilterWhere(['like', 'wi.wi_docno', $this->wiDocno]);

return $dataProvider;
}
}