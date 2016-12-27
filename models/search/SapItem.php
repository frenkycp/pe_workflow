<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SapItem as SapItemModel;

/**
* SapItem represents the model behind the search form about `app\models\SapItem`.
*/
class SapItem extends SapItemModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['item_id', 'insert_type', 'flag'], 'integer'],
            [['sap_partno', 'description', 'uom', 'analyst_group', 'analyst_desc', 'issue_type_desc', 'item_class'], 'safe'],
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
$query = SapItemModel::find()->where(['flag' => 1])->orderBy('sap_partno ASC');

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
            'item_id' => $this->item_id,
            //'insert_type' => $this->insert_type,
            //'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'sap_partno', $this->sap_partno])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'uom', $this->uom])
            ->andFilterWhere(['like', 'analyst_group', $this->analyst_group])
            ->andFilterWhere(['like', 'analyst_desc', $this->analyst_desc])
            ->andFilterWhere(['like', 'issue_type_desc', $this->issue_type_desc])
            ->andFilterWhere(['like', 'item_class', $this->item_class]);

return $dataProvider;
}
}