<?php

namespace app\controllers;

use app\models\Wi;
use app\models\search\WiSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;
use app\models\User;
use yii\web\UploadedFile;

/**
 * WiController implements the CRUD actions for Wi model.
 */
class WiController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	public function behaviors()
    {
        //apply role_action table for privilege (doesn't apply to super admin)
        return \app\models\Action::getAccess($this->id);
    }
	
	/**
	 * Lists all Wi models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new WiSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Wi model.
	 * @param integer $wi_id
     *
	 * @return mixed
	 */
	public function actionView($wi_id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($wi_id),
		]);
	}

	/**
	 * Creates a new Wi model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Wi;

		try {
            if ($model->load($_POST)) {
            	$tmpFile = UploadedFile::getInstance($model, 'uploadFile');
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
            		return $this->redirect(Url::previous());
            	}else{
            		return $model->errors;
            	}
            	//return $this->redirect(Url::previous());
            	/* return $this->render('update', [
            			'model' => $model,
            	]); */
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model, 'wi_maker_list' => $wi_maker_list]);
	}

	/**
	 * Updates an existing Wi model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $wi_id
	 * @return mixed
	 */
	public function actionUpdate($wi_id)
	{
		$tmpFile;
		$model = $this->findModel($wi_id);

		if ($model->load($_POST)) {
			$tmpFile = UploadedFile::getInstance($model, 'uploadFile');
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
				return $this->redirect(Url::previous());
			}else{
				return $model->errors;
			}
            //return $this->redirect(Url::previous());
			return $this->render('update', [
					'model' => $model,
			]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Wi model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $wi_id
	 * @return mixed
	 */
	public function actionDelete($wi_id)
	{
        try {
            $this->findModel($wi_id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$wi_id',',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
	}
	
	public function actionApproval($id)
	{
		$model = $this->findModel($id);
		$model->wi_status = wi::$_STATUS_APPROVE;
		if($model->save())
		{
			return $this->redirect(Url::previous());
		}
	}
	
	
	/**
	 * Finds the Wi model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $wi_id
	 * @return Wi the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($wi_id)
	{
		if (($model = Wi::findOne($wi_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
