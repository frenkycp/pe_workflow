<?php

namespace app\controllers;

use app\models\WiMasterlist;
use app\models\search\WiMasterlistSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\DocSection;
use app\models\DocType;

/**
 * WiMasterlistController implements the CRUD actions for WiMasterlist model.
 */
class WiMasterlistController extends Controller
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
	 * Lists all WiMasterlist models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel  = new WiMasterlistSearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
			'sectionDropdown' => ArrayHelper::map(DocSection::find()->orderBy('section_name')->all(), 'doc_section_id', 'section_name'),
			'docTypeDropdown' => ArrayHelper::map(DocType::find()->orderBy('type_name')->all(), 'doc_type_id', 'type_name'),
			'wiMakerDropdown' => ArrayHelper::map(User::find()->where(['role_id' => 4])->orderBy('name')->all(), 'id', 'name'),
		]);
	}

	/**
	 * Displays a single WiMasterlist model.
	 * @param integer $masterlist_id
     *
	 * @return mixed
	 */
	public function actionView($masterlist_id)
	{
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
			'model' => $this->findModel($masterlist_id),
		]);
	}

	/**
	 * Creates a new WiMasterlist model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new WiMasterlist;

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
	 * Updates an existing WiMasterlist model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $masterlist_id
	 * @return mixed
	 */
	public function actionUpdate($masterlist_id)
	{
		$model = $this->findModel($masterlist_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing WiMasterlist model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $masterlist_id
	 * @return mixed
	 */
	public function actionDelete($masterlist_id)
	{
        try {
            $this->findModel($masterlist_id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            \Yii::$app->getSession()->setFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$masterlist_id',',');
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
	 * Finds the WiMasterlist model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $masterlist_id
	 * @return WiMasterlist the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($masterlist_id)
	{
		if (($model = WiMasterlist::findOne($masterlist_id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
	
	public function actionReport()
	{
		
	}
}
