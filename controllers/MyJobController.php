<?php

namespace app\controllers;

use app\models\Wi;
use app\models\search\WiSearch;
use yii\web\Controller;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;
use yii\web\UploadedFile;
use app\models\WiHistory;
use app\models\WiRemark;
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
	
	public function actionAuthorize($id)
	{
		date_default_timezone_set ('Asia/Jakarta');
		$model = $this->findModel($id);
		$wiHistory = WiHistory::find()->where(['wi_id' => $model->wi_id])->orderBy('id DESC')->one();
		$status = $model->wi_status;
		if($status == 4)
		{
			$model->wi_status = 5;
			$wiHistory->check1_date = date('Y-m-d H:i:s');
		}
		else if($status == 6)
		{
			$model->wi_status = 7;
			$wiHistory->check2_date = date('Y-m-d H:i:s');
		}
		else if($status == 8)
		{
			$model->wi_status = 9;
			$wiHistory->check3_date = date('Y-m-d H:i:s');
		}
		else if($status == 10)
		{
			$model->wi_status = 11;
			$wiHistory = $model->getWiHistories()->where(['wi_rev' => $model->wi_rev])->one();
			WiRemark::updateAll(['status' => 1], ['status' => 0, 'flag' =>1, 'history_id' => $wiHistory->id]);
			$wiHistory->approved_date = date('Y-m-d H:i:s');
		}
		else if($status == 12)
		{
			$model->wi_status = 13;
			$model->wi_issue = date('Y-m-d');
			$wiHistory->release_date = date('Y-m-d H:i:s');
		}
	
		if($model->save())
		{
			if(!$wiHistory->save())
			{
				return json_encode($wiHistory->errors);
			}
			return $this->redirect(Url::previous());
		}else{
			return json_encode($model->errors);
		}
	}
	
	public function getTotalRemarkOpen($wi_id, $wi_rev)
	{
		$wiHistory = $this->getWiHistory($wi_id, $wi_rev);
		if(!$wiHistory)
		{
			$remarkOpen = 0;
		}else 
		{
			$remarkOpen = WiRemark::find()->where(['history_id' => $wiHistory->id, 'status' => 0])->count();
		}
		
		return $remarkOpen;
	}
	
	public function getWiHistory($wi_id, $wi_rev)
	{
		$wiHistory = WiHistory::find()->where(['wi_id' => $wi_id, 'wi_rev' => $wi_rev])->one();
		return $wiHistory;
	}
	
	public function actionSubmit($id)
	{
		date_default_timezone_set ('Asia/Jakarta');
		$tmpFile;
		$model = $this->findModel($id);
		$model->wi_maker = \Yii::$app->user->identity->name;
		$model->wi_status = 3;
		$remarkOpen = $this->getTotalRemarkOpen($model->wi_id, $model->wi_rev);
		$wiHistoryTmp = $this->getWiHistory($model->wi_id, $model->wi_rev);
		$remarkOpen = 0;
		if(!empty($wiHistoryTmp))
		{
			$remarkOpen = count($wiHistoryTmp->getRemarkOpen());
		}
		
		if($remarkOpen > 0)
		{
			//\Yii::$app->session->addFlash("warning", "You still have <a target='_blank' href='" . Url::to(['/wi-history/view', 'id' => $wiHistoryTmp->id]) . "'>" . $remarkOpen . "</a> uncompleted tasks. Close it before submit.");
			\Yii::$app->session->addFlash("warning", "Please give a feedback for each remark to make sure you read it...");
			return $this->redirect(['index']);
		}
	
		if ($model->load($_POST)) {
			$tmpFile = UploadedFile::getInstance($model, 'uploadFile');
			$tmp = WiHistory::find()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->one();
			if($tmp->release_date != NULL)
			{
				\Yii::$app->session->addFlash("warning", "This rev has been releashed on " . $tmp->release_date . ". Please check...!");
				return $this->render('/wi/checkin', [
						'model' => $model,
				]);
			}
			
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
				$wiHistory = new WiHistory();
				
				if(!empty($tmp))
				{
					$wiHistory = $tmp;
				}
				$wiHistory->wi_id = $model->wi_id;
				$wiHistory->wi_stagestat = $model->wi_stagestat;
				$wiHistory->revised_date = date('Y-m-d H:i:s');
				$wiHistory->check1_date = NULL;
				$wiHistory->check2_date = NULL;
				$wiHistory->check3_date = NULL;
				$wiHistory->approved_date = NULL;
				$wiHistory->release_date = NULL;
				$wiHistory->wi_rev = $model->wi_rev;
				$wiHistory->wi_maker_id = \Yii::$app->user->identity->getId();
				$wiHistory->wi_file = $model->wi_file;
				$wiHistory->wi_filename = $model->wi_filename;
				if(!$wiHistory->save())
				{
					return json_encode($wiHistory->errors);
				}
				return $this->redirect(['index']);
			}else{
				return $model->errors;
			}
			//return $this->redirect(Url::previous());
			/*return $this->render('/wi/checkin', [
					'model' => $model,
			]); */
		} else {
			return $this->render('/wi/checkin', [
					'model' => $model,
			]);
		}
	}
	
	/*public function actionReject($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = \Yii::$app->params['STATUS_REJECT'];
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	} */
	
	
	protected function findModel($wi_id)
	{
		if (($model = Wi::findOne($wi_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
	
}