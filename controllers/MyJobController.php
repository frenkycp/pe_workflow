<?php

namespace app\controllers;

use app\models\Wi;
use app\models\search\WiSearch;
use yii\web\Controller;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;
use yii\web\UploadedFile;
class MyJobController extends Controller
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
	
	public function actionDownload($id)
	{
		$model = $this->findModel($id);
		$uploadPath = $model->getUploadPath();
		$fileName = $model->wi_filename;
		if($fileName != '' && file_exists($uploadPath . $fileName))
		{
			return \Yii::$app->response->sendFile($uploadPath . $fileName);
		}else{
			return $this->render('..\site\error', [
					'name' => 'File Not Found',
					'message' => "The file you're trying to download is not found on the server.",
			]);
		}
	}
	
	public function actionCheckin($id)
	{
		$tmpFile;
		$model = $this->findModel($id);
		$model->wi_maker = \Yii::$app->user->identity->name;
	
		if ($model->load($_POST)) {
			$tmpFile = UploadedFile::getInstance($model, 'uploadFile');
			$model->wi_status = Wi::$_STATUS_CHECKIN;
			if(!empty($tmpFile)){
				$delete = $model->oldAttributes['uploadFile'];
				$model->uploadFile = $tmpFile;
				$model->wi_filename = $model->uploadFile->baseName . '.' . $model->uploadFile->extension;
				$model->wi_file = "./files/wi/" . $model->uploadFile->baseName . '.' . $model->uploadFile->extension;
			}else{
				$model->uploadFile = $model->oldAttributes['uploadFile'];
			}
			if($model->save()){
				if(!empty($tmpFile)){
					if(!$model->upload()){
						return $model->errors;
					}
				}
				//return $this->redirect([Url::previous()]);
				return $this->render('/wi/view', ['model' => $model]);
			}else{
				return $model->errors;
			}
			//return $this->redirect(Url::previous());
			return $this->render('/wi/checkin', [
					'model' => $model,
			]);
		} else {
			return $this->render('/wi/checkin', [
					'model' => $model,
			]);
		}
	}
	
	public function actionReject($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = \Yii::$app->params['STATUS_REJECT'];
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	}
	
	public function actionClosingWi($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = 'CLOSE';
		$model->wi_issue = date('Y-m-d');
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