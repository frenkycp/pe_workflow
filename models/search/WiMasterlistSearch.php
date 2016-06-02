<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WiMasterlist;

/**
* WiMasterlistSearch represents the model behind the search form about `app\models\WiMasterlist`.
*/
class WiMasterlistSearch extends WiMasterlist
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['masterlist_id', 'doc_class', 'doc_section', 'doc_type', 'pic_id', 'user_id', 'flag'], 'integer'],
            [['doc_no', 'doc_title', 'speaker_model', 'date_modified'], 'safe'],
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
$query = WiMasterlist::find()->where(['flag' => 1]);

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
            'masterlist_id' => $this->masterlist_id,
            'doc_class' => $this->doc_class,
            'doc_section' => $this->doc_section,
            'doc_type' => $this->doc_type,
            'pic_id' => $this->pic_id,
            'date_modified' => $this->date_modified,
            'user_id' => $this->user_id,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'doc_no', $this->doc_no])
            ->andFilterWhere(['like', 'doc_title', $this->doc_title])
            ->andFilterWhere(['like', 'speaker_model', $this->speaker_model]);

return $dataProvider;
}
}