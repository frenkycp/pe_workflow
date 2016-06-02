<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocSection;

/**
* DocSectionSearch represents the model behind the search form about `app\models\DocSection`.
*/
class DocSectionSearch extends DocSection
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['doc_section_id', 'flag'], 'integer'],
            [['section_name'], 'safe'],
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
$query = DocSection::find()->where(['flag' => 1]);

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
            'doc_section_id' => $this->doc_section_id,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'section_name', $this->section_name]);

return $dataProvider;
}
}