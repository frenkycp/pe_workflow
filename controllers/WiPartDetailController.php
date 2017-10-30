<?php

namespace app\controllers;

use app\models\WiPartDetail;
use app\models\search\WiPartDetailSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * WiPartDetailController implements the CRUD actions for WiPartDetail model.
 */
class WiPartDetailController extends Controller
{
    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;

	
	/**
	 * Lists all WiPartDetail models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new WiPartDetailSearch;
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
	 * Displays a single WiPartDetail model.
	 * @param integer $wi_part_detail_id
     *
	 * @return mixed
	 */
	public function actionView($wi_part_detail_id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($wi_part_detail_id),
		]);
	}

	/**
	 * Creates a new WiPartDetail model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new WiPartDetail;

		try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
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
	 * Updates an existing WiPartDetail model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $wi_part_detail_id
	 * @return mixed
	 */
	public function actionUpdate($wi_part_detail_id)
	{
		$model = $this->findModel($wi_part_detail_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing WiPartDetail model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $wi_part_detail_id
	 * @return mixed
	 */
	public function actionDelete($wi_part_detail_id)
	{
        try {
            $this->findModel($wi_part_detail_id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$wi_part_detail_id',',');
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
	 * Finds the WiPartDetail model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $wi_part_detail_id
	 * @return WiPartDetail the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($wi_part_detail_id)
	{
		if (($model = WiPartDetail::findOne($wi_part_detail_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
