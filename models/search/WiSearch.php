<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wi;

/**
* WiSearch represents the model behind the search form about `app\models\Wi`.
*/
class WiSearch extends Wi
{
/**
* @inheritdoc
*/

public $index_type;

public function rules()
{
return [
[['wi_id'], 'integer'],
		[['wi_id', 'wi_status'], 'integer'],
		[['wi_model', 'wi_section', 'wi_docno', 'wi_title', 'wi_stagestat', 'wi_issue', 'wi_rev', 'wi_maker', 'wi_filename', 'wi_file', 'wi_filename2', 'wi_file2', 'wi_filename3', 'wi_file3', 'wi_remark', 'wi_dcn'], 'safe'],
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
$query = Wi::find();
	if($params['index_type'] == 'open')
	{
		$query = Wi::find()->where(['<>', 'wi_status', [3, 13]]);
	}
	else if ($params['index_type'] == 'close')
	{
		$query = Wi::find()->where(['wi_status' => [3, 13]]);
	}
	else if ($params['index_type'] == 'wi_maker')
	{
		$query = Wi::find()->where(['wi_status' => [1, 2, 3, 14]]);
	}
	else if ($params['index_type'] == 'check_masterlist')
	{
		$query = Wi::find()->where(['wi_status' => [4, 5]]);
	}
	else if ($params['index_type'] == 'check_smile')
	{
		$query = Wi::find()->where(['wi_status' => [6, 7]]);
	}
	else if ($params['index_type'] == 'check1')
	{
		$query = Wi::find()->where(['wi_status' => [8, 9]]);
	}
	else if ($params['index_type'] == 'waiting_approval')
	{
		$query = Wi::find()->where(['wi_status' => [10, 11]]);
	}
	else if ($params['index_type'] == 'waiting_dist')
	{
		$query = Wi::find()->where(['wi_status' => 12]);
	}
	if (\Yii::$app->controller->id == 'my-job')
	{
		if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_wimaker'])
		{
			//$query = Wi::find()->where(['wi_status' => [1, 2, 14]]);
			$query = Wi::find();
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin1'])
		{
			$query = Wi::find()->where(['wi_status' => [4, 12]]);
			if(isset($params['status']))
			{
				$query = Wi::find()->where(['wi_status' => $params['status']]);
			}
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin2'])
		{
			$query = Wi::find()->where(['wi_status' => 6]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_checker'])
		{
			$query = Wi::find()->where(['wi_status' => 8]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_approval'])
		{
			$query = Wi::find()->where(['wi_status' => 10]);
		}
	}
	if (\Yii::$app->controller->id == 'available-jobs')
	{
		if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_wimaker'])
		{
			$query = Wi::find();
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin1'])
		{
			$query = Wi::find()->where(['wi_status' => [3, 11]]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin2'])
		{
			$query = Wi::find()->where(['wi_status' => 5]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_checker'])
		{
			$query = Wi::find()->where(['wi_status' => 7]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_approval'])
		{
			$query = Wi::find()->where(['wi_status' => 9]);
		}
	}
	$query->orderBy(['wi_issue' => SORT_DESC]);
/* if(strtolower(Yii::$app->user->identity->role->name) == "wi maker"){
	$query = Wi::find()->where(['wi_status' => 'OPEN']);
}else if(strtolower(Yii::$app->user->identity->role->name) == "pe admin 1"){
	$query = Wi::find()->where(['wi_status' => 'CHECK MASTERLIST']);
}else if(strtolower(Yii::$app->user->identity->role->name) == "pe admin 2"){
	$query = Wi::find()->where(['wi_status' => 'CHECK SMILE UPDATE']);
}else if(strtolower(Yii::$app->user->identity->role->name) == "checker"){
	$query = Wi::find()->where(['wi_status' => 'CHECK 1']);
}else if(strtolower(Yii::$app->user->identity->role->name) == "approval"){
	$query = Wi::find()->where(['wi_status' => 'APPROVAL']);
} */

$dataProvider = new ActiveDataProvider([
	'query' => $query,
	'pagination' => [
		'pagesize' => 10,
	],
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'wi_id' => $this->wi_id,
			'wi_status' => $this->wi_status,
			'wi_issue' => $this->wi_issue,
        ]);

        $query->andFilterWhere(['like', 'wi_model', $this->wi_model])
            ->andFilterWhere(['like', 'wi_section', $this->wi_section])
            ->andFilterWhere(['like', 'wi_docno', $this->wi_docno])
            ->andFilterWhere(['like', 'wi_title', $this->wi_title])
            ->andFilterWhere(['like', 'wi_stagestat', $this->wi_stagestat])
            ->andFilterWhere(['like', 'wi_status', $this->wi_status])
            ->andFilterWhere(['like', 'wi_rev', $this->wi_rev])
            ->andFilterWhere(['like', 'wi_maker', $this->wi_maker])
            ->andFilterWhere(['like', 'wi_filename', $this->wi_filename])
            ->andFilterWhere(['like', 'wi_file', $this->wi_file])
            ->andFilterWhere(['like', 'wi_filename2', $this->wi_filename2])
            ->andFilterWhere(['like', 'wi_file2', $this->wi_file2])
            ->andFilterWhere(['like', 'wi_filename3', $this->wi_filename3])
            ->andFilterWhere(['like', 'wi_file3', $this->wi_file3])
            ->andFilterWhere(['like', 'wi_remark', $this->wi_remark])
            ->andFilterWhere(['like', 'wi_dcn', $this->wi_dcn]);

return $dataProvider;
}
}