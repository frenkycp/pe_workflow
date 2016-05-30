<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocType;

/**
* DocTypeSearch represents the model behind the search form about `app\models\DocType`.
*/
class DocTypeSearch extends DocType
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['doc_type_id'], 'integer'],
            [['type_name'], 'safe'],
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
$query = DocType::find();

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
            'doc_type_id' => $this->doc_type_id,
        ]);

        $query->andFilterWhere(['like', 'type_name', $this->type_name]);

return $dataProvider;
}
}