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
		if ($fileName != '' && file_exists($uploadPath . $fileName)) {
			return \Yii::$app->response->sendFile($uploadPath . $fileName);
		} else {
			return $this->render('..\site\error', [
				'name' => 'File Not Found',
				'message' => "The file you're trying to download is not found on the server.",
			]);
		}
	}

	public function actionAuthorize($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$this_time = date('Y-m-d H:i:s');
		$model = $this->findModel($id);
		$wiHistory = WiHistory::find()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->orderBy('id DESC')->one();
		$status = $model->wi_status;

		$user_id = \Yii::$app->user->identity->username;
		$user_name = \Yii::$app->user->identity->name;

		if ($status == 4) {
			$model->wi_status = 8;
			$wiHistory->check1_date = date('Y-m-d H:i:s');
			$wiHistory->check1_by_id = $user_id;
			$wiHistory->check1_by_name = $user_name;
		} else if ($status == 6) {
			$model->wi_status = 8;
			$wiHistory->check2_date = date('Y-m-d H:i:s');
			$wiHistory->check2_by_id = $user_id;
			$wiHistory->check2_by_name = $user_name;
		} else if ($status == 8) {
			$model->wi_status = 10;
			$wiHistory->check3_date = date('Y-m-d H:i:s');
			$wiHistory->check3_by_id = $user_id;
			$wiHistory->check3_by_name = $user_name;
		} else if ($status == 10) {
			$model->wi_status = 12;
			//$wiHistory = $model->getWiHistories()->where(['wi_rev' => $model->wi_rev])->one();
			WiRemark::updateAll(['status' => 1], ['status' => 0, 'flag' => 1, 'history_id' => $wiHistory->id]);
			$wiHistory->approved_date = date('Y-m-d H:i:s');
			$wiHistory->approved_by_id = $user_id;
			$wiHistory->approved_by_name = $user_name;
		} else if ($status == 12) // waiting distribution -> release
		{
			$model->wi_status = 13;
			$model->wi_issue = date('Y-m-d');
			$model->last_issue_datetime = $this_time;
			$model->email_sent_status = 'O';
			$model->email_sent_datetime = null;
			$wiHistory->release_date = date('Y-m-d H:i:s');
			$wiHistory->release_by_id = $user_id;
			$wiHistory->release_by_name = $user_name;
			if ($model->filename_4 != null) {
				$model->wi_filename3 = $model->filename_4;
				$model->wi_file3 = $model->file_4;
			}
		}

		if ($model->save()) {
			if (!$wiHistory->save()) {
				return json_encode($wiHistory->errors);
			}
			\Yii::$app->session->addFlash("success", 'Document <b><a href="' . Url::to(['wi/view', 'wi_id' => $model->wi_id]) . '">' . $model->wi_docno . ' Rev. ' . $model->wi_rev . '</a></b> has been authorized...');
			return $this->redirect(Url::previous());
		} else {
			return json_encode($model->errors);
		}
	}

	public function getTotalRemarkOpen($wi_id, $wi_rev)
	{
		$wiHistory = $this->getWiHistory($wi_id, $wi_rev);
		if (!$wiHistory) {
			$remarkOpen = 0;
		} else {
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
		date_default_timezone_set('Asia/Jakarta');
		$model = $this->findModel($id);
		$this_time = date('Y-m-d H:i:s');

		$model_required = new \yii\base\DynamicModel([
			'rev_page_no'
		]);
		$model_required->addRule(['rev_page_no'], 'required');

		//$model->wi_status = 4;
		if ($model->wi_rev == '-' || $model->wi_rev == '' || $model->wi_rev == NULL) {
			$model->wi_rev = 0;
		}
		if ($model->wi_status != 2) {
			if (in_array($model->wi_status, [1, 13])) {
				$model->wi_rev = '' . ($model->wi_rev + 1);
			}
			$model->wi_status = 2;
			$model->wi_maker = \Yii::$app->user->identity->name;
			if (!$model->save()) {
				return json_encode($model->errors);
			}
		} else {
			if (\Yii::$app->user->identity->name != $model->wi_maker) {
				\Yii::$app->session->addFlash("warning", "This WI " . $model->wi_docno . " was revising by " . $model->wi_maker . ". You can't revise this WI until the process done...");
				return $this->redirect(Url::previous());
			}
		}


		/* $remarkOpen = $this->getTotalRemarkOpen($model->wi_id, $model->wi_rev);
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
		} */

		if ($model->load($_POST)) {
			$model_required->load($_POST);
			$model->rev_page_no = $model_required->rev_page_no;
			$tmpFile = UploadedFile::getInstance($model, 'uploadFile');
			$tmpFile2 = UploadedFile::getInstance($model, 'uploadFile2');
			$tmp = WiHistory::find()->where(['wi_id' => $model->wi_id, 'wi_rev' => $model->wi_rev])->orderBy('id DESC')->one();
			if ($tmp->release_date != NULL) {
				\Yii::$app->session->addFlash("warning", "This rev has been releashed on " . $tmp->release_date . ". Please check...!");
				return $this->render('/wi/checkin', [
					'model' => $model,
				]);
			}

			if (!empty($tmpFile) && !empty($tmpFile2)) {
				$wi_doc_no = $model->wi_docno;
				$model->uploadFile = $tmpFile;
				$model->uploadFile2 = $tmpFile2;
				if (strpos($model->uploadFile->baseName, $wi_doc_no) !== false && strpos($model->uploadFile2->baseName, $wi_doc_no) !== false) {
					$delete = $model->oldAttributes['uploadFile'];
					$model->wi_filename = $model->uploadFile->baseName . '.' . $model->uploadFile->extension;
					$model->wi_file = "./files/wi/" . $model->uploadFile->baseName . '.' . $model->uploadFile->extension;
					$model->filename_4 = $model->uploadFile2->baseName . '.' . $model->uploadFile2->extension;
					$model->file_4 = "./files/wi/" . $model->uploadFile2->baseName . '.' . $model->uploadFile2->extension;
				} else {
					\Yii::$app->session->addFlash("danger", "You're uploaded the wrong file. Please check the file before uploaded...!");
					return $this->render('/wi/checkin', [
						'model' => $model,
					]);
				}
			} else {
				\Yii::$app->session->addFlash("warning", "Please upload WI (Excel + PDF) file...!");
				return $this->render('/wi/checkin', [
					'model' => $model,
				]);
				//$model->uploadFile = $model->oldAttributes['uploadFile'];
			}
			$model->wi_status = 8;
			$model->last_revise_datetime = $this_time;
			$model->last_issue_datetime = null;
			$model->wi_issue = NULL;
			if ($model->save()) {
				if (!empty($tmpFile)) {
					if (!$model->upload()) {
						return $model->errors;
					}
				}
				$wiHistory = new WiHistory();

				/* if(!empty($tmp))
				{
					$wiHistory = $tmp;
					$wiHistory->flag = 1;
				} */
				$wiHistory->wi_id = $model->wi_id;
				$wiHistory->wi_stagestat = $model->wi_stagestat;
				$wiHistory->revised_date = $this_time;
				//$wiHistory->check1_date = NULL;
				//$wiHistory->check2_date = NULL;
				//$wiHistory->check3_date = NULL;
				//$wiHistory->approved_date = NULL;
				//$wiHistory->release_date = NULL;
				$wiHistory->wi_rev = $model->wi_rev;
				$wiHistory->wi_maker_id = \Yii::$app->user->identity->getId();
				$wiHistory->wi_file = $model->wi_file;
				$wiHistory->wi_filename = $model->wi_filename;
				$wiHistory->purpose = $model->wi_dcn;
				if (!$wiHistory->save()) {
					return json_encode($wiHistory->errors);
				}
				\Yii::$app->session->addFlash("success", "WI " . $model->wi_docno . " Rev. " . $model->wi_rev . ' has been successfully revised by ' . $model->wi_maker);
				return $this->redirect(['index']);
			} else {
				return $model->errors;
			}
			//return $this->redirect(Url::previous());
			/*return $this->render('/wi/checkin', [
					'model' => $model,
			]); */
		} else {
			return $this->render('/wi/checkin', [
				'model' => $model,
				'model_required' => $model_required,
			]);
		}
	}

	public function actionReject($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$model = $this->findModel($id);
		//$model->wi_remark = \Yii::$app->user->identity->name;
		$model->wi_status = 14;

		$wiHistory = WiHistory::find()->where(['wi_id' => $model->wi_id])->orderBy('id DESC')->one();
		if ($model->save()) {
			$wiHistory->reject_date = date('Y-m-d H:i:s');
			$wiHistory->rejector_id = \Yii::$app->user->identity->getId();
			if ($wiHistory->save()) {
				\Yii::$app->session->addFlash("danger", 'Document <b><a href="' . Url::to(['wi/view', 'wi_id' => $model->wi_id]) . '">' . $model->wi_docno . ' Rev. ' . $model->wi_rev . '</a></b> has been rejected...');
				return $this->redirect(Url::previous());
			} else {
				return json_encode($wiHistory->errors);
			}
		} else {
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
