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
		[['wi_model', 'wi_section', 'wi_docno', 'wi_title', 'wi_stagestat', 'wi_status', 'wi_issue', 'wi_rev', 'wi_maker', 'wi_filename', 'wi_file', 'wi_filename2', 'wi_file2', 'wi_filename3', 'wi_file3', 'wi_remark'], 'safe'],
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
		$query = Wi::find()->where(['wi_status' => 'OPEN']);
	}
	else if ($params['index_type'] == 'close')
	{
		$query = Wi::find()->where(['wi_status' => 'CLOSE']);
	}
	else if ($params['index_type'] == 'checkout')
	{
		$query = Wi::find()->where(['LIKE', 'wi_status', Wi::$_STATUS_CHECKOUT]);
	}
	else if ($params['index_type'] == 'checkin')
	{
		$query = Wi::find()->where(['LIKE', 'wi_status', Wi::$_STATUS_CHECKIN]);
	}
	else if ($params['index_type'] == 'check_masterlist')
	{
		$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_CHECK_MASTERLIST]);
	}
	else if ($params['index_type'] == 'check_smile')
	{
		$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_CHECK_SMILE]);
	}
	else if ($params['index_type'] == 'check1')
	{
		$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_CHECK_FINAL]);
	}
	else if ($params['index_type'] == 'waiting_approval')
	{
		$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_WAITING_APPR]);
	}
	else if ($params['index_type'] == 'my_job')
	{
		if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_wimaker'])
		{
			$query = Wi::find()->where(['OR', ['wi_status' => 'CHECKOUT BY ' . \Yii::$app->user->identity->name], 
					['AND', ['wi_maker' => \Yii::$app->user->identity->name], ['wi_status' => Wi::$_STATUS_REJECT]]]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin1'])
		{
			$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_CHECK_MASTERLIST]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin2'])
		{
			$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_CHECK_SMILE]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_checker'])
		{
			$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_CHECK_FINAL]);
		}
		else if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_approval'])
		{
			$query = Wi::find()->where(['wi_status' => Wi::$_STATUS_WAITING_APPR]);
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
        ]);

        $query->andFilterWhere(['like', 'wi_model', $this->wi_model])
            ->andFilterWhere(['like', 'wi_section', $this->wi_section])
            ->andFilterWhere(['like', 'wi_docno', $this->wi_docno])
            ->andFilterWhere(['like', 'wi_title', $this->wi_title])
            ->andFilterWhere(['like', 'wi_stagestat', $this->wi_stagestat])
            ->andFilterWhere(['like', 'wi_status', $this->wi_status])
            ->andFilterWhere(['like', 'wi_issue', $this->wi_issue])
            ->andFilterWhere(['like', 'wi_rev', $this->wi_rev])
            ->andFilterWhere(['like', 'wi_maker', $this->wi_maker])
            ->andFilterWhere(['like', 'wi_filename', $this->wi_filename])
            ->andFilterWhere(['like', 'wi_file', $this->wi_file])
            ->andFilterWhere(['like', 'wi_filename2', $this->wi_filename2])
            ->andFilterWhere(['like', 'wi_file2', $this->wi_file2]);

return $dataProvider;
}
}