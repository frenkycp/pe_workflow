<?php

namespace app\controllers;

use app\models\WiRequest;
use app\models\search\WiRequestSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\Wi;
use app\models\Action;

/**
 * WiRequestController implements the CRUD actions for WiRequest model.
 */
class WiRequestController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

    public function behaviors()
    {
    	//NodeLogger::sendLog(Action::getAccess($this->id));
    	//apply role_action table for privilege (doesn't apply to super admin)
    	return Action::getAccess($this->id);
    }
	
	/**
	 * Lists all WiRequest models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new WiRequestSearch;
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
	 * Displays a single WiRequest model.
	 * @param integer $id
     *
	 * @return mixed
	 */
	public function actionView($id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();
        
        $model = $this->findModel($id);
        $wi = $model->wi;
        $model->wi_docno = $wi->wi_docno;
        $model->wi_model = $wi->wi_model;
        $model->wi_title = $wi->wi_title;

        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}
	
	public function actionPrint($id)
	{
		$model = $this->findModel($id);
		$wi = $model->getWi()->one();
		$model->wi_docno = $wi->wi_docno;
		$model->wi_model = $wi->wi_model;
		$model->wi_title = $wi->wi_title;
		if($model->request_type == 1)
		{
			$model->record_no = 'E-017';
			$model->rev_no = '01';
			$model->doc_title = 'WI CHANGE REQUEST';
		}
		else 
		{
			$model->record_no = 'E-001';
			$model->rev_no = '02';
			$model->doc_title = 'PE. CONTROLLED COPY REQUEST FORM';
		}
		return $this->renderPartial('print', [
			'model' => $model,
		]);
	}

	/**
	 * Creates a new WiRequest model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new WiRequest;
		
		if(isset($_GET['wi_id']))
		{
			$model->wi_id = $_GET['wi_id'];
			$wi = Wi::find()->where(['wi_id' => $model->wi_id])->one();
		}
		else 
		{
			$wi = $model->wi;
		}
		$model->wi_docno = $wi->wi_docno;
		$model->wi_model = $wi->wi_model;
		$model->wi_title = $wi->wi_title;
		
		try {
            if ($model->load($_POST) && $model->save()) {
            	return $this->render('view', [
            			'model' => $this->findModel($model->id),
            	]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model]);
	}
	
	public function actionClosing($id)
	{
		$model = $this->findModel($id);
		$wi = $model->getWi()->one();
		$model->status = 1;
		if(!$model->save())
		{
			return json_encode($model->errors);
		}
		\Yii::$app->session->addFlash("success", "Request for Document no.  " . $wi->wi_docno . " on " . date('d-M-Y', strtotime($model->request_date)) . " has been closed...");
		return $this->redirect(Url::previous());
	}

	/**
	 * Updates an existing WiRequest model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		$wi = $model->getWi()->one();
		
		$model->wi_docno = $wi->wi_docno;
		$model->wi_model = $wi->wi_model;
		$model->wi_title = $wi->wi_title;

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing WiRequest model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
        try {
            $model = $this->findModel($id);
            $model->flag = 0;
            $model->save();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }
		
        // TODO: improve detection
        $isPivot = strstr('$id',',');
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

	/**
	 * Finds the WiRequest model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return WiRequest the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = WiRequest::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
