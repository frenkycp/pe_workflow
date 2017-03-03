<?php

namespace app\controllers;

use app\models\Wi;
use app\models\search\WiSearch;
use yii\web\Controller;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;
use app\models\WiHistory;

class AvailableJobsController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function behaviors()
	{
		//apply role_action table for privilege (doesn't apply to super admin)
		return \app\models\Action::getAccess($this->id);
	}
	
	public function actionIndex()
	{
		$searchModel  = new WiSearch;
		$dataProvider = $searchModel->search($_GET);
	
		Tabs::clearLocalStorage();
	
		Url::remember();
		\Yii::$app->session['__crudReturnUrl'] = null;
	
		return $this->render('/wi/index', [
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
		]);
	}
	
	public function actionView($wi_id)
	{
		\Yii::$app->session['__crudReturnUrl'] = Url::previous();
		Url::remember();
		Tabs::rememberActiveState();
	
		return $this->render('/wi/view', [
				'model' => $this->findModel($wi_id),
		]);
	}
	
	public function actionRevise($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = 2;
		$model->wi_maker = \Yii::$app->user->identity->name;
		if($model->save())
		{
			return $this->redirect(['index']);
		}else{
			return json_encode($model->errors);
		}
	}
	
	public function actionTakeJob($id)
	{
		$model = $this->findModel($id);
		$status = $model->wi_status;
		if(in_array($status, [1, 13, 14]))
		{
			$model->wi_status = 2;
			$model->wi_maker = \Yii::$app->user->identity->name;
		}
		else if($status == 3)
		{
			$model->wi_status = 4;
		}
		else if($status == 5)
		{
			$model->wi_status = 6;
		}
		else if($status == 7)
		{
			$model->wi_status = 8;
		}
		else if($status == 9)
		{
			$model->wi_status = 10;
		}
		else if($status == 11)
		{
			$model->wi_status = 12;
		}
		
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}else{
			return json_encode($model->errors);
		}
	}
	
	protected function findModel($wi_id)
	{
		if (($model = Wi::findOne($wi_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
	
}