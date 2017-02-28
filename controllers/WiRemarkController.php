<?php

namespace app\controllers;

use app\models\WiRemark;
use app\models\search\WiRemarkSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use app\models\WiHistory;
use app\models\Wi;

/**
 * WiRemarkController implements the CRUD actions for WiRemark model.
 */
class WiRemarkController extends Controller
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
	 * Lists all WiRemark models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new WiRemarkSearch;
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
	 * Displays a single WiRemark model.
	 * @param integer $id
     *
	 * @return mixed
	 */
	public function actionView($id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new WiRemark model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		date_default_timezone_set ('Asia/Jakarta');
		$model = new WiRemark;
		$wi = Wi::find()->where(['wi_id' => $_GET['wi_id']])->one();
		$wiHistory = WiHistory::find()->where(['wi_id' => $_GET['wi_id']])->orderBy('id DESC')->one();
		$model->history_id = $wiHistory->id;
		$model->user_id = \Yii::$app->user->identity->getId();

		try {
            if ($model->load($_POST)) {
            	
            	$wi->wi_status = 14;
            	if(\Yii::$app->user->identity->role_id == \Yii::$app->params['roleid_admin2'])
            	{
            		$wi->wi_status = 7;
            		$wiHistory->check2_date = date('Y-m-d H:i:s');
            	}
            	if(!$wi->save())
            	{
            		return json_encode($wi->errors);
            	}
            	if(!$wiHistory->save())
            	{
            		return json_encode($wiHistory->errors);
            	}
            	if($model->save())
            	{
            		return $this->redirect(Url::previous());
            	}
            	else
            	{
            		return json_encode($model->errors);
            	}
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->render('create', ['model' => $model]);
	}

	/**
	 * Updates an existing WiRemark model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		date_default_timezone_set ('Asia/Jakarta');
		

		if ($model->load($_POST)) {
			if($model->feedback != '' or $model->feedback != NULL)
			{
				if($model->oldAttributes['feedback'] != $model->feedback)
				{
					$model->feedback_date = date('Y-m-d H:i:s');
				}
				
				$model->status = 1;
			}
			else 
			{
				\Yii::$app->session->addFlash("warning", "Please give a feedback to make sure you read this remark.");
				return $this->render('update', [
						'model' => $model,
				]);
			}
			if($model->save())
			{
				return $this->redirect(Url::previous());
			}
			else 
			{
				return json_encode($model->errors);
			}
            
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}
	
	public function actionFinish()
	{
		$id = $_GET['id'];
		$model = $this->findModel($id);
		$model->status = 1;
		if($model->save())
		{
			return $this->redirect(['/wi-history/view', 'id' => $_GET['history_id']]);
			return $this->render('/wi-history/view', [
					'model' => WiHistory::find($_GET['history_id'])->one(),
			]);
		}
		else
		{
			return json_encode($model->errors);
		}
	}

	/**
	 * Deletes an existing WiRemark model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
        try {
            $this->findModel($id)->delete();
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
	 * Finds the WiRemark model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return WiRemark the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = WiRemark::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
