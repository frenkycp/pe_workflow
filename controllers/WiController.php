<?php

namespace app\controllers;

use app\models\Wi;
use app\models\WiRemark;
use app\models\search\WiSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;
use yii\web\UploadedFile;
use app\models\WiHistory;

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
    
    public function actionTemplate()
    {
        $path = \Yii::getAlias('@webroot').'/uploads/EF1 WI Template rev5.B.xls';
        if (file_exists($path)) {
            return \Yii::$app->response->sendFile($path);
        }
    }
    
    public function actionChecker1()
    {
        $path = \Yii::getAlias('@webroot').'/uploads/WI CHECKER_v1.0.xlsm';
        if (file_exists($path)) {
            return \Yii::$app->response->sendFile($path);
        }
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
    $wi = $this->findModel($wi_id);
    $wiHistory = WiHistory::find()->where(['wi_id' => $wi_id])->andWhere(['not',['rejector_id' => 'null']])->orderBy('id DESC')->one();
    $allHistory = WiHistory::find()->where(['wi_id' => $wi_id])->all();
    foreach ($allHistory as $hist)
    {
            $historyID[] = $hist->id;
    }

    $wiRemark = WiRemark::find()->where(['history_id' => $historyID]);

    return $this->render('view', [
                    'model' => $this->findModel($wi_id),
                    'wiHistory' => $wiHistory,
                    'historyID' => $historyID,
                    'wi_rmk' => $wiRemark,
            ]);
    }

    /**
     * Creates a new Wi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
            date_default_timezone_set ('Asia/Jakarta');
            $model = new Wi;

            $model_required = new \yii\base\DynamicModel([
                'rev_page_no'
            ]);
            $model_required->addRule(['rev_page_no'], 'string');

            try {
        if ($model->load($_POST)) {
            $model_required->load($_POST);
            $model->rev_page_no = $model_required->rev_page_no;
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
    return $this->render('create', ['model' => $model, 'model_required' => $model_required, 'wi_maker_list' => $wi_maker_list]);
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

            $model_required = new \yii\base\DynamicModel([
                'rev_page_no'
            ]);
            $model_required->addRule(['rev_page_no'], 'string');

            if ($model->load($_POST)) {
                    $model_required->load($_POST);
                    $model->rev_page_no = $model_required->rev_page_no;
                    $tmpFile = UploadedFile::getInstance($model, 'uploadFile');
                    if(!empty($tmpFile)){
                            $delete = $model->oldAttributes['uploadFile'];
                            $model->uploadFile = $tmpFile;
                            $model->wi_filename = $model->uploadFile->baseName . '.' . $model->uploadFile->extension;
                            $model->wi_file = "./files/wi/" . $model->uploadFile->baseName . '.' . $model->uploadFile->extension;
                    }else{
                            $model->uploadFile = $model->oldAttributes['uploadFile'];
                    }

                    if($model->wi_status == 14)
                    {
                            $wiHistory = $model->getWiHistories()->where(['wi_rev' => $model->wi_rev])->orderBy('id DESC')->one();
                            if(!empty($wiHistory))
                            {
                                    $wiHistory->reject_date = date('Y-m-d H:i:s');
                                    $wiHistory->rejector_id = \Yii::$app->user->identity->getId();
                                    if(!$wiHistory->save())
                                    {
                                            return json_encode($wiHistory->errors);
                                    }
                            }else{
                                    $model->wi_remark = \Yii::$app->user->identity->name;
                            }
                    }

                    if($model->save()){
                            if(!empty($tmpFile)){
                                    if(!$model->upload()){
                                            return $model->errors;
                                    }

                            }

                            return $this->redirect(['view', 'wi_id' => $wi_id]);
                    }else{
                            return $model->errors;
                    }
        //return $this->redirect(Url::previous());
                    return $this->render('update', [
                                    'model' => $model,
                                    'model_required' => $model_required,
                    ]);
            } else {
                    return $this->render('update', [
                            'model' => $model,
                            'model_required' => $model_required,
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
