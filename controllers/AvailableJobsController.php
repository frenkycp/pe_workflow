<?php

namespace app\controllers;

use app\models\Wi;
use app\models\search\WiSearch;
use yii\web\Controller;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;

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
	
	public function actionCheckout($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = Wi::$_STATUS_CHECKOUT;
		$model->wi_maker = \Yii::$app->user->identity->name;
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}else{
			return $model->errors;
		}
	}
	
	public function actionCheckMasterlist($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = \Yii::$app->params['STATUS_CHECK_MASTERLIST'];
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	}
	
	public function actionCheckSmile($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = \Yii::$app->params['STATUS_CHECK_SMILE'];
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	}
	
	public function actionFinalCheck($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = \Yii::$app->params['STATUS_CHECK1'];
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	}
	
	public function actionWaitingApproval($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = \Yii::$app->params['STATUS_WAITING_APP'];
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	}
	
	public function actionWaitingDistribution($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = wi::$_STATUS_WAITING_DIST;
		if($model->save())
		{
			return $this->redirect(Url::previous());
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