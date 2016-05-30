<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocClass;

/**
* DocClassSearch represents the model behind the search form about `app\models\DocClass`.
*/
class DocClassSearch extends DocClass
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['doc_class_id', 'class_count'], 'integer'],
            [['class_code', 'class_detail'], 'safe'],
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
$query = DocClass::find();

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
            'doc_class_id' => $this->doc_class_id,
            'class_count' => $this->class_count,
        ]);

        $query->andFilterWhere(['like', 'class_code', $this->class_code])
            ->andFilterWhere(['like', 'class_detail', $this->class_detail]);

return $dataProvider;
}
}