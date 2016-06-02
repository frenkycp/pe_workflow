<?php

namespace app\controllers;

use app\models\DocType;
use app\models\search\DocTypeSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
 * DocTypeController implements the CRUD actions for DocType model.
 */
class DocTypeController extends Controller
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
	 * Lists all DocType models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new DocTypeSearch;
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
	 * Displays a single DocType model.
	 * @param integer $doc_type_id
     *
	 * @return mixed
	 */
	public function actionView($doc_type_id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($doc_type_id),
		]);
	}

	/**
	 * Creates a new DocType model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new DocType;

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
	 * Updates an existing DocType model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $doc_type_id
	 * @return mixed
	 */
	public function actionUpdate($doc_type_id)
	{
		$model = $this->findModel($doc_type_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing DocType model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $doc_type_id
	 * @return mixed
	 */
	public function actionDelete($doc_type_id)
	{
		$model = $this->findModel($doc_type_id);
		$model->flag = 0;
		
		if($model->save())
		{
			return $this->redirect(['index']);
		}
	}

	/**
	 * Finds the DocType model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $doc_type_id
	 * @return DocType the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($doc_type_id)
	{
		if (($model = DocType::findOne($doc_type_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
